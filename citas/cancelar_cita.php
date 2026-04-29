<?php session_start(); include 'conexion.php';
$id=(int)($_GET['id']??0);
$idusuario=(int)$_SESSION['idusuario'];
$stmt=$conn->prepare("UPDATE CITAS SET ESTADOCITA='CANCELADA' WHERE IDCITAS=? AND IDUSUARIO=?");
$stmt->bind_param('ii',$id,$idusuario);
$stmt->execute();
header('Location: mis_citas.php'); exit();