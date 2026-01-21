<?php
require 'db.php';
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();

$returnUrl = $_POST['return_url'] ?? 'sutaze.php';
if (strpos($returnUrl, '://') !== false) {
    $returnUrl = 'sutaze.php';
}

$sutazId = (int)($_POST['sutaz_id'] ?? 0);
$userId  = (int)($_SESSION['user_id'] ?? 0);

if ($sutazId <= 0 || $userId <= 0) {
    header("Location: $returnUrl");
    exit;
}

$sql = "INSERT IGNORE INTO ucast_na_sutazi (user_id, sutaz_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $userId, $sutazId);
$stmt->execute();

header("Location: $returnUrl");
exit;
