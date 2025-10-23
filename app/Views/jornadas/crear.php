<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-calendar-plus"></i> Registrar Nueva Jornada</h2>

<form action="/jornadas/guardar" method="post" class="row g-3 shadow p-4 rounded bg-white border">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nombre de la Jornada</label>
        <input type="text" name="nombre_jornada" class="form-control" placeholder="Ej: Jornada 1" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Fecha del Juego</label>
        <input type="date" name="fecha_juego" class="form-control" required>
    </div>
    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
        <a href="/jornadas" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
    </div>
</form>

<?= $this->endSection() ?>

