<?php
session_start();
include 'conexion.php';

if(!isset($_SESSION['idusuario'])) die('Debes iniciar sesión');
if($_SERVER['REQUEST_METHOD']!=='POST') die('Acceso inválido');

$fecha=$_POST['fecha']??'';
$hora=$_POST['hora']??'';
$duracion=trim($_POST['duracion']??'');
$direccion=trim($_POST['direccion']??'');
$idempleado=(int)($_POST['idempleado']??0);
$idusuario=(int)$_SESSION['idusuario'];

if(!$fecha||!$hora||!$duracion||!$direccion||!$idempleado) die('Datos incompletos');
$stmt=$conn->prepare("SELECT IDCITAS FROM CITAS WHERE IDEMPLEADO=? AND FECHA=? AND HORA=? AND ESTADOCITA IN ('PENDIENTE','CONFIRMADA')");
$stmt->bind_param('iss',$idempleado,$fecha,$hora);
$stmt->execute();
if($stmt->get_result()->num_rows>0) die('Horario no disponible');
$stmt=$conn->prepare("INSERT INTO CITAS(FECHA,HORA,DURACION,DIRECCION,IDEMPLEADO,IDUSUARIO) VALUES(?,?,?,?,?,?)");
$stmt->bind_param('ssssii',$fecha,$hora,$duracion,$direccion,$idempleado,$idusuario);
$stmt->execute();
$stmt->execute();

// Obtener ID de la cita creada
$idcita = $conn->insert_id;

// Crear pago pendiente
$monto = 25.00; // ejemplo

$metodo = "TARJETA";

$stmtPago = $conn->prepare("
INSERT INTO PAGOS (
IDCITAS,
MONTO,
METODO_PAGO
)
VALUES (?, ?, ?)
");

$stmtPago->bind_param(
"ids",
$idcita,
$monto,
$metodo
);

$stmtPago->execute();

// Redirigir a pago
header("Location: pago.php?id=" . $idcita);
exit();