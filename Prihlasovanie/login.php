<?php
session_start();
require '../db.php';

$chyba = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE MENO = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {

        if ($password === $user["HESLO"]) {

            $_SESSION["user_id"] = $user["ID"];
            $_SESSION["user_name"] = $user["MENO"];
            $_SESSION["user_role"] = $user["ROLA"];

            header("Location: ../index.php");
            exit;
        } 
        else {
            $chyba = "Zlé heslo!";
        }
    } 
    else {
        $chyba = "Používateľ neexistuje!";
    }
}
?>