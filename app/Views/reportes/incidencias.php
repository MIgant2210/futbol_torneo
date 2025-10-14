<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Incidencias</h2>
<?php foreach ($incidencias as $i): ?>
    <div>
        <p>Jugador ID: <?= $i['jugador_id'] ?></p>
        <p>Tarjeta: <?= $i['tipo_tarjeta'] ?></p>
        <p>Descripción: <?= $i['descripcion'] ?></p>
        <p>Fecha: <?= $i['fecha_incidencia'] ?></p>
        <?php if ($i['tipo_tarjeta'] === 'roja'): ?>
            <p>Suspensión hasta: <?= $i['fecha_suspension'] ?></p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>
