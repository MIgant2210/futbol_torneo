<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-pencil-square"></i> Editar Incidencia</h2>

<form action="/incidencias/actualizar/<?= $incidencia['id'] ?>" method="post" class="row g-3 shadow p-4 rounded bg-white border">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Jugador</label>
        <select name="jugador_id" class="form-select" required>
            <?php foreach($jugadores as $j): ?>
                <option value="<?= esc($j['id']) ?>" <?= $j['id'] == $incidencia['jugador_id'] ? 'selected' : '' ?>>
                    <?= esc($j['nombre'].' '.$j['apellido']) ?>

                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Tipo de Tarjeta</label>
        <select name="tipo_tarjeta" id="tipo_tarjeta" class="form-select" required>
            <option value="amarilla" <?= $incidencia['tipo_tarjeta'] === 'amarilla' ? 'selected' : '' ?>>Amarilla</option>
            <option value="roja" <?= $incidencia['tipo_tarjeta'] === 'roja' ? 'selected' : '' ?>>Roja</option>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" required><?= esc($incidencia['descripcion']) ?></textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Fecha de Incidencia</label>
        <input type="date" name="fecha_incidencia" class="form-control" value="<?= esc($incidencia['fecha_incidencia']) ?>" required>
    </div>

    <div class="col-md-6" id="fechaSuspensionDiv" style="display:<?= $incidencia['tipo_tarjeta'] === 'roja' ? 'block' : 'none' ?>;">
        <label class="form-label fw-semibold">Fecha de Suspensión (si es roja)</label>
        <input type="date" name="fecha_suspension" class="form-control" value="<?= esc($incidencia['fecha_suspension']) ?>">
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Actualizar</button>
        <a href="/incidencias/lista" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
    </div>
</form>

<script>
document.getElementById('tipo_tarjeta').addEventListener('change', function() {
    const div = document.getElementById('fechaSuspensionDiv');
    div.style.display = this.value === 'roja' ? 'block' : 'none';
});
</script>

<?= $this->endSection() ?>
