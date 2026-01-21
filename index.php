<?php
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();

require_once __DIR__ . '/controllers/oznamyController.php';

$typ = 'HO';
$oznamy = getOznamyByTyp($typ);
$returnUrl = "index.php";

require __DIR__ . '/views/index.view.php';
