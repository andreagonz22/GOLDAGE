<!DOCTYPE html>
<html>
<head>
  <title>Login Empleado</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="login-wrapper">
  <div class="login-card">

    <a href="../index.html" class="login-logo">🌿 Gold<em>Age</em></a>
    <h2>Portal de Empleados</h2>
    <p class="subtitle">Acceso exclusivo para el equipo GoldAge</p>

    <form action="validar_empleado.php" method="POST">
      <div class="form-group">
        <label for="correo">Correo institucional</label>
        <input type="email" id="correo" name="correo" placeholder="nombre@goldage.com" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="••••••••" required>
      </div>
      <button type="submit">Ingresar</button>
    </form>

  </div>
</div>

</body>
</html>