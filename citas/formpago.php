<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'conexion.php';

// 1. Leer id y monto desde la URL
$idcita = (int)($_GET['id']    ?? 0);
$monto  = (float)($_GET['monto'] ?? 0);

if (!$idcita || !$monto) die('Datos de cita no válidos. <a href="agendar.php">Volver</a>');

// 2. Verificar que la cita pertenece al usuario en sesión
$stmtVerify = $conn->prepare("
    SELECT c.IDCITAS, c.FECHA, c.HORA, c.ESTADOCITA,
           s.NOMBRE_SERVICIO,
           e.NOMBRE_COMPLETO
    FROM CITAS c
    JOIN SERVICIOS s ON s.IDSERVICIOS = c.IDSERVICIOS
    JOIN EMPLEADOS e ON e.IDEMPLEADO  = c.IDEMPLEADO
    WHERE c.IDCITAS   = ?
      AND c.IDUSUARIO = ?
");
$stmtVerify->bind_param('ii', $idcita, $_SESSION['idusuario']);
$stmtVerify->execute();
$cita = $stmtVerify->get_result()->fetch_assoc();

if (!$cita) die('Cita no encontrada. <a href="agendar.php">Volver</a>');

// 3. Procesar formulario de tarjeta
$error   = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titular = trim($_POST['card_name'] ?? '');
    $numero  = preg_replace('/\s+/', '', $_POST['cc_number'] ?? '');
    $mes     = trim($_POST['cc_month'] ?? '');
    $anio    = trim($_POST['cc_year']  ?? '');
    $cvv     = trim($_POST['cc_cvv']   ?? '');

    if (!$titular || strlen($numero) < 13 || !$mes || !$anio || !$cvv) {
        $error = 'Por favor completa todos los datos de la tarjeta.';
    } else {
        // Guardar referencia de tarjeta en el pago (solo los últimos 4 dígitos)
        $ultimos4   = substr($numero, -4);
        $referencia = 'GA-RESERVA-' . $ultimos4 . '-' . time();

        $stmtPago = $conn->prepare("
            UPDATE PAGOS
            SET REFERENCIA  = ?,
                ESTADO_PAGO = 'RESERVADO'
            WHERE IDCITAS = ?
        ");
        $stmtPago->bind_param('si', $referencia, $idcita);
        $stmtPago->execute();

        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservar Pago - GoldAge</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../css/navbar_auth.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/formulario.css">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="../index.php" class="logo">
        <img src="../img/logo.png" alt="GoldAge Logo" class="logo-img">
        <span class="logo-text">Gold<span class="logo-accent">Age</span></span>
      </a>
      <?php include __DIR__ . '/../navbar_auth.php'; ?>
    </div>
  </nav>
  

  <div class="modal">
    <div class="modal__container">
      <div class="modal__content">

        <?php if (!$success): ?>

          <!-- RESUMEN DE CITA -->
          <div class="cita-resumen">
            <h3>Resumen de tu solicitud</h3>
            <p><strong>Servicio:</strong> <?= htmlspecialchars($cita['NOMBRE_SERVICIO']) ?></p>
            <p><strong>Profesional:</strong> <?= htmlspecialchars($cita['NOMBRE_COMPLETO']) ?></p>
            <p><strong>Fecha:</strong> <?= htmlspecialchars($cita['FECHA']) ?></p>
            <p><strong>Hora:</strong> <?= htmlspecialchars($cita['HORA']) ?></p>
            <p><strong>Total a reservar:</strong> $<?= number_format($monto, 2) ?></p>
          </div>

          <!-- AVISO IMPORTANTE -->
          <div class="aviso-reserva">
            <i class="fas fa-info-circle"></i>
            <p>
              Tu tarjeta <strong>no será cobrada</strong> hasta que el profesional
              confirme la cita. Tiene <strong>24 horas</strong> para responder.
              Si rechaza o no responde, tu pago quedará liberado automáticamente.
            </p>
          </div>

          <h2>DATOS DE TARJETA</h2>

          <!-- TARJETA VISUAL -->
          <div class="credit-card">
            <div class="chip">
              <div class="line-v1"></div><div class="line-v2"></div><div class="line-v3"></div>
              <div class="line-h1"></div><div class="line-h2"></div>
              <div class="center"></div>
              <div class="diag1"></div><div class="diag2"></div><div class="diag3"></div><div class="diag4"></div>
            </div>
            <img id="card-logo" src="" alt="">
            <div class="card-number" id="card-number-view"></div>
            <div class="card-bottom">
              <div>
                <small class="card-holder-label">Card Holder</small>
                <div id="card-name-view">YOUR NAME</div>
              </div>
              <div>
                <small>Expires</small>
                <div id="card-date-view">MM/YY</div>
              </div>
            </div>
          </div>

          <?php if ($error): ?>
            <div class="error-msg">
              <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

          <!-- FORMULARIO DE TARJETA -->
          <form id="payment-form" action="formpago.php?id=<?= $idcita ?>&monto=<?= $monto ?>" method="POST">
            <ul class="form-list">

              <li class="form-list__row">
                <label>Nombre en la tarjeta</label>
                <input type="text" id="card-name" name="card_name" required>
              </li>

              <li class="form-list__row">
                <label>Número de tarjeta</label>
                <input type="text" id="cc-number" name="cc_number" maxlength="19" required>
              </li>

              <li class="form-list__row form-list__row--inline">
                <div>
                  <label>Expiración</label>
                  <div class="form-list__input-inline">
                    <input type="text" id="cc-month" name="cc_month" placeholder="MM" maxlength="2">
                    <input type="text" id="cc-year"  name="cc_year"  placeholder="YY" maxlength="2">
                  </div>
                </div>
                <div>
                  <label>CVC</label>
                  <input type="text" id="cc-cvv" name="cc_cvv" placeholder="123" maxlength="4">
                </div>
              </li>

              <li>
                <button type="submit" class="button">
                  <i class="fas fa-lock"></i> Reservar $<?= number_format($monto, 2) ?>
                </button>
              </li>

            </ul>
          </form>

        <?php else: ?>

          <!-- PANTALLA DE ÉXITO -->
          <div class="success-box">
            <div class="success-icon">
              <i class="fas fa-clock"></i>
            </div>
            <h3>¡Solicitud enviada!</h3>
            <p>
              Tu cita ha sido registrada y el profesional tiene
              <strong>24 horas</strong> para confirmarla.
            </p>
            <p>
              Te notificaremos cuando responda. Tu tarjeta
              <strong>no será cobrada</strong> hasta entonces.
            </p>
            <div class="success-detalle">
              <p><strong>Servicio:</strong> <?= htmlspecialchars($cita['NOMBRE_SERVICIO']) ?></p>
              <p><strong>Profesional:</strong> <?= htmlspecialchars($cita['NOMBRE_COMPLETO']) ?></p>
              <p><strong>Fecha:</strong> <?= htmlspecialchars($cita['FECHA']) ?> a las <?= htmlspecialchars($cita['HORA']) ?></p>
              <p><strong>Monto reservado:</strong> $<?= number_format($monto, 2) ?></p>
            </div>
            <a href="mis_citas.php" class="button">
              <i class="fas fa-calendar-check"></i> Ver mis citas
            </a>
          </div>

        <?php endif; ?>

      </div>
    </div>
  </div>

  <?php include '../footer.php'; ?>
  <script src="../js/main.js"></script>
  <script src="../js/navbar_auth.js"></script>
  <script src="../js/formulario.js"></script>

</body>
</html>