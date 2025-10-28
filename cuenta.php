<?php require_once __DIR__.'/includes/db.php'; ?>
<?php require_once __DIR__.'/includes/auth.php'; require_login(); ?>
<?php require_once __DIR__.'/includes/header.php'; ?>

<div class="card">
  <h2>Mi cuenta</h2>
  <p class="muted">Hola, <b><?= htmlspecialchars(user()['nombre']) ?></b> (<?= user()['tipo'] ?>).</p>
  <div style="display:flex;gap:10px;flex-wrap:wrap">
    <a class="btn" href="<?= BASE_URL ?>/reservas/mis_reservas.php">Ver mis reservas</a>
    <?php if (is_admin()): ?>
      <a class="btn primary" href="<?= BASE_URL ?>/alojamientos/create.php">Crear alojamiento</a>
    <?php endif; ?>
  </div>
</div>

<hr>
<footer class="muted">CRUD de Alojamientos • <span class="tag">demo</span></footer>
</main>
</body></html>

