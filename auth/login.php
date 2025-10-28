<?php
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/auth.php';

$err = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $email = trim($_POST['email'] ?? '');
  $pass  = $_POST['password'] ?? '';
  $stmt = $pdo->prepare("SELECT id,nombre,email,password,tipo FROM usuarios WHERE email=? LIMIT 1");
  $stmt->execute([$email]);
  $u = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($u && password_verify($pass, $u['password'])) {
    $_SESSION['user'] = ['id'=>$u['id'],'nombre'=>$u['nombre'],'email'=>$u['email'],'tipo'=>$u['tipo']];
    header('Location: '.BASE_URL.'/cuenta.php');
    exit;
  } else { $err = 'Credenciales inválidas'; }
}
?>
<?php require_once __DIR__.'/../includes/header.php'; ?>

<div class="card">
  <h2>Iniciar sesión</h2>
  <?php if ($err): ?><p style="color:#fca5a5"><?= htmlspecialchars($err) ?></p><?php endif; ?>
  <form method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Contraseña">
    <div>
      <button class="btn primary" type="submit">Entrar</button>
      <a class="btn ghost" href="<?= BASE_URL ?>/auth/register.php">Crear cuenta</a>
    </div>
  </form>
</div>

<hr>
<footer class="muted">CRUD de Alojamientos • <span class="tag">demo</span></footer>
</main>
</body></html>

