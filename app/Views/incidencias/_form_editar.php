<form id="formEditarIncidencia" method="post" action="<?= base_url('incidencias/actualizar/' . $incidencia['id']) ?>">
    <div class="mb-3">
        <label for="jugador" class="form-label">Jugador</label>
        <input type="text" class="form-control" id="jugador" name="jugador"
               value="<?= esc($incidencia['jugador']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="tipo_tarjeta" class="form-label">Tipo de Tarjeta</label>
        <select class="form-select" id="tipo_tarjeta" name="tipo_tarjeta">
            <option value="amarilla" <?= $incidencia['tipo_tarjeta'] == 'amarilla' ? 'selected' : '' ?>>Amarilla</option>
            <option value="roja" <?= $incidencia['tipo_tarjeta'] == 'roja' ? 'selected' : '' ?>>Roja</option>
        </select>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
