<?php session_start(); include 'conexion.php';
$idusuario=(int)$_SESSION['idusuario'];
$stmt=$conn->prepare("SELECT c.*,e.NOMBRE_COMPLETO FROM CITAS c JOIN EMPLEADOS e ON c.IDEMPLEADO=e.IDEMPLEADO WHERE c.IDUSUARIO=? ORDER BY FECHA DESC,HORA DESC");
$stmt->bind_param('i',$idusuario);
$stmt->execute();
$res=$stmt->get_result();
while($row=$res->fetch_assoc()){
 echo $row['FECHA'].' '.$row['HORA'].' - '.$row['NOMBRE_COMPLETO'].' - '.$row['ESTADOCITA'];
 echo " <a href='cancelar_cita.php?id={$row['IDCITAS']}'>Cancelar</a><br>";
}