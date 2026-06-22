
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body>

<div class="login-wrapper">
  <div class="login-card">

    <a href="../index.php" class="flecha-volver"><h2><i class="fas fa-arrow-left"></a></i> Welcome Back</h2>
    <p class="subtitle">Sign in to continue</p>

    <form action="/Gold/GOLDAGE/login/validar_login.php" method="POST">
      <div class="form-group">
        <label for="gmail">Email Address</label>
        <input
          type="gmail"
          id="gmail"
          name="correo"
          placeholder="name@gmail.com"
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