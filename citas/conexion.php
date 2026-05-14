<?php
$host='localhost';
$user='root';
$pass='';
$db='usuarios';
//Eliminar los numeros ´paa que les funcione con el puerto 3306
$conn=new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");