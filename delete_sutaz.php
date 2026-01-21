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

$sutazId = (int)($_POST['sutaz_id'] ?? 0);
if ($sutazId <= 0) {
    header("Location: $returnUrl");
    exit;
}

$sql = "DELETE FROM sutaze WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Chyba SQL prepare: ' . $conn->error);
}

$stmt->bind_param('i', $sutazId);
$stmt->execute();

header("Location: $returnUrl");
exit;
