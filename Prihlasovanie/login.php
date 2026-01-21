<?php
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: prihlasovanie.php");
    exit;
}

$email = trim($_POST["username"] ?? "");   
$password = $_POST["password"] ?? "";

if ($email === "" || $password === "") {
    header("Location: prihlasovanie.php?chyba=" . urlencode("Vyplň e-mail a heslo."));
    exit;
}

$sql = "SELECT * FROM users WHERE MAIL = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

if (!$user) {
    header("Location: prihlasovanie.php?chyba=" . urlencode("Používateľ neexistuje!"));
    exit;
}

if (!password_verify($password, $user["HESLO"])) {
    header("Location: prihlasovanie.php?chyba=" . urlencode("Zlé heslo!"));
    exit;
}

// OK – prihlásenie
$_SESSION["user_id"] = $user["ID"];
$_SESSION["user_name"] = $user["MENO"];
$_SESSION["user_role"] = $user["ROLA"];

header("Location: ../index.php");
exit;
