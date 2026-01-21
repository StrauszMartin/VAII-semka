<?php
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();

require_once __DIR__ . '/controllers/paryController.php';

$pageTitle = 'Tanečné páry';
$returnUrl = 'pary.php';

$pary  = getTancnePary();
$users = getUsersForPairs();

require __DIR__ . '/views/pary.view.php';
