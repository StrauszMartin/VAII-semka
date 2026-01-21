<?php
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();

require_once __DIR__ . '/controllers/sutazeController.php';

$pageTitle = 'Preferované súťaže';
$returnUrl = 'sutaze.php';

$sutaze = getPreferovaneSutaze();

require __DIR__ . '/views/sutaze.view.php';
