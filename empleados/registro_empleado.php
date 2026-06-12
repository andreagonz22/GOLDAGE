<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Registration</title>

  <!-- Poppins Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/registro.css">

  <style>
    *{
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body>

<div class="register-wrapper empleado">
  <div class="register-card">

    <a href="../index.html" class="register-logo">Gold<em>Age</em></a>

    <h2>Employee Registration</h2>
    <p class="subtitle">
      Complete your professional profile to join the team
    </p>

    <form action="guardar_empleado.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="nombre">Full Name</label>
        <input
          type="text"
          id="nombre"
          name="nombre"
          placeholder="Maria Garcia"
          required
        >
      </div>

      <div class="form-group">
        <label for="dui">DUI</label>
        <input
          type="text"
          id="dui"
          name="dui"
          placeholder="00000000-0"
          required
        >
      </div>

      <div class="form-group">
        <label for="correo">Email Address</label>
        <input
          type="email"
          id="correo"
          name="correo"
          placeholder="name@goldage.com"
          required
        >
      </div>

      <div class="form-group">
        <label for="telefono">Phone Number</label>
        <input
          type="text"
          id="telefono"
          name="telefono"
          placeholder="+503 0000-0000"
          required
        >
      </div>

      <div class="form-group">
        <label for="profesion">Profession</label>
        <select id="profesion" name="profesion" required>
          <option value="">Select profession...</option>
          <option value="MEDICO">Doctor</option>
          <option value="ENFERMERO">Nurse</option>
          <option value="CUIDADOR">Caregiver</option>
        </select>
      </div>

      <div class="form-group">
        <label for="licencia">License Number</label>
        <input
          type="text"
          id="licencia"
          name="licencia"
          placeholder="LIC-000000"
          required
        >
      </div>

      <div class="form-group">
        <label for="titulo">Degree / Title</label>
        <input
          type="text"
          id="titulo"
          name="titulo"
          placeholder="Example: General Physician"
          required
        >
      </div>

      <div class="form-group">
        <label for="titulo_pdf">Degree PDF</label>

        <label for="titulo_pdf" class="file-label" id="file-label-text">
          📄 Select PDF File
        </label>

        <input
          type="file"
          id="titulo_pdf"
          name="titulo_pdf"
          accept=".pdf"
          required
        >
      </div>

      <div class="form-group">
        <label for="contrasena">Password</label>
        <input
          type="password"
          id="contrasena"
          name="contrasena"
          placeholder="••••••••"
          required
        >
      </div>

      <button type="submit">Register</button>

    </form>

    <p class="register-footer">
      Already have an account?\
      <a href="../empleados/login_empleado.php">Go to login</a>
    </p>

  </div>
</div>

<script>
  document.getElementById('titulo_pdf').addEventListener('change', function () {
    const label = document.getElementById('file-label-text');

    label.textContent = this.files[0]
      ? '📄 ' + this.files[0].name
      : '📄 Select PDF File';
  });
</script>

</body>
</html>
