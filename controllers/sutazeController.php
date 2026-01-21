<?php

require_once __DIR__ . '/../db.php';


function getPreferovaneSutaze(): array
{
    global $conn;

    $sql = "
        SELECT s.*, CONCAT(u.MENO, ' ', u.PRIEZVISKO) AS autor_meno
        FROM sutaze s
        LEFT JOIN users u ON u.ID = s.autor_id
        ORDER BY s.created_at DESC
    ";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        return [];
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
