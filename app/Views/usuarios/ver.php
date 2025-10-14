<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .view-container {
        max-width: 600px;
        margin: 60px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        padding: 40px 50px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .view-container::before {
        content: "";
        position: absolute;
        top: -100px;
        left: -100px;
        width: 250px;
        height: 250px;
        background: rgba(205, 133, 63, 0.15); /* tono café suave */
        border-radius: 50%;
        z-index: 0;
    }

    .view-container::after {
        content: "";
        position: absolute;
        bottom: -80px;
        right: -80px;
        width: 200px;
        height: 200px;
        background: rgba(245, 222, 179, 0.2); /* tono beige */
        border-radius: 50%;
        z-index: 0;
    }

    .view-container h2 {
        font-size: 1.8rem;
        margin-bottom: 25px;
        color: #5a3e2b;
        font-weight: 700;
        z-index: 1;
        position: relative;
    }

    .user-info {
        text-align: left;
        margin-top: 20px;
        z-index: 1;
        position: relative;
    }

    .user-info p {
        font-size: 1.1rem;
        padding: 10px 15px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        color: #444;
    }

    .user-info strong {
        color: #5a3e2b;
    }

    .btn-back {
        margin-top: 30px;
        background: #a67c52;
        color: #fff;
        padding: 10px 25px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        z-index: 1;
        position: relative;
    }

    .btn-back:hover {
        background: #8b633f;
        transform: translateY(-2px);
    }
</style>

<div class="view-container">
    <h2>👤 Detalles del Usuario</h2>

    <div class="user-info">
        <p><strong>ID:</strong> <span><?= esc($usuario['id']) ?></span></p>
        <p><strong>Nombre:</strong> <span><?= esc($usuario['nombre']) ?></span></p>
        <p><strong>Correo:</strong> <span><?= esc($usuario['correo']) ?></span></p>
        <p><strong>Usuario:</strong> <span><?= esc($usuario['usuario']) ?></span></p>
    </div>

    <a href="<?= base_url('usuarios') ?>" class="btn-back">← Volver</a>
</div>

<?= $this->endSection() ?>
