<?php

require 'db.php';

$allowedRoles = ['admin', 'trener'];
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();
require_roles($allowedRoles);


$returnUrl = $_POST['return_url'] ?? 'index.php';
if (strpos($returnUrl, '://') !== false) $returnUrl = 'index.php';

if (!isset($_POST['oznam_id'])) {
    header("Location: $returnUrl");
    exit;
}

$oznamId = (int)$_POST['oznam_id'];
if ($oznamId <= 0) {
    header("Location: $returnUrl");
    exit;
}

$sql = "DELETE FROM oznamy WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $oznamId);
$stmt->execute();

header("Location: $returnUrl");
exit;
