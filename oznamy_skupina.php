<?php
session_start();
require 'db.php';

$allowed = [
    'TM1' => 'TM1',
    'TM2' => 'TM2',
    'POK' => 'TM deti - POK',
    'ZAC' => 'TM deti - ZAČ',
];

$typ = $_GET['typ'] ?? '';
if (!isset($allowed[$typ])) {
    // ak nie je typ platný, pošli späť na hlavné oznamy
    header("Location: index.php");
    exit;
}

$pageTitle = "Oznamy - " . $allowed[$typ];

// SELECT filtrovaný podľa typ
$sql = "SELECT * FROM oznamy WHERE TypOznamu = ? ORDER BY datum DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $typ);
$stmt->execute();
$result = $stmt->get_result();

// návratová URL pre redirect po CRUD
$returnUrl = "oznamy_skupina.php?typ=" . urlencode($typ);
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Top Dance Žilina</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mainCSS.css">
</head>
<body>

<div class="page-wrapper">

    <!-- HEADER (nechaj rovnaký ako v index.php) -->
    <!-- Najjednoduchšie: skopíruj sem celý header z index.php bez zmien -->
    <?php /* skopíruj header z index.php */ ?>

    <div id="overlay" class="menu-overlay"></div>

    <div class="content-wrapper">

        <!-- ASIDE / SIDEBAR (skopíruj z index.php, len linky v Skupiny už budú upravené) -->
        <?php /* skopíruj aside z index.php */ ?>

        <!-- MAIN CONTENT -->
        <main class="main-content py-4">
            <div class="container max-width">

                <div class="section-header mb-4">
                    <h2 class="section-title"><?php echo htmlspecialchars($pageTitle); ?></h2>
                    <div class="section-title-underline"></div>
                </div>

                <?php while ($row = $result->fetch_assoc()): ?>
                    <article class="announcement-card | mt-1rem mb-3rem">

                        <div class="announcement-card-header d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h3 class="announcement-title mb-0">
                                    <?php echo nl2br(htmlspecialchars($row["nadpis"])); ?>
                                </h3>
                            </div>

                            <div class="d-flex flex-column align-items-end gap-2">
                                <span class="announcement-date">
                                    <?php echo date("j. n. Y", strtotime($row["datum"])); ?>
                                </span>

                                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>

                                    <button
                                        class="btn btn-sm btn-outline-primary edit-btn"
                                        data-id="<?php echo $row['id']; ?>"
                                        data-nadpis="<?php echo htmlspecialchars($row['nadpis'], ENT_QUOTES); ?>"
                                        data-datum="<?php echo $row['datum']; ?>"
                                        data-cas="<?php echo htmlspecialchars($row['cas'], ENT_QUOTES); ?>"
                                        data-kde="<?php echo htmlspecialchars($row['kde'], ENT_QUOTES); ?>"
                                        data-kolko="<?php echo htmlspecialchars($row['kolko'], ENT_QUOTES); ?>"
                                        data-popis="<?php echo htmlspecialchars($row['popis'], ENT_QUOTES); ?>"
                                        data-autor="<?php echo htmlspecialchars($row['autor'], ENT_QUOTES); ?>"
                                    >
                                        Upraviť
                                    </button>

                                    <form action="delete_oznam.php" method="post" onsubmit="return confirm('Naozaj chceš zmazať tento oznam?');">
                                        <input type="hidden" name="oznam_id" value="<?php echo (int)$row['id']; ?>">
                                        <input type="hidden" name="return_url" value="<?php echo htmlspecialchars($returnUrl, ENT_QUOTES); ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Vymazať</button>
                                    </form>

                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="announcement-body row g-4">
                            <div class="col-md-4">
                                <img src="default.jpg"
                                     alt="<?php echo htmlspecialchars($row["nadpis"]); ?>"
                                     class="announcement-image img-fluid">
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="announcement-meta">
                                            <div><span class="meta-label">Čas:</span> <?php echo $row["cas"] ?: "-"; ?></div>
                                            <div><span class="meta-label">Kde:</span> <?php echo $row["kde"] ?: "-"; ?></div>
                                            <div><span class="meta-label">Koľko:</span> <?php echo $row["kolko"] ?: "-"; ?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="announcement-meta">
                                            <div><span class="meta-label">S kým:</span> -</div>
                                            <div><span class="meta-label">Ako:</span> -</div>
                                        </div>
                                    </div>
                                </div>

                                <p class="announcement-text mt-3">
                                    <?php echo nl2br(htmlspecialchars($row["popis"])); ?>
                                </p>

                                <div class="text-end mt-3">
                                    <span class="announcement-author">
                                        <?php echo htmlspecialchars($row["autor"]); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </article>
                <?php endwhile; ?>

            </div>
        </main>

    </div>
</div>

<!-- POPUP - pridať -->
<div id="oznam-popup" class="oznam-popup-overlay">
    <div class="oznam-popup-box">
        <h2>Pridať nový oznam</h2>

        <form action="pridat_oznam.php" method="POST" class="oznam-form">
            <input type="hidden" name="TypOznamu" value="<?php echo htmlspecialchars($typ, ENT_QUOTES); ?>">
            <input type="hidden" name="return_url" value="<?php echo htmlspecialchars($returnUrl, ENT_QUOTES); ?>">

            <label>Názov oznamu</label>
            <input type="text" name="nadpis" required>

            <label>Dátum</label>
            <input type="date" name="datum" required>

            <label>Čas</label>
            <input type="text" name="cas">

            <label>Kde</label>
            <input type="text" name="kde">

            <label>Koľko</label>
            <input type="text" name="kolko">

            <label>Popis</label>
            <textarea name="popis" rows="4" required></textarea>

            <label>Autor</label>
            <input type="text" name="autor" required>

            <div class="popup-buttons">
                <button type="submit" class="btn-save">Uložiť</button>
                <button type="button" id="popup-close" class="btn-cancel">Zavrieť</button>
            </div>
        </form>
    </div>
</div>

<!-- POPUP - upraviť -->
<div id="oznam-edit-popup" class="oznam-popup-overlay">
    <div class="oznam-popup-box">
        <h2>Upraviť oznam</h2>

        <form action="upravit_oznam.php" method="POST" class="oznam-form">
            <input type="hidden" name="id" id="edit-id">
            <input type="hidden" name="return_url" value="<?php echo htmlspecialchars($returnUrl, ENT_QUOTES); ?>">

            <label>Názov oznamu</label>
            <input type="text" name="nadpis" id="edit-nadpis" required>

            <label>Dátum</label>
            <input type="date" name="datum" id="edit-datum" required>

            <label>Čas</label>
            <input type="text" name="cas" id="edit-cas">

            <label>Kde</label>
            <input type="text" name="kde" id="edit-kde">

            <label>Koľko</label>
            <input type="text" name="kolko" id="edit-kolko">

            <label>Popis</label>
            <textarea name="popis" id="edit-popis" rows="4" required></textarea>

            <label>Autor</label>
            <input type="text" name="autor" id="edit-autor" required>

            <div class="popup-buttons mt-3">
                <button type="submit" class="btn-save">Uložiť zmeny</button>
                <button type="button" id="popup-edit-close" class="btn-cancel">Zavrieť</button>
            </div>
        </form>
    </div>
</div>

<script src="menuNavigationPopUp.js"></script>
<script src="menuNavigation.js"></script>
<script src="slideAnim.js"></script>
</body>
</html>
