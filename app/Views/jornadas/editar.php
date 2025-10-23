<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-calendar-check"></i> Editar Jornada</h2>

<form action="/jornadas/actualizar/<?= $jornada['id'] ?>" method="post" class="row g-3 shadow p-4 rounded bg-white border">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nombre de la Jornada</label>
        <input type="text" name="nombre_jornada" class="form-control" 
               value="<?= esc($jornada['nombre_jornada']) ?>" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Fecha del Juego</label>
        <input type="date" name="fecha_juego" class="form-control" 
               value="<?= esc($jornada['fecha_juego']) ?>" required>
    </div>

    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Actualizar
        </button>
        <a href="/jornadas" class="btn btn-secondary">
            <i class="bi bi-x-circle"></i> Cancelar
        </a>
    </div>
</form>

<?= $this->endSection() ?>
