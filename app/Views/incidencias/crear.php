<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-exclamation-triangle"></i> Registrar Incidencia</h2>

<form action="/incidencias/guardar" method="post" class="row g-3 shadow p-4 rounded bg-white border">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Jugador</label>
        <select name="jugador_id" class="form-select" required>
            <?php foreach ($jugadores as $j): ?>
                <option value="<?= $j['id'] ?>"><?= $j['nombre'] ?> <?= $j['apellido'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Tipo de tarjeta</label>
        <select name="tipo_tarjeta" class="form-select" required>
            <option value="amarilla">Amarilla</option>
            <option value="roja">Roja</option>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" placeholder="Describe la incidencia..." required></textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Fecha de incidencia</label>
        <input type="date" name="fecha_incidencia" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Fecha de suspensión (solo si es roja)</label>
        <input type="date" name="fecha_suspension" class="form-control">
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
        <a href="/incidencias" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
    </div>
</form>

<?= $this->endSection() ?>
