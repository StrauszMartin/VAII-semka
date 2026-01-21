<?php
require_once __DIR__ . '/../db.php';

function getTancnePary(): array
{
    global $conn;

    $sql = "
        SELECT 
            p.id,
            CONCAT(u1.MENO, ' ', u1.PRIEZVISKO) AS tanecnik1,
            CONCAT(u2.MENO, ' ', u2.PRIEZVISKO) AS tanecnik2,
            p.created_at
        FROM tanecne_pary p
        JOIN users u1 ON u1.ID = p.user1_id
        JOIN users u2 ON u2.ID = p.user2_id
        ORDER BY p.created_at DESC
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
}

/** Zoznam používateľov do selectu */
function getUsersForPairs(): array
{
    global $conn;

    $sql = "
        SELECT ID, MENO, PRIEZVISKO, MAIL
        FROM users
        WHERE ROLA = 'user'
        ORDER BY PRIEZVISKO, MENO
    ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
}

