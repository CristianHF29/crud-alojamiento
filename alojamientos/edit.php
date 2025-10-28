<?php
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/admin_only.php';

$id = intval($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM alojamientos WHERE id=?");
$stmt->execute([$id]);
$aloj = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$aloj) { die('No encontrado'); }

$err = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $nombre = trim($_POST['nombre'] ?? '');
  $descripcion = trim($_POST['descripcion'] ?? '');
  $ubicacion = trim($_POST['ubicacion'] ?? '');
  $precio = floatval($_POST['precio'] ?? 0);
  $imagen = trim($_POST['imagen'] ?? '');

  if ($nombre==='') { $err='Nombre requerido'; }
  else {
    $upd = $pdo->prepare("UPDATE alojamientos SET nombre=?, descripcion=?, ubicacion=?, precio=?, imagen=? WHERE id=?");
    $upd->execute([$nombre,$descripcion,$ubicacion,$precio,$imagen,$id]);
    header('Location: '.BASE_URL.'/'); exit;
  }
}
require_once __DIR__.'/../includes/header.php';
?>
<div class="card">
  <h2>Editar alojamiento</h2>
  <?php if ($err): ?><p style="color:#fca5a5"><?= htmlspecialchars($err) ?></p><?php endif; ?>
  <form method="post">
    <input name="nombre" value="<?= htmlspecialchars($aloj['nombre']) ?>">
    <div class="row">
      <input name="ubicacion" value="<?= htmlspecialchars($aloj['ubicacion']) ?>">
      <hr>
      <input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($aloj['precio']) ?>">
    </div>
    <input name="imagen" value="<?= htmlspecialchars($aloj['imagen']) ?>">
    <textarea name="descripcion"><?= htmlspecialchars($aloj['descripcion']) ?></textarea>
    <button class="btn primary" type="submit">Actualizar</button>
  </form>
</div>

<hr>
<footer class="muted">CRUD de Alojamientos • <span class="tag">demo</span></footer>
</main>
</body></html>


