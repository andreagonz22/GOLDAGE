<?php
/*Este archivo verifica si hay sesión activa*/
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Determinar si el usuario tiene sesión activa (usuario O empleado)
$session_activa = isset($_SESSION['usuario']) || isset($_SESSION['empleado']) || isset($_SESSION['admin']);

if (!$session_activa) {
    // Guardar la URL a la que intentaba acceder para redirigir después del login
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];

    // Mostrar modal de acceso bloqueado y detener ejecución
    $page_title = "Acceso restringido – GoldAge";
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title><?= $page_title ?></title>
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
      <script>
        // Calcular la ruta relativa al CSS según cuántos niveles de carpeta hay
        (function() {
          var depth = window.location.pathname.split('/').filter(Boolean).length;
          // /Gold/GOLDAGE/archivo.php = depth 3 → '../css/styles.css' no, necesitamos relativo
          // Se resuelve con el CSS inline abajo para independencia de ruta
        })();
      </script>
      <style>
        :root {
          --mint:      #4ce7da;
          --mint-dark: #80cbc4;
          --blue-dark: #213448;
          --beige:     #f8faf7;
          --text:      #2d3748;
          --text-light:#718096;
          --radius:    16px;
          --shadow:    0 4px 24px rgba(0,0,0,0.08);
          --shadow-lg: 0 12px 40px rgba(0,0,0,0.12);
          --transition:0.3s cubic-bezier(0.4,0,0.2,1);
          --font:      'Poppins', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
          font-family: var(--font);
          background: var(--beige);
          display: flex; align-items: center; justify-content: center;
          min-height: 100vh;
          padding: 20px;
        }

        /* ---- OVERLAY ---- */
        .ga-overlay {
          position: fixed; inset: 0;
          background: rgba(33, 52, 72, 0.55);
          backdrop-filter: blur(6px);
          display: flex; align-items: center; justify-content: center;
          z-index: 9999;
          animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        /* ---- MODAL CARD ---- */
        .ga-modal {
          background: #fff;
          border-radius: 24px;
          padding: 44px 40px 36px;
          max-width: 420px;
          width: 100%;
          box-shadow: var(--shadow-lg);
          text-align: center;
          animation: slideUp 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        @keyframes slideUp {
          from { opacity: 0; transform: translateY(28px); }
          to   { opacity: 1; transform: translateY(0); }
        }

        /* ---- ICONO ---- */
        .ga-modal-icon {
          width: 72px; height: 72px;
          background: linear-gradient(135deg, #4adfd2 0%, #80cbc4 100%);
          border-radius: 50%;
          display: flex; align-items: center; justify-content: center;
          margin: 0 auto 20px;
        }
        .ga-modal-icon i { font-size: 32px; color: #fff; }

        /* ---- TEXTO ---- */
        .ga-modal h2 {
          font-size: 1.35rem; font-weight: 700;
          color: var(--blue-dark); margin-bottom: 10px;
        }
        .ga-modal p {
          font-size: 0.92rem; color: var(--text-light);
          line-height: 1.6; margin-bottom: 28px;
        }
        .ga-modal p strong { color: var(--text); font-weight: 600; }

        /* ---- BOTONES ---- */
        .ga-btn-group {
          display: flex; gap: 12px; flex-direction: column;
        }
        .ga-btn {
          display: inline-flex; align-items: center; justify-content: center; gap: 8px;
          padding: 13px 24px;
          border-radius: 12px;
          font-family: var(--font);
          font-size: 14px; font-weight: 600;
          cursor: pointer; border: none;
          transition: var(--transition);
          text-decoration: none;
          width: 100%;
        }
        .ga-btn-primary {
          background: var(--mint-dark);
          color: #fff;
          box-shadow: 0 4px 14px rgba(128,203,196,0.35);
        }
        .ga-btn-primary:hover {
          background: #4adfd2;
          transform: translateY(-2px);
          box-shadow: 0 6px 20px rgba(76,231,218,0.4);
        }
        .ga-btn-secondary {
          background: transparent;
          color: var(--text-light);
          border: 2px solid #e2e8f0;
        }
        .ga-btn-secondary:hover {
          border-color: var(--mint-dark);
          color: var(--mint-dark);
          transform: translateY(-1px);
        }

        /* ---- DIVIDER ---- */
        .ga-divider {
          display: flex; align-items: center; gap: 10px;
          margin: 18px 0 16px;
          color: #cbd5e0; font-size: 12px;
        }
        .ga-divider::before, .ga-divider::after {
          content: ''; flex: 1; height: 1px; background: #e2e8f0;
        }

        /* ---- LINK EMPLEADO ---- */
        .ga-emp-link {
          font-size: 12px; color: var(--text-light);
          text-decoration: none;
          display: inline-flex; align-items: center; gap: 5px;
        }
        .ga-emp-link:hover { color: var(--mint-dark); }

        @media (max-width: 480px) {
          .ga-modal { padding: 32px 24px 28px; }
        }
      </style>
    </head>
    <body>

      <div class="ga-overlay" id="gaOverlay">
        <div class="ga-modal" role="dialog" aria-modal="true" aria-labelledby="gaModalTitle">

          <div class="ga-modal-icon">
            <i class="fa-solid fa-lock"></i>
          </div>

          <h2 id="gaModalTitle">Acceso restringido</h2>
          <p>
            Debes iniciar sesión para acceder a esta sección.<br>
            Ingresa como <strong>Usuario</strong> o <strong>Empleado</strong>.
          </p>

          <div class="ga-btn-group">
            <a href="/Gold/GOLDAGE/login/login.php" class="ga-btn ga-btn-primary">
              <i class="fa-solid fa-right-to-bracket"></i>
              Iniciar sesión
            </a>
            <button class="ga-btn ga-btn-secondary" onclick="history.back()">
              <i class="fa-solid fa-arrow-left"></i>
              Cancelar
            </button>
          </div>

          <div class="ga-divider">o</div>

          <a href="/Gold/GOLDAGE/empleados/login_empleado.php" class="ga-emp-link">
            <i class="fa-solid fa-id-badge"></i>
            Soy empleado / profesional de salud
          </a>

        </div>
      </div>

    </body>
    </html>
    <?php
    exit();
}

// Si llegó aquí, hay sesión activa. Definir variables útiles globales.
$ga_usuario   = $_SESSION['usuario']  ?? null;
$ga_empleado  = $_SESSION['empleado'] ?? null;
$ga_admin     = $_SESSION['admin']    ?? null;
$ga_rol       = $_SESSION['rol']      ?? (
    $ga_admin   ? 'admin'    :
   ($ga_empleado ? 'empleado' : 'usuario')
);
?>
