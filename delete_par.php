<?php
require 'db.php';
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();
require_roles(['admin', 'trener']);

$returnUrl = $_POST['return_url'] ?? 'pary.php';
if (strpos($returnUrl, '://') !== false) {
    $returnUrl = 'pary.php';
}

$parId = (int)($_POST['par_id'] ?? 0);
if ($parId <= 0) {
    header("Location: $returnUrl");
    exit;
}

$stmt = $conn->prepare("DELETE FROM tanecne_pary WHERE id = ?");
$stmt->bind_param('i', $parId);
$stmt->execute();

header("Location: $returnUrl");
exit;
