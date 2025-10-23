<?php if (!empty($incidencias)): ?>
    <?php foreach ($incidencias as $i): ?>
        <tr>
            <td class="fw-semibold text-capitalize"><?= esc($i['nombre_jugador'] . ' ' . $i['apellido_jugador']) ?></td>
            <td>
                <?php if ($i['tipo_tarjeta'] === 'roja'): ?>
                    <span class="badge bg-danger">Roja</span>
                <?php else: ?>
                    <span class="badge bg-warning text-dark">Amarilla</span>
                <?php endif; ?>
            </td>
            <td><?= esc($i['descripcion']) ?></td>
            <td><?= esc($i['fecha_incidencia']) ?></td>
            <td><?= esc($i['fecha_suspension'] ?: '-') ?></td>
            <td>
                <!-- Botón Editar modal -->
                <a href="#" 
                class="btn btn-sm btn-warning btnEditarIncidencia me-1" 
                data-id="<?= $i['id'] ?>">
                <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Botón eliminar -->
                <a href="/incidencias/eliminar/<?= $i['id'] ?>" 
                   class="btn btn-sm btn-danger eliminar-btn">
                    <i class="bi bi-trash-fill"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6" class="text-muted fst-italic py-3 text-center">No hay incidencias registradas</td>
    </tr>
<?php endif; ?>
