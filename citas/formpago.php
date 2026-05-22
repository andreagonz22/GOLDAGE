<?php
// FIX: una sola apertura de sesión, sin head/body duplicados
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conexion.php';

// FIX: leer el id de cita y monto desde la URL enviada por guardar_cita.php
$idcita = (int)($_GET['id']    ?? 0);
$monto  = (float)($_GET['monto'] ?? 0);

if (!$idcita || !$monto) {
    die('Datos de cita no válidos. <a href="agendar.php">Volver</a>');
}

// Verificar que la cita pertenece al usuario en sesión
$stmtVerify = $conn->prepare("
    SELECT c.IDCITAS, c.FECHA, c.HORA, s.NOMBRE_SERVICIO, e.NOMBRE_COMPLETO
    FROM CITAS c
    JOIN SERVICIOS  s ON s.IDSERVICIOS = c.IDSERVICIOS
    JOIN EMPLEADOS  e ON e.IDEMPLEADO  = c.IDEMPLEADO
    WHERE c.IDCITAS   = ?
      AND c.IDUSUARIO = ?
");
$stmtVerify->bind_param('ii', $idcita, $_SESSION['idusuario']);
$stmtVerify->execute();
$cita = $stmtVerify->get_result()->fetch_assoc();

if (!$cita) {
    die('Cita no encontrada. <a href="agendar.php">Volver</a>');
}

// Procesar el pago cuando se envía el formulario
$error   = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titular    = trim($_POST['card_name']   ?? '');
    $numero     = preg_replace('/\s+/', '', $_POST['cc_number'] ?? '');
    $mes        = trim($_POST['cc_month']    ?? '');
    $anio       = trim($_POST['cc_year']     ?? '');
    $cvv        = trim($_POST['cc_cvv']      ?? '');
    $metodo     = 'TARJETA';

    // Validaciones básicas
    if (!$titular || strlen($numero) < 13 || !$mes || !$anio || !$cvv) {
        $error = 'Por favor completa todos los datos de la tarjeta.';
    } else {
        // Generar referencia única
        $referencia = 'GA-' . strtoupper(substr(md5(uniqid()), 0, 10));

        // Actualizar el pago con método y referencia
        $stmtPago = $conn->prepare("
            UPDATE PAGOS
            SET METODO_PAGO  = ?,
                ESTADO_PAGO  = 'PAGADO',
                REFERENCIA   = ?,
                FECHA_PAGO   = NOW()
            WHERE IDCITAS = ?
        ");
        $stmtPago->bind_param('ssi', $metodo, $referencia, $idcita);
        $stmtPago->execute();

        // Actualizar estado de la cita a CONFIRMADA
        $stmtCita = $conn->prepare("
            UPDATE CITAS SET ESTADOCITA = 'CONFIRMADA' WHERE IDCITAS = ?
        ");
        $stmtCita->bind_param('i', $idcita);
        $stmtCita->execute();

        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pago - GoldAge</title>
  <!-- FIX: un solo head, sin duplicados -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../css/navbar_auth.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/formulario.css">
</head>
<!-- FIX: un solo body -->
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

        <!-- Resumen de la cita -->
        <div class="cita-resumen" style="margin-bottom:1.5rem;padding:1rem;background:#f8f9fa;border-radius:8px;">
          <h3 style="margin:0 0 .5rem">Resumen de tu cita</h3>
          <p><strong>Servicio:</strong> <?= htmlspecialchars($cita['NOMBRE_SERVICIO']) ?></p>
          <p><strong>Profesional:</strong> <?= htmlspecialchars($cita['NOMBRE_COMPLETO']) ?></p>
          <p><strong>Fecha:</strong> <?= htmlspecialchars($cita['FECHA']) ?></p>
          <p><strong>Hora:</strong> <?= htmlspecialchars($cita['HORA']) ?></p>
          <p><strong>Total a pagar:</strong> $<?= number_format($monto, 2) ?></p>
        </div>

        <h2>YOUR PAYMENT DETAILS</h2>

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

        <!-- Mensaje de error -->
        <?php if ($error): ?>
          <div style="color:#c0392b;background:#fdecea;padding:.75rem 1rem;border-radius:6px;margin-bottom:1rem;">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <!-- FIX: formulario con action, method y name en cada input -->
        <form id="payment-form" action="formpago.php?id=<?= $idcita ?>&monto=<?= $monto ?>" method="POST">

          <ul class="form-list">
            <li class="form-list__row">
              <label>Nombre en la tarjeta</label>
              <!-- FIX: name="card_name" para que PHP lo reciba -->
              <input type="text" id="card-name" name="card_name" required>
            </li>

            <li class="form-list__row">
              <label>Número de tarjeta</label>
              <!-- FIX: name="cc_number" -->
              <input type="text" id="cc-number" name="cc_number" maxlength="19" required>
            </li>

            <li class="form-list__row form-list__row--inline">
              <div>
                <label>Expiración</label>
                <div class="form-list__input-inline">
                  <!-- FIX: names para mes y año -->
                  <input type="text" id="cc-month" name="cc_month" placeholder="MM" maxlength="2">
                  <input type="text" id="cc-year"  name="cc_year"  placeholder="YY" maxlength="2">
                </div>
              </div>
              <div>
                <label>CVC</label>
                <!-- FIX: name="cc_cvv" -->
                <input type="text" id="cc-cvv" name="cc_cvv" placeholder="123" maxlength="4">
              </div>
            </li>

            <li>
              <button type="submit" class="button">
                Pagar $<?= number_format($monto, 2) ?>
              </button>
            </li>
          </ul>

        </form>

      </div>
    </div>
  </div>

  <!-- MODAL ÉXITO -->
  <!-- FIX: se activa por PHP en vez de solo JS, así el estado en BD ya está guardado -->
  <div class="success-modal" id="success-modal" style="<?= $success ? 'display:flex' : 'display:none' ?>">
    <div class="success-box">
      <h3>¡Pago exitoso!</h3>
      <p>Tu cita ha sido confirmada correctamente.</p>
      <a href="mis_citas.php" class="button">Ver mis citas</a>
    </div>
  </div>

  <?php include '../footer.php'; ?>

  <script src="../js/main.js"></script>
  <script src="../js/navbar_auth.js"></script>
  <script src="../js/formulario.js"></script>

  <?php if ($success): ?>
  <script>
    // Mostrar modal de éxito si el pago fue procesado
    document.getElementById('success-modal').style.display = 'flex';
  </script>
  <?php endif; ?>

</body>
</html>