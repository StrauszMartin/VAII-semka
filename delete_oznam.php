<?php
session_start();
require 'db.php';

// len admin môže mazať
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // prípadne môžeš dať header("Location: Prihlasovanie/prihlasovanie.php");
    http_response_code(403);
    echo "Nemáš oprávnenie mazať oznamy.";
    exit;
}

// skontroluj, či prišlo ID
if (!isset($_POST['oznam_id'])) {
    header("Location: index.php");
    exit;
}

$oznamId = (int)$_POST['oznam_id'];

if ($oznamId <= 0) {
    header("Location: index.php");
    exit;
}

// DELETE z databázy
$sql = "DELETE FROM oznamy WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $oznamId);
$stmt->execute();

// presmerovanie späť na hlavnú stránku
header("Location: index.php");
exit;
