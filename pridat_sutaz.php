<?php
require 'db.php';

$allowedRoles = ['admin', 'trener'];
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();
require_roles($allowedRoles);

$returnUrl = $_POST['return_url'] ?? 'sutaze.php';
if (strpos($returnUrl, '://') !== false) {
    $returnUrl = 'sutaze.php';
}

$nazov  = trim($_POST['nazov'] ?? '');
$mesto  = trim($_POST['mesto'] ?? '');
$adresa = trim($_POST['adresa'] ?? '');
$typy   = trim($_POST['typy'] ?? '');

if ($nazov === '' || $mesto === '' || $adresa === '' || $typy === '') {
    header("Location: $returnUrl");
    exit;
}

$autorId = (int)($_SESSION['user_id'] ?? 0);
if ($autorId <= 0) {
    header("Location: $returnUrl");
    exit;
}

$sql = "INSERT INTO sutaze (nazov, mesto, adresa, typy, autor_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Chyba SQL prepare: ' . $conn->error);
}

$stmt->bind_param('ssssi', $nazov, $mesto, $adresa, $typy, $autorId);

if (!$stmt->execute()) {
    die('Chyba pri ukladaní súťaže: ' . $stmt->error);
}

header("Location: $returnUrl");
exit;
