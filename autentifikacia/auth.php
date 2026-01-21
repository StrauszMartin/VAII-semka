<?php

function ensure_session_started(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function require_login(string $redirectTo = 'Prihlasovanie/prihlasovanie.php'): void
{
    ensure_session_started();

    if (!isset($_SESSION['user_id'])) {
        header("Location: {$redirectTo}");
        exit;
    }
}

function require_roles(array $roles, string $redirectTo = 'index.php'): void
{
    ensure_session_started();

    $userRole = $_SESSION['user_role'] ?? ($_SESSION['role'] ?? null);
    if ($userRole === null || !in_array($userRole, $roles, true)) {
        header("Location: {$redirectTo}");
        exit;
    }
}
