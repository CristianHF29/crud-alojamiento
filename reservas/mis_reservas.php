<?php
require_once __DIR__.'/../includes/db.php';
require_once __DIR__.'/../includes/auth.php';
require_login();
require_once __DIR__.'/../includes/header.php';

$stmt = $pdo->prepare("
  SELECT r.id, a.nombre, a.ubicacion, a.precio, r.creado_en
  FROM reservas r
  JOIN alojamientos a ON a.id = r.alojamiento_id
  WHERE r.usuario_id = ?
  ORDER BY r.creado_en DESC
");
$stmt->execute([ user()['id'] ]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="card">
  <h2>Mis reservas</h2>
  <table>
    <thead><tr><th>Alojamiento</th><th>Ubicación</th><th>Precio</th><th>Fecha</th></tr></thead>
    <tbody>
      <?php foreach($rows as $r): ?>
        <tr>
          <td><?= htmlspecialchars($r['nombre']) ?></td>
          <td><?= htmlspecialchars($r['ubicacion']) ?></td>
          <td>$<?= number_format($r['precio'],2) ?></td>
          <td><?= htmlspecialchars($r['creado_en']) ?></td>
        </tr>
      <?php endforeach; ?>
      <?php if(!$rows): ?>
        <tr><td colspan="4" class="muted">Sin reservas aún.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<hr>
<footer class="muted">CRUD de Alojamientos • <span class="tag">demo</span></footer>
</main>
</body></html>

