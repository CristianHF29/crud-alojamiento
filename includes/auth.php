<?php
// Sesión y helpers
if (session_status() === PHP_SESSION_NONE) session_start();

function user() {
  return $_SESSION['user'] ?? null;
}

function is_admin() {
  return isset($_SESSION['user']) && $_SESSION['user']['tipo'] === 'administrador';
}

function require_login() {
  if (!user()) {
    header('Location: '.BASE_URL.'/auth/login.php');
    exit;
  }
}
