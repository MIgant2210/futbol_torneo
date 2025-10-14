<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - Liga Pro</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #6a11cb, #ff7e5f);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    /* Contenedor */
    .container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 40px 50px;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.3);
      width: 360px;
      text-align: center;
      position: relative;
      z-index: 2;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #6a11cb;
      font-weight: 700;
      margin-bottom: 25px;
    }

    input {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 15px;
      transition: 0.3s;
      box-sizing: border-box;
    }

    input:focus {
      border-color: #ff7e5f;
      box-shadow: 0 0 8px #ff7e5f;
      outline: none;
      transform: scale(1.02);
    }

    .password-wrapper {
      position: relative;
      margin-bottom: 15px;
    }

    .password-wrapper input {
      padding-right: 45px;
      margin-bottom: 0;
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
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 5px 15px rgba(106,17,203,0.3);
    }

    button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(106,17,203,0.5);
    }

    .link {
      margin-top: 15px;
      font-size: 14px;
    }

    .link a {
      color: #6a11cb;
      font-weight: 600;
      text-decoration: none;
    }

    .link a:hover {
      text-decoration: underline;
    }

    .error {
      color: #721c24;
      background: linear-gradient(135deg, #f8d7da, #f5c6cb);
      border: 2px solid #dc3545;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 15px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
      animation: showAlert 0.5s ease forwards;
      opacity: 0;
      transform: translateY(-20px) scale(0.9);
    }

    .error::before {
      content: '\F623';
      font-family: 'Bootstrap Icons';
      font-size: 1.5rem;
      color: #dc3545;
      flex-shrink: 0;
    }

    .success {
      color: #155724;
      background: linear-gradient(135deg, #d4edda, #c3e6cb);
      border: 2px solid #28a745;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 15px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
      animation: showAlert 0.5s ease forwards;
      opacity: 0;
      transform: translateY(-20px) scale(0.9);
    }

    .success::before {
      content: '\F26A';
      font-family: 'Bootstrap Icons';
      font-size: 1.5rem;
      color: #28a745;
      flex-shrink: 0;
    }

    @keyframes showAlert {
      to { 
        opacity: 1; 
        transform: translateY(0) scale(1);
      }
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
      opacity: 0.7;
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
      background: 
        polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
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

    /* Variaciones de tamaño */
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
  <div class="ball" style="top:10%; left:20%; animation-duration: 7s;"></div>
  <div class="ball large" style="top:40%; left:80%; animation-duration: 9s;"></div>
  <div class="ball small" style="top:70%; left:50%; animation-duration: 6s;"></div>
  <div class="ball" style="top:20%; left:60%; animation-duration: 8s;"></div>
  <div class="ball small" style="top:85%; left:15%; animation-duration: 10s;"></div>

  <!-- Contenedor de Login -->
  <div class="container">
    <h2>⚽ Iniciar Sesión</h2>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="error">
        <span><?= session()->getFlashdata('error') ?></span>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="success">
        <span><?= session()->getFlashdata('success') ?></span>
      </div>
    <?php endif; ?>

    <form action="/login/autenticar" method="post" id="loginForm">
      <input type="text" name="usuario" placeholder="Usuario" required>
      
      <div class="password-wrapper">
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
        <i class="bi bi-eye-fill toggle-password" id="toggleIcon" onclick="togglePassword()"></i>
      </div>

      <button type="submit">Entrar</button>
    </form>

    <div class="link">
      ¿No tienes cuenta? <a href="<?= base_url('registro') ?>">Crea una aquí</a>
    </div>
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