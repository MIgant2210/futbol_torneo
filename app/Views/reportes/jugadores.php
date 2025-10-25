<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
.stats-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    padding: 20px;
    color: white;
    margin-bottom: 20px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

.filter-section {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.player-photo {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.modern-table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.modern-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.modern-table thead th {
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    padding: 18px 15px;
    border: none;
}

.modern-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
}

.modern-table tbody tr:hover {
    background: #f8f9ff;
    transform: scale(1.01);
}

.modern-table tbody td {
    padding: 15px;
    vertical-align: middle;
}

.goals-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 1.1rem;
    display: inline-block;
    min-width: 50px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
}

.action-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    color: white;
}

.export-btn {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(245, 87, 108, 0.3);
}

.export-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(245, 87, 108, 0.4);
}

.search-input, .filter-select {
    border-radius: 25px;
    border: 2px solid #e0e0e0;
    padding: 10px 20px;
    transition: all 0.3s ease;
}

.search-input:focus, .filter-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

.team-badge {
    background: #e8eaf6;
    color: #5e35b1;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 0.9rem;
    font-weight: 500;
}

.pdf-container {
    padding: 40px;
    background: white;
}

.pdf-header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 3px solid #667eea;
}

.pdf-header h1 {
    color: #667eea;
    font-weight: bold;
    margin-bottom: 10px;
}

.pdf-header p {
    color: #666;
    font-size: 1.1rem;
}

.pdf-table {
    width: 100%;
    margin-top: 20px;
}

.pdf-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.pdf-table thead th {
    color: white;
    padding: 15px;
    font-weight: 600;
}

.pdf-table tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #e0e0e0;
}

.pdf-table tbody tr:nth-child(even) {
    background: #f8f9fa;
}

