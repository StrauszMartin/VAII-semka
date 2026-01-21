<?php
require 'db.php';

// Oprávnenie
$allowedRoles = ['admin', 'trener'];

require_once __DIR__ . '/autentifikacia/auth.php';
require_login();
require_roles($allowedRoles);



// Povolené typy oznamov
$allowedTypes = ['HO', 'TM1', 'TM2', 'POK', 'ZAC'];
$typOznamu = $_POST['TypOznamu'] ?? 'HO';
if (!in_array($typOznamu, $allowedTypes, true)) {
    $typOznamu = 'HO';
}

// Kam sa po uložení vrátiť
$returnUrl = $_POST['return_url'] ?? 'index.php';
if (strpos($returnUrl, '://') !== false) {
    $returnUrl = 'index.php';
}

// Načítanie dát z formulára
$nadpis = trim($_POST['nadpis'] ?? '');
$datum  = $_POST['datum'] ?? '';
$cas    = trim($_POST['cas'] ?? '');
$kde    = trim($_POST['kde'] ?? '');
$kolko  = trim($_POST['kolko'] ?? '');
$popis  = trim($_POST['popis'] ?? '');

// Minimálna validácia
if ($nadpis === '' || $datum === '' || $popis === '') {
    header("Location: $returnUrl");
    exit;
}

// Default fotka
$fotoPath = 'uploads/oznamy/default.png';

// Upload fotky (ak bola priložená)
if (
    isset($_FILES['foto']) &&
    $_FILES['foto']['error'] === UPLOAD_ERR_OK &&
    $_FILES['foto']['size'] > 0
) {
    $uploadDir = 'uploads/oznamy/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    if (in_array($ext, $allowedExt, true)) {
        $fileName = uniqid('oznam_', true) . '.' . $ext;
        $fullPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $fullPath)) {
            $fotoPath = $fullPath;
        }
    }
}

// INSERT do DB (autor_id je FK na users.ID)
$sql = "INSERT INTO oznamy (nadpis, datum, cas, kde, kolko, popis, autor_id, TypOznamu, foto_path)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Chyba SQL prepare: " . $conn->error);
}

$autorId = (int)($_SESSION['user_id'] ?? 0);
if ($autorId <= 0) {
    header("Location: $returnUrl");
    exit;
}


$stmt->bind_param(
    'ssssssiss',
    $nadpis,
    $datum,
    $cas,
    $kde,
    $kolko,
    $popis,
    $autorId,
    $typOznamu,
    $fotoPath
);

if (!$stmt->execute()) {
    die("Chyba pri ukladaní oznamu: " . $stmt->error);
}

header("Location: $returnUrl");
exit;
