<?php
session_start();
require 'db.php';

// Oprávnenie 
$allowedRoles = ['admin', 'trener'];

if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], $allowedRoles, true)) {
    http_response_code(403);
    die("Nemáš oprávnenie pridávať oznamy.");
}

// Povolené typy oznamov
$allowedTypes = ['HO', 'TM1', 'TM2', 'POK', 'ZAC'];

// Typ oznamu prichádza z formulára (na stránke skupiny je nastavený automaticky)
$typOznamu = $_POST['TypOznamu'] ?? 'HO';
if (!in_array($typOznamu, $allowedTypes, true)) {
    $typOznamu = 'HO';
}

// Kam sa po uložení vrátiť (index alebo skupinová stránka)
$returnUrl = $_POST['return_url'] ?? 'index.php';

// základná ochrana proti externým redirectom
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
$autor  = trim($_POST['autor'] ?? '');

// Minimálna validácia (uprav podľa požiadaviek)
if ($nadpis === '' || $datum === '' || $popis === '' || $autor === '') {
    // ak chceš, môžeš sem dať session error a vrátiť späť
    header("Location: $returnUrl");
    exit;
}

// INSERT do DB
$sql = "INSERT INTO oznamy (nadpis, datum, cas, kde, kolko, popis, autor, TypOznamu)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Chyba SQL prepare: " . $conn->error);
}

$stmt->bind_param("ssssssss", $nadpis, $datum, $cas, $kde, $kolko, $popis, $autor, $typOznamu);

if (!$stmt->execute()) {
    die("Chyba pri ukladaní oznamu: " . $stmt->error);
}

// Redirect späť na stránku, kde sa oznam pridával (skupina alebo hlavné oznamy)
header("Location: $returnUrl");
exit;
