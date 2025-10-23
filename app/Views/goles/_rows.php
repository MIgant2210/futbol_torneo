<?php if (!empty($goles)): ?>
    <?php foreach ($goles as $g): ?>
        <tr>
            <td><?= esc($g['nombre']) ?> <?= esc($g['apellido']) ?></td>
            <td><?= esc($g['nombre_jornada']) ?> (<?= esc($g['fecha_juego']) ?>)</td>
            <td><?= esc($g['cantidad_goles']) ?></td>
            <td>
                <a href="/goles/editar/<?= $g['id'] ?>" class="btn btn-sm btn-warning me-1 btnEditarGol" data-id="<?= $g['id'] ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <a href="/goles/eliminar/<?= $g['id'] ?>" class="btn btn-sm btn-danger eliminar-btn">
                    <i class="bi bi-trash-fill"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="4" class="text-muted fst-italic py-3">No hay goles registrados</td>
    </tr>
<?php endif; ?>

