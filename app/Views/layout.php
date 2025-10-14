<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Torneo Infantil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9fafb;
      margin: 0;
      overflow-x: hidden;
    }

    /* ====== SIDEBAR ====== */
    .sidebar {
      height: 100vh;
      width: 260px;
      background: linear-gradient(180deg, #8e2de2, #ff6a00);
      background-size: 200% 200%;
      animation: gradientShift 6s ease infinite;
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 110px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.25);
      transform: translateX(0);
      transition: all 0.4s ease;
      z-index: 1000;
    }

    .sidebar.closed {
      transform: translateX(-100%);
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 22px;
      font-weight: 500;
      font-size: 15px;
      transition: all 0.3s ease;
      border-left: 3px solid transparent;
      position: relative;
      overflow: hidden;
    }

    .sidebar a::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      height: 3px;
      width: 0;
      background-color: #fff;
      transition: width 0.3s ease;
    }

    .sidebar a:hover::after {
      width: 100%;
    }

    .sidebar a:hover {
      background: rgba(255, 255, 255, 0.15);
      transform: translateX(5px);
    }

    .sidebar a i {
      font-size: 1.3rem;
      color: #fff;
    }

    /* ====== HEADER GIF ====== */
    .gif-header {
      position: absolute;
      top: 15px;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
    }

    .gif-header img {
      width: 70px;
      border-radius: 50%;
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.6);
      animation: bounce 2s infinite ease-in-out;
    }

    @keyframes bounce {
      0%, 100% { transform: translate(-50%, 0); }
      50% { transform: translate(-50%, -8px); }
    }

    .gif-header h4 {
      color: #fff;
      font-weight: 600;
      font-size: 18px;
      margin-top: 8px;
      letter-spacing: 0.5px;
      text-shadow: 0 0 6px rgba(0, 0, 0, 0.4);
    }

    /* ====== LOGOUT BUTTON ====== */
    .logout {
      text-align: center;
      margin-bottom: 25px;
    }

    .logout a {
      background: linear-gradient(90deg, #ff4b2b, #ff416c);
      padding: 10px 20px;
      border-radius: 8px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-weight: 500;
      transition: 0.3s ease;
    }

    .logout a:hover {
      transform: scale(1.05);
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
    }

    /* ====== CONTENT ====== */
    .content {
      margin-left: 260px;
      padding: 40px;
      transition: margin-left 0.4s ease;
    }

    .content.expanded {
      margin-left: 0;
    }

    /* ====== TOGGLE BUTTON ====== */
    .menu-toggle {
      position: fixed;
      top: 15px;
      left: 15px;
      background-color: #8e2de2;
      border: none;
      color: #fff;
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 1.2rem;
      cursor: pointer;
      z-index: 1100;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
      transition: 0.3s ease;
    }

    .menu-toggle:hover {
      background-color: #732dd9;
      transform: scale(1.1);
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.active {
        transform: translateX(0);
      }
      .content {
        margin-left: 0;
        padding: 20px;
      }
    }

    ::selection {
      background: #8e2de2;
      color: #fff;
    }

  </style>
</head>
<body>

  <!-- Botón toggle -->
  <button class="menu-toggle" id="menuToggle"><i class="bi bi-list"></i></button>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="gif-header">
      <img src="/assets/futbol.gif" alt="Fútbol">
      <h4>Torneo Infantil ⚽</h4>
    </div>

    <div class="menu mt-4 pt-3">
      <a href="/dashboard"><i class="bi bi-house-door-fill"></i> Dashboard</a>
      <a href="/equipos"><i class="bi bi-people-fill"></i> Equipos</a>
      <a href="/jugadores"><i class="bi bi-person-lines-fill"></i> Jugadores</a>
      <a href="/jornadas"><i class="bi bi-calendar-event-fill"></i> Jornadas</a>
      <a href="/goles/crear"><i class="bi bi-trophy-fill"></i> Goles</a>
      <a href="/incidencias/crear"><i class="bi bi-exclamation-triangle-fill"></i> Incidencias</a>
      <a href="/reportes"><i class="bi bi-file-earmark-text-fill"></i> Reportes</a>
      <a href="<?= base_url('usuarios') ?>"><i class="bi bi-person-plus-fill"></i> Usuarios</a>
    </div>

    <div class="logout">
      <a href="/salir"><i class="bi bi-box-arrow-right"></i> Salir</a>
    </div>
  </div>

  <!-- Contenido -->
  <div class="content" id="mainContent">
    <?= $this->renderSection('content') ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('mainContent');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('closed');
      content.classList.toggle('expanded');

      const icon = toggleBtn.querySelector('i');
      icon.classList.toggle('bi-list');
      icon.classList.toggle('bi-x-lg');
    });
  </script>
</body>
</html>

