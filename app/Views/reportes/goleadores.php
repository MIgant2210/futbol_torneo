<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Goleadores</h2>
<?php foreach ($goleadores as $g): ?>
    <div>
        <img src="/uploads/<?= $g['foto'] ?>" width="80">
        <p><?= $g['nombre'] ?> <?= $g['apellido'] ?> - <?= $g['nombre_equipo'] ?> (<?= $g['total_goles'] ?> goles)</p>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>
