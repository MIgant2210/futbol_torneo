<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-shield-plus"></i> Registrar Nuevo Equipo</h2>

<form action="/equipos/guardar" method="post" enctype="multipart/form-data" class="row g-3 shadow p-4 rounded bg-white border">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nombre del Equipo</label>
        <input type="text" name="nombre_equipo" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Color Representativo</label>
        <input type="text" name="color_equipo" class="form-control" placeholder="Ej: Rojo, Azul, Verde" required>
    </div>
    <div class="col-md-12">
        <label class="form-label fw-semibold">Escudo (opcional)</label>
        <input type="file" name="escudo" class="form-control" accept="image/*">
    </div>
    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
        <a href="/equipos" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
    </div>
</form>

<?= $this->endSection() ?>

