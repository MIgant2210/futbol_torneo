<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
.player-profile-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 30px;
    color: white;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
}

.player-profile-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
}

.player-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    position: relative;
    z-index: 1;
    height: 100%;
}

.player-photo-large {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    margin-bottom: 20px;
}

.player-name-header {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: white;
    text-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-top: 20px;
}

.info-item {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.info-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}

.info-item .icon {
    font-size: 1.8rem;
    margin-bottom: 10px;
}

.info-item .value {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 5px;
}

.info-item .label {
    color: #718096;
    font-size: 0.85rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.goals-badge-large {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 700;
    font-size: 1.5rem;
    display: inline-block;
    box-shadow: 0 6px 15px rgba(245, 87, 108, 0.3);
}

.section-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 12px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
}

.goals-table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.06);
}

.goals-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.goals-table thead th {
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.8rem;
    letter-spacing: 0.5px;
    padding: 15px;
    border: none;
}

.goals-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
}

.goals-table tbody tr:hover {
    background: #f8f9ff;
}

.goals-table tbody td {
    padding: 15px;
    vertical-align: middle;
    font-size: 0.95rem;
}

.jornada-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 6px 14px;
    border-radius: 15px;
    font-weight: 600;
    display: inline-block;
    font-size: 0.85rem;
}

.goals-number {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    padding: 8px 15px;
    border-radius: 50%;
    font-weight: 700;
    font-size: 1rem;
    display: inline-block;
    min-width: 40px;
    text-align: center;
    box-shadow: 0 3px 10px rgba(245, 87, 108, 0.3);
}

.back-btn {
    background: white;
    color: #667eea;
    border: 2px solid white;
    padding: 8px 20px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.back-btn:hover {
    background: transparent;
    color: white;
    transform: translateX(-5px);
}

.empty-state {
    text-align: center;
    padding: 50px 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
}

.empty-state .icon {
    font-size: 3rem;
    color: #adb5bd;
    margin-bottom: 15px;
}

.empty-state p {
    color: #6c757d;
    font-size: 1rem;
}

.team-badge-large {
    background: linear-gradient(135deg, #e8eaf6 0%, #c5cae9 100%);
    color: #5e35b1;
    padding: 8px 16px;
    border-radius: 15px;
    font-size: 0.95rem;
    font-weight: 600;
    display: inline-block;
}

.stats-summary {
    margin-top: 25px;
    padding: 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 12px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.stat-item {
    text-align: center;
}

.stat-item .number {
    font-size: 1.6rem;
    font-weight: 700;
    color: #667eea;
}

.stat-item .label {
    color: #718096;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    margin-top: 5px;
}

.player-info-detail {
    font-size: 0.95rem;
    line-height: 1.8;
}

.player-info-detail strong {
    color: #2d3748;
    font-weight: 600;
}

.age-info {
    color: #718096;
    font-size: 1rem;
    margin-top: 8px;
}

.age-info i {
    margin-right: 8px;
}
</style>

<div class="container">
    <div class="player-profile-header">
        <a href="<?= site_url('reportes') ?>" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i> Volver
        </a>
        
        <div class="row align-items-center mt-3">
            <div class="col-md-8">
                <h1 class="player-name-header"><?= esc($jugador['nombre']) ?> <?= esc($jugador['apellido']) ?></h1>
                <div class="mt-2">
                    <span class="team-badge-large">
                        <i class="fas fa-shield-alt me-2"></i>
                        <?= esc($jugador['equipo_nombre'] ?? ($jugador['equipo_id'] ?? 'Sin equipo')) ?>
                    </span>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="goals-badge-large">
                    <i class="fas fa-futbol me-2"></i><?= esc($total_goles ?? 0) ?> Goles
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="player-card text-center">
                <?php $foto = !empty($jugador['foto']) ? base_url('uploads/' . $jugador['foto']) : base_url('assets/img/default-player.svg'); ?>
                <img src="<?= esc($foto) ?>" alt="<?= esc($jugador['nombre'].' '.$jugador['apellido']) ?>" class="player-photo-large" />
                
                <h3 style="color: #2d3748; font-weight: 700; font-size: 1.3rem; margin-bottom: 8px;">
                    <?= esc($jugador['nombre']) ?><br><?= esc($jugador['apellido']) ?>
                </h3>
                
                <?php if (!empty($jugador['fecha_nacimiento'])): ?>
                    <?php 
                    $dn = new DateTime($jugador['fecha_nacimiento']); 
                    $edad = (new DateTime())->diff($dn)->y; 
                    ?>
                    <p class="age-info">
                        <i class="fas fa-birthday-cake"></i><?= esc($edad) ?> años
                    </p>
                    <p style="color: #adb5bd; font-size: 0.85rem; margin: 0;">
                        <?= $dn->format('d/m/Y') ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="player-card">
                <h3 class="section-title">
                    <i class="fas fa-info-circle me-2"></i>Información del Jugador
                </h3>
                
                <div class="player-info-detail">
                    <p><strong>Nombre:</strong> <?= esc($jugador['nombre']) ?></p>
                    <p><strong>Apellido:</strong> <?= esc($jugador['apellido']) ?></p>
                    <p><strong>Equipo ID:</strong> <?= esc($jugador['equipo_id'] ?? 'N/D') ?></p>
                    <p class="mb-0"><strong>Total de Goles:</strong> <span class="badge bg-primary"><?= esc($total_goles ?? 0) ?></span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="player-card">
        <h3 class="section-title">
            <i class="fas fa-chart-line me-2"></i>Goles por Jornada
        </h3>
        
        <?php if (!empty($goles_detalle)): ?>
            <div class="goals-table">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Jornada</th>
                            <th>Fecha del Partido</th>
                            <th class="text-center">Goles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($goles_detalle as $gd): ?>
                            <tr>
                                <td>
                                    <span class="jornada-badge">
                                        <i class="fas fa-calendar-day me-1"></i>
                                        <?= esc($gd['nombre_jornada'] ?? 'Jornada') ?>
                                    </span>
                                </td>
                                <td style="color: #718096; font-weight: 500;">
                                    <i class="far fa-clock me-1"></i>
                                    <?= !empty($gd['fecha_juego']) ? date('d/m/Y', strtotime($gd['fecha_juego'])) : 'N/D' ?>
                                </td>
                                <td class="text-center">
                                    <span class="goals-number"><?= esc($gd['goles'] ?? 0) ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="stats-summary">
                <div class="stat-item">
                    <div class="number"><?= count($goles_detalle) ?></div>
                    <div class="label">Jornadas Jugadas</div>
                </div>
                <div class="stat-item">
                    <div class="number" style="color: #f5576c;">
                        <?= number_format($total_goles / count($goles_detalle), 1) ?>
                    </div>
                    <div class="label">Promedio Goles/Jornada</div>
                </div>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="icon">⚽</div>
                <p>No hay registros de goles para este jugador.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>