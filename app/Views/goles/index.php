<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4 fw-bold text-success">
  <i class="bi bi-ball me-2"></i> Goles Registrados
</h2>

<!-- Filtro de búsqueda -->
<div class="card p-3 mb-4 border-0 shadow-sm rounded-3 bg-white">
  <div class="row g-2">
    <div class="col-md-6 d-flex">
      <input type="text" id="buscador" class="form-control me-2" placeholder="Buscar por jugador...">
      <button class="btn btn-primary px-3" id="btnBuscar">
        <i class="bi bi-search"></i>
      </button>
    </div>

    <div class="col-md-4">
      <select id="filtroJornada" class="form-select">
        <option value="">Todas las jornadas</option>
        <?php foreach ($jornadas as $j): ?>
          <option value="<?= $j['id'] ?>"><?= esc($j['nombre_jornada']) ?> (<?= esc($j['fecha_juego']) ?>)</option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col-md-2 text-end">
      <a href="/goles/crear" class="btn btn-success px-3">
        <i class="bi bi-plus-circle me-1"></i> Registrar Gol
      </a>
    </div>
  </div>
</div>

<!-- Tabla de goles -->
<div class="table-responsive shadow-sm rounded-3">
  <table class="table table-hover align-middle text-center mb-0">
    <thead class="table-success">
      <tr>
        <th>Jugador</th>
        <th>Jornada</th>
        <th>Cantidad de Goles</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="tablaGoles">
      <?= $this->include('goles/_rows', ['goles' => $goles]) ?>
    </tbody>
  </table>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Confirmación antes de eliminar
  function attachDeleteConfirm() {
    document.querySelectorAll('.eliminar-btn').forEach(btn => {
      btn.removeEventListener('click', btn._swalHandler);
      const handler = function(e) {
        e.preventDefault();
        const url = e.currentTarget.getAttribute('href');
        Swal.fire({
          title: '¿Eliminar gol?',
          text: 'Esta acción no se puede deshacer.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, eliminar',
          cancelButtonText: 'Cancelar',
          confirmButtonColor: '#d33'
        }).then(result => {
          if (result.isConfirmed) {
            window.location.href = url;
          }
        });
      };
      btn.addEventListener('click', handler);
      btn._swalHandler = handler;
    });
  }

  attachDeleteConfirm();

  // Búsqueda reactiva por jugador y filtro por jornada
  const buscador = document.getElementById('buscador');
  const filtroJornada = document.getElementById('filtroJornada');
  const tablaBody = document.getElementById('tablaGoles');

  function buscarGoles() {
      const q = buscador.value.trim();
      const jornada = filtroJornada.value;

      fetch(`/goles/buscar?query=${encodeURIComponent(q)}&jornada=${encodeURIComponent(jornada)}`)
          .then(res => res.text())
          .then(html => {
              tablaBody.innerHTML = html;
              attachDeleteConfirm();
          })
          .catch(err => console.error('Error al buscar goles:', err));
  }

  buscador.addEventListener('input', buscarGoles);
  filtroJornada.addEventListener('change', buscarGoles);

  document.getElementById('btnBuscar').addEventListener('click', e => {
      e.preventDefault();
      buscarGoles();
  });
</script>

<?= $this->endSection() ?>
