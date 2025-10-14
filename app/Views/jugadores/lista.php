<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Jugadores</h2>
<table class="table table-striped table-bordered">
    <thead class="table-primary">
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
        <tr>
            <td><img src="/uploads/<?= $j['foto'] ?>" width="60"></td>
            <td><?= $j['nombre'] ?></td>
            <td><?= $j['apellido'] ?></td>
            <td><?= $j['fecha_nacimiento'] ?></td>
            <td><?= $j['equipo_id'] ?></td>
            <td>
                <a href="/jugadores/editar/<?= $j['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="/jugadores/eliminar/<?= $j['id'] ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
