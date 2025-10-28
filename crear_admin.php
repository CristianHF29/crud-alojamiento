<?php
require_once __DIR__.'/includes/db.php';

$nombre = 'Admin';
$email = 'admin@demo.com';
$pass = 'admin123';
$hash = password_hash($pass, PASSWORD_DEFAULT);

$pdo->prepare("INSERT INTO usuarios (nombre,email,password,tipo) VALUES (?,?,?,'administrador')")
    ->execute([$nombre,$email,$hash]);

echo "Admin creado: $email / $pass. Elimina este archivo.";
