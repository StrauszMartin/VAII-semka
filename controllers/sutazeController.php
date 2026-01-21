<?php

require_once __DIR__ . '/../db.php';


function getPreferovaneSutaze(): array
{
    global $conn;

    $userId = $_SESSION['user_id'] ?? 0;

    $sql = "
        SELECT 
            s.*,
            CONCAT(u.MENO, ' ', u.PRIEZVISKO) AS autor_meno,
            GROUP_CONCAT(
                DISTINCT CONCAT(u2.MENO, ' ', u2.PRIEZVISKO)
                SEPARATOR ', '
            ) AS prihlaseni,
            MAX(CASE WHEN us.user_id = ? THEN 1 ELSE 0 END) AS je_prihlaseny
        FROM sutaze s
        LEFT JOIN users u ON u.ID = s.autor_id
        LEFT JOIN ucast_na_sutazi us ON us.sutaz_id = s.id
        LEFT JOIN users u2 ON u2.ID = us.user_id
        GROUP BY s.id
        ORDER BY s.created_at DESC
    ";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        return [];
    }

    $stmt->bind_param('i', $userId);

    $stmt->execute();
    $result = $stmt->get_result();

    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

