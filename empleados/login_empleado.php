<!DOCTYPE html>
<html>
<head>
  <title>Employee Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="login-wrapper">
  <div class="login-card">

    <a href="../index.html" class="login-logo"> Gold<em>Age</em></a>
    <h2>Employee Portal</h2>
    <p class="subtitle">Exclusive access for the GoldAge team</p>

    <form action="/Gold/GOLDAGE/empleados/validar_empleado.php" method="POST">
      <div class="form-group">
        <label for="correo">Corporate Email</label>
        <input type="email" id="correo" name="correo" placeholder="name@goldage.com" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Password</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="•••" required>
      </div>
      <button type="submit">Sign In</button>
    </form>

    <p class="login-footer">Don't have an account? <a href="../empleados/registro_empleado.php">Create Account</a></p>
   
  </div>
</div>

</body>
</html>