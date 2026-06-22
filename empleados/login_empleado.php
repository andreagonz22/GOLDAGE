<!DOCTYPE html>
<html>
<head>
  <title>Employee Login</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

</head>
<body>

<div class="login-wrapper">
  <div class="login-card">
    <a href="../index.php" class="flecha-volver"><h2><i class="fas fa-arrow-left"></a></i> Employee Portal</h2>
    <p class="subtitle">Exclusive access for the GoldAge team</p>

    <form action="/Gold/GOLDAGE/empleados/validar_empleado.php" method="POST">
      <div class="form-group">
        <label for="correo">Corporate Email</label>
        <input type="email" id="correo" name="correo" placeholder="name@gmail.com" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Password</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="••••••••" required>
      </div>
      <button type="submit">Sign In</button>
    </form>

    <p class="login-footer">Don't have an account? <a href="../empleados/registro_empleado.php">Create Account</a></p>
   
  </div>
</div>

</body>
</html>