<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-pencil-square"></i> Editar Gol</h2>

<form action="/goles/actualizar/<?= $gol['id'] ?>" method="post" class="row g-3 shadow p-4 rounded bg-white border">

    <div class="col-md-6">
        <label class="form-label fw-semibold">Jugador</label>
        <select name="jugador_id" class="form-select" required>
            <?php foreach ($jugadores as $j): ?>
                <option value="<?= $j['id'] ?>" <?= $j['id'] == $gol['jugador_id'] ? 'selected' : '' ?>>
                    <?= esc($j['nombre']) ?> <?= esc($j['apellido']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Jornada</label>
        <select name="jornada_id" class="form-select" required>
            <?php foreach ($jornadas as $j): ?>
                <option value="<?= $j['id'] ?>" <?= $j['id'] == $gol['jornada_id'] ? 'selected' : '' ?>>
                    <?= esc($j['nombre_jornada']) ?> (<?= esc($j['fecha_juego']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Cantidad de Goles</label>
        <input type="number" name="cantidad_goles" class="form-control" 
               value="<?= esc($gol['cantidad_goles']) ?>" min="0" required>
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Actualizar
        </button>
        <a href="/goles" class="btn btn-secondary">
            <i class="bi bi-x-circle"></i> Cancelar
        </a>
    </div>
</form>

<?= $this->endSection() ?>
