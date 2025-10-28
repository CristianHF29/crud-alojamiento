<?php
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/auth.php';

$err = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $nombre = trim($_POST['nombre'] ?? '');
  $email  = trim($_POST['email'] ?? '');
  $pass   = $_POST['password'] ?? '';

  if ($nombre==='' || $email==='' || $pass==='') { $err = 'Campos requeridos'; }
  else {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    try {
      $pdo->prepare("INSERT INTO usuarios (nombre,email,password,tipo) VALUES (?,?,?,'usuario')")
          ->execute([$nombre,$email,$hash]);
      header('Location: '.BASE_URL.'/auth/login.php'); exit;
    } catch (PDOException $e) { $err = 'Email en uso'; }
  }
}
?>
<?php require_once __DIR__.'/../includes/header.php'; ?>

<div class="card">
  <h2>Crear cuenta</h2>
  <?php if ($err): ?><p style="color:#fca5a5"><?= htmlspecialchars($err) ?></p><?php endif; ?>
  <form method="post">
    <input name="nombre" placeholder="Nombre">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Contraseña">
    <div>
      <button class="btn primary" type="submit">Registrarme</button>
      <a class="btn ghost" href="<?= BASE_URL ?>/auth/login.php">Ya tengo cuenta</a>
    </div>
  </form>
</div>

<hr>
<footer class="muted">CRUD de Alojamientos • <span class="tag">demo</span></footer>
</main>
</body></html>
