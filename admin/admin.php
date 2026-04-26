<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include("conexion.php");

// Traer empleados
$result = $conn->query("SELECT * FROM EMPLEADOS ORDER BY IDEMPLEADO DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin</title>
</head>
<body>

<h2>Panel de Administración</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Profesión</th>
    <th>Título</th>
    <th>Estado</th>
    <th>Acciones</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>

<tr>
    <td><?php echo $row['NOMBRE_COMPLETO']; ?></td>
    <td><?php echo $row['CORREO']; ?></td>
    <td><?php echo $row['PROFESION']; ?></td>

    <td>
        <?php if ($row['TITULO_PDF']) { ?>
            <a href="<?php echo $row['TITULO_PDF']; ?>" target="_blank">Ver PDF</a>
        <?php } else { echo "No disponible"; } ?>
    </td>

    <td><?php echo $row['ESTADO']; ?></td>

    <td>
        <a href="aprobar.php?id=<?php echo $row['IDEMPLEADO']; ?>">Aprobar</a> |
        <a href="rechazar.php?id=<?php echo $row['IDEMPLEADO']; ?>">Rechazar</a>
    </td>
</tr>

<?php endwhile; ?>

</table>

</body>
</html>