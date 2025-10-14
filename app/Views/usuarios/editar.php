<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .edit-container {
        max-width: 600px;
        margin: 60px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        padding: 40px 50px;
        position: relative;
        overflow: hidden;
    }

    .edit-container::before {
        content: "";
        position: absolute;
        top: -100px;
        left: -100px;
        width: 250px;
        height: 250px;
        background: rgba(205, 133, 63, 0.15);
        border-radius: 50%;
        z-index: 0;
    }

    .edit-container::after {
        content: "";
        position: absolute;
        bottom: -80px;
        right: -80px;
        width: 200px;
        height: 200px;
        background: rgba(245, 222, 179, 0.2);
        border-radius: 50%;
        z-index: 0;
    }

    .edit-container h2 {
        font-size: 1.8rem;
        margin-bottom: 25px;
        color: #5a3e2b;
        font-weight: 700;
        text-align: center;
        z-index: 1;
        position: relative;
    }

    form {
        z-index: 1;
        position: relative;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: 600;
        color: #5a3e2b;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 1rem;
        color: #333;
        transition: all 0.3s ease;
    }

    input:focus {
        outline: none;
        border-color: #a67c52;
        box-shadow: 0 0 5px rgba(166, 124, 82, 0.4);
    }

    .btn-primary {
        background: #a67c52;
        color: #fff;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #8b633f;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #d9c5a0;
        color: #5a3e2b;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 8px;
        display: inline-block;
        margin-top: 15px;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #c7b38a;
        transform: translateY(-2px);
    }
</style>

<div class="edit-container">
    <h2>✏️ Editar Usuario</h2>

    <form action="<?= base_url('usuarios/actualizar/' . $usuario['id']) ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= esc($usuario['nombre']) ?>" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" value="<?= esc($usuario['correo']) ?>" required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" value="<?= esc($usuario['usuario']) ?>" required>
        </div>

        <button type="submit" class="btn-primary">💾 Guardar Cambios</button>
    </form>

    <a href="<?= base_url('usuarios') ?>" class="btn-secondary">← Volver</a>
</div>

<?= $this->endSection() ?>
