<?php
session_start();

// Zmazanie všetkých premenných session
$_SESSION = [];

// Ukončenie session
session_destroy();

// Presmerovanie na prihlasovaciu stránku
header("Location: prihlasovanie.php");
exit;