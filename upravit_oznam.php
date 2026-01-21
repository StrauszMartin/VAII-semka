<?php
require 'db.php';

$allowedRoles = ['admin', 'trener'];

require_once __DIR__ . '/autentifikacia/auth.php';
require_login();
require_roles($allowedRoles);


$returnUrl = $_POST['return_url'] ?? 'index.php';
if (strpos($returnUrl, '://') !== false) $returnUrl = 'index.php';

$id     = $_POST['id'];
$nadpis = $_POST['nadpis'];
$datum  = $_POST['datum'];
$cas    = $_POST['cas'];
$kde    = $_POST['kde'];
$kolko  = $_POST['kolko'];
$popis  = $_POST['popis'];

$sql = "UPDATE oznamy
        SET nadpis=?, datum=?, cas=?, kde=?, kolko=?, popis=?
        WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $nadpis, $datum, $cas, $kde, $kolko, $popis, $id);
$stmt->execute();

header("Location: $returnUrl");
exit;
