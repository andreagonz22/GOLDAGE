<?php
require_once __DIR__ . '/../auth_check.php';
include 'conexion.php';

$servicios = $conn->query("
    SELECT IDSERVICIOS, NOMBRE_SERVICIO, TIPO_PROFESIONAL, PRECIO
    FROM SERVICIOS
    ORDER BY TIPO_PROFESIONAL
");

$empleados = $conn->query("
    SELECT IDEMPLEADO, NOMBRE_COMPLETO, PROFESION
    FROM EMPLEADOS
    WHERE ESTADO = 'APROBADO'
    ORDER BY NOMBRE_COMPLETO
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agendar Cita - GoldAge</title>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/agendar_cita.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="card">
  <h2 class="flecha-volver><i class="fas fa-arrow-left></i>Agendar cita</h2>

  <!-- FIX: action apunta a guardar_cita.php (antes apuntaba a formpago.php) -->
  <form action="guardar_cita.php" method="POST">

    <!-- FECHA Y HORA -->
    <div class="row">
      <div class="field">
        <label>Fecha</label>
        <input type="date" name="fecha" required
               min="<?= date('Y-m-d') ?>">
      </div>
      <div class="field">
        <label>Hora</label>
        <input type="time" name="hora" required>
      </div>
    </div>

    <!-- SERVICIO -->
    <!-- FIX: el select ahora usa name="idservicio" que guardar_cita.php espera -->
    <!-- FIX: campo "duracion" eliminado — guardar_cita.php lo lee directo de la BD -->
    <div class="field">
      <label>Servicio</label>
      <div class="select-wrap">
        <select name="idservicio" required>
          <option value="" disabled selected>Selecciona un servicio</option>
          <?php while ($servicio = $servicios->fetch_assoc()): ?>
            <option value="<?= (int)$servicio['IDSERVICIOS'] ?>">
              <?= htmlspecialchars($servicio['NOMBRE_SERVICIO']) ?>
              — $<?= htmlspecialchars($servicio['PRECIO']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>
    </div>

    <!-- DIRECCIÓN -->
    <div class="field">
      <label>Dirección del servicio</label>
      <input
        type="text"
        name="direccion"
        placeholder="Ej: Calle Principal #123, Colonia Centro"
        required
      >
    </div>

    <!-- EMPLEADO -->
    <div class="field">
      <label>Profesional</label>
      <div class="select-wrap">
        <select name="idempleado" required>
          <option value="" disabled selected>Selecciona un profesional</option>
          <?php while ($row = $empleados->fetch_assoc()): ?>
            <option value="<?= (int)$row['IDEMPLEADO'] ?>">
              <?= htmlspecialchars($row['NOMBRE_COMPLETO']) ?>
              — <?= htmlspecialchars($row['PROFESION']) ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>
    </div>

    <!-- BOTÓN -->
    <button type="submit" class="btn">Continuar al pago</button>

  </form>

  <p class="footer-link">
    ¿Ya tienes una cita? <a href="mis_citas.php">Ver mis citas</a>
  </p>
</div>

</body>
</html>