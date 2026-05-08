<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

$correo    = trim($_POST['correo']    ?? '');
$contrasena = trim($_POST['contrasena'] ?? '');

if (empty($correo) || empty($contrasena)) {
    header("Location: login.php?error=campos_vacios");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM USUARIO WHERE CORREO_USU = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    if (password_verify($contrasena, $user['CONTRASENA'])) {

        // ✅ Variables de sesión completas
        $_SESSION['usuario']    = $user['NOMBRE'];
        $_SESSION['rol']        = 'usuario';
        $_SESSION['idusuario']  = $user['IDUSUARIO'] ?? $user['ID'] ?? 0;

        // Redirigir a página de origen si venía de un acceso bloqueado
        $destino = $_SESSION['redirect_after_login'] ?? '../index.php';
        unset($_SESSION['redirect_after_login']);

        header("Location: " . $destino);
        exit();

    } else {
        header("Location: login.php?error=contrasena_incorrecta");
        exit();
    }

} else {
    header("Location: login.php?error=usuario_no_encontrado");
    exit();
}
?>
