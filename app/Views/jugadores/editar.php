<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Editar Jugador</h2>

<form id="formEditar" action="/jugadores/actualizar/<?= $jugador['id'] ?>" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
    <div class="col-md-6">
        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre" value="<?= esc($jugador['nombre']) ?>" class="form-control" required>
        <div class="invalid-feedback">Ingrese el nombre.</div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Apellido:</label>
        <input type="text" name="apellido" value="<?= esc($jugador['apellido']) ?>" class="form-control" required>
        <div class="invalid-feedback">Ingrese el apellido.</div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha de Nacimiento:</label>
        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= date('d/m/Y', strtotime($jugador['fecha_nacimiento'])) ?>" class="form-control" required>
        <div class="invalid-feedback">Seleccione una fecha válida.</div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Equipo:</label>
        <select name="equipo_id" class="form-select" required>
            <?php foreach ($equipos as $e): ?>
                <option value="<?= $e['id'] ?>" <?= $e['id'] == $jugador['equipo_id'] ? 'selected' : '' ?>>
                    <?= esc($e['nombre_equipo']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">Seleccione un equipo.</div>
    </div>
    <div class="col-md-12">
        <label class="form-label">Fotografía actual:</label><br>
        <img src="/uploads/<?= esc($jugador['foto']) ?>" class="img-thumbnail mb-2" style="max-width:150px;">
        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
        <div class="mt-2">
            <img id="preview" src="#" alt="" class="img-thumbnail" style="display:none; max-width:150px;">
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar</button>
        <a href="/jugadores" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
    </div>
</form>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
flatpickr("#fecha_nacimiento", {
    locale: "es",
    dateFormat: "d/m/Y",
    altInput: true,
    altFormat: "d/m/Y",
    allowInput: true
});

// Preview de nueva foto
document.getElementById('foto').addEventListener('change', e => {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('preview').src = URL.createObjectURL(file);
        document.getElementById('preview').style.display = 'block';
    }
});

// Validación y alertas
(() => {
    'use strict';
    const form = document.getElementById('formEditar');
    form.addEventListener('submit', e => {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
            Swal.fire('Error', 'Por favor, complete los campos correctamente.', 'error');
        } else {
            Swal.fire('Actualizado', 'Los datos del jugador se actualizaron correctamente.', 'success');
        }
        form.classList.add('was-validated');
    }, false);
})();
</script>

<?= $this->endSection() ?>
