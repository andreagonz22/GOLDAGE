<?php
include("conexion.php");

$id = $_GET['id'];

$stmt = $conn->prepare("UPDATE EMPLEADOS SET ESTADO='APROBADO' WHERE IDEMPLEADO=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: admin.php");
exit();
?>