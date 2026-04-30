<?php
require_once __DIR__ . '/../auth_check.php';
include 'conexion.php';
$result=$conn->query("SELECT IDEMPLEADO,NOMBRE_COMPLETO,PROFESION FROM EMPLEADOS WHERE ESTADO='APROBADO'");
?>
<form action="guardar_cita.php" method="POST">
<input type="date" name="fecha" required>
<input type="time" name="hora" required>
<select name="duracion" required>
<option value="1 hora">1 hora</option>
<option value="2 horas">2 horas</option>
</select>
<input type="text" name="direccion" placeholder="Dirección" required>
<select name="idempleado" required>
<?php while($row=$result->fetch_assoc()): ?>
<option value="<?= $row['IDEMPLEADO'] ?>"><?= $row['NOMBRE_COMPLETO'] ?> - <?= $row['PROFESION'] ?></option>
<?php endwhile; ?>
</select>
<button type="submit">Agendar cita</button>
</form>