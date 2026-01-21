<?php


require_once __DIR__ . '/../db.php';


function getOznamyByTyp(string $typ): array
{
    global $conn;

    $sql = "
        SELECT o.*, CONCAT(u.MENO, ' ', u.PRIEZVISKO) AS autor_meno
        FROM oznamy o
        LEFT JOIN users u ON u.ID = o.autor_id
        WHERE o.TypOznamu = ?
        ORDER BY o.created_at DESC
    ";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        return [];
    }

    $stmt->bind_param('s', $typ);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
