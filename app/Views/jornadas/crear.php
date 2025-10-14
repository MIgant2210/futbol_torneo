<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Registrar Jornada</h2>
<form action="/jornadas/guardar" method="post">
    <label>Nombre Jornada:</label>
    <input type="text" name="nombre_jornada"><br>
    <label>Fecha:</label>
    <input type="date" name="fecha_juego"><br>
    <button type="submit">Guardar</button>
</form>
<?= $this->endSection() ?>
