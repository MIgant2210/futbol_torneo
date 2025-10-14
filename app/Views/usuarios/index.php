<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
  .usuarios-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 25px 30px;
    border-radius: 12px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
  }

  .usuarios-header h2 {
    margin: 0;
    font-weight: 600;
    font-size: 1.6rem;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .usuarios-header h2 i {
    font-size: 1.8rem;
  }

  .btn-nuevo {
    background: linear-gradient(45deg, #6a11cb, #ff7e5f);
    border: none;
    color: white;
    padding: 12px 25px;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(106, 17, 203, 0.3);
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .btn-nuevo:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(106, 17, 203, 0.5);
    color: white;
  }

  .tabla-usuarios {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  }

  .tabla-usuarios table {
    margin: 0;
  }

  .tabla-usuarios thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
  }

  .tabla-usuarios thead th {
    padding: 18px 15px;
    font-weight: 600;
    border: none;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
  }

  .tabla-usuarios tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
  }

  .tabla-usuarios tbody tr:hover {
    background-color: #f8f9ff;
    transform: scale(1.01);
  }

  .tabla-usuarios tbody td {
    padding: 15px;
    vertical-align: middle;
  }

  .badge-id {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85rem;
  }

  .btn-accion {
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin: 0 3px;
  }

  .btn-ver {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
  }

  .btn-ver:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    color: white;
  }

  .btn-editar {
    background: linear-gradient(45deg, #f093fb, #f5576c);
    color: white;
  }

  .btn-editar:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(240, 147, 251, 0.4);
    color: white;
  }

  .btn-eliminar {
    background: linear-gradient(45deg, #fa709a, #fee140);
    color: white;
  }

  .btn-eliminar:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(250, 112, 154, 0.4);
    color: white;
  }

  .sin-usuarios {
    text-align: center;
    padding: 60px 20px;
    color: #999;
  }

  .sin-usuarios i {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
  }

  .sin-usuarios h4 {
    color: #666;
    margin-bottom: 10px;
  }

  .alert-custom {
    border-radius: 12px;
    padding: 15px 20px;
    margin-bottom: 25px;
    border: none;
    display: flex;
    align-items: center;
    gap: 12px;
    animation: slideInDown 0.5s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  @keyframes slideInDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .alert-custom i {
    font-size: 1.5rem;
  }

  .alert-success-custom {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    color: #155724;
    border-left: 4px solid #28a745;
  }

  .alert-error-custom {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
    border-left: 4px solid #dc3545;
  }

  .stats-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 25px;
  }

  .stats-card h5 {
    color: #667eea;
    font-weight: 600;
    margin-bottom: 10px;
  }

  .stats-number {
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  @media (max-width: 768px) {
    .tabla-usuarios {
      overflow-x: auto;
    }

    .btn-accion {
      padding: 6px 10px;
      font-size: 0.75rem;
      margin: 2px;
    }

    .usuarios-header {
      padding: 20px;
    }

    .usuarios-header h2 {
      font-size: 1.5rem;
    }
  }
</style>

<div class="container-fluid">
  <!-- Header -->
  <div class="usuarios-header">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
      <h2>
        <i class="bi bi-people-fill"></i>
        Gestión de Usuarios
      </h2>
      <a href="<?= base_url('registro') ?>" class="btn-nuevo">
        <i class="bi bi-person-plus-fill"></i>
        Nuevo Usuario
      </a>
    </div>
  </div>

  <!-- Estadísticas -->
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="stats-card">
        <h5><i class="bi bi-people"></i> Total de Usuarios</h5>
        <div class="stats-number"><?= count($usuarios) ?></div>
      </div>
    </div>
  </div>

  <!-- Alertas -->
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert-custom alert-success-custom">
      <i class="bi bi-check-circle-fill"></i>
      <div>
        <strong>¡Éxito!</strong><br>
        <?= session()->getFlashdata('success') ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert-custom alert-error-custom">
      <i class="bi bi-exclamation-triangle-fill"></i>
      <div>
        <strong>Error</strong><br>
        <?php 
          $error = session()->getFlashdata('error');
          if (is_array($error)) {
            foreach ($error as $e) {
              echo '• ' . $e . '<br>';
            }
          } else {
            echo $error;
          }
        ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- Tabla de usuarios -->
  <div class="tabla-usuarios">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th style="width: 80px;">ID</th>
          <th>Nombre Completo</th>
          <th>Correo Electrónico</th>
          <th>Usuario</th>
          <th style="width: 250px;" class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($usuarios)): ?>
          <?php foreach ($usuarios as $u): ?>
            <tr>
              <td>
                <span class="badge-id">#<?= $u['id'] ?></span>
              </td>
              <td>
                <strong><?= esc($u['nombre']) ?></strong>
              </td>
              <td>
                <i class="bi bi-envelope"></i> <?= esc($u['correo']) ?>
              </td>
              <td>
                <i class="bi bi-person-circle"></i> <?= esc($u['usuario']) ?>
              </td>
              <td class="text-center">
                <a href="<?= base_url('usuarios/ver/' . $u['id']) ?>" class="btn-accion btn-ver" title="Ver detalles">
                  <i class="bi bi-eye-fill"></i> Ver
                </a>
                <a href="<?= base_url('usuarios/editar/' . $u['id']) ?>" class="btn-accion btn-editar" title="Editar usuario">
                  <i class="bi bi-pencil-square"></i> Editar
                </a>
                <a href="<?= base_url('usuarios/eliminar/' . $u['id']) ?>" 
                   class="btn-accion btn-eliminar" 
                   onclick="return confirm('⚠️ ¿Estás seguro de eliminar este usuario?\\n\\nEsta acción no se puede deshacer.')"
                   title="Eliminar usuario">
                  <i class="bi bi-trash-fill"></i> Eliminar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5">
              <div class="sin-usuarios">
                <i class="bi bi-inbox"></i>
                <h4>No hay usuarios registrados</h4>
                <p>Comienza agregando tu primer usuario haciendo clic en el botón "Nuevo Usuario"</p>
              </div>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>