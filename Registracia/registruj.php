<?php
session_start();
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: registracia.php");
    exit;
}

$meno = trim($_POST["meno"] ?? "");
$priezvisko = trim($_POST["priezvisko"] ?? "");
$mail = trim($_POST["mail"] ?? "");
$heslo = $_POST["heslo"] ?? "";

if ($meno === "" || $priezvisko === "" || $mail === "" || $heslo === "") {
    header("Location: registracia.php?chyba=" . urlencode("Vyplň všetky polia."));
    exit;
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    header("Location: registracia.php?chyba=" . urlencode("Neplatný e-mail."));
    exit;
}

if (mb_strlen($heslo) < 6) {
    header("Location: registracia.php?chyba=" . urlencode("Heslo musí mať aspoň 6 znakov."));
    exit;
}

$rola = "user";
$hesloHash = password_hash($heslo, PASSWORD_DEFAULT);

// kontrola duplicity mailu
$stmt = $conn->prepare("SELECT ID FROM users WHERE MAIL = ? LIMIT 1");
$stmt->bind_param("s", $mail);
$stmt->execute();
$res = $stmt->get_result();
if ($res && $res->fetch_assoc()) {
    header("Location: registracia.php?chyba=" . urlencode("Používateľ s týmto e-mailom už existuje."));
    exit;
}

// INSERT (ID je auto)
$ins = $conn->prepare("INSERT INTO users (MENO, PRIEZVISKO, MAIL, HESLO, ROLA) VALUES (?, ?, ?, ?, ?)");
$ins->bind_param("sssss", $meno, $priezvisko, $mail, $hesloHash, $rola);

if (!$ins->execute()) {
    header("Location: registracia.php?chyba=" . urlencode("Registrácia zlyhala."));
    exit;
}

// presmeruj na login s úspešným oznamom
header("Location: ../Prihlasovanie/prihlasovanie.php?ok=" . urlencode("Registrácia prebehla úspešne. Teraz sa môžeš prihlásiť."));
exit;
