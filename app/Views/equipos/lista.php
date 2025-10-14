<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Lista de Equipos</h2>
<ul>
    <?php foreach ($equipos as $equipo): ?>
        <li><?= $equipo['nombre_equipo'] ?></li>
    <?php endforeach; ?>
</ul>
<?= $this->endSection() ?>
