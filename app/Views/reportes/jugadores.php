<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Lista de Jugadores</h2>
<?php foreach ($jugadores as $j): ?>
    <div>
        <img src="/uploads/<?= $j['foto'] ?>" width="80">
        <p><?= $j['nombre'] ?> <?= $j['apellido'] ?></p>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>
