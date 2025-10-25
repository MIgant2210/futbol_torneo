<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
.goleadores-header {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    border-radius: 20px;
    padding: 40px;
    color: white;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(245, 87, 108, 0.3);
}

.podium-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.podium-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
}

.podium-card.first::before {
    background: linear-gradient(90deg, #FFD700, #FFA500);
}

.podium-card.second::before {
    background: linear-gradient(90deg, #C0C0C0, #A8A8A8);
}

.podium-card.third::before {
    background: linear-gradient(90deg, #CD7F32, #B8860B);
}

.podium-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.15);
}

.podium-photo {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    margin-bottom: 15px;
}

.position-badge {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.3rem;
    margin-bottom: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.position-badge.gold {
    background: linear-gradient(135deg, #FFD700, #FFA500);
    color: #fff;
}

.position-badge.silver {
    background: linear-gradient(135deg, #C0C0C0, #A8A8A8);
    color: #fff;
}

.position-badge.bronze {
    background: linear-gradient(135deg, #CD7F32, #B8860B);
    color: #fff;
}

.goleadores-table {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}

.goleadores-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.goleadores-table thead th {
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    padding: 20px 15px;
    border: none;
}

.goleadores-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
}

.goleadores-table tbody tr:hover {
    background: linear-gradient(90deg, #f8f9ff 0%, #fff 100%);
    transform: scale(1.01);
}

.goleadores-table tbody td {
    padding: 18px 15px;
    vertical-align: middle;
}

.player-mini-photo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #f0f0f0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.goals-display {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 700;
    font-size: 1.2rem;
    display: inline-block;
    min-width: 60px;
    box-shadow: 0 4px 12px rgba(245, 87, 108, 0.3);
}

.position-cell {
    font-weight: 700;
    font-size: 1.1rem;
    color: #667eea;
}

.export-btn-goleadores {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.export-btn-goleadores:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    color: white;
}

.detail-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.detail-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    color: white;
}

.pdf-goleadores {
    padding: 50px;
    background: white;
}

.pdf-goleadores-header {
    text-align: center;
    margin-bottom: 50px;
    padding-bottom: 25px;
    border-bottom: 4px solid #f093fb;
}

.pdf-goleadores-header h1 {
    color: #f5576c;
    font-weight: bold;
    margin-bottom: 15px;
    font-size: 2.5rem;
}

.pdf-goleadores-header .trophy-icon {
    font-size: 3rem;
    color: #FFD700;
    margin-bottom: 15px;
}

.pdf-podium {
    display: flex;
    justify-content: space-around;
    margin-bottom: 40px;
    padding: 30px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
}

.pdf-podium-item {
    text-align: center;
    padding: 20px;
}

.pdf-podium-item .position {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.pdf-podium-item.first .position { color: #FFD700; }
.pdf-podium-item.second .position { color: #C0C0C0; }
.pdf-podium-item.third .position { color: #CD7F32; }

.pdf-goleadores-table {
    width: 100%;
    margin-top: 30px;
}

.pdf-goleadores-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.pdf-goleadores-table thead th {
    color: white;
    padding: 18px;
    font-weight: 600;
    text-align: center;
}

.pdf-goleadores-table tbody td {
    padding: 15px;
    border-bottom: 1px solid #e0e0e0;
    text-align: center;
}

.pdf-goleadores-table tbody tr:nth-child(even) {
    background: #f8f9fa;
}

.pdf-goleadores-footer {
    margin-top: 50px;
    text-align: center;
    color: #666;
    padding-top: 25px;
    border-top: 3px solid #e0e0e0;
}
</style>

<div class="container">
    <div class="goleadores-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mb-2" style="font-weight: 800;">
                    <i class="fas fa-trophy me-3"></i>Tabla de Goleadores
                </h1>
                <p class="mb-0" style="font-size: 1.1rem; opacity: 0.9;">Los máximos artilleros del torneo</p>
            </div>
            <button type="button" class="btn export-btn-goleadores" onclick="exportToPDF()">
                <i class="fas fa-file-pdf me-2"></i> Exportar PDF
            </button>
        </div>
    </div>

    <?php if (!empty($goleadores) && count($goleadores) >= 3): ?>
    <div class="row mb-5">
        <?php 
        $topThree = array_slice($goleadores, 0, 3);
        $orden = [1 => 1, 0 => 0, 2 => 2]; // segundo, primero, tercero
        $clases = [0 => 'first gold', 1 => 'second silver', 2 => 'third bronze'];
        $posiciones = [0 => '1°', 1 => '2°', 2 => '3°'];
        
        foreach ($orden as $col => $idx):
            if (!isset($topThree[$idx])) continue;
            $g = $topThree[$idx];
            $foto = !empty($g['foto']) ? base_url('uploads/' . $g['foto']) : base_url('assets/img/default-player.svg');
        ?>
        <div class="col-md-4">
            <div class="podium-card <?= $clases[$idx] ?>">
                <div class="position-badge <?= explode(' ', $clases[$idx])[1] ?>">
                    <?= $posiciones[$idx] ?>
                </div>
                <img src="<?= esc($foto) ?>" alt="<?= esc($g['nombre'].' '.$g['apellido']) ?>" class="podium-photo" />
                <h4 class="mb-2" style="color: #2d3748; font-weight: 700;"><?= esc($g['nombre']) ?> <?= esc($g['apellido']) ?></h4>
                <p class="text-muted mb-3"><?= esc($g['nombre_equipo'] ?? 'Sin equipo') ?></p>
                <div class="goals-display"><?= esc($g['total_goles']) ?> goles</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="goleadores-table">
        <table class="table table-hover mb-0" id="tablaGoleadores">
            <thead>
                <tr>
                    <th style="width: 80px;">Posición</th>
                    <th style="width: 80px;">Foto</th>
                    <th>Nombre Completo</th>
                    <th>Equipo</th>
                    <th class="text-center">Goles</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $pos = 1;
                foreach ($goleadores as $g): 
                    $foto = !empty($g['foto']) ? base_url('uploads/' . $g['foto']) : base_url('assets/img/default-player.svg');
                ?>
                <tr>
                    <td class="position-cell">
                        <?php if ($pos <= 3): ?>
                            <span class="position-badge <?= ($pos == 1) ? 'gold' : (($pos == 2) ? 'silver' : 'bronze') ?>" style="width: 35px; height: 35px; font-size: 1rem;">
                                <?= $pos ?>°
                            </span>
                        <?php else: ?>
                            <?= $pos ?>°
                        <?php endif; ?>
                    </td>
                    <td>
                        <img src="<?= esc($foto) ?>" alt="<?= esc($g['nombre'].' '.$g['apellido']) ?>" class="player-mini-photo" />
                    </td>
                    <td>
                        <strong style="color: #2d3748; font-size: 1rem;"><?= esc($g['nombre']) ?> <?= esc($g['apellido']) ?></strong>
                    </td>
                    <td style="color: #718096;"><?= esc($g['nombre_equipo'] ?? 'Sin equipo') ?></td>
                    <td class="text-center">
                        <span class="goals-display"><?= esc($g['total_goles']) ?></span>
                    </td>
                    <td class="text-center">
                        <a href="<?= site_url('reportes/jugador/' . $g['id']) ?>" class="detail-btn">
                            <i class="fas fa-eye me-1"></i> Ver Detalle
                        </a>
                    </td>
                </tr>
                <?php 
                $pos++;
                endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Contenedor oculto para PDF profesional -->
<div id="pdfContent" style="display: none;">
    <div class="pdf-goleadores">
        <div class="pdf-goleadores-header">
            <div class="trophy-icon">🏆</div>
            <h1>TABLA DE GOLEADORES</h1>
            <p style="font-size: 1.2rem; color: #666;">Torneo <?= date('Y') ?> - Generado el <?= date('d/m/Y H:i') ?></p>
        </div>

        <?php if (!empty($goleadores) && count($goleadores) >= 3): ?>
        <div class="pdf-podium">
            <?php 
            $topThree = array_slice($goleadores, 0, 3);
            $orden = [1, 0, 2]; // segundo, primero, tercero
            $clases = ['first', 'second', 'third'];
            
            foreach ($orden as $colIdx => $idx):
                if (!isset($topThree[$idx])) continue;
                $g = $topThree[$idx];
            ?>
            <div class="pdf-podium-item <?= $clases[$idx] ?>">
                <div class="position"><?= ($idx + 1) ?>°</div>
                <div style="font-weight: bold; font-size: 1.3rem; margin-bottom: 5px;">
                    <?= esc($g['nombre']) ?> <?= esc($g['apellido']) ?>
                </div>
                <div style="color: #666; margin-bottom: 10px;"><?= esc($g['nombre_equipo'] ?? 'Sin equipo') ?></div>
                <div style="font-size: 2rem; font-weight: bold; color: #f5576c;">
                    <?= esc($g['total_goles']) ?> goles
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <h3 style="color: #2d3748; margin-bottom: 20px; text-align: center;">Ranking Completo</h3>
        
        <table class="pdf-goleadores-table">
            <thead>
                <tr>
                    <th>Pos.</th>
                    <th>Nombre Completo</th>
                    <th>Equipo</th>
                    <th>Goles</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $pos = 1;
                foreach ($goleadores as $g): 
                ?>
                <tr>
                    <td style="font-weight: 700; font-size: 1.1rem; color: #667eea;"><?= $pos ?>°</td>
                    <td style="font-weight: 600;"><?= esc($g['nombre']) ?> <?= esc($g['apellido']) ?></td>
                    <td><?= esc($g['nombre_equipo'] ?? 'Sin equipo') ?></td>
                    <td style="font-weight: bold; color: #f5576c; font-size: 1.1rem;"><?= esc($g['total_goles']) ?></td>
                </tr>
                <?php 
                $pos++;
                endforeach; 
                ?>
            </tbody>
        </table>

        <div class="pdf-goleadores-footer">
            <p><strong>Total de Goleadores:</strong> <?= count($goleadores) ?> | <strong>Goles Totales:</strong> <?= array_sum(array_column($goleadores, 'total_goles')) ?></p>
            <p>Documento generado automáticamente por el Sistema de Gestión de Torneos</p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function exportToPDF() {
    const element = document.getElementById('pdfContent');
    const opt = {
        margin: [0.5, 0.5, 0.5, 0.5],
        filename: 'goleadores_torneo_' + new Date().toISOString().split('T')[0] + '.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { 
            scale: 2,
            useCORS: true,
            letterRendering: true
        },
        jsPDF: { 
            unit: 'in', 
            format: 'letter', 
            orientation: 'portrait'
        }
    };

    html2pdf().set(opt).from(element).save();
}
</script>

<?= $this->endSection() ?>