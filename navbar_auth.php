<?php
/**
 * navbar_auth.php
 * Archivo: /Gold/GOLDAGE/navbar_auth.php
 *
 * CÓMO USAR:
 * En cualquier página PHP, reemplaza el bloque <ul class="nav-links">...</ul>
 * y el <button class="hamburger"> por:
 *
 *   <?php include __DIR__ . '/navbar_auth.php'; ?>   (desde raíz del proyecto)
 *   <?php include __DIR__ . '/../navbar_auth.php'; ?> (desde subcarpeta)
 *
 * En páginas HTML estáticas: convierte el archivo a .php y usa include.
 * (Solo el archivo index.html necesita renombrarse a index.php)
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$ga_logueado  = isset($_SESSION['usuario']) || isset($_SESSION['empleado']) || isset($_SESSION['admin']);
$ga_nombre    = $_SESSION['usuario'] ?? $_SESSION['empleado'] ?? $_SESSION['admin'] ?? '';
$ga_rol_nav   = isset($_SESSION['admin'])    ? 'admin'    :
               (isset($_SESSION['empleado']) ? 'empleado' : 'usuario');

// Determinar la ruta base relativa según el archivo actual
// Detectamos la profundidad comparando la ruta del archivo con el DOCUMENT_ROOT
$__current   = str_replace('\\', '/', __DIR__);
$__docroot   = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$__rel_path  = ltrim(str_replace($__docroot, '', $__current), '/');
$__depth     = substr_count($__rel_path, '/');
// Gold/GOLDAGE = depth 1  →  prefix = ''
// Gold/GOLDAGE/citas = depth 2  →  prefix = '../'
$__prefix = str_repeat('../', max(0, $__depth - 1));
?>

      <!-- ===== NAV LINKS (dinámico con sesión) ===== -->
      <ul class="nav-links" id="navLinks">
        <li><a href="<?= $__prefix ?>index.php" class="nav-link">Home</a></li>
        <li><a href="<?= $__prefix ?>services.php" class="nav-link">Services</a></li>
        <li><a href="<?= $__prefix ?>nurses.php" class="nav-link">Nurses</a></li>
        <li><a href="<?= $__prefix ?>about.php" class="nav-link">About Us</a></li>
        <li><a href="<?= $__prefix ?>contact.php" class="nav-link">Contact Us</a></li>

        <?php if ($ga_logueado): ?>
          <!-- ===== MENÚ PERFIL (sesión activa) ===== -->
          <li class="nav-profile-wrap">
            <button class="nav-profile-btn" id="gaProfileBtn" aria-expanded="false" aria-haspopup="true">
              <span class="nav-avatar">
                <i class="fa-solid fa-circle-user"></i>
              </span>
              <span class="nav-username"><?= htmlspecialchars($ga_nombre) ?></span>
              <i class="fa-solid fa-chevron-down nav-chevron"></i>
            </button>

            <div class="nav-dropdown" id="gaDropdown" role="menu">
              <div class="nav-dropdown-header">
                <span class="nav-dd-role"><?= ucfirst($ga_rol_nav) ?></span>
                <span class="nav-dd-name"><?= htmlspecialchars($ga_nombre) ?></span>
              </div>
              <div class="nav-dropdown-body">
                <?php if ($ga_rol_nav === 'usuario'): ?>
                  <a href="<?= $__prefix ?>pacientes/registro_paciente.php" class="nav-dd-item" role="menuitem">
                    <i class="fa-solid fa-user"></i> Mi perfil
                  </a>
                  <a href="<?= $__prefix ?>citas/mis_citas.php" class="nav-dd-item" role="menuitem">
                    <i class="fa-solid fa-calendar-check"></i> Mis citas
                  </a>
                  <a href="<?= $__prefix ?>citas/agendar.php" class="nav-dd-item" role="menuitem">
                    <i class="fa-solid fa-calendar-plus"></i> Agendar cita
                  </a>
                <?php elseif ($ga_rol_nav === 'empleado'): ?>
                  <a href="<?= $__prefix ?>citas/panel_empleado.php" class="nav-dd-item" role="menuitem">
                    <i class="fa-solid fa-briefcase-medical"></i> Panel de citas
                  </a>
                <?php elseif ($ga_rol_nav === 'admin'): ?>
                  <a href="<?= $__prefix ?>admin/admin.php" class="nav-dd-item" role="menuitem">
                    <i class="fa-solid fa-shield-halved"></i> Panel admin
                  </a>
                <?php endif; ?>
              </div>
              <div class="nav-dropdown-footer">
                <a href="<?= $__prefix ?><?= ($ga_rol_nav === 'empleado') ? 'empleados/logout.php' : 'login/logout.php' ?>"
                   class="nav-dd-item nav-dd-logout" role="menuitem">
                  <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                </a>
              </div>
            </div>
          </li>

        <?php else: ?>
          <!-- ===== BOTÓN LOGIN (sin sesión) ===== -->
          <li>
            <a href="<?= $__prefix ?>login/login.php" class="nav-link nav-btn-login">
              <i class="fa-solid fa-right-to-bracket"></i>
              Iniciar sesión
            </a>
          </li>
        <?php endif; ?>
      </ul>

      <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
