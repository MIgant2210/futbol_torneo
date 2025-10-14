<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Lista de Jornadas</h2>
<ul>
    <?php foreach ($jornadas as $jornada): ?>
        <li><?= $jornada['nombre_jornada'] ?> - <?= $jornada['fecha_juego'] ?></li>
    <?php endforeach; ?>
</ul>
<?= $this->endSection() ?>
