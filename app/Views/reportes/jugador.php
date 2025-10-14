<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Información del Jugador</h2>
<img src="/uploads/<?= $jugador['foto'] ?>" width="100">
<p>Nombre: <?= $jugador['nombre'] ?> <?= $jugador['apellido'] ?></p>
<p>Fecha de nacimiento: <?= $jugador['fecha_nacimiento'] ?></p>
<p>Equipo ID: <?= $jugador['equipo_id'] ?></p>
<?= $this->endSection() ?>
