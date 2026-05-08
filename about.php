<?php
require_once __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us – GoldAge</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/about.css" />
</head>
<body>

  <!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <div class="nav-container">

    <!-- LOGO PRO -->
    <a href="index.php" class="logo">
      <img src="img/logo.png" alt="GoldAge Logo" class="logo-img">
      <span class="logo-text">Gold<span class="logo-accent">Age</span></span>
    </a>

    <!-- LINKS -->
    <ul class="nav-links" id="navLinks">
      <li><a href="index.php" class="nav-link">Home</a></li>
      <li><a href="services.php" class="nav-link">Services</a></li>
      <li><a href="nurses.php" class="nav-link">Nurses</a></li>
      <li><a href="about.php" class="nav-link active">About Us</a></li>
      <li><a href="contact.php" class="nav-link">Contact Us</a></li>
    </ul>

    <!-- HAMBURGER -->
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>

  </div>
</nav>
  <!-- PAGE HERO -->
  <section class="page-hero about-hero">
    <div class="page-hero-content fade-in">
      <span class="hero-badge">Nuestra Historia</span>
      <h1>Nació del amor<br /><em>por la familia</em></h1>
      <p>GoldAge surgió de la necesidad de brindar atención médica digna y cercana para adultos mayores en El Salvador.</p>
    </div>
    <div class="hero-wave">
      <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#f8faf7"/>
      </svg>
    </div>
  </section>

  <!-- MISSION / VISION -->
  <section class="mv-section section">
    <div class="container">
      <div class="mv-grid">
        <div class="mv-card scroll-reveal">
          <div class="mv-icon">🎯</div>
          <h3>Misión</h3>
          <p>Brindar servicios de salud domiciliaria de excelencia, con calidez humana y tecnología moderna, para mejorar la calidad de vida de cada paciente y su familia.</p>
        </div>
        <div class="mv-card scroll-reveal" style="--delay:0.15s">
          <div class="mv-icon">🌟</div>
          <h3>Visión</h3>
          <p>Ser la red de salud domiciliaria más confiable de Centroamérica, transformando la manera en que las familias acceden al cuidado médico personalizado.</p>
        </div>
        <div class="mv-card scroll-reveal" style="--delay:0.3s">
          <div class="mv-icon">💚</div>
          <h3>Valores</h3>
          <p>Empatía, profesionalismo, transparencia y compromiso con el bienestar de cada persona que confía en nosotros.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STORY -->
  <section class="story-section section">
    <div class="container">
      <div class="story-inner">
        <div class="story-img scroll-reveal">
          <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&q=80" alt="Historia de GoldAge" />
        </div>
        <div class="story-content scroll-reveal" style="--delay:0.2s">
          <div class="section-label">Nuestra Historia</div>
          <h2 class="section-title">Cuidar a mamá <span>nos inspiró</span></h2>
          <p>GoldAge nació en 2020 cuando nuestra fundadora, la Dra. Isabel Ramos, vivió en carne propia la dificultad de conseguir atención médica de calidad para su madre de 78 años sin tener que llevarla al hospital constantemente.</p>
          <p style="margin-top:16px; color: var(--text-light); font-size:15px; line-height:1.75">Junto a un equipo de médicos y enfermeros comprometidos, creó GoldAge: un modelo de atención que pone al paciente en el centro, sin sacrificar la calidez del hogar.</p>
          <div class="story-stats">
            <div class="sstats-item"><strong>2020</strong><span>Fundación</span></div>
            <div class="sstats-item"><strong>3 depts.</strong><span>Cobertura</span></div>
            <div class="sstats-item"><strong>+50</strong><span>Profesionales</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- VALUES -->
  <section class="values-section section">
    <div class="container">
      <div class="section-label">Lo que nos guía</div>
      <h2 class="section-title">Principios que nos <span>definen</span></h2>
      <div class="values-grid">
        <div class="value-item scroll-reveal">
          <span class="value-num">01</span>
          <h4>Empatía ante todo</h4>
          <p>Cada paciente merece ser escuchado y tratado con respeto y amor genuino.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.1s">
          <span class="value-num">02</span>
          <h4>Excelencia médica</h4>
          <p>Todos nuestros profesionales cuentan con certificaciones actualizadas y capacitación continua.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.2s">
          <span class="value-num">03</span>
          <h4>Transparencia total</h4>
          <p>Precios claros, diagnósticos honestos y comunicación abierta con la familia.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.3s">
          <span class="value-num">04</span>
          <h4>Innovación constante</h4>
          <p>Usamos tecnología para mejorar la experiencia y los resultados de cada paciente.</p>
        </div>
      </div>
    </div>
  </section>

<<<<<<< Updated upstream
  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="index.php" class="logo"><span class="logo-icon">🌿</span><span class="logo-text">Gold<span class="logo-accent">Age</span></span></a>
          <p>Home health care with heart. We care for those you love most with professionalism and warmth.</p>
        </div>
        <div class="footer-links">
          <h5>Navegación</h5>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="nurses.php">Nurses</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h5>Servicios</h5>
          <ul>
            <li><a href="services.php">24/7 Attention</a></li>
            <li><a href="services.php">General Consultations</a></li>
            <li><a href="services.php">Geriatrics</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h5>Contacto</h5>
          <p>hola@goldage.com</p>
          <p>+503 7000-0000</p>
          <p>San Salvador, El Salvador</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2025 GoldAge. All rights reserved.</p>
      </div>
    </div>
</footer>
=======
  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>
>>>>>>> Stashed changes

  <script src="js/main.js"></script>
  <script src="js/about.js"></script>
</body>
</html>
