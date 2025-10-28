<?php
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/auth.php';
require_login();

$aloj_id = intval($_GET['id'] ?? 0);

// verifica que exista
$chk = $pdo->prepare("SELECT id FROM alojamientos WHERE id=?");
$chk->execute([$aloj_id]);
if (!$chk->fetch()) { die('Alojamiento no encontrado'); }

// inserta (evita duplicado por UNIQUE)
$ins = $pdo->prepare("INSERT IGNORE INTO reservas (usuario_id, alojamiento_id) VALUES (?,?)");
$ins->execute([ user()['id'], $aloj_id ]);

// redirige a mis reservas
header('Location: '.BASE_URL.'/reservas/mis_reservas.php');
exit;
