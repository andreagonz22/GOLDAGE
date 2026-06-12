<?php
session_start();
include("../login/conexion.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login_empleado.php");
    exit();
}

$correo    = $_POST['correo']    ?? '';
$contrasena = $_POST['contrasena'] ?? '';

if (empty($correo) || empty($contrasena)) {
    die("Datos no recibidos correctamente");
}

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

        // ✅ Variables de sesión completas
        $_SESSION['empleado']   = $emp['NOMBRE_COMPLETO'];
        $_SESSION['profesion']  = $emp['PROFESION'];
        $_SESSION['rol'] = $emp['ROL'];
        $_SESSION['idempleado'] = $emp['IDEMPLEADO'];

        // Redirigir a página de origen si venía de un acceso bloqueado
        $destino = $_SESSION['redirect_after_login'] ?? '../index.php';
        unset($_SESSION['redirect_after_login']);

        header("Location: " . $destino);
        exit();

    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Empleado no encontrado";
}
?>
