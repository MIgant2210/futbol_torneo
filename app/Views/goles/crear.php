<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-ball"></i> Registrar Goles</h2>

<form action="/goles/guardar" method="post" class="row g-3 shadow p-4 rounded bg-white border">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Jugador</label>
        <select name="jugador_id" class="form-select" required>
            <option value="" selected disabled>Selecciona un jugador</option>
            <?php foreach ($jugadores as $j): ?>
                <option value="<?= $j['id'] ?>"><?= $j['nombre'] ?> <?= $j['apellido'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Jornada</label>
        <select name="jornada_id" class="form-select" required>
            <option value="" selected disabled>Selecciona una jornada</option>
            <?php foreach ($jornadas as $j): ?>
                <option value="<?= $j['id'] ?>"><?= $j['nombre_jornada'] ?> (<?= $j['fecha_juego'] ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Cantidad de Goles</label>
        <input type="number" name="cantidad_goles" class="form-control" min="0" placeholder="Ej: 2" required>
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
        <a href="/goles" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
    </div>
</form>

<?= $this->endSection() ?>
