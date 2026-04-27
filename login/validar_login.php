<?php
session_start();
include("conexion.php"); 

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$stmt = $conn->prepare("SELECT * FROM USUARIO WHERE CORREO_USU = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    if (password_verify($contrasena, $user['CONTRASENA'])) {

        $_SESSION['usuario'] = $user['NOMBRE'];

        // 🔥 AQUÍ REDIRIGES A TU INDEX
        header("Location: ../index.html");
        exit();

    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}
?>