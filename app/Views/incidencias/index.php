<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> Incidencias
        </h3>
        <a href="/incidencias/crear" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Nueva Incidencia
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <?php if (!empty($incidencias)): ?>
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Jugador</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Suspensión</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($incidencias as $i): ?>
                            <tr>
                                <td><?= esc($i['id']) ?></td>
                                <td><?= esc($i['jugador_nombre'] . ' ' . $i['jugador_apellido']) ?></td>
                                <td><?= esc($i['descripcion']) ?></td>
                                <td>
                                    <?php if ($i['tipo_tarjeta'] === 'roja'): ?>
                                        <span class="badge bg-danger">Roja</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Amarilla</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($i['fecha_incidencia']) ?></td>
                                <td><?= esc($i['fecha_suspension'] ?: '-') ?></td>
                                <td>
                                    <a href="/incidencias/editar/<?= $i['id'] ?>" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="/incidencias/eliminar/<?= $i['id'] ?>" class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('¿Seguro que deseas eliminar esta incidencia?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info text-center">
                    <i class="bi bi-info-circle me-2"></i> No hay incidencias registradas.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
