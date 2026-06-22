<?php
require_once __DIR__ . '/../auth_check.php';
if ($ga_rol !== 'empleado' && $ga_rol !== 'admin') {
  header("Location: ../index.php");
  exit();
}
include 'conexion.php';

$idempleado = (int) $_SESSION['idempleado'];
$mensaje = '';
$tipoMensaje = '';

// Procesar acción directo aquí, sin redireccionar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
  $idcita = (int) $_POST['id'];
  $nuevoEstado = strtoupper(trim($_POST['estado'] ?? ''));
  $estadosValidos = ['CONFIRMADA', 'CANCELADA'];

  if ($idcita && in_array($nuevoEstado, $estadosValidos)) {
    $stmt = $conn->prepare("
            UPDATE CITAS
            SET ESTADOCITA = ?
            WHERE IDCITAS    = ?
              AND IDEMPLEADO = ?
              AND ESTADOCITA = 'PENDIENTE'
        ");
    $stmt->bind_param('sii', $nuevoEstado, $idcita, $idempleado);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      // Actualizar PAGOS
      $estadoPago = ($nuevoEstado === 'CONFIRMADA') ? 'PAGADO' : 'CANCELADO';
      $stmtPago = $conn->prepare("
                UPDATE PAGOS
                SET ESTADO_PAGO = ?,
                    FECHA_PAGO  = NOW()
                WHERE IDCITAS = ?
            ");
      $stmtPago->bind_param('si', $estadoPago, $idcita);
      $stmtPago->execute();

      $mensaje = ($nuevoEstado === 'CONFIRMADA')
        ? '<i class="fas fa-circle-check"></i> Cita confirmada. El pago ha sido procesado.'
        : '<i class="fas fa-circle-xmark"></i> Cita cancelada. El pago ha sido liberado.';
      $tipoMensaje = ($nuevoEstado === 'CONFIRMADA') ? 'alerta-ok' : 'alerta-error';
    }
  }
}

// Traer citas actualizadas
$stmt = $conn->prepare("
    SELECT
        c.IDCITAS,
        c.FECHA,
        c.HORA,
        c.DURACION,
        c.DIRECCION,
        c.ESTADOCITA,
        c.FECHA_LIMITE_CONFIRMACION,
        s.NOMBRE_SERVICIO,
        s.PRECIO,
        u.NOMBRE,
        u.APELLIDO,
        u.CONTACTO_USUA,
        u.CORREO_USU
    FROM CITAS c
    LEFT JOIN SERVICIOS s ON s.IDSERVICIOS = c.IDSERVICIOS
    LEFT JOIN USUARIO   u ON u.IDUSUARIO   = c.IDUSUARIO
    WHERE c.IDEMPLEADO = ?
    ORDER BY
        FIELD(c.ESTADOCITA, 'PENDIENTE', 'CONFIRMADA', 'CANCELADA'),
        c.FECHA ASC,
        c.HORA  ASC
");
$stmt->bind_param('i', $idempleado);
$stmt->execute();
$citas = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Citas Asignadas - GoldAge</title>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/citas_empleado.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
  <div class="card">
    <h2>Citas asignadas</h2>
    <p class="subtitle">Consultas programadas para tu agenda</p>

    <?php if ($mensaje): ?>
      <div class="alerta <?= $tipoMensaje ?>">
        <?= $mensaje ?>
      </div>
    <?php endif; ?>

    <?php if (empty($citas)): ?>
      <div class="empty">
        <div class="empty-icon">
          <i class="fas fa-calendar-xmark"></i>
        </div>
        <p>No tienes citas asignadas por el momento.</p>
      </div>

    <?php else: ?>
      <div class="citas-list">
        <?php foreach ($citas as $row):
          $estado = strtolower($row['ESTADOCITA']);
          $claseEstado = match ($estado) {
            'confirmada' => 'estado-confirmada',
            'cancelada' => 'estado-cancelada',
            default => 'estado-pendiente'
          };
          $pendiente = $estado === 'pendiente';
          ?>
          <div class="cita-card <?= $pendiente ? 'cita-pendiente' : '' ?>">
            <div class="cita-icon">
              <i class="fas fa-user-doctor"></i>
            </div>

            <div class="cita-info">

              <?php if (!empty($row['NOMBRE'])): ?>
                <div class="cita-paciente" style="font-weight:700;margin-bottom:.25rem;">
                  <i class="fas fa-user"></i>
                  <?= htmlspecialchars($row['NOMBRE'] . ' ' . $row['APELLIDO']) ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($row['NOMBRE_SERVICIO'])): ?>
                <div style="font-size:.85rem;color:#666;margin-bottom:.4rem;">
                  <i class="fas fa-stethoscope"></i>
                  <?= htmlspecialchars($row['NOMBRE_SERVICIO']) ?>
                  <?php if (!empty($row['PRECIO'])): ?>
                    — $<?= number_format($row['PRECIO'], 2) ?>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($row['CONTACTO_USUA'])): ?>
                <div style="font-size:.82rem;color:#888;margin-bottom:.25rem;">
                  <i class="fas fa-phone"></i>
                  <?= htmlspecialchars($row['CONTACTO_USUA']) ?>
                  <?php if (!empty($row['CORREO_USU'])): ?>
                    &nbsp;·&nbsp; <i class="fas fa-envelope"></i>
                    <?= htmlspecialchars($row['CORREO_USU']) ?>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <div class="cita-datetime">
                <span>
                  <i class="fas fa-calendar-days"></i>
                  <?= htmlspecialchars($row['FECHA']) ?>
                </span>
                <span>
                  <i class="fas fa-clock"></i>
                  <?= htmlspecialchars($row['HORA']) ?>
                </span>
                <?php if (!empty($row['DURACION'])): ?>
                  <span>
                    <i class="fas fa-hourglass-half"></i>
                    <?= htmlspecialchars($row['DURACION']) ?>
                  </span>
                <?php endif; ?>
              </div>

              <div class="cita-direccion">
                <?= htmlspecialchars($row['DIRECCION'] ?? 'Sin dirección') ?>
              </div>

              <?php if ($pendiente && !empty($row['FECHA_LIMITE_CONFIRMACION'])): ?>
                <div style="font-size:.8rem;color:#e67e22;margin-top:.4rem;">
                  <i class="fas fa-triangle-exclamation"></i>
                  Responder antes del: <strong><?= htmlspecialchars($row['FECHA_LIMITE_CONFIRMACION']) ?></strong>
                </div>
              <?php endif; ?>

              <?php if ($pendiente): ?>
                <div class="cita-acciones">

                  <form method="POST" action="panel_empleado.php">
                    <input type="hidden" name="id" value="<?= (int) $row['IDCITAS'] ?>">
                    <input type="hidden" name="estado" value="CONFIRMADA">
                    <button type="submit" class="btn-accion btn-confirmar"><i class="fas fa-check"></i> Confirmar</button>
                  </form>

                  <form method="POST" action="panel_empleado.php">
                    <input type="hidden" name="id" value="<?= (int) $row['IDCITAS'] ?>">
                    <input type="hidden" name="estado" value="CANCELADA">
                    <button type="submit" class="btn-accion btn-cancelar" onclick="return confirm('¿Cancelar esta cita?')">
                      <i class="fas fa-xmark"></i> Cancelar
                    </button>
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

    <a href="../index.php" class="btn"><i class="fas fa-arrow-left"></i> Volver al inicio</a>
  </div>
</body>

</html>