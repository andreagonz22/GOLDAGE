<?php
include("../login/conexion.php");

$nombre = trim($_POST['nombre']);
$dui = trim($_POST['dui']);
$correo = trim($_POST['correo']);
$telefono = trim($_POST['telefono']);
$profesion = $_POST['profesion'];
$licencia = trim($_POST['licencia']);
$titulo = trim($_POST['titulo']);
$contrasena = trim($_POST['contrasena']);

$archivo = $_FILES['titulo_pdf'];

// Validaciones básicas
if (empty($nombre) || empty($dui) || empty($correo) || empty($telefono) || empty($profesion) || empty($contrasena)) {
    die("Campos obligatorios incompletos");
}
// Validar correo
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Correo inválido");
}
//  Validación importante
if (($profesion == "MEDICO" || $profesion == "ENFERMERO") && $archivo['error'] == 4) {
    die("Debes subir el título en PDF");
}
// Validar archivo
$rutaDestino = NULL;

if ($archivo['error'] == 0) {

    $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

    if ($ext != "pdf") {
        die("Solo se permiten archivos PDF");
    }

    if ($archivo['size'] > 2 * 1024 * 1024) {
        die("El archivo es demasiado grande (máx 2MB)");
    }

    // Nombre único
    $nombreArchivo = uniqid() . ".pdf";

    $rutaDestino = "../uploads/" . $nombreArchivo;

    if (!move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        die("Error al subir archivo");
    }
}

// Hash contraseña
$passwordHash = password_hash($contrasena, PASSWORD_DEFAULT);

// Insert
$stmt = $conn->prepare("INSERT INTO EMPLEADOS 
(NOMBRE_COMPLETO, DUI, CORREO, TELEFONO, PROFESION, NUM_LICENCIA, TITULO, TITULO_PDF, CONTRASENA)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssss", $nombre, $dui, $correo, $telefono, $profesion, $licencia, $titulo, $rutaDestino, $passwordHash);

if ($stmt->execute()) {
    header("Location: login_empleado.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>