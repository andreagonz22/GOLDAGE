<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
</head>

<body>

<div class="login-wrapper">
  <div class="login-card">

    <a class="login-logo">
    <img src="logo.png"></a>

    <h2>Welcome Back</h2>
    <p class="subtitle">Sign in to continue</p>

    <form action="validate_login.php" method="POST">

      <div class="form-group">
        <label for="gmail">Email Address</label>

        <input 
          type="gmail" 
          id="gmail" 
          name="gmail" 
          placeholder="maria@gmail.com"
          required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>

        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="••••••••"
          minlength="8"
          required>
      </div>

      <button type="submit">Login</button>

    </form>

    <p class="login-footer">
      Don't have an account?
      <a href="register.php">Create Account</a>
    </p>

    <p class="login-footer">
      Are you an employee?
      <a href="../employees/employee_login.php">Sign In</a>
    </p>

  </div>
</div>

</body>