<?php
session_start();
require 'db.php';

// iba admin môže pridávať oznamy
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    die("Nemáš oprávnenie pridávať oznamy.");
}

// prijatie údajov z formulára
$nadpis = $_POST['nadpis'];
$datum  = $_POST['datum'];
$cas    = $_POST['cas'];
$kde    = $_POST['kde'];
$kolko  = $_POST['kolko'];
$popis  = $_POST['popis'];
$autor  = $_POST['autor'];

// pripravený INSERT
$sql = "INSERT INTO oznamy (nadpis, datum, cas, kde, kolko, popis, autor)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nadpis, $datum, $cas, $kde, $kolko, $popis, $autor);
$stmt->execute();

// späť na hlavnú stránku
header("Location: index.php");
exit;