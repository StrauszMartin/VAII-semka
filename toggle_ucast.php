<?php
require 'db.php';
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();

$isAjax =
    (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

$returnUrl = $_POST['return_url'] ?? 'sutaze.php';
if (strpos($returnUrl, '://') !== false) {
    $returnUrl = 'sutaze.php';
}

$sutazId = (int)($_POST['sutaz_id'] ?? 0);
$userId  = (int)($_SESSION['user_id'] ?? 0);

if ($sutazId <= 0 || $userId <= 0) {
    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => false, 'error' => 'bad_request']);
        exit;
    }
    header("Location: $returnUrl");
    exit;
}

$check = $conn->prepare("SELECT id FROM ucast_na_sutazi WHERE user_id = ? AND sutaz_id = ?");
$check->bind_param('ii', $userId, $sutazId);
$check->execute();
$check->store_result();

$joined = false;

if ($check->num_rows > 0) {
    // zruš účasť
    $del = $conn->prepare("DELETE FROM ucast_na_sutazi WHERE user_id = ? AND sutaz_id = ?");
    $del->bind_param('ii', $userId, $sutazId);
    $del->execute();
    $joined = false;
} else {
    // prihlás sa
    $ins = $conn->prepare("INSERT INTO ucast_na_sutazi (user_id, sutaz_id) VALUES (?, ?)");
    $ins->bind_param('ii', $userId, $sutazId);
    $ins->execute();
    $joined = true;
}

if ($isAjax) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['ok' => true, 'joined' => $joined]);
    exit;
}

header("Location: $returnUrl");
exit;
