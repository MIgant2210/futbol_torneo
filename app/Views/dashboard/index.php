<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid dashboard-container">
  <!-- Header mejorado -->
  <div class="row mb-5">
    <div class="col-md-12">
      <div class="dashboard-header p-4 rounded-4 bg-white shadow-sm">
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="dashboard-avatar bg-primary rounded-circle d-flex align-items-center justify-content-center me-3">
              <i class="bi bi-person-fill text-white fs-4"></i>
            </div>
            <div>
              <h2 class="fw-bold text-dark mb-1">Bienvenido, <?= session()->get('usuario_nombre') ?></h2>
              <p class="text-muted mb-0">Panel de control del sistema de fútbol</p>
            </div>
          </div>
          <a href="/salir" class="btn btn-danger px-4 py-2 rounded-3 d-flex align-items-center">
            <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Tarjetas estadísticas mejoradas -->
  <div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
      <div class="card stats-card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="card-subtitle text-muted">Jugadores</h6>
              <h3 class="fw-bold mt-2 text-primary"><?= $totalJugadores ?></h3>
            </div>
            <div class="stats-icon bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-person-fill text-primary fs-4"></i>
            </div>
          </div>
          <div class="mt-3">
            <span class="badge bg-primary bg-opacity-10 text-primary">Total registrados</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card stats-card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="card-subtitle text-muted">Equipos</h6>
              <h3 class="fw-bold mt-2 text-success"><?= $totalEquipos ?></h3>
            </div>
            <div class="stats-icon bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people-fill text-success fs-4"></i>
            </div>
          </div>
          <div class="mt-3">
            <span class="badge bg-success bg-opacity-10 text-success">En competencia</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card stats-card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="card-subtitle text-muted">Incidencias</h6>
              <h3 class="fw-bold mt-2 text-warning"><?= $totalIncidencias ?></h3>
            </div>
            <div class="stats-icon bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-exclamation-triangle-fill text-warning fs-4"></i>
            </div>
          </div>
          <div class="mt-3">
            <span class="badge bg-warning bg-opacity-10 text-warning">Por resolver</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card stats-card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="card-subtitle text-muted">Próxima Jornada</h6>
              <h3 class="fw-bold mt-2 text-info"><?= $proximaJornada ?? 'No definida' ?></h3>
            </div>
            <div class="stats-icon bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-calendar-event-fill text-info fs-4"></i>
            </div>
          </div>
          <div class="mt-3">
            <span class="badge bg-info bg-opacity-10 text-info">Próximo evento</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Acciones rápidas mejoradas -->
  <div class="row mb-5">
    <div class="col-md-12">
      <h4 class="fw-bold mb-4 text-dark">Acciones Rápidas</h4>
      <div class="row g-3">
        <div class="col-xl-3 col-md-6">
          <a href="/jugadores" class="action-card card border-0 shadow-sm rounded-4 text-decoration-none">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="action-icon bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3">
                  <i class="bi bi-person-lines-fill fs-5"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Ver Jugadores</h5>
                  <p class="text-muted mb-0">Gestionar lista de jugadores</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-md-6">
          <a href="/equipos" class="action-card card border-0 shadow-sm rounded-4 text-decoration-none">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="action-icon bg-success text-white rounded-3 d-flex align-items-center justify-content-center me-3">
                  <i class="bi bi-people-fill fs-5"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Ver Equipos</h5>
                  <p class="text-muted mb-0">Administrar equipos</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-md-6">
          <a href="/goles/crear" class="action-card card border-0 shadow-sm rounded-4 text-decoration-none">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="action-icon bg-warning text-white rounded-3 d-flex align-items-center justify-content-center me-3">
                  <i class="bi bi-award-fill fs-5"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Registrar Gol</h5>
                  <p class="text-muted mb-0">Añadir nuevo gol</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-md-6">
          <a href="/reportes" class="action-card card border-0 shadow-sm rounded-4 text-decoration-none">
            <div class="card-body p-4">
              <div class="d-flex align-items-center">
                <div class="action-icon bg-info text-white rounded-3 d-flex align-items-center justify-content-center me-3">
                  <i class="bi bi-file-earmark-text-fill fs-5"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-dark mb-1">Ver Reportes</h5>
                  <p class="text-muted mb-0">Consultar estadísticas</p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Sección GIF decorativo mejorada -->
  <div class="row">
    <div class="col-md-12">
      <div class="gif-section card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
          <div class="d-flex align-items-center justify-content-between p-4 bg-light border-bottom">
            <h5 class="fw-bold mb-0 text-dark">Fútbol en Acción</h5>
            <span class="badge bg-primary">En vivo</span>
          </div>
          <div class="text-center p-4">
            <img src="/assets/futbol-animacion.gif" alt="Animación de fútbol" class="img-fluid rounded-3 shadow-sm" style="max-height: 220px;">
            <p class="text-muted mt-3 mb-0">Sistema de gestión de equipos y jugadores de fútbol</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Estilos mejorados -->
<style>
  :root {
    --primary-color: #4361ee;
    --success-color: #06d6a0;
    --warning-color: #ffd166;
    --info-color: #118ab2;
    --dark-color: #2b2d42;
  }
  
  body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  .dashboard-container {
    max-width: 1400px;
    margin: 0 auto;
  }
  
  .dashboard-header {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-left: 4px solid var(--primary-color);
  }
  
  .dashboard-avatar {
    width: 60px;
    height: 60px;
  }
  
  .stats-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: white;
  }
  
  .stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
  }
  
  .stats-icon {
    width: 50px;
    height: 50px;
  }
  
  .action-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: white;
  }
  
  .action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
  }
  
  .action-icon {
    width: 50px;
    height: 50px;
  }
  
  .gif-section {
    background: white;
  }
  
  .btn-danger {
    background: linear-gradient(135deg, #e63946, #d00000);
    border: none;
    transition: all 0.3s ease;
  }
  
  .btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(230, 57, 70, 0.3);
  }
  
  .text-primary {
    color: var(--primary-color) !important;
  }
  
  .text-success {
    color: var(--success-color) !important;
  }
  
  .text-warning {
    color: #e9b949 !important;
  }
  
  .text-info {
    color: var(--info-color) !important;
  }
  
  .bg-primary {
    background-color: var(--primary-color) !important;
  }
  
  .bg-success {
    background-color: var(--success-color) !important;
  }
  
  .bg-warning {
    background-color: var(--warning-color) !important;
  }
  
  .bg-info {
    background-color: var(--info-color) !important;
  }
</style>

<?= $this->endSection() ?>
