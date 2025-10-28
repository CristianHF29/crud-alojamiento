<?php require_once __DIR__.'/auth.php'; require_once __DIR__.'/config.php'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>CRUD Alojamiento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    :root {
      --bg: #FDF5E6;              /* oldlace */
      --primary: #000080;         /* navy */
      --secondary: #ADD8E6;       /* lightblue */
      --text: #1b1b1b;
      --muted: #444;
      --card: #ffffff;
      --border: #ddd;
      --radius: 12px;
      --shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    * { box-sizing: border-box; }
    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* NAVIGATION BAR */
    .nav {
      background: var(--primary);
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 22px;
      box-shadow: var(--shadow);
    }
    .nav strong {
      font-size: 20px;
      letter-spacing: 0.5px;
    }
    .nav a {
      color: white;
      text-decoration: none;
      margin-right: 15px;
      font-weight: 500;
      transition: 0.2s;
    }
    .nav a:hover {
      color: var(--secondary);
      text-decoration: underline;
    }

    /* PAGE WRAP */
    .wrap {
      max-width: 1100px;
      margin: 30px auto;
      padding: 0 20px;
    }

    /* CARD */
    .card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 25px;
      box-shadow: var(--shadow);
      margin-bottom: 25px;
      transition: 0.2s;
    }
    .card:hover {
      box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }

    h2 {
      color: var(--primary);
      margin-top: 0;
    }
    p.muted {
      color: var(--muted);
    }

    /* TABLE */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      border-bottom: 1px solid var(--border);
      padding: 12px 14px;
      text-align: left;
    }
    th {
      background: var(--secondary);
      color: var(--primary);
    }
    tr:nth-child(even) {
      background: #f3f7fb;
    }

    /* BUTTONS */
    .btn {
      background: var(--primary);
      color: white;
      border: none;
      border-radius: var(--radius);
      padding: 10px 16px;
      cursor: pointer;
      transition: 0.2s;
      display: inline-block;
      text-decoration: none;
    }
    .btn:hover {
      background: var(--secondary);
      color: var(--primary);
    }
    .btn.secondary {
      background: var(--secondary);
      color: var(--primary);
    }
    .btn.secondary:hover {
      background: var(--primary);
      color: white;
    }
    .btn.danger {
      background: #b91c1c;
    }
    .btn.danger:hover {
      background: #dc2626;
    }

    /* FORMS */
    form {
      display: grid;
      gap: 12px;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      font-size: 15px;
    }
    textarea {
      resize: vertical;
      min-height: 100px;
    }

    footer {
      text-align: center;
      margin-top: 40px;
      color: var(--muted);
      font-size: 14px;
      border-top: 1px solid var(--border);
      padding-top: 15px;
    }

    @media (max-width: 600px) {
      .nav { flex-direction: column; align-items: flex-start; }
      .nav a { margin: 6px 0; }
    }
  </style>
</head>

<body>
  <nav class="nav">
    <div><strong>CRUD Alojamiento</strong></div>
    <div>
      <a href="<?= BASE_URL ?>/">Inicio</a>
      <?php if (user()): ?>
        <a href="<?= BASE_URL ?>/cuenta.php">Mi cuenta</a>
        <a href="<?= BASE_URL ?>/reservas/mis_reservas.php">Mis reservas</a>
        <?php if (is_admin()): ?>
          <a href="<?= BASE_URL ?>/alojamientos/create.php">Nuevo alojamiento</a>
        <?php endif; ?>
        <a href="<?= BASE_URL ?>/auth/logout.php">Salir</a>
      <?php else: ?>
        <a href="<?= BASE_URL ?>/auth/login.php">Ingresar</a>
        <a href="<?= BASE_URL ?>/auth/register.php">Crear cuenta</a>
      <?php endif; ?>
    </div>
  </nav>

  <main class="wrap">



