<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
</head>
<body>

<div class="login-wrapper">
  <div class="login-card">

    <a class="login-logo">GoldAge</em></a>
    <h2>Bienvenido de nuevo</h2>
    <p class="subtitle">Ingresa a tu cuenta para continuar</p>

    <form action="validar_login.php" method="POST">
      <div class="form-group">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" placeholder="maria@email.com" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="••••••••" required>
      </div>
      <button type="submit" >Ingresar</button>
    </form>

    <p class="login-footer">¿No tienes cuenta? <a href="registro.php">Crear cuenta</a></p>
    <p class="login-footer">¿Eres empleado? <a href="../empleados/login_empleado.php">Iniciar sesión</a></p>
        
  </div>
</div>

</body>