<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Paciente</title>
</head>
<body>

<h2>Registro de Paciente</h2>

<form action="guardar_paciente.php" method="POST">

  <input type="text" name="nombre" placeholder="Nombre" required><br><br>
  <input type="text" name="apellido" placeholder="Apellido" required><br><br>
  <input type="number" name="edad" placeholder="Edad" required><br><br>

  <select name="genero" required>
    <option value="">Seleccione género</option>
    <option value="Hombre">Hombre</option>
    <option value="Mujer">Mujer</option>
  </select><br><br>

  <input type="text" name="direccion" placeholder="Dirección"><br><br>
  <input type="text" name="enfermedades" placeholder="Enfermedades"><br><br>
  <input type="text" name="alergias" placeholder="Alergias"><br><br>
  <input type="text" name="medicamentos" placeholder="Medicamentos activos"><br><br>

  <select name="movilidad" required>
    <option value="">Nivel de movilidad</option>
    <option value="INDEPENDIENTE">Independiente</option>
    <option value="CON AYUDA">Con ayuda</option>
    <option value="POSTRADOS">Postrados</option>
  </select><br><br>

  <!-- Este IDUSUARIO normalmente vendría de la sesión -->
  <input type="number" name="idusuario" placeholder="ID Usuario" required><br><br>

  <button type="submit">Registrar</button>

</form>

</body>
</html>