<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro - Liga Pro</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
  body {
    background: linear-gradient(135deg, #6a11cb, #ff7e5f);
    font-family: 'Poppins', sans-serif;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
    overflow: hidden;
    position: relative;
  }

  .container {
    background: rgba(255, 255, 255, 0.95);
    padding: 45px 50px;
    border-radius: 20px;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    text-align: center;
    animation: fadeInUp 1s ease forwards;
    position: relative;
    z-index: 2;
  }

  @keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(20px);}
    100% { opacity: 1; transform: translateY(0);}
  }

  h2 {
    margin-bottom: 25px;
    font-weight: 700;
    font-size: 1.8rem;
    color: #6a11cb;
    letter-spacing: 1px;
  }

  .input-wrapper {
    position: relative;
    margin: 12px 0;
  }

  input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 15px;
    outline: none;
    transition: 0.3s;
    background: #fff;
    color: #333;
    box-sizing: border-box;
  }

  input:focus {
    border-color: #6a11cb;
    box-shadow: 0 0 10px rgba(106,17,203,0.3);
    transform: scale(1.02);
  }

  .password-wrapper {
    position: relative;
  }

  .password-wrapper input {
    padding-right: 45px;
  }

  .toggle-password {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6a11cb;
    font-size: 1.4rem;
    transition: 0.3s;
    user-select: none;
  }

  .toggle-password:hover {
    color: #ff7e5f;
    transform: translateY(-50%) scale(1.1);
  }

  button {
    background: linear-gradient(45deg, #6a11cb, #ff7e5f);
    border: none;
    border-radius: 12px;
    padding: 12px;
    width: 100%;
    font-weight: 600;
    cursor: pointer;
    color: #fff;
    transition: 0.3s;
    font-size: 1rem;
    margin-top: 10px;
    box-shadow: 0 5px 15px rgba(106,17,203,0.3);
  }

  button:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(106,17,203,0.5);
  }

  .alert {
    padding: 15px 20px;
    margin-bottom: 20px;
    border-radius: 12px;
    font-weight: 500;
    opacity: 0;
    transform: translateY(-20px) scale(0.9);
    animation: showAlert 0.5s ease forwards;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }

  @keyframes showAlert {
    to { 
      opacity: 1; 
      transform: translateY(0) scale(1);
    }
  }

  .alert::before {
    font-family: 'Bootstrap Icons';
    font-size: 1.5rem;
    flex-shrink: 0;
  }

  .alert-success {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    color: #155724;
    border: 2px solid #28a745;
  }

  .alert-success::before {
    content: '\F26A';
    color: #28a745;
  }

  .alert-error {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
    border: 2px solid #dc3545;
  }

  .alert-error::before {
    content: '\F623';
    color: #dc3545;
  }

  .alert-warning {
    background: linear-gradient(135deg, #fff3cd, #ffeaa7);
    color: #856404;
    border: 2px solid #ffc107;
  }

  .alert-warning::before {
    content: '\F33A';
    color: #ffc107;
  }

  /* Requisitos como tooltip */
  .tooltip-container {
    display: inline-block;
    position: relative;
    margin-bottom: 15px;
  }

  .tooltip-container span {
    color: #6a11cb;
    font-weight: 600;
    cursor: pointer;
    text-decoration: underline dotted;
  }

  .tooltip-container .tooltip-text {
    visibility: hidden;
    width: 280px;
    background-color: #6a11cb;
    color: #fff;
    text-align: left;
    border-radius: 8px;
    padding: 12px;
    position: absolute;
    top: 30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    font-size: 0.85rem;
    line-height: 1.5;
    opacity: 0;
    transition: opacity 0.3s;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
  }

  .tooltip-container:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
  }

  .login-link {
    margin-top: 15px;
    font-size: 0.95rem;
    display: block;
  }

  .login-link a {
    color: #6a11cb;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
  }

  .login-link a:hover {
    text-decoration: underline;
  }

  /* ===== PELOTAS DE FÚTBOL FLOTANTES ===== */
  .ball {
    position: absolute;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, #ffffff, #e0e0e0);
    z-index: 1;
    animation: float 8s infinite ease-in-out;
    opacity: 0.6;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  }

  .ball::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: 
      conic-gradient(from 0deg at 50% 50%, 
        transparent 0deg 36deg,
        #2a2a2a 36deg 72deg,
        transparent 72deg 108deg,
        #2a2a2a 108deg 144deg,
        transparent 144deg 180deg,
        #2a2a2a 180deg 216deg,
        transparent 216deg 252deg,
        #2a2a2a 252deg 288deg,
        transparent 288deg 324deg,
        #2a2a2a 324deg 360deg
      );
    mask: radial-gradient(circle at center, transparent 45%, black 45%);
  }

  .ball::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 40%;
    height: 40%;
    background-color: #2a2a2a;
    clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
  }

  @keyframes float {
    0% { 
      transform: translateY(0) translateX(0) rotate(0deg);
    }
    50% { 
      transform: translateY(-60px) translateX(40px) rotate(180deg);
    }
    100% { 
      transform: translateY(0) translateX(0) rotate(360deg);
    }
  }

  .ball.small {
    width: 45px;
    height: 45px;
  }

  .ball.large {
    width: 75px;
    height: 75px;
  }

