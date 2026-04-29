<!DOCTYPE html>
<html>
<head>
  <title>Registro Empleado</title>
  <link rel="stylesheet" href="../css/registro.css">
</head>
<body>

<div class="register-wrapper empleado">
  <div class="register-card">

    <a href="../index.html" class="register-logo">🌿 Gold<em>Age</em></a>
    <h2>Registro de Empleado</h2>
    <p class="subtitle">Completa tu perfil profesional para unirte al equipo</p>

    <form action="guardar_empleado.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" placeholder="María García" required>
      </div>

      <div class="form-group">
        <label for="dui">DUI</label>
        <input type="text" id="dui" name="dui" placeholder="00000000-0" required>
      </div>

      <div class="form-group">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" placeholder="nombre@goldage.com" required>
      </div>

      <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" placeholder="+503 0000-0000" required>
      </div>

      <div class="form-group">
        <label for="profesion">Profesión</label>
        <select id="profesion" name="profesion" required>
          <option value="">Seleccione profesión...</option>
          <option value="MEDICO">Médico</option>
          <option value="ENFERMERO">Enfermero</option>
          <option value="CUIDADOR">Cuidador</option>
        </select>
      </div>

      <div class="form-group">
        <label for="licencia">Número de licencia</label>
        <input type="text" id="licencia" name="licencia" placeholder="LIC-000000">
      </div>

      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" placeholder="Ej: Médico General">
      </div>
    
      <div class="form-group">
            <label for="titulo_pdf">Título en PDF</label>
            <label for="titulo_pdf" class="file-label" id="file-label-text">
            📄 Seleccionar archivo PDF
            </label>
            <input type="file" id="titulo_pdf" name="titulo_pdf" accept=".pdf">
        </div>

      
      <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="••••••••" required>
      </div>

      <button type="submit">Registrarse</button>

    </form>

  </div>
</div>

<script>
  document.getElementById('titulo_pdf').addEventListener('change', function () {
    const label = document.getElementById('file-label-text');
    label.textContent = this.files[0] ? '📄 ' + this.files[0].name : '📄 Seleccionar archivo PDF';
  });
</script>

</body>
</html>