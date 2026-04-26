<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" href="../css/registro.css" />
</head>
<body>

<div class="register-wrapper">
  <div class="register-card">

    <a class="register-logo"> Gold<em>Age</em></a>
    <h2>Crear cuenta</h2>
    <p class="subtitle">Únete y accede a nuestros servicios de salud</p>

    <form action="guardar.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="María" required>
      </div>
      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="García" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="••••••••" required>
      </div>
      <div class="form-group">
        <label for="contacto">Contacto</label>
        <input type="text" id="contacto" name="contacto" placeholder="+503 0000-0000" required>
      </div>
      <div class="form-group">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" placeholder="maria@email.com" required>
      </div>
      <button type="submit">Registrarse</button>
    </form>

    <p class="register-footer">¿Ya tienes cuenta? <a href="login.php">Ir a login</a></p>

  </div>
</div>

</body>
</html>