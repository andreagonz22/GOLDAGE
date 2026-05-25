<?php
require_once __DIR__ . '/../auth_check.php';
include 'conexion.php';

$idusuario = (int)$_SESSION['idusuario'];

$stmt = $conn->prepare("SELECT c.*,e.NOMBRE_COMPLETO FROM CITAS c JOIN EMPLEADOS e ON c.IDEMPLEADO=e.IDEMPLEADO WHERE c.IDUSUARIO=? ORDER BY FECHA DESC,HORA DESC");
$stmt->bind_param('i', $idusuario);
$stmt->execute();
$res = $stmt->get_result();
$citas = $res->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mis Citas</title>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/citas.css">
</head>
<body>

<div class="citas-wrapper">
  <div class="citas-header">
    <a href="../index.php" class="register-logo">Gold<em>Age</em></a>
    <h2>Mis Citas</h2>
    <p class="subtitle">Historial y estado de tus consultas agendadas</p>
  </div>

  <?php if (empty($citas)): ?>
    <div class="citas-empty">
      <div style="font-size:48px">📋</div>
      <p>No tienes citas registradas aún.</p>
    </div>

  <?php else: ?>
    <?php foreach ($citas as $row):
      $estado = strtolower($row['ESTADOCITA']);
      $claseEstado = match($estado) {
        'confirmada' => 'estado-confirmada',
        'cancelada'  => 'estado-cancelada',
        default      => 'estado-pendiente'
      };
      $cancelable = $estado !== 'cancelada';
    ?>
    <div class="cita-card">
      <div class="cita-icon">🩺</div>
      <div class="cita-info">
        <div class="cita-empleado"><?= htmlspecialchars($row['NOMBRE_COMPLETO']) ?></div>
        <div class="cita-datetime">
          <span>📅 <?= htmlspecialchars($row['FECHA']) ?></span>
          <span>🕐 <?= htmlspecialchars($row['HORA']) ?></span>
        </div>
      </div>
      <span class="cita-estado <?= $claseEstado ?>">
        <?= htmlspecialchars($row['ESTADOCITA']) ?>
      </span>
      <?php if ($cancelable): ?>
        <a href="cancelar_cita.php?id=<?= $row['IDCITAS'] ?>" class="btn-cancelar">Cancelar</a>
      <?php else: ?>
        <span class="btn-cancelar btn-cancelar-disabled">Cancelada</span>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  <?php endif; ?>

</div>

</body>
</html>