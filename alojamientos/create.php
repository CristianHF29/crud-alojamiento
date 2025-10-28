<?php
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/admin_only.php';
require_once __DIR__.'/../includes/header.php';

$err = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $nombre = trim($_POST['nombre'] ?? '');
  $descripcion = trim($_POST['descripcion'] ?? '');
  $ubicacion = trim($_POST['ubicacion'] ?? '');
  $precio = floatval($_POST['precio'] ?? 0);
  $imagen = trim($_POST['imagen'] ?? '');

  if ($nombre==='') { $err='Nombre requerido'; }
  else {
    $stmt = $pdo->prepare("INSERT INTO alojamientos (nombre,descripcion,ubicacion,precio,imagen,creado_por) VALUES (?,?,?,?,?,?)");
    $stmt->execute([$nombre,$descripcion,$ubicacion,$precio,$imagen,user()['id'] ?? null]);
    header('Location: '.BASE_URL.'/'); exit;
  }
}
?>
<div class="card">
  <h2>Nuevo alojamiento</h2>
  <?php if ($err): ?><p style="color:#fca5a5"><?= htmlspecialchars($err) ?></p><?php endif; ?>
  <form method="post">
    <input name="nombre" placeholder="Nombre">
    <div class="row">
      <input name="ubicacion" placeholder="Ubicación">
      <hr>
      <input type="number" step="0.01" name="precio" placeholder="Precio">
    </div>
    <input name="imagen" placeholder="archivo.jpg (opcional)">
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <button class="btn primary" type="submit">Guardar</button>
  </form>
</div>

<hr>
<footer class="muted">CRUD de Alojamientos • <span class="tag">demo</span></footer>
</main>
</body></html>

