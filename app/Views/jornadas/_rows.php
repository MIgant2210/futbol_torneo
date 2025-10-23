<?php if (!empty($jornadas)): ?>
  <?php foreach ($jornadas as $j): ?>
    <tr>
      <td class="fw-semibold text-capitalize"><?= esc($j['nombre_jornada']) ?></td>
      <td><?= esc($j['fecha_juego']) ?></td>
      <td>
        <a href="/jornadas/editar/<?= $j['id'] ?>" class="btn btn-sm btn-warning me-1">
          <i class="bi bi-pencil-square"></i>
        </a>
        <a href="/jornadas/eliminar/<?= $j['id'] ?>" class="btn btn-sm btn-danger eliminar-btn">
          <i class="bi bi-trash-fill"></i>
        </a>
      </td>
    </tr>
  <?php endforeach; ?>
<?php else: ?>
  <tr>
    <td colspan="3" class="text-muted fst-italic py-3">No hay jornadas registradas</td>
  </tr>
<?php endif; ?>

