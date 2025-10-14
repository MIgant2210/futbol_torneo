<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Registrar Goles</h2>
<form action="/goles/guardar" method="post">
    <label>Jugador:</label>
    <select name="jugador_id">
        <?php foreach ($jugadores as $j): ?>
            <option value="<?= $j['id'] ?>"><?= $j['nombre'] ?> <?= $j['apellido'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Jornada:</label>
    <select name="jornada_id">
        <?php foreach ($jornadas as $j): ?>
            <option value="<?= $j['id'] ?>"><?= $j['nombre_jornada'] ?> (<?= $j['fecha_juego'] ?>)</option>
        <?php endforeach; ?>
    </select><br>

    <label>Goles:</label>
    <input type="number" name="cantidad_goles"><br>
    <button type="submit">Guardar</button>
</form>
<?= $this->endSection() ?>
