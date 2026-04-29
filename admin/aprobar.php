<?php
session_start();

// 🔐 Protección básica (admin)
if (!isset($_SESSION['admin'])) {
    header("Location: ../login/login.php");
    exit();
}

include(__DIR__ . "/../login/conexion.php");

// Validar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido");
}

$id = intval($_GET['id']);

// (Opcional PRO) verificar que existe
$stmt = $conn->prepare("SELECT CORREO, NOMBRE_COMPLETO FROM EMPLEADOS WHERE IDEMPLEADO=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Empleado no encontrado");
}

$emp = $result->fetch_assoc();

// Actualizar estado
$stmt = $conn->prepare("UPDATE EMPLEADOS SET ESTADO='APROBADO' WHERE IDEMPLEADO=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    // 🔥 (opcional) aquí puedes enviar correo
    // enviarCorreo($emp['CORREO'], "Cuenta aprobada", "...");

    header("Location: admin.php");
    exit();

} else {
    echo "Error al aprobar";
}
?>