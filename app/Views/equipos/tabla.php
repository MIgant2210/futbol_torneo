<?php foreach ($equipos as $e): ?>
  <?php 
    $color = esc($e['color_equipo']);
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $color)) $color = '#CCCCCC';
    $r = hexdec(substr($color, 1, 2));
    $g = hexdec(substr($color, 3, 2));
    $b = hexdec(substr($color, 5, 2));
    $luminancia = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
    $colorTexto = $luminancia > 0.5 ? '#000' : '#fff';
  ?>
  <tr>
    <td class="fw-semibold text-capitalize"><?= esc($e['nombre_equipo']) ?></td>
    <td>
      <span class="badge fs-6 px-3 py-2 shadow-sm"
        style="background-color: <?= $color ?>; color: <?= $colorTexto ?>; border-radius: 0.5rem;">
        <?= esc($e['color_equipo']) ?>
      </span>
    </td>
    <td>
      <?php if ($e['escudo']): ?>
        <button class="btn btn-sm btn-outline-info ver-escudo" 
                data-imagen="/uploads/<?= esc($e['escudo']) ?>">
          <i class="bi bi-eye"></i> Ver
        </button>
      <?php else: ?>
        <span class="text-muted fst-italic">Sin escudo</span>
      <?php endif; ?>
    </td>
    <td>
      <a href="/equipos/editar/<?= $e['id'] ?>" class="btn btn-sm btn-warning me-1">
        <i class="bi bi-pencil-square"></i>
      </a>
      <a href="/equipos/eliminar/<?= $e['id'] ?>" class="btn btn-sm btn-danger eliminar-btn">
        <i class="bi bi-trash-fill"></i>
      </a>
    </td>
  </tr>
<?php endforeach; ?>
