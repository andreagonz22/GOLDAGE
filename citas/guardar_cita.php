<?php
session_start();
include 'conexion.php';

// 1. Verificar sesión
if (!isset($_SESSION['idusuario'])) die('Debes iniciar sesión');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') die('Acceso inválido');

// 2. Recoger y sanear datos
$fecha      = trim($_POST['fecha']       ?? '');
$hora       = trim($_POST['hora']        ?? '');
$direccion  = trim($_POST['direccion']   ?? '');
$idempleado = (int)($_POST['idempleado'] ?? 0);
$idservicio = (int)($_POST['idservicio'] ?? 0);
$idusuario  = (int)$_SESSION['idusuario'];

// 3. Validar campos
if (!$fecha || !$hora || !$direccion || !$idempleado || !$idservicio) {
    die('Datos incompletos');
}

// 4. Obtener DURACION y PRECIO del servicio
$stmtSrv = $conn->prepare("SELECT DURACION, PRECIO FROM SERVICIOS WHERE IDSERVICIOS = ?");
$stmtSrv->bind_param('i', $idservicio);
$stmtSrv->execute();
$srv = $stmtSrv->get_result()->fetch_assoc();

if (!$srv) die('Servicio no válido');

$duracion = $srv['DURACION'];
$monto    = $srv['PRECIO'];

// 5. Verificar disponibilidad del profesional
$stmtCheck = $conn->prepare("
    SELECT IDCITAS FROM CITAS
    WHERE IDEMPLEADO = ?
      AND FECHA      = ?
      AND HORA       = ?
      AND ESTADOCITA IN ('PENDIENTE', 'CONFIRMADA')
");
$stmtCheck->bind_param('iss', $idempleado, $fecha, $hora);
$stmtCheck->execute();

if ($stmtCheck->get_result()->num_rows > 0) {
    die('Horario no disponible para ese profesional');
}

// 6. Calcular fecha límite (el doctor tiene 24 horas para responder)
$fechaLimite = date('Y-m-d H:i:s', strtotime('+24 hours'));

// 7. Insertar la cita en estado PENDIENTE
$stmtCita = $conn->prepare("
    INSERT INTO CITAS (FECHA, HORA, DURACION, DIRECCION, IDEMPLEADO, IDUSUARIO, IDSERVICIOS, ESTADOCITA, FECHA_LIMITE_CONFIRMACION)
    VALUES (?, ?, ?, ?, ?, ?, ?, 'PENDIENTE', ?)
");

if (!$stmtCita) die('Error prepare cita: ' . $conn->error);

$stmtCita->bind_param('ssssiiis', $fecha, $hora, $duracion, $direccion, $idempleado, $idusuario, $idservicio, $fechaLimite);
$stmtCita->execute();

$idcita = $conn->insert_id;
if (!$idcita) die('Error al crear la cita');

// 8. Crear pago en estado RESERVADO (no cobrado aún)
$stmtPago = $conn->prepare("
    INSERT INTO PAGOS (IDCITAS, MONTO, METODO_PAGO, ESTADO_PAGO)
    VALUES (?, ?, 'TARJETA', 'RESERVADO')
");

if (!$stmtPago) die('Error prepare pago: ' . $conn->error);

$stmtPago->bind_param('id', $idcita, $monto);
$stmtPago->execute();

// 9. Redirigir al formulario de pago
header("Location: formpago.php?id=" . $idcita . "&monto=" . $monto);
exit();