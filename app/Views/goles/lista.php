<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <!-- Título y botón de registrar gol -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-success">
            <i class="bi bi-ball me-2"></i> Goles Registrados
        </h3>
        <a href="/goles/crear" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Registrar Gol
        </a>
    </div>

    <!-- Buscador por jugador -->
    <div class="card p-3 shadow-sm mb-4">
        <div class="d-flex gap-2 align-items-center">
            <input type="text" id="buscarGol" class="form-control" placeholder="Buscar por jugador...">
            <button class="btn btn-primary" id="btnBuscarGol"><i class="bi bi-search"></i></button>
        </div>
    </div>

    <!-- Tabla de goles -->
    <div class="table-responsive shadow-sm">
        <table class="table table-striped align-middle text-center table-hover">
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
</div>

<!-- Modal editar gol -->
<div class="modal fade" id="modalEditarGol" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Gol</h5>
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

// Búsqueda por jugador
const buscador = document.getElementById('buscarGol');
const btnBuscar = document.getElementById('btnBuscarGol');
const tablaBody = document.getElementById('tablaGoles');

function buscarGoles() {
    const q = buscador.value.trim();
    fetch(`/goles/buscar?query=${encodeURIComponent(q)}`)
        .then(res => res.text())
        .then(html => {
            tablaBody.innerHTML = html;
            attachDeleteConfirm();  // re-aplica confirmación
            attachEditarModal();    // re-aplica botón editar
        })
        .catch(err => console.error('Error al buscar goles:', err));
}

buscador.addEventListener('input', buscarGoles);
btnBuscar.addEventListener('click', e => { e.preventDefault(); buscarGoles(); });

// Editar gol en modal
function attachEditarModal() {
    document.querySelectorAll('.btnEditarGol').forEach(btn => {
        btn.removeEventListener('click', btn._editHandler);
        const handler = function() {
            const id = this.dataset.id;
            const modalBody = document.getElementById('modalBodyEditar');
            const modal = new bootstrap.Modal(document.getElementById('modalEditarGol'));
            modal.show();
            modalBody.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div></div>';

            fetch(`/goles/editar/${id}`)
                .then(res => res.text())
                .then(html => modalBody.innerHTML = html)
                .catch(err => modalBody.innerHTML = `<div class="text-danger text-center py-5">Error al cargar gol.</div>`);
        };
        btn.addEventListener('click', handler);
        btn._editHandler = handler;
    });
}
attachEditarModal();
</script>

<?= $this->endSection() ?>
