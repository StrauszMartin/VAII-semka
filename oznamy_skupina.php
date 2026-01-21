<?php
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();

require_once __DIR__ . '/controllers/oznamyController.php';

$allowed = [
    'TM1' => 'TM1',
    'TM2' => 'TM2',
    'POK' => 'TM DETI - POK',
    'ZAC' => 'TM DETI - ZAČ',
];

$typ = $_GET['typ'] ?? '';
if (!isset($allowed[$typ])) {
    header("Location: index.php");
    exit;
}

$pageTitle = "Oznamy - " . $allowed[$typ];
$returnUrl = "oznamy_skupina.php?typ=" . urlencode($typ);

$oznamy = getOznamyByTyp($typ);

require __DIR__ . '/views/oznamy_skupina.view.php';
