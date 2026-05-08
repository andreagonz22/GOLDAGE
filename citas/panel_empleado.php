<?php
require_once __DIR__ . '/../auth_check.php';
if ($ga_rol !== 'empleado' && $ga_rol !== 'admin') {
    header("Location: ../index.php");
    exit();
}
include 'conexion.php';

$idempleado = (int)$_SESSION['idempleado'];
$stmt = $conn->prepare("SELECT * FROM CITAS WHERE IDEMPLEADO=? ORDER BY FECHA, HORA");
$stmt->bind_param('i', $idempleado);
$stmt->execute();
$res = $stmt->get_result();
$citas = $res->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Citas Asignadas - GoldAge</title>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/citas_empleado.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="card">
  <div class="brand">🌿 Gold<em>Age</em></div>
  <h2>Citas asignadas</h2>
  <p class="subtitle">Consultas programadas para tu agenda</p>

  <?php if (!empty($_GET['ok'])): ?>
    <div class="alerta alerta-ok">✅ Estado actualizado correctamente.</div>
  <?php elseif (!empty($_GET['error'])): ?>
    <div class="alerta alerta-error">❌ No se pudo actualizar el estado.</div>
  <?php endif; ?>

  <?php if (empty($citas)): ?>
    <div class="empty">
      <div class="empty-icon">📋</div>
      <p>No tienes citas asignadas por el momento.</p>
    </div>

  <?php else: ?>
    <div class="citas-list">
      <?php foreach ($citas as $row):
        $estado = strtolower($row['ESTADOCITA']);
        $claseEstado = match($estado) {
          'confirmada' => 'estado-confirmada',
          'cancelada'  => 'estado-cancelada',
          default      => 'estado-pendiente'
        };
        $pendiente = $estado === 'pendiente';
      ?>
      <div class="cita-card <?= $pendiente ? 'cita-pendiente' : '' ?>">
        <div class="cita-icon">🩺</div>
        <div class="cita-info">
          <div class="cita-direccion"><?= htmlspecialchars($row['DIRECCION'] ?? 'Sin dirección') ?></div>
          <div class="cita-datetime">
            <span>📅 <?= htmlspecialchars($row['FECHA']) ?></span>
            <span>🕐 <?= htmlspecialchars($row['HORA']) ?></span>
            <?php if (!empty($row['DURACION'])): ?>
              <span>⏱ <?= htmlspecialchars($row['DURACION']) ?></span>
            <?php endif; ?>
          </div>

          <?php if ($pendiente): ?>
        <div class="cita-acciones">
            <form method="POST" action="cambiar_estado_cita.php">
                <input type="hidden" name="id" value="<?= $row['IDCITAS'] ?>">
                <input type="hidden" name="estado" value="CONFIRMADA">
                <button type="submit" class="btn-accion btn-confirmar">✔ Confirmar</button>
            </form>

        <form method="POST" action="cambiar_estado_cita.php">
            <input type="hidden" name="id" value="<?= $row['IDCITAS'] ?>">
            <input type="hidden" name="estado" value="CANCELADA">
            <button type="submit" class="btn-accion btn-cancelar" onclick="return confirm('¿Cancelar esta cita?')">✖ Cancelar</button>
        </form>
        </div>
          <?php endif; ?>
        </div>

        <span class="cita-estado <?= $claseEstado ?>">
          <?= htmlspecialchars($row['ESTADOCITA']) ?>
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <a href="../index.php" class="btn">← Volver al inicio</a>
</div>
</body>
</html>