</style>
</head>
<body>

  <!-- Pelotas de fútbol flotantes -->
  <div class="ball" style="top:8%; left:15%; animation-duration: 7s;"></div>
  <div class="ball large" style="top:35%; left:85%; animation-duration: 9s;"></div>
  <div class="ball small" style="top:75%; left:45%; animation-duration: 6s;"></div>
  <div class="ball" style="top:15%; left:65%; animation-duration: 8s;"></div>
  <div class="ball small" style="top:88%; left:10%; animation-duration: 10s;"></div>

<div class="container">
  <h2>⚽ Crear nueva cuenta</h2>

  <div class="tooltip-container">
    <span>Requisitos para registrarte</span>
    <div class="tooltip-text">
      ✔️ Nombre: mínimo 3 caracteres<br>
      ✔️ Correo válido (ej: usuario@correo.com)<br>
      ✔️ Usuario: mínimo 3 caracteres<br>
      ✔️ Contraseña: mínimo 6 caracteres
    </div>
  </div>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <span><?= session()->getFlashdata('success') ?></span>
    </div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
      <span><?= is_array(session()->getFlashdata('error')) ? implode('<br>', session()->getFlashdata('error')) : session()->getFlashdata('error') ?></span>
    </div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('warning')): ?>
    <div class="alert alert-warning">
      <span><?= session()->getFlashdata('warning') ?></span>
    </div>
  <?php endif; ?>

  <form action="<?= base_url('registro/guardar') ?>" method="post" autocomplete="off">
    <div class="input-wrapper">
      <input type="text" name="nombre" placeholder="Nombre completo" required minlength="3">
    </div>
    
    <div class="input-wrapper">
      <input type="email" name="correo" placeholder="Correo electrónico" required>
    </div>
    
    <div class="input-wrapper">
      <input type="text" name="usuario" placeholder="Usuario" required minlength="3">
    </div>
    
    <div class="input-wrapper password-wrapper">
      <input type="password" name="password" id="password" placeholder="Contraseña" required minlength="6">
      <i class="bi bi-eye-fill toggle-password" id="toggleIcon" onclick="togglePassword()"></i>
    </div>
    
    <button type="submit">Registrarme</button>
  </form>

  <p class="login-link">¿Ya tienes cuenta? <a href="<?= base_url('login') ?>">Inicia sesión</a></p>
</div>

<script>
  function togglePassword() {
    const pass = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');
    
    if (pass.type === 'password') {
      pass.type = 'text';
      icon.classList.remove('bi-eye-fill');
      icon.classList.add('bi-eye-slash-fill');
    } else {
      pass.type = 'password';
      icon.classList.remove('bi-eye-slash-fill');
      icon.classList.add('bi-eye-fill');
    }
  }
</script>

</body>
</html>