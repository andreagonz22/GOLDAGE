<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register Patient</title>
</head>
<body>

<h2>Patient Registration</h2>

<form action="guardar_paciente.php" method="POST">

  <input type="text" name="nombre" placeholder="First Name" required><br><br>
  <input type="text" name="apellido" placeholder="Last Name" required><br><br>
  <input type="number" name="edad" placeholder="Age" required><br><br>

  <select name="genero" required>
    <option value="">Select Gender</option>
    <option value="Hombre">Male</option>
    <option value="Mujer">Female</option>
  </select><br><br>

  <input type="text" name="direccion" placeholder="Address"><br><br>
  <input type="text" name="enfermedades" placeholder="Medical Conditions"><br><br>
  <input type="text" name="alergias" placeholder="Allergies"><br><br>
  <input type="text" name="medicamentos" placeholder="Current Medications"><br><br>

  <select name="movilidad" required>
    <option value="">Mobility Level</option>
    <option value="INDEPENDIENTE">Independent</option>
    <option value="CON AYUDA">With Assistance</option>
    <option value="POSTRADOS">Bedridden</option>
  </select><br><br>

  <!-- This IDUSUARIO would normally come from the session -->
  <input type="number" name="idusuario" placeholder="User ID" required><br><br>

  <button type="submit">Register</button>

</form>

</body>
</html>
