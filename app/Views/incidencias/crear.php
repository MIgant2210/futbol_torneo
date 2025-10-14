<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Registrar Incidencia</h2>
<form action="/incidencias/guardar" method="post">
    <label>Jugador:</label>
    <select name="jugador_id">
        <?php foreach ($jugadores as $j): ?>
            <option value="<?= $j['id'] ?>"><?= $j['nombre'] ?> <?= $j['apellido'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Descripción:</label>
    <textarea name="descripcion"></textarea><br>

    <label>Tipo de tarjeta:</label>
    <select name="tipo_tarjeta">
        <option value="amarilla">Amarilla</option>
        <option value="roja">Roja</option>
    </select><br>

    <label>Fecha de incidencia:</label>
    <input type="date" name="fecha_incidencia"><br>

    <label>Fecha de suspensión (solo si es roja):</label>
    <input type="date" name="fecha_suspension"><br>

    <button type="submit">Guardar</button>
</form>
<?= $this->endSection() ?>
