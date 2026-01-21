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

$id     = (int)($_POST['id'] ?? 0);
$nazov  = trim($_POST['nazov'] ?? '');
$mesto  = trim($_POST['mesto'] ?? '');
$adresa = trim($_POST['adresa'] ?? '');
$typy   = trim($_POST['typy'] ?? '');

if ($id <= 0 || $nazov === '' || $mesto === '' || $adresa === '' || $typy === '') {
    header("Location: $returnUrl");
    exit;
}

$sql = "UPDATE sutaze SET nazov=?, mesto=?, adresa=?, typy=? WHERE id=?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Chyba SQL prepare: ' . $conn->error);
}

$stmt->bind_param('ssssi', $nazov, $mesto, $adresa, $typy, $id);
$stmt->execute();

header("Location: $returnUrl");
exit;
