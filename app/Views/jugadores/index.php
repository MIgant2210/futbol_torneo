<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-3">Jugadores</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <form class="d-flex" method="get" action="/jugadores">
        <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar jugador...">
        <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
    </form>
    <a href="/jugadores/crear" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Nuevo Jugador
    </a>
</div>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-primary text-center">
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Nacimiento</th>
            <th>Equipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jugadores as $j): ?>
        <tr class="text-center">
            <td>
                <button class="btn btn-outline-info btn-sm ver-foto" data-foto="/uploads/<?= $j['foto'] ?>">
                    <i class="bi bi-eye"></i> Ver Foto
                </button>
            </td>
            <td><?= esc($j['nombre']) ?></td>
            <td><?= esc($j['apellido']) ?></td>
            <td><?= date('d/m/Y', strtotime($j['fecha_nacimiento'])) ?></td>
            <td><?= esc($j['nombre_equipo']) ?></td>
            <td>
                <a href="/jugadores/editar/<?= $j['id'] ?>" class="btn btn-sm btn-warning" title="Editar">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <button class="btn btn-sm btn-danger eliminar-jugador" data-id="<?= $j['id'] ?>" title="Eliminar">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal para mostrar la foto -->
<div class="modal fade" id="fotoModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <img id="fotoGrande" src="" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Mostrar foto en modal
    document.querySelectorAll('.ver-foto').forEach(btn => {
        btn.addEventListener('click', () => {
            const foto = btn.getAttribute('data-foto');
            document.getElementById('fotoGrande').src = foto;
            new bootstrap.Modal(document.getElementById('fotoModal')).show();
        });
    });

    // Confirmación de eliminación
    document.querySelectorAll('.eliminar-jugador').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            Swal.fire({
                title: '¿Eliminar jugador?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then(result => {
                if (result.isConfirmed) {
                    window.location.href = `/jugadores/eliminar/${id}`;
                }
            });
        });
    });
});
</script>

<?= $this->endSection() ?>
