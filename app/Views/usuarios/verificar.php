<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Verificar Cuenta</title>
  <style>
    body {
      background: linear-gradient(135deg, #6a11cb, #ff7e5f);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
      color: #fff;
    }

    .container {
      background: rgba(255, 255, 255, 0.1);
      padding: 30px 40px;
      border-radius: 20px;
      text-align: center;
      backdrop-filter: blur(8px);
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: none;
      margin: 10px 0;
      font-size: 15px;
    }

    button {
      background: linear-gradient(45deg, #ff7e5f, #feb47b);
      border: none;
      border-radius: 10px;
      padding: 12px;
      color: #fff;
      font-weight: 600;
      cursor: pointer;
    }

    button:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Verifica tu cuenta</h2>
    <p>Revisa tu correo y escribe el código que te enviamos.</p>
    <form action="/usuarios/confirmar" method="post">
      <input type="email" name="correo" placeholder="Correo" required>
      <input type="text" name="codigo" placeholder="Código de verificación" required>
      <button type="submit">Confirmar</button>
    </form>
  </div>
</body>
</html>
