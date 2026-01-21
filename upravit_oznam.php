<?php
session_start();
require 'db.php';

$allowedRoles = ['admin', 'trener'];
if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], $allowedRoles, true)) {
    http_response_code(403);
    die("Nemáš oprávnenie.");
}

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
