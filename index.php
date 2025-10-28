<?php require_once __DIR__.'/includes/db.php'; ?>
<?php require_once __DIR__.'/includes/header.php'; ?>

<div class="card">
  <h2>Explora alojamientos</h2>
  <p class="muted">Listado público con acciones según tu rol.</p>

  <?php
    $stmt = $pdo->query("SELECT id, nombre, descripcion, ubicacion, precio, imagen FROM alojamientos ORDER BY creado_en DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <table>
    <thead>
      <tr><th>Nombre</th><th>Ubicación</th><th>Precio</th><th>Acciones</th></tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $r): ?>
        <tr>
          <td><?= htmlspecialchars($r['nombre']) ?></td>
          <td><?= htmlspecialchars($r['ubicacion']) ?></td>
          <td>$<?= number_format($r['precio'],2) ?></td>
          <td>
            <?php if (is_admin()): ?>
              <a class="btn" href="<?= BASE_URL ?>/alojamientos/edit.php?id=<?= $r['id'] ?>">Editar</a>
              <a class="btn danger" href="<?= BASE_URL ?>/alojamientos/delete.php?id=<?= $r['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
            <?php elseif (user()): ?>
              <a class="btn primary" href="<?= BASE_URL ?>/reservas/add.php?id=<?= $r['id'] ?>">Reservar</a>
            <?php else: ?>
              <a class="btn primary" href="<?= BASE_URL ?>/auth/login.php">Reservar</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<hr>
<footer class="muted">CRUD de Alojamientos • <span class="tag">demo</span></footer>
</main>
</body></html>

