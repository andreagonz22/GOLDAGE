<?php
require_once __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services – GOLDAGE</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/services.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/navbar_auth.css">
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


  <!-- PAGE HERO -->
  <section class="page-hero services-hero">
    <div class="page-hero-content fade-in">
      <span class="hero-badge">Our Services</span>
      <h1>Professional healthcare<br /><em>in your home</em></h1>
      <p>Certified medical services available 7 days a week, designed for the well-being of the whole family.</p>
    </div>
    <div class="hero-wave">
      <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#f8faf7"/>
      </svg>
    </div>
  </section>

  <!-- SERVICES LIST – alternating layout -->
  <section class="services-list section">
    <div class="container">

      <!-- Service 1 -->
      <div class="service-row scroll-reveal">
        <div class="service-row-img">
          <img src="https://tusangeles.com.mx/wp-content/uploads/2024/01/enfermera-feliz-sosteniendo-mano-anciano-silla-ruedas-jardin-hogar-ancianos-2048x1365.jpg" alt="24/7 home care" />
        </div>
        <div class="service-row-content">
          <span class="service-tag">24/7</span>
          <h2>Home Care 24/7</h2>
          <p>Our team of nurses and doctors is available 24 hours a day, 7 days a week to attend any medical need in the comfort of your home.</p>
          <ul class="service-detail-list">
            <li>✅ Emergency medical care at home</li>
            <li>✅ Vital signs monitoring</li>
            <li>✅ Medication administration</li>
            <li>✅ Daily medical reports</li>
          </ul>
          <a href="contact.php" class="btn btn-primary">Schedule appointment</a>
        </div>
      </div>

      <!-- Service 2 (reversed) -->
      <div class="service-row service-row-reverse scroll-reveal">
        <div class="service-row-img">
          <img src="https://media.istockphoto.com/id/1650853784/photo/doctor-senior-patient-and-blood-pressure-check-with-consultation-talking-and-help-health-in.jpg?s=612x612&w=0&k=20&c=ODv-wA2E7-FNv527tZ6GuKJ9LnFP2GMSebF56GEox3o=" alt="Palliative care" />
        </div>
        <div class="service-row-content">
          <span class="service-tag">Schedules</span>
          <h2>Palliative care at home</h2>
          <p>We provide comprehensive support focused on the physical, emotional, and spiritual well-being of the patient and their family during difficult stages.</p>
          <ul class="service-detail-list">
            <li>✅ Pain and symptom management</li>
            <li>✅ Psychological support for the family</li>
            <li>✅ Coordination with specialists</li>
            <li>✅ Spiritual and emotional care</li>
          </ul>
          <a href="contact.php" class="btn btn-primary">Schedule appointment</a>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="service-row scroll-reveal">
        <div class="service-row-img">
          <img src="https://www.shutterstock.com/image-photo/senior-doctor-white-medical-gown-600nw-2152462045.jpg" alt="General consultations" />
        </div>
        <div class="service-row-content">
          <span class="service-tag">General</span>
          <h2>General medical consultations</h2>
          <p>Diagnosis, evaluation, and treatment of common illnesses performed by certified general practitioners directly at your home.</p>
          <ul class="service-detail-list">
            <li>✅ Diagnosis and medical prescription</li>
            <li>✅ Sample collection at home</li>
            <li>✅ Post-consultation follow-up</li>
            <li>✅ Digital medical records</li>
          </ul>
          <a href="contact.php" class="btn btn-primary">Schedule appointment</a>
        </div>
      </div>

    </div>
  </section>

  <!-- CTA BANNER -->
  <section class="services-cta scroll-reveal">
    <div class="container">
      <div class="scta-inner">
        <h2>Didn't find what you're looking for?</h2>
        <p>Contact us and we will design a personalized care plan for you and your family.</p>
        <a href="contact.php" class="btn btn-primary">Talk to a specialist</a>
      </div>
    </div>
  </section>

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

  <script src="js/main.js"></script>
  <script src="js/services.js"></script>
  <script src="js/navbar_auth.js"></script>
</body>
</html>
