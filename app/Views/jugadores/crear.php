<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Registrar Nuevo Jugador</h2>

<form id="formCrear" action="/jugadores/guardar" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
        <div class="invalid-feedback">Ingrese el nombre.</div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" required>
        <div class="invalid-feedback">Ingrese el apellido.</div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha de Nacimiento</label>
        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
        <div class="invalid-feedback">Seleccione una fecha válida.</div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Equipo</label>
        <select name="equipo_id" class="form-select" required>
            <option value="">Seleccione un equipo</option>
            <?php foreach ($equipos as $e): ?>
                <option value="<?= $e['id'] ?>"><?= esc($e['nombre_equipo']) ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">Seleccione un equipo.</div>
    </div>
    <div class="col-md-12">
        <label class="form-label">Fotografía</label>
        <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
        <div class="invalid-feedback">Seleccione una imagen.</div>
        <div class="mt-2">
            <img id="preview" src="#" alt="" class="img-thumbnail" style="display:none; max-width:150px;">
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
        <a href="/jugadores" class="btn btn-secondary">Cancelar</a>
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

document.getElementById('foto').addEventListener('change', e => {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('preview').src = URL.createObjectURL(file);
        document.getElementById('preview').style.display = 'block';
    }
});

// Validación Bootstrap
(() => {
    'use strict';
    const form = document.getElementById('formCrear');
    form.addEventListener('submit', e => {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
            Swal.fire('Error', 'Por favor, complete todos los campos correctamente.', 'error');
        } else {
            Swal.fire('Éxito', 'Jugador registrado correctamente.', 'success');
        }
        form.classList.add('was-validated');
    }, false);
})();
</script>

<?= $this->endSection() ?>
