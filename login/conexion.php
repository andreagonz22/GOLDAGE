<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = "";
$db = "usuarios";

//Eliminar los numeros ´paa que les funcione con el puerto 3306
$conn = new mysqli("127.0.0.1", "root", "", "usuarios", 3307);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear BD si no existe
$conn->query("CREATE DATABASE IF NOT EXISTS $db");

// Seleccionar BD
$conn->select_db($db);

$conn->set_charset("utf8");
?>