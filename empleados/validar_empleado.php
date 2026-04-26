<?php
session_start();
include("../login/conexion.php");

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$stmt = $conn->prepare("SELECT * FROM EMPLEADOS WHERE CORREO = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $emp = $result->fetch_assoc();

    if (password_verify($contrasena, $emp['CONTRASENA'])) {

        if ($emp['ESTADO'] != 'APROBADO') {
        die("Tu cuenta aún está en revisión por el administrador");
        }

        $_SESSION['empleado'] = $emp['NOMBRE_COMPLETO'];
        $_SESSION['profesion'] = $emp['PROFESION'];

        header("Location: ../index.php"); // o dashboard si haces uno
        exit();

    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Empleado no encontrado";
}
?>