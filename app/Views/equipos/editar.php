<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4"><i class="bi bi-pencil-square"></i> Editar Equipo</h2>

<form action="/equipos/actualizar/<?= $equipo['id'] ?>" method="post" enctype="multipart/form-data" class="row g-3 shadow p-4 rounded bg-white border">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nombre del Equipo</label>
        <input type="text" name="nombre_equipo" class="form-control" value="<?= esc($equipo['nombre_equipo']) ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Color Representativo</label>
        <input type="text" name="color_equipo" class="form-control" value="<?= esc($equipo['color_equipo']) ?>" required>
    </div>
    <div class="col-md-12">
        <label class="form-label fw-semibold">Escudo (subir para reemplazar)</label>
        <input type="file" name="escudo" class="form-control" accept="image/*">
        <?php if (!empty($equipo['escudo'])): ?>
            <div class="mt-2">
                <img src="/uploads/<?= esc($equipo['escudo']) ?>" alt="Escudo actual" width="120" class="rounded shadow-sm">
            </div>
        <?php endif; ?>
    </div>
    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
        <a href="/equipos" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
    </div>
</form>

<?= $this->endSection() ?>
