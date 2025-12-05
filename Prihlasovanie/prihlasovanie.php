<?php
require "../db.php";
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login — Bootstrap Layout</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="prihlasovanieStyle.css">
</head>
<body>

  <div class="container-fluid vh-100 d-flex align-items-center">
    <div class="row w-100">

      <!-- LEFT column (informational / image) -->
      <aside class="col-lg-6 d-none d-lg-flex bg-light left-col align-items-center justify-content-center">
        <div class="text-center p-4">
          <h1 class="display-5 fw-bold">Welcome to Top Dance</h1>
          <p class="lead text-muted">Community, classes and events — join us!</p>
        </div>
      </aside>

      <!-- RIGHT column (login form) -->
      <main class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
        <div class="card shadow-sm w-100" style="max-width:420px;">
          <div class="card-body p-4">

            <!-- Logo + Title -->
            <div class="text-center mb-4">
              <!-- simple inline SVG logo -->
              <div class="mx-auto mb-3 logo-wrap">
                <svg width="72" height="72" viewBox="0 0 109 109" xmlns="http://www.w3.org/2000/svg">
                  <rect width="109" height="109" rx="18" fill="#0b6fb1" />
                  <text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" font-size="36" fill="#fff" font-family="Arial, Helvetica, sans-serif">TD</text>
                </svg>
              </div>

              <h2 class="h4 mb-1">Prihlásenie</h2>
              <p class="text-muted small mb-0">Zadajte svoje meno a heslo</p>
            </div>

            <!-- Login form -->
            <form action="login.php" method="post" class="needs-validation" novalidate>
                
                <?php if (!empty($chyba)): ?>
                <div class="alert alert-danger"><?php echo $chyba; ?></div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="username" class="form-label">Meno</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <div class="invalid-feedback">Prosím zadajte meno.</div>
                </div>

              <div class="mb-3">
                <label for="password" class="form-label">Heslo</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">Prosím zadajte heslo.</div>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Prihlásiť</button>
              </div>
            </form>

          </div>
        </div>
      </main>

    </div>
  </div>
</body>
</html>
