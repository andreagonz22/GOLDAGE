<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" href="../css/registro.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body>

<div class="register-wrapper">
  <div class="register-card">

    <a href="../index.php" class="flecha-volver"><h2><i class="fas fa-arrow-left"></a></i> Create Account</h2>
    <p class="subtitle">Join us and access our healthcare services</p>

    <form action="guardar.php" method="POST">
      <div class="form-group">
        <label for="nombre">First Name</label>
        <input type="text" id="nombre" name="nombre" placeholder="María" required>
      </div>
      <div class="form-group">
        <label for="apellido">Last Name</label>
        <input type="text" id="apellido" name="apellido" placeholder="García" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Password</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="••••••••" required>
      </div>
      <div class="form-group">
        <label for="contacto">Contact Number</label>
        <input type="text" id="contacto" name="contacto" placeholder="0000-0000" required>
      </div>
      <div class="form-group">
        <label for="correo">CEmail Address</label>
        <input type="email" id="correo" name="correo" placeholder="name@email.com" required>
      </div>
      <button type="submit">Sign Up</button>
    </form>

    <p class="register-footer">Already have an account? <a href="login.php">Go to Login</a></p>
    <p class="register-footer">Are you an employee? <a href="../empleados/login_empleado.php">Sign In</a></p>

  </div>
</div>

</body>
</html>