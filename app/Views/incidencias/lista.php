<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> Incidencias Registradas
        </h3>
        <a href="/incidencias/crear" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Nueva Incidencia
        </a>
    </div>

    <!-- Buscador -->
    <div class="card p-3 shadow-sm mb-3">
        <div class="d-flex gap-2 align-items-center">
            <input type="text" id="buscarIncidencia" class="form-control" placeholder="Buscar por jugador o tipo de tarjeta...">
            <button class="btn btn-primary" id="btnBuscarIncidencia"><i class="bi bi-search"></i></button>
        </div>
    </div>

    <!-- Tabla de incidencias -->
    <div class="table-responsive shadow-sm">
        <table class="table table-striped align-middle text-center">
            <thead class="table-danger">
                <tr>
                    <th>Jugador</th>
                    <th>Tipo de Tarjeta</th>
                    <th>Descripción</th>
                    <th>Fecha de Incidencia</th>
                    <th>Fecha de Suspensión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaIncidencias">
                <?= $this->include('incidencias/_rows', ['incidencias' => $incidencias]) ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal editar incidencia -->
<!-- Modal Editar Incidencia -->
<div class="modal fade" id="modalEditarIncidencia" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Incidencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="modalBodyEditar">
        <!-- Aquí se carga el formulario vía AJAX -->
      </div>
    </div>
  </div>
</div>


<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Confirmación eliminar
function attachDeleteConfirm() {
    document.querySelectorAll('.eliminar-btn').forEach(btn => {
        btn.removeEventListener('click', btn._swalHandler);
        const handler = function(e) {
            e.preventDefault();
            const url = e.currentTarget.getAttribute('href');
            Swal.fire({
                title: '¿Eliminar incidencia?',
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

// Búsqueda reactiva
const buscador = document.getElementById('buscarIncidencia');
const btnBuscar = document.getElementById('btnBuscarIncidencia');
const tablaBody = document.getElementById('tablaIncidencias');

function buscarIncidencias() {
    const q = buscador.value.trim();
    fetch(`/incidencias/buscar?query=${encodeURIComponent(q)}`)
        .then(res => res.text())
        .then(html => {
            tablaBody.innerHTML = html;
            attachDeleteConfirm();  // re-aplica confirmación
            attachEditarModal();    // re-aplica botón editar
        })
        .catch(err => console.error('Error al buscar incidencias:', err));
}

buscador.addEventListener('input', buscarIncidencias);
btnBuscar.addEventListener('click', e => { e.preventDefault(); buscarIncidencias(); });

// Editar incidencia en modal
function attachEditarModal() {
    document.querySelectorAll('.btnEditarIncidencia').forEach(btn => {
        btn.removeEventListener('click', btn._editHandler);
        const handler = function() {
            const id = this.dataset.id;
            const modalBody = document.getElementById('modalBodyEditar');
            const modal = new bootstrap.Modal(document.getElementById('modalEditarIncidencia'));
            modal.show();
            modalBody.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div></div>';

            fetch(`/incidencias/editar/${id}`)
                .then(res => res.text())
                .then(html => modalBody.innerHTML = html)
                .catch(err => modalBody.innerHTML = `<div class="text-danger text-center py-5">Error al cargar incidencia.</div>`);
        };
        btn.addEventListener('click', handler);
        btn._editHandler = handler;
    });
}
attachEditarModal();
</script>


<?= $this->endSection() ?>
