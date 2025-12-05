<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    die("Nemáš oprávnenie.");
}

$id     = $_POST['id'];
$nadpis = $_POST['nadpis'];
$datum  = $_POST['datum'];
$cas    = $_POST['cas'];
$kde    = $_POST['kde'];
$kolko  = $_POST['kolko'];
$popis  = $_POST['popis'];
$autor  = $_POST['autor'];

$sql = "UPDATE oznamy
        SET nadpis=?, datum=?, cas=?, kde=?, kolko=?, popis=?, autor=?
        WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", 
    $nadpis, $datum, $cas, $kde, $kolko, $popis, $autor, $id
);
$stmt->execute();

header("Location: index.php");
exit;