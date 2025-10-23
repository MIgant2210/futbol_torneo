<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4 fw-bold text-primary">
  <i class="bi bi-calendar-event-fill me-2"></i> Jornadas Registradas
</h2>

<!--  Buscador -->
<div class="card p-3 mb-4 border-0 shadow-sm rounded-3 bg-white">
  <div class="row g-2 align-items-center">
    <div class="col-md-6 d-flex">
      <input type="text" id="buscador" class="form-control me-2" placeholder="Buscar por nombre...">
      <button class="btn btn-primary px-3" id="btnBuscar">
        <i class="bi bi-search"></i>
      </button>
    </div>
    <div class="col-md-4">
      <input type="date" id="filtroFecha" class="form-select">
    </div>
    <div class="col-md-2 text-end">
      <a href="/jornadas/crear" class="btn btn-success px-3">
        <i class="bi bi-plus-circle me-1"></i> Nueva Jornada
      </a>
    </div>
  </div>
</div>

<!--  Tabla -->
<div class="table-responsive shadow-sm rounded-3" style="min-height:300px;">
  <table class="table table-hover align-middle text-center mb-0">
    <thead class="table-primary">
      <tr>
        <th>Nombre de la Jornada</th>
        <th>Fecha del Juego</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="tablaJornadas">
      <?= $this->include('jornadas/_rows', ['jornadas' => $jornadas]) ?>
    </tbody>
  </table>
</div>

<!--  Script de búsqueda -->
<script>
  const buscador = document.getElementById('buscador');
  const filtroFecha = document.getElementById('filtroFecha');
  const btnBuscar = document.getElementById('btnBuscar');
  const tablaBody = document.getElementById('tablaJornadas');

  // Control para evitar respuestas fuera de orden: abortar la petición anterior
  let currentController = null;
  let debounceTimer = null;
  const DEBOUNCE_MS = 300; // ajustar si se desea más/menos sensibilidad

  function attachDeleteConfirm() {
    document.querySelectorAll('.eliminar-btn').forEach(btn => {
      btn.onclick = e => {
        e.preventDefault();
        const url = e.currentTarget.getAttribute('href');
        Swal.fire({
          title: '¿Eliminar jornada?',
          text: 'Esta acción no se puede deshacer.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, eliminar',
          cancelButtonText: 'Cancelar',
          confirmButtonColor: '#d33'
        }).then(result => {
          if (result.isConfirmed) window.location.href = url;
        });
      };
    });
  }

  function fetchJornadas(nombre, fecha) {
    // abort previous request if any
    if (currentController) currentController.abort();
    currentController = new AbortController();
    const signal = currentController.signal;

    return fetch(`/jornadas/buscar?nombre=${encodeURIComponent(nombre)}&fecha=${encodeURIComponent(fecha)}`, {
      signal,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
      .then(response => {
        if (!response.ok) throw new Error('Error en la búsqueda');
        return response.text();
      });
  }

  function buscarJornadas() {
    // debounce para reducir peticiones y evitar condiciones de carrera
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
      const nombre = buscador.value.trim();
      const fecha = filtroFecha.value.trim();

      fetchJornadas(nombre, fecha)
        .then(html => {
          tablaBody.innerHTML = html;
          attachDeleteConfirm();
        })
        .catch(error => {
          // si se abortó la petición, no es un error real
          if (error.name === 'AbortError') return;
          console.error('Error al filtrar jornadas:', error);
        });
    }, DEBOUNCE_MS);
  }

  // Eventos
  buscador.addEventListener('input', buscarJornadas);
  filtroFecha.addEventListener('change', buscarJornadas);
  btnBuscar.addEventListener('click', e => {
    e.preventDefault();
    buscarJornadas();
  });

  attachDeleteConfirm();
</script>

<!--  Estilos -->
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

  /* Fija la altura del contenedor para que la vista no se mueva */
  .table-responsive {
    min-height: 300px;
  }
</style>

<?= $this->endSection() ?>