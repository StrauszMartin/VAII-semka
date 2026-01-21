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

    // AJAX 
    $isAjax =
        (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
        || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');

        if ($formError !== "") {
            echo json_encode(['ok' => false, 'message' => $formError]);
        } else {
            echo json_encode(['ok' => true, 'message' => $formSuccess]);
        }
        exit;
    }
}


$trainers = getTrainers();

require __DIR__ . '/views/kontakt.view.php';
