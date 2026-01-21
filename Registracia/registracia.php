<?php
require_once "../db.php";
session_start();

if (!empty($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit;
}

$chyba = isset($_GET["chyba"]) ? htmlspecialchars($_GET["chyba"]) : "";
$ok = isset($_GET["ok"]) ? htmlspecialchars($_GET["ok"]) : "";
?>
<!doctype html>
<html lang="sk">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrácia — Top Dance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Prihlasovanie\prihlasovanieStyle.css">
</head>
<body>

<div class="container-fluid vh-100 d-flex align-items-center">
  <div class="row w-100">

    <!-- LEFT column -->
    <aside class="col-lg-6 d-none d-lg-flex bg-light left-col align-items-center justify-content-center">
      <div class="text-center p-4">
        <h1 class="display-5 fw-bold">Welcome to Top Dance</h1>
        <p class="lead text-muted">Vytvor si účet a získaj prístup k obsahu.</p>
      </div>
    </aside>

    <!-- RIGHT column -->
    <main class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
      <div class="card shadow-sm w-100" style="max-width:420px;">
        <div class="card-body p-4">

          <div class="text-center mb-4">
            <div class="mx-auto mb-3 logo-wrap">
              <svg width="72" height="72" viewBox="0 0 109 109" xmlns="http://www.w3.org/2000/svg">
                <rect width="109" height="109" rx="18" fill="#0b6fb1" />
                <text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" font-size="36" fill="#fff"
                      font-family="Arial, Helvetica, sans-serif">TD</text>
              </svg>
            </div>
            <h2 class="h4 mb-1">Registrácia</h2>
          </div>

          <form action="registruj.php" method="post" class="needs-validation" novalidate>

            <div class="mb-3">
              <label for="meno" class="form-label">Meno</label>
              <input type="text" class="form-control" id="meno" name="meno" required minlength="2">
              <div class="invalid-feedback">Zadaj meno (min. 2 znaky).</div>
            </div>

            <div class="mb-3">
              <label for="priezvisko" class="form-label">Priezvisko</label>
              <input type="text" class="form-control" id="priezvisko" name="priezvisko" required minlength="2">
              <div class="invalid-feedback">Zadaj priezvisko (min. 2 znaky).</div>
            </div>

            <div class="mb-3">
              <label for="mail" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="mail" name="mail" required>
              <div class="invalid-feedback">Zadaj platný e-mail.</div>
            </div>

            <div class="mb-3">
              <label for="heslo" class="form-label">Heslo</label>
              <input type="password" class="form-control" id="heslo" name="heslo" required minlength="6">
              <div class="invalid-feedback">Heslo musí mať aspoň 6 znakov.</div>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Registrovať</button>
            </div>

            <div class="text-center mt-3 small">
              Už máš účet? <a href="../Prihlasovanie/prihlasovanie.php">Prihlásiť sa</a>
            </div>
          </form>

          <?php if (!empty($ok)): ?>
            <div class="alert alert-success mt-3"><?php echo $ok; ?></div>
          <?php endif; ?>

          <?php if (!empty($chyba)): ?>
            <div class="alert alert-danger mt-3"><?php echo $chyba; ?></div>
          <?php endif; ?>

        </div>
      </div>
    </main>

  </div>
</div>

<script src="../Prihlasovanie/validation.js"></script>
<script src="registraciaValidation.js"></script>
</body>
</html>
