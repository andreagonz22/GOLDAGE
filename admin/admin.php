<?php
require_once __DIR__ . '/../auth_check.php';
if ($ga_rol !== 'admin') {
    header("Location: ../index.php");
    exit();
}
include(__DIR__ . "/../login/conexion.php");

$result = $conn->query("SELECT * FROM EMPLEADOS ORDER BY IDEMPLEADO DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Panel Admin – GoldAge</title>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="admin-wrapper">
  <a href="../index.html" class="register-logo">🌿 Gold<em>Age</em></a>
  <div class="admin-header">
    <h2>Panel de Administración</h2>
    <p class="subtitle">Gestión y verificación de empleados registrados</p>
  </div>

  <div class="admin-card">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Profesión</th>
          <th>Título</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()):
          $estado = strtolower($row['ESTADO']);
          $claseEstado = match($estado) {
            'aprobado'  => 'estado-aprobado',
            'rechazado' => 'estado-rechazado',
            default     => 'estado-pendiente'
          };
        ?>
        <tr>
          <td><strong><?= htmlspecialchars($row['NOMBRE_COMPLETO']) ?></strong></td>
          <td><?= htmlspecialchars($row['CORREO']) ?></td>
          <td><?= htmlspecialchars($row['PROFESION']) ?></td>
          <td>
            <?php if ($row['TITULO_PDF']): ?>
              <a href="<?= htmlspecialchars($row['TITULO_PDF']) ?>" target="_blank" class="btn-pdf">📄 Ver PDF</a>
            <?php else: ?>
              <span class="no-pdf">No disponible</span>
            <?php endif; ?>
          </td>
          <td>
            <span class="estado-badge <?= $claseEstado ?>">
              <?= htmlspecialchars($row['ESTADO']) ?>
            </span>
          </td>
          <td>
            <div class="actions">
              <a href="aprobar.php?id=<?= $row['IDEMPLEADO'] ?>" class="btn-aprobar">Aprobar</a>
              <a href="rechazar.php?id=<?= $row['IDEMPLEADO'] ?>" class="btn-rechazar">Rechazar</a>
            </div>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>