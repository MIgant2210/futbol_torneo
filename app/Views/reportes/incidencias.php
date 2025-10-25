<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Registro de Incidencias</h2>
        <button type="button" class="btn btn-success" onclick="exportToPDF()">
            <i class="fas fa-file-pdf"></i> Exportar a PDF
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover" id="tablaIncidencias">
            <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Jugador</th>
                    <th>Equipo</th>
                    <th>Tarjeta</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($incidencias as $i): 
                    $foto = !empty($i['foto']) ? base_url('uploads/' . $i['foto']) : base_url('assets/img/default-player.svg');
                ?>
                <tr>
                    <td class="align-middle">
                        <?= date('d/m/Y', strtotime($i['fecha_incidencia'])) ?>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <img src="<?= esc($foto) ?>" alt="<?= esc($i['nombre'].' '.$i['apellido']) ?>" 
                                 class="rounded me-2" style="width:40px; height:40px; object-fit:cover;">
                            <div>
                                <strong><?= esc($i['nombre']) ?> <?= esc($i['apellido']) ?></strong>
                                <a href="<?= site_url('reportes/jugador/' . $i['jugador_id']) ?>" class="btn btn-link btn-sm p-0 d-block">Ver perfil</a>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle"><?= esc($i['nombre_equipo'] ?? 'Sin equipo') ?></td>
                    <td class="align-middle">
                        <span class="badge bg-<?= $i['tipo_tarjeta'] === 'roja' ? 'danger' : 'warning text-dark' ?>">
                            <?= ucfirst($i['tipo_tarjeta']) ?>
                        </span>
                    </td>
                    <td class="align-middle"><?= esc($i['descripcion']) ?></td>
                    <td class="align-middle">
                        <?php if ($i['tipo_tarjeta'] === 'roja'): ?>
                            <?php 
                            $suspension = new DateTime($i['fecha_suspension']);
                            $hoy = new DateTime();
                            if ($suspension > $hoy):
                            ?>
                                <span class="badge bg-danger">Suspendido hasta <?= $suspension->format('d/m/Y') ?></span>
                            <?php else: ?>
                                <span class="badge bg-success">Cumplida</span>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="badge bg-info">Registrada</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function exportToPDF() {
    const element = document.getElementById('tablaIncidencias');
    const opt = {
        margin: 1,
        filename: 'incidencias_torneo.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
    };

    html2pdf().set(opt).from(element).save();
}
</script>

<?= $this->endSection() ?>
