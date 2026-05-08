<?php
require_once __DIR__ . '/../auth_check.php';
include 'conexion.php';
$result = $conn->query("SELECT IDEMPLEADO, NOMBRE_COMPLETO, PROFESION FROM EMPLEADOS WHERE ESTADO='APROBADO'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agendar Cita - GoldAge</title>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/agendar_cita.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="card">
  <div class="brand">🌿 Gold<em>Age</em></div>
  <h2>Agendar cita</h2>
  <p class="subtitle">Reserva tu consulta con un profesional de salud</p>

  <form action="guardar_cita.php" method="POST">

    <div class="row">
      <div class="field">
        <label>Fecha</label>
        <input type="date" name="fecha" required>
      </div>
      <div class="field">
        <label>Hora</label>
        <input type="time" name="hora" required>
      </div>
    </div>

    <div class="field">
      <label>Duración</label>
      <div class="select-wrap">
        <select name="duracion" required>
          <option value="" disabled selected>Selecciona duración</option>
          <option value="1 hora">1 hora</option>
          <option value="2 horas">2 horas</option>
        </select>
      </div>
    </div>

    <div class="field">
      <label>Dirección</label>
      <input type="text" name="direccion" placeholder="Ej: Calle Principal #123" required>
    </div>

    <div class="field">
      <label>Profesional</label>
      <div class="select-wrap">
        <select name="idempleado" required>
          <option value="" disabled selected>Selecciona un profesional</option>
          <?php while ($row = $result->fetch_assoc()): ?>
            <option value="<?= $row['IDEMPLEADO'] ?>">
              <?= htmlspecialchars($row['NOMBRE_COMPLETO']) ?> - <?= htmlspecialchars($row['PROFESION']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>
    </div>

    <button type="submit" class="btn">Agendar cita</button>
  </form>

  <p class="footer-link">¿Ya tienes una cita? <a href="mis_citas.php">Ver mis citas</a></p>
</div>
</body>
</html>