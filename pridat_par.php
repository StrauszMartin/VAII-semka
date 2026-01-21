<?php
require 'db.php';
require_once __DIR__ . '/autentifikacia/auth.php';
require_login();
require_roles(['admin', 'trener']);

$returnUrl = $_POST['return_url'] ?? 'pary.php';
if (strpos($returnUrl, '://') !== false) {
    $returnUrl = 'pary.php';
}

$user1 = (int)($_POST['user1_id'] ?? 0);
$user2 = (int)($_POST['user2_id'] ?? 0);

if ($user1 <= 0 || $user2 <= 0 || $user1 === $user2) {
    header("Location: $returnUrl");
    exit;
}

// normalizácia poradia: vždy ulož (menšie_id, väčšie_id)
$a = min($user1, $user2);
$b = max($user1, $user2);

// zákaz duplicitného páru (A-B aj B-A)
$check = $conn->prepare("SELECT id FROM tanecne_pary WHERE user1_id = ? AND user2_id = ?");
$check->bind_param('ii', $a, $b);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    header("Location: $returnUrl");
    exit;
}

// voliteľné: zákaz, aby bol človek vo viacerých pároch
$check2 = $conn->prepare("
    SELECT id FROM tanecne_pary
    WHERE user1_id IN (?, ?) OR user2_id IN (?, ?)
");
$check2->bind_param('iiii', $a, $b, $a, $b);
$check2->execute();
$check2->store_result();

if ($check2->num_rows > 0) {
    header("Location: $returnUrl");
    exit;
}

$ins = $conn->prepare("INSERT INTO tanecne_pary (user1_id, user2_id) VALUES (?, ?)");
$ins->bind_param('ii', $a, $b);
$ins->execute();

header("Location: $returnUrl");
exit;
