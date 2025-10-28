<?php
require_once __DIR__.'/../includes/auth.php';     // sesión
require_once __DIR__.'/../includes/config.php';   // BASE_URL

session_unset();
session_destroy();

header('Location: '.BASE_URL.'/');
exit;

