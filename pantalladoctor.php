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
  <link rel="stylesheet" href="css/styles.css" />
  <!-- Font Awesome (ICONOS PRO) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- CSS del menú de autenticación (NUEVO — no toca styles.css) -->
  <link rel="stylesheet" href="css/navbar_auth.css">
  <link rel="stylesheet" href="css/pantalladoctor.css">
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
 

<button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>


<!-- HERO -->
<section class="hero">
    <div class="hero-text">
        <h1>Welcome Dr. Perez</h1>
        <p>Manage your appointments easily</p>
    </div>
</section>

<!-- MAIN CONTENT -->
<div class="main-container">

    <!-- LEFT CONTENT -->
    <div class="content">

        <!-- STATS -->
        <div class="stats">

            <div class="stat-box">
                <h3>12</h3>
                <p>Pending</p>
            </div>

            <div class="stat-box">
                <h3>48</h3>
                <p>Completed</p>
            </div>

            <div class="stat-box">
                <h3>5</h3>
                <p>Today</p>
            </div>

        </div>

        <div class="card">
            <h2>Pending Appointments</h2>
            <p>View all upcoming patient consultations.</p>
            <a href="#">More</a>
        </div>

        <div class="card">
            <h2>Completed Appointments</h2>
            <p>Check your finished consultations.</p>
            <a href="#">More</a>
        </div>

        <div class="card">
            <h2>Scheduled Appointments</h2>
            <p>Manage your scheduled calendar.</p>
            <a href="#">More</a>
        </div>

    </div>

</div> 

<!-- FOOTER -->
<!-</div> <!-- main-container -->

<!-- ===== FOOTER ===== -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="index.html" class="logo"><span class="logo-icon">🌿</span><span class="logo-text">Gold<span class="logo-accent">Age</span></span></a>
          <p>Home health care with heart. We care for those you love most with professionalism and warmth.</p>
        </div>
        <div class="footer-links">
          <h5>Navegación</h5>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="nurses.html">Nurses</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h5>Servicios</h5>
          <ul>
            <li><a href="services.html">24/7 Attention</a></li>
            <li><a href="services.html">General Consultations</a></li>
            <li><a href="services.html">Geriatrics</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h5>Contacto</h5>
          <p> hola@goldage.com</p>
          <p> +503 7000-0000</p>
          <p>San Salvador, El Salvador</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2025 GoldAge. All rights reserved.</p>
      </div>
    </div>
  </footer>
 
  <script src="js/main.js"
 
 
  ></script>
</body>
</html>
