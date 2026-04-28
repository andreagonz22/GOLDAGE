<?php
include("conexion.php");

$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$contrasena = trim($_POST['contrasena']);
$contacto = trim($_POST['contacto']);
$correo = trim($_POST['correo']);

if (empty($nombre) || empty($apellido) || empty($contrasena) || empty($correo)) {
    die("Campos obligatorios");
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Correo inválido");
}

// Hash
$passwordHash = password_hash($contrasena, PASSWORD_DEFAULT);

// Insert
$stmt = $conn->prepare("INSERT INTO USUARIO (NOMBRE, APELLIDO, CONTRASENA, CONTACTO_USUA, CORREO_USU) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombre, $apellido, $passwordHash, $contacto, $correo);

if ($stmt->execute()) {
    header("Location: /GOLDAGE/index.html");
} else {
    if ($conn->errno == 1062) {
        echo "Correo ya registrado";
    } else {
        echo "Error";
    }
}
?>