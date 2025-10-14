<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4 fw-bold text-primary">
  <i class="bi bi-people-fill me-2"></i> Equipos Registrados
</h2>

<!-- Filtro de búsqueda -->
<div class="card p-3 mb-4 border-0 shadow-sm rounded-3 bg-white">
  <div class="row g-2">
    <div class="col-md-6 d-flex">
      <input type="text" id="buscador" class="form-control me-2" placeholder="Buscar por nombre...">
      <button class="btn btn-primary px-3" id="btnBuscar">
        <i class="bi bi-search"></i>
      </button>
    </div>
    <div class="col-md-4">
      <select id="filtroColor" class="form-select">
        <option value="">Filtrar por color</option>
        <?php foreach ($coloresUnicos as $color): ?>
          <option value="<?= esc($color) ?>"><?= esc($color) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-2 text-end">
      <a href="/equipos/crear" class="btn btn-success px-3">
        <i class="bi bi-plus-circle me-1"></i> Nuevo Equipo
      </a>
    </div>
  </div>
</div>

<!-- Tabla de equipos -->
<div class="table-responsive shadow-sm rounded-3">
  <table class="table table-hover align-middle text-center mb-0">
    <thead class="table-primary">
      <tr>
        <th>Nombre del Equipo</th>
        <th>Color Representativo</th>
        <th>Escudo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="tablaEquipos">
      <?php foreach ($equipos as $e): ?>
        <?php 
          $color = esc($e['color_equipo']);
          if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $color)) $color = '#CCCCCC';
          $r = hexdec(substr($color, 1, 2));
          $g = hexdec(substr($color, 3, 2));
          $b = hexdec(substr($color, 5, 2));
          $luminancia = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
          $colorTexto = $luminancia > 0.5 ? '#000' : '#fff';
        ?>
        <tr>
          <td class="fw-semibold text-capitalize"><?= esc($e['nombre_equipo']) ?></td>
          <td>
            <span class="badge fs-6 px-3 py-2 shadow-sm"
              style="background-color: <?= $color ?>; color: <?= $colorTexto ?>; border-radius: 0.5rem;">
              <?= esc($e['color_equipo']) ?>
            </span>
          </td>
          <td>
            <?php if ($e['escudo']): ?>
              <button class="btn btn-sm btn-outline-info ver-escudo" 
                      data-imagen="/uploads/<?= esc($e['escudo']) ?>">
                <i class="bi bi-eye"></i> Ver
              </button>
            <?php else: ?>
              <span class="text-muted fst-italic">Sin escudo</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="/equipos/editar/<?= $e['id'] ?>" class="btn btn-sm btn-warning me-1">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="/equipos/eliminar/<?= $e['id'] ?>" class="btn btn-sm btn-danger eliminar-btn">
              <i class="bi bi-trash-fill"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal para ver escudo -->
<div class="modal fade" id="modalEscudo" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="bi bi-shield-fill me-2"></i> Escudo del Equipo</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center bg-light">
        <img id="imgEscudo" src="" alt="Escudo" class="img-fluid rounded shadow-sm">
      </div>
    </div>
  </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Mostrar alertas de éxito/error
  <?php if (session()->getFlashdata('mensaje')): ?>
  Swal.fire({
    icon: '<?= session()->getFlashdata('tipo') ?>',
    title: '<?= session()->getFlashdata('mensaje') ?>',
    showConfirmButton: false,
    timer: 2000
  });
  <?php endif; ?>

  // Confirmación antes de eliminar
  document.querySelectorAll('.eliminar-btn').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      const url = e.currentTarget.getAttribute('href');
      Swal.fire({
        title: '¿Eliminar equipo?',
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#d33'
      }).then(result => {
        if (result.isConfirmed) window.location.href = url;
      });
    });
  });

  // Ver escudo en modal
  document.querySelectorAll('.ver-escudo').forEach(btn => {
    btn.addEventListener('click', () => {
      const img = btn.getAttribute('data-imagen');
      document.getElementById('imgEscudo').src = img;
      new bootstrap.Modal(document.getElementById('modalEscudo')).show();
    });
  });

  // Búsqueda reactiva por nombre y color
  const buscador = document.getElementById('buscador');
  const btnBuscar = document.getElementById('btnBuscar');
  const filtroColor = document.getElementById('filtroColor');
  const tablaBody = document.getElementById('tablaEquipos');

  function buscarEquipos() {
    const nombre = buscador.value.trim();
    const color = filtroColor.value;
    fetch(`/equipos/buscar?nombre=${encodeURIComponent(nombre)}&color=${encodeURIComponent(color)}`)
      .then(res => res.text())
      .then(html => {
        tablaBody.innerHTML = html;
      });
  }

  buscador.addEventListener('input', buscarEquipos);
  filtroColor.addEventListener('change', buscarEquipos);
  btnBuscar.addEventListener('click', e => {
    e.preventDefault();
    buscarEquipos();
  });
</script>

<!-- Estilos visuales -->
<style>
  .table-hover tbody tr:hover {
    background-color: #f3f7ff !important;
    transition: all 0.2s ease;
  }

  .form-control:focus {
    box-shadow: 0 0 4px rgba(13, 110, 253, 0.4);
  }

  .btn {
    transition: all 0.2s ease;
  }

  .btn:hover {
    transform: translateY(-2px);
  }

  .badge {
    font-weight: 600;
  }
</style>

<?= $this->endSection() ?>
