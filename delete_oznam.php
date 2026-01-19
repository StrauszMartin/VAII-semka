<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    http_response_code(403);
    echo "Nemáš oprávnenie mazať oznamy.";
    exit;
}

$returnUrl = $_POST['return_url'] ?? 'index.php';
if (strpos($returnUrl, '://') !== false) $returnUrl = 'index.php';

if (!isset($_POST['oznam_id'])) {
    header("Location: $returnUrl");
    exit;
}

$oznamId = (int)$_POST['oznam_id'];
if ($oznamId <= 0) {
    header("Location: $returnUrl");
    exit;
}

$sql = "DELETE FROM oznamy WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $oznamId);
$stmt->execute();

header("Location: $returnUrl");
exit;
