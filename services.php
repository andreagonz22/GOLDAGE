<?php
require_once __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services – GOLDAGE</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/services.css" />
  <link rel="stylesheet" href="css/navbar_auth.css">
</head>

<body>

  <!-- NAVBAR -->
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

  <!-- ===== HERO SECTION ===== -->
  <section class="page-hero services-hero">

    <div class="page-hero-content fade-in">
     
      <h1>
        Professional Care<br />
        <em>At Your Home</em>
      </h1>
      <p>
        We offer home healthcare services every day
        to help your family stay healthy and comfortable.
      </p>
    </div>

    <div class="hero-wave">
      <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#f8faf7"/>
      </svg>
    </div>
  </section>

  <!-- SERVICIOS -->
  <section class="services-list section">
    <div class="container">

      <div class="service-row scroll-reveal">
        <div class="service-row-img">
          <img
            src="https://tusangeles.com.mx/wp-content/uploads/2024/01/enfermera-feliz-sosteniendo-mano-anciano-silla-ruedas-jardin-hogar-ancianos-2048x1365.jpg"
            alt="24/7 home care"
          />
        </div>
        <div class="service-row-content">
          <h2>24/7 Home Care</h2>
          <p>
            Our nurses and doctors are available day and night
            to give medical care and support in your home whenever you need it.
          </p>
          <ul class="service-detail-list">
            <li>Emergency care at home</li>
            <li>Vital signs check</li>
            <li>Medicine administration</li>
            <li>Daily health reports</li>
          </ul>
          <div class="service-cta-row">
            <a href="./citas/agendar.php" class="btn btn-primary">
              Schedule Appointment
            </a>
            <button class="btn-price" onclick="togglePrices(this)">
              Prices
              <ul class="price-dropdown">
              <li>$45 <span>8 hrs</span></li>
              <li>$90 <span>12 hrs</span></li>
              <li>$100 <span>24 hrs</span></li>
              </ul>
            </button>
          </div>
        </div>
      </div>

      <div class="service-row service-row-reverse scroll-reveal">
        <div class="service-row-img">
          <img
            src="https://media.istockphoto.com/id/1650853784/photo/doctor-senior-patient-and-blood-pressure-check-with-consultation-talking-and-help-health-in.jpg?s=612x612&w=0&k=20&c=ODv-wA2E7-FNv527tZ6GuKJ9LnFP2GMSebF56GEox3o="
            alt="Palliative care"
          />
        </div>
        <div class="service-row-content">
          <h2>Palliative Care at Home</h2>
          <p>
            We help patients and families feel more comfortable
            by giving physical, emotional, and personal support at home.
          </p>
          <ul class="service-detail-list">
            <li>Pain and symptom control</li>
            <li>Support for the family</li>
            <li>Help from medical specialists</li>
            <li>Emotional and personal care</li>
          </ul>
          <a href="./citas/agendar.php" class="btn btn-primary">
            Schedule Appointment
          </a>
            <button class="btn-price" onclick="togglePrices(this)">
              Prices
              <ul class="price-dropdown">
              <li>$45 <span>8 hrs</span></li>
              <li>$90 <span>12 hrs</span></li>
              <li>$100 <span>24 hrs</span></li>
              </ul>
            </button>
        </div>
      </div>

      <div class="service-row scroll-reveal">
        <div class="service-row-img">
          <img
            src="https://www.shutterstock.com/image-photo/senior-doctor-white-medical-gown-600nw-2152462045.jpg"
            alt="General consultations"
          />
        </div>
        <div class="service-row-content">
          <h2>General Medical Consultations</h2>
          <p>
            Our doctors can visit your home to check your health,
            treat common illnesses, and give medical advice.
          </p>
          <ul class="service-detail-list">
            <li>Medical checkups and prescriptions</li>
            <li>Lab sample collection at home</li>
            <li>Follow-up after consultation</li>
            <li>Digital medical records</li>
          </ul>
          <a href="./citas/agendar.php" class="btn btn-primary">
            Schedule Appointment
          </a>
            <button class="btn-price" onclick="togglePrices(this)">
              Prices
              <ul class="price-dropdown">
              <li>$45 <span>8 hrs</span></li>
              <li>$90 <span>12 hrs</span></li>
              <li>$100 <span>24 hrs</span></li>
              </ul>
            </button>
        </div>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <?php include 'footer.php'; ?>
  <script src="js/main.js"></script>
  <script src="js/services.js"></script>
  <script src="js/navbar_auth.js"></script>
  
</body>
</html>