.pdf-footer {
    margin-top: 40px;
    text-align: center;
    color: #666;
    font-size: 0.9rem;
    padding-top: 20px;
    border-top: 2px solid #e0e0e0;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1" style="color: #2d3748; font-weight: 700;">Lista de Jugadores</h2>
                    <p class="text-muted mb-0">Gestiona y visualiza todos los jugadores del torneo</p>
                </div>
                <button type="button" class="btn export-btn" onclick="exportToPDF()">
                    <i class="fas fa-file-pdf me-2"></i> Exportar PDF
                </button>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stats-card text-center">
                <h3 class="mb-0"><?= count($jugadores) ?></h3>
                <p class="mb-0 mt-2">Total Jugadores</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card text-center">
                <h3 class="mb-0"><?= array_sum(array_column($jugadores, 'total_goles')) ?></h3>
                <p class="mb-0 mt-2">Goles Totales</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card text-center">
                <h3 class="mb-0"><?= count(array_unique(array_column($jugadores, 'nombre_equipo'))) ?></h3>
                <p class="mb-0 mt-2">Equipos Registrados</p>
            </div>
        </div>
    </div>

    <div class="filter-section">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold" style="color: #4a5568;">Buscar Jugador</label>
                <div class="input-group">
                    <span class="input-group-text bg-white" style="border-radius: 25px 0 0 25px; border-right: 0;">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control search-input" id="searchNombre" placeholder="Nombre del jugador..." style="border-left: 0; padding-left: 0;">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold" style="color: #4a5568;">Filtrar por Equipo</label>
                <select class="form-select filter-select" id="filterEquipo" onchange="filtrarTabla()">
                    <option value="">Todos los equipos</option>
                    <?php
                    $equipos = array_unique(array_column($jugadores, 'nombre_equipo'));
                    foreach ($equipos as $equipo):
                        if (!empty($equipo)):
                    ?>
                        <option value="<?= esc($equipo) ?>"><?= esc($equipo) ?></option>
                    <?php 
                        endif;
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold" style="color: #4a5568;">Filtrar por Goles</label>
                <select class="form-select filter-select" id="filterGoles" onchange="filtrarTabla()">
                    <option value="">Todos los rangos</option>
                    <option value="0-5">0-5 goles</option>
                    <option value="6-10">6-10 goles</option>
                    <option value="11+">11+ goles</option>
                </select>
            </div>
        </div>
    </div>

    <?php if (empty($jugadores)): ?>
        <div class="alert alert-info rounded-3">
            <i class="fas fa-info-circle me-2"></i>No hay jugadores registrados.
        </div>
    <?php else: ?>
        <div class="modern-table">
            <table class="table table-hover mb-0" id="tablaJugadores">
                <thead>
                    <tr>
                        <th style="width: 80px;">Foto</th>
                        <th>Nombre Completo</th>
                        <th>Equipo</th>
                        <th>Edad</th>
                        <th class="text-center">Goles</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jugadores as $j): 
                        $edad = '';
                        if (!empty($j['fecha_nacimiento'])) {
                            try {
                                $dn = new DateTime($j['fecha_nacimiento']);
                                $hoy = new DateTime();
                                $edad = $hoy->diff($dn)->y;
                            } catch (Exception $e) {
                                $edad = '';
                            }
                        }
                        $foto = !empty($j['foto']) ? base_url('uploads/' . $j['foto']) : base_url('assets/img/default-player.png');
                    ?>
                    <tr>
                        <td>
                            <img src="<?= esc($foto) ?>" alt="<?= esc($j['nombre'].' '.$j['apellido']) ?>" class="player-photo" />
                        </td>
                        <td>
                            <div>
                                <strong style="color: #2d3748; font-size: 1rem;"><?= esc($j['nombre']) ?> <?= esc($j['apellido']) ?></strong>
                            </div>
                        </td>
                        <td>
                            <span class="team-badge"><?= esc($j['nombre_equipo'] ?? 'Sin equipo') ?></span>
                        </td>
                        <td style="color: #718096;"><?= $edad !== '' ? esc($edad) . ' años' : 'N/D' ?></td>
                        <td class="text-center">
                            <span class="goals-badge"><?= esc($j['total_goles'] ?? 0) ?></span>
                        </td>
                        <td class="text-center">
                            <a href="<?= site_url('reportes/jugador/' . $j['id']) ?>" class="action-btn">
                                <i class="fas fa-eye me-1"></i> Ver Detalle
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<!-- Contenedor oculto para PDF mejorado -->
<div id="pdfContent" style="display: none;">
    <div class="pdf-container">
        <div class="pdf-header">
            <h1>REPORTE DE JUGADORES</h1>
            <p>Torneo <?= date('Y') ?> - Generado el <?= date('d/m/Y H:i') ?></p>
        </div>

        <table class="pdf-table">
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Nombre Completo</th>
                    <th>Equipo</th>
                    <th>Edad</th>
                    <th style="text-align: center;">Goles</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $posicion = 1;
                foreach ($jugadores as $j): 
                    $edad = '';
                    if (!empty($j['fecha_nacimiento'])) {
                        try {
                            $dn = new DateTime($j['fecha_nacimiento']);
                            $hoy = new DateTime();
                            $edad = $hoy->diff($dn)->y;
                        } catch (Exception $e) {
                            $edad = 'N/D';
                        }
                    }
                ?>
                <tr>
                    <td style="font-weight: 600;"><?= $posicion ?></td>
                    <td style="font-weight: 600;"><?= esc($j['nombre']) ?> <?= esc($j['apellido']) ?></td>
                    <td><?= esc($j['nombre_equipo'] ?? 'Sin equipo') ?></td>
                    <td><?= $edad !== '' ? esc($edad) . ' años' : 'N/D' ?></td>
                    <td style="text-align: center; font-weight: bold; color: #667eea;"><?= esc($j['total_goles'] ?? 0) ?></td>
                </tr>
                <?php 
                $posicion++;
                endforeach; 
                ?>
            </tbody>
        </table>

        <div class="pdf-footer">
            <p><strong>Total de Jugadores:</strong> <?= count($jugadores) ?> | <strong>Total de Goles:</strong> <?= array_sum(array_column($jugadores, 'total_goles')) ?></p>
            <p>Documento generado automáticamente por el Sistema de Gestión de Torneos</p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
// Búsqueda en tiempo real
document.getElementById('searchNombre').addEventListener('input', filtrarTabla);

function exportToPDF() {
    const element = document.getElementById('pdfContent');
    
    // Mostrar temporalmente el contenido del PDF
    element.style.display = 'block';
    
    const opt = {
        margin: [0.5, 0.5, 0.5, 0.5],
        filename: 'jugadores_torneo_' + new Date().toISOString().split('T')[0] + '.pdf',
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

    html2pdf().set(opt).from(element).save().then(function() {
        // Ocultar nuevamente después de generar el PDF
        element.style.display = 'none';
    });
}

function filtrarTabla() {
    const searchText = document.getElementById('searchNombre').value.toLowerCase();
    const equipo = document.getElementById('filterEquipo').value.toLowerCase();
    const golesRange = document.getElementById('filterGoles').value;
    
    const rows = document.querySelectorAll('#tablaJugadores tbody tr');
    let visibleCount = 0;
    
    rows.forEach(row => {
        const nombre = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const equipoCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const golesText = row.querySelector('td:nth-child(5) .goals-badge').textContent;
        const goles = parseInt(golesText);
        
        let mostrar = true;
        
        if (searchText && !nombre.includes(searchText)) {
            mostrar = false;
        }
        
        if (equipo && equipoCell !== equipo) {
            mostrar = false;
        }
        
        if (golesRange) {
            const [min, max] = golesRange === '11+' ? [11, Infinity] : golesRange.split('-').map(Number);
            if (goles < min || goles > max) {
                mostrar = false;
            }
        }
        
        row.style.display = mostrar ? '' : 'none';
        if (mostrar) visibleCount++;
    });
}
</script>

<?= $this->endSection() ?>