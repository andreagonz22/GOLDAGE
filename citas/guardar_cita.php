<?php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include 'conexion.php';

// 1. Verificar sesión
if (!isset($_SESSION['idusuario'])) die('Debes iniciar sesión');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') die('Acceso inválido');

// 2. Recoger y sanear datos del POST
$fecha      = trim($_POST['fecha'] ?? '');
$hora       = trim($_POST['hora'] ?? '');
$hora       = $hora . ":00";
$direccion  = trim($_POST['direccion'] ?? '');
$idempleado = (int)($_POST['idempleado'] ?? 0);
$idservicio = (int)($_POST['idservicio'] ?? 0);
$idusuario  = (int)$_SESSION['idusuario'];

// 3. Validar que ningún campo esté vacío
if (!$fecha || !$hora || !$direccion || !$idempleado || !$idservicio) {
    die('Datos incompletos');
}

// 4. Obtener DURACION y PRECIO del servicio seleccionado  (FIX: antes eran hardcodeados)
$stmtSrv = $conn->prepare("SELECT DURACION, PRECIO FROM SERVICIOS WHERE IDSERVICIOS = ?");
$stmtSrv->bind_param('i', $idservicio);
$stmtSrv->execute();
$srv = $stmtSrv->get_result()->fetch_assoc();

if (!$srv) die('Servicio no válido');

$duracion = $srv['DURACION'];
$monto    = $srv['PRECIO'];

// 5. Verificar disponibilidad del profesional en ese horario
$stmtCheck = $conn->prepare("
    SELECT IDCITAS FROM CITAS
    WHERE IDEMPLEADO = ?
      AND FECHA = ?
      AND HORA  = ?
      AND ESTADOCITA IN ('PENDIENTE','CONFIRMADA')
");
$stmtCheck->bind_param('iss', $idempleado, $fecha, $hora);
$stmtCheck->execute();

if ($stmtCheck->get_result()->num_rows > 0) {
    die('Horario no disponible para ese profesional');
}

// 6. Insertar la cita   (FIX: se eliminó el execute() duplicado, se agregó IDSERVICIOS)
$stmtCita = $conn->prepare("
    INSERT INTO CITAS (FECHA, HORA, DURACION, DIRECCION, IDEMPLEADO, IDUSUARIO, IDSERVICIOS)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

// Agrega estas dos líneas:
if (!$stmtCita) {
    die('Error en prepare: ' . $conn->error);
}
$stmtCita->bind_param('ssssiii', $fecha, $hora, $duracion, $direccion, $idempleado, $idusuario, $idservicio);
$stmtCita->execute();    // FIX: solo un execute()

$idcita = $conn->insert_id;

if (!$idcita) die('Error al crear la cita');

// 7. Crear registro de pago pendiente  (FIX: monto real desde SERVICIOS, metodo se guarda como NULL/pendiente)
$stmtPago = $conn->prepare("
    INSERT INTO PAGOS (IDCITAS, MONTO, METODO_PAGO, ESTADO_PAGO)
    VALUES (?, ?, 'PENDIENTE', 'PENDIENTE')
");
$stmtPago->bind_param('id', $idcita, $monto);
$stmtPago->execute();

// 8. Redirigir al formulario de pago   (FIX: nombre correcto del archivo)
header("Location: formpago.php?id=" . $idcita . "&monto=" . $monto);
exit();