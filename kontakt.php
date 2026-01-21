<?php
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();

require_once __DIR__ . '/controllers/kontaktController.php';

$formSuccess = "";
$formError = "";
$name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$formSuccess, $formError, $name, $email, $message] = handleKontaktForm("mstrausz94@gmail.com");
}

$trainers = getTrainers();

require __DIR__ . '/views/kontakt.view.php';
