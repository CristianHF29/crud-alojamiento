<?php
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/admin_only.php';

$id = intval($_GET['id'] ?? 0);
$pdo->prepare("DELETE FROM alojamientos WHERE id=?")->execute([$id]);
header('Location: '.BASE_URL.'/');
