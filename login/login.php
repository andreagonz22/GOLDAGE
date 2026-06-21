
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
</head>
<body>

<div class="login-wrapper">
  <div class="login-card">


  
    <h2>Welcome Back</h2>
    <p class="subtitle">Sign in to continue</p>

    <form action="/Gold/GOLDAGE/login/validar_login.php" method="POST">
      <div class="form-group">
        <label for="gmail">Email Address</label>
        <input
          type="gmail"
          id="gmail"
          name="correo"
          placeholder="maria@gmail.com"
          required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          name="contrasena"
          placeholder="••••••••"
          minlength="8"
          required>
      </div>
      <button type="submit">Login</button>
    </form>

    <p class="login-footer">
      Don't have an account?
      <a href="registro.php">Create Account</a>
    </p>

    <p class="login-footer">
      Are you an employee?
      <a href="../empleados/login_empleado.php">Sign In</a>
    </p>

  </div>
</div>

</body>