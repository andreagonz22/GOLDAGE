<?php
require_once __DIR__ . '/../auth_check.php';
if ($ga_rol !== 'empleado' && $ga_rol !== 'admin') {
    header("Location: ../index.php");
    exit();
}
include 'conexion.php';

$idcita     = (int)($_POST['id'] ?? 0);       // ← POST
$idempleado = (int)$_SESSION['idempleado'];
$estadosValidos = ['CONFIRMADA', 'CANCELADA'];
$nuevoEstado = strtoupper(trim($_POST['estado'] ?? ''));  // ← POST

if (!$idcita || !in_array($nuevoEstado, $estadosValidos)) {
    header("Location: citas_empleado.php?error=1");
    exit();
}

$stmt = $conn->prepare("
    UPDATE CITAS
    SET ESTADOCITA = ?
    WHERE IDCITAS = ?
      AND IDEMPLEADO = ?
      AND ESTADOCITA = 'PENDIENTE'
");
$stmt->bind_param('sii', $nuevoEstado, $idcita, $idempleado);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: citas_empleado.php?ok=1");
} else {
    header("Location: citas_empleado.php?error=1");
}
exit();