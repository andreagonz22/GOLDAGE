<?php

require_once __DIR__ . '/../auth_check.php';
if ($ga_rol !== 'empleado' && $ga_rol !== 'admin') {
    header("Location: ../index.php");
    exit();
}
include 'conexion.php';

$idempleado=(int)$_SESSION['idempleado'];
$stmt=$conn->prepare("SELECT * FROM CITAS WHERE IDEMPLEADO=? ORDER BY FECHA,HORA");
$stmt->bind_param('i',$idempleado);
$stmt->execute();
$res=$stmt->get_result();
while($row=$res->fetch_assoc()){
 echo $row['FECHA'].' '.$row['HORA'].' - '.$row['ESTADOCITA'].'<br>';
}