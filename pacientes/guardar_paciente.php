<?php
session_start();
include(__DIR__ . "/../login/conexion.php");

// Validar método
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: registro_paciente.php");
    exit();
}

// Sanitizar
$nombre   = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$edad     = intval($_POST['edad'] ?? 0);
$genero   = $_POST['genero'] ?? '';
$direccion= trim($_POST['direccion'] ?? '');
$enf      = trim($_POST['enfermedades'] ?? '');
$alerg    = trim($_POST['alergias'] ?? '');
$meds     = trim($_POST['medicamentos'] ?? '');
$mov      = $_POST['movilidad'] ?? '';
$idusuario= intval($_POST['idusuario'] ?? 0);

// Validaciones
if (!$nombre || !$apellido || $edad <= 0 || !$genero || !$mov || $idusuario <= 0) {
    die("Datos obligatorios incompletos");
}

$generos_validos = ['Hombre','Mujer'];
$mov_validos = ['INDEPENDIENTE','CON AYUDA','POSTRADOS'];

if (!in_array($genero, $generos_validos) || !in_array($mov, $mov_validos)) {
    die("Valores inválidos");
}

// Insert seguro
$stmt = $conn->prepare("INSERT INTO PACIENTE 
(NOMBRE_PAC, APELLIDO_PAC, EDAD_PAC, GENERO, DIRECCION, ENFERMEDADES, ALERGIAS, MEDICAMENTOS_ACTIVOS, NIVELDEMOVILIDAD, IDUSUARIO)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param(
    "ssissssssi",
    $nombre,
    $apellido,
    $edad,
    $genero,
    $direccion,
    $enf,
    $alerg,
    $meds,
    $mov,
    $idusuario
);

if ($stmt->execute()) {
    echo "Paciente registrado correctamente";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();