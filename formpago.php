<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GOLDAGE</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/navbar_auth.css">
  <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="css/formulario.css">
</head>

<body>
  <!-- ===== NAVBAR ===== -->
  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="index.php" class="logo">
        <img src="img/logo.png" alt="GoldAge Logo" class="logo-img">
        <span class="logo-text">Gold<span class="logo-accent">Age</span></span>
      </a>
      <?php
        include __DIR__ . '/navbar_auth.php';
      ?>
    </div>
  </nav>
 

</head>

<body>

<div class="modal">

  <div class="modal__container">

    <div class="modal__content">

      <h2>YOUR PAYMENT DETAILS</h2>

      <!-- TARJETA -->

      <div class="credit-card">
<div class="chip">

  <div class="line-v1"></div>
  <div class="line-v2"></div>
  <div class="line-v3"></div>

  <div class="line-h1"></div>
  <div class="line-h2"></div>

  <div class="center"></div>

  <div class="diag1"></div>
  <div class="diag2"></div>
  <div class="diag3"></div>
  <div class="diag4"></div>

</div>

        <!-- LOGO -->
        <img id="card-logo" src="" alt="">

        <!-- NUMERO -->
        <div class="card-number" id="card-number-view">
          
        </div>

        <!-- DATOS -->
        <div class="card-bottom">

          <div>
           <small id="card-holder-label" class="card-holder-label">
  Card Holder
</small>
            <div id="card-name-view">YOUR NAME</div>
          </div>

          <div>
            <small>Expires</small>
            <div id="card-date-view">MM/YY</div>
          </div>

        </div>

      </div>

      <!-- FORMULARIO -->

      <form id="payment-form">

        <ul class="form-list">

          <li class="form-list__row">

            <label>Nombre</label>

            <input type="text" id="card-name" required>

          </li>

          <li class="form-list__row">

            <label>Número de tarjeta</label>

            <input type="text" id="cc-number" maxlength="19" required>

          </li>

          <li class="form-list__row form-list__row--inline">

            <div>

              <label>Expiración</label>

              <div class="form-list__input-inline">

                <input type="text" id="cc-month" placeholder="MM" maxlength="2">

                <input type="text" id="cc-year" placeholder="YY" maxlength="2">

              </div>

            </div>

            <div>

              <label>CVC</label>

              <input type="text" id="cc-cvv" placeholder="123">

            </div>

          </li>

          <li>

            <button type="submit" class="button">
              Pay Now
            </button>

          </li>

        </ul>

      </form>

    </div>

  </div>

</div>

<!-- MODAL EXITO -->

<div class="success-modal" id="success-modal">

  <div class="success-box">

    <h3>Pago Exitoso</h3>

    <p>Tu pago ha sido procesado correctamente.</p>

    <button id="close-success">
      Cerrar
    </button>

  </div>

</div>
  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>
  <!-- ===== SCRIPTS ===== -->
  <script src="js/main.js"></script>
  <!-- Script del menú de autenticación (NUEVO) -->
  <script src="js/navbar_auth.js"></script>
<script src="formulario.js"></script>

</body>
</html>