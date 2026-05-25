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

<!-- ===== HERO ===== -->
<section class="hero" id="home">
  <div class="hero-content fade-in">
    <span class="hero-badge">Personalized attention at home</span>
    <h1 class="hero-title">We care<br /><em>like family</em></h1>
    <p class="hero-desc">
      Certified professionals come to your home to provide quality medical care with human warmth.
    </p>

    <!-- BOTONES -->
    <div class="hero-actions">
      <a href="services.php" class="btn btn-primary">View Services</a>
      <a href="./citas/agendar.php" class="btn btn-outline">Schedule Appointment</a>
    </div>
  </div>

  <div class="hero-image fade-in-right">
    <div class="hero-img-wrap">
      <div class="hero-img-blob"></div>

      <img src="https://vivie.org/hs-fs/hubfs/iStock-1719538609-min.jpg?width=2000&height=1333&name=iStock-1719538609-min.jpg" alt="Doctora con paciente mayor" />

      <div class="hero-card-float card-float-1">
        <span class="card-icon"></i></span>
        <div><strong>24/7 Care</strong><small>Always available</small></div>
      </div>

      <div class="hero-card-float card-float-2">
        <span class="card-icon"></i></span>
        <div><strong>4.9 / 5</strong><small>Satisfaction</small></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== FEATURES ===== -->
<section class="features section" id="features">
  <div class="container">
    <div class="section-label">Why Us?</div>
    <h2 class="section-title">Comprehensive care <span>For your family</span></h2>

    <div class="features-grid">

      <!-- Medical -->
      <div class="feature-card scroll-reveal">
        <div class="feature-icon" style="--icon-color: #a8d5ba;">
          <i class="fas fa-user-nurse"></i>
        </div>
        <h3>Medical Services</h3>
        <p>Our team will work with you providing medical and nursing services.</p>
      </div>

      <!-- Reminders -->
      <div class="feature-card scroll-reveal" style="--delay: 0.15s">
        <div class="feature-icon" style="--icon-color: #b3cfe8;">
          <i class="fas fa-bell"></i>
        </div>
        <h3>Reminders</h3>
        <p>Manage health, safety, and notify next of kin of your maintenance.</p>
      </div>

      <!-- Home Care -->
      <div class="feature-card scroll-reveal" style="--delay: 0.3s">
        <div class="feature-icon" style="--icon-color: #f5e6c8;">
          <i class="fas fa-house-medical"></i>
        </div>
        <h3>Home Care</h3>
        <p>Our main goal is to help people maintain a family lifestyle in the comfort of home.</p>
      </div>
    </div>
  </div>
</section>

  <!-- ===== SERVICIOS CARDS ===== -->
  <section class="services-preview section" id="services">
    <div class="container">
      <div class="section-label">What We Offer</div>
      <h2 class="section-title">Health Services<span> at home</span></h2>
      <div class="services-grid">
        <div class="service-card scroll-reveal">
          <div class="service-img">
            <img src="https://tusangeles.com.mx/wp-content/uploads/2024/01/enfermera-feliz-sosteniendo-mano-anciano-silla-ruedas-jardin-hogar-ancianos-2048x1365.jpg" alt="Atención domiciliaria" />
          </div>
          <div class="service-info">
            <h4>Home Care</h4>
            <p>In-home support with daily activities, personal care, and companionship, provided by the hour or continuously.</p>
            <a href="services.php" class="btn-link">See more →</a>
          </div>
        </div>
         
        <div class="service-card scroll-reveal" style="--delay: 0.2s">
          <div class="service-img">
            <img src="https://media.istockphoto.com/id/1650853784/photo/doctor-senior-patient-and-blood-pressure-check-with-consultation-talking-and-help-health-in.jpg?s=612x612&w=0&k=20&c=ODv-wA2E7-FNv527tZ6GuKJ9LnFP2GMSebF56GEox3o=" alt="Consultas generales" />
          </div>
          <div class="service-info">
            <h4>Palliative care at home</h4>
            <p>Care focused on relieving pain and other symptoms, improving quality of life for people with serious illnesses.</p>
            <a href="services.php" class="btn-link">See more →</a>
          </div>
        </div>
        <div class="service-card scroll-reveal" style="--delay: 0.3s">
          <div class="service-img">
            <img src="https://www.shutterstock.com/image-photo/senior-doctor-white-medical-gown-600nw-2152462045.jpg" alt="Consultas geriátricas" />
          </div>
          <div class="service-info">
            <h4>General medical consultations</h4>
            <p>Basic medical care provided at home to evaluate, diagnose, and treat common health issues.</p>
            <a href="services.php" class="btn-link">See more →</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== STATS ===== -->
  <section class="stats-section scroll-reveal">
    <div class="container">
      <div class="stats-bar">
        <div class="stat-item">
          <span class="stat-number" data-target="80">0</span><span class="stat-plus">+</span>
          <p>Verified Professionals</p>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <span class="stat-number" data-target="300">0</span><span class="stat-plus">+</span>
          <p>Consultations Made</p>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <span class="stat-number" data-target="10">0</span><span class="stat-plus">+</span>
          <p>Associated Pharmacies</p>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <span class="stat-number" data-target="100">0</span><span class="stat-plus">%</span>
          <p>Customer Satisfaction</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== TESTIMONIOS ===== -->
  <section class="testimonials section">
    <div class="container">
      <div class="section-label">Testimonials</div>
      <h2 class="section-title">The happiness of the customers <span>speaks for us</span></h2>
      <div class="testimonials-grid">
        <div class="testimonial-card scroll-reveal">
          <div class="stars">★★★★★</div>
          <p class="testimonial-text">"The GoldAge service has been a blessing for our family. The nurses are incredibly kind and professional. My mom feels safe and happy."</p>
          <div class="testimonial-author">
            <img src="https://i.pravatar.cc/60?img=47" alt="María López" />
            <div>
              <strong>María López</strong>
              <small>57 Years, San Salvador</small>
            </div>
          </div>
        </div>
        <div class="testimonial-card scroll-reveal featured-testimonial" style="--delay: 0.15s">
          <div class="stars">★★★★★</div>
          <p class="testimonial-text">"Thanks to GoldAge, dad receives quality medical care without the stress of going to the hospital. The team is punctual, warm, and very competent. I totally recommend it."</p>
          <div class="testimonial-author">
            <img src="https://i.pravatar.cc/60?img=12" alt="Carlos Méndez" />
            <div>
              <strong>Carlos Méndez</strong>
              <small>54 Years, Santa Ana</small>
            </div>
          </div>
        </div>
        <div class="testimonial-card scroll-reveal" style="--delay: 0.3s">
          <div class="stars">★★★★★</div>
          <p class="testimonial-text">"The premium plan is worth every penny. We have medication reminders, scheduled visits, and emergency care. The peace of mind it gives us is invaluable."</p>
          <div class="testimonial-author">
            <img src="https://i.pravatar.cc/60?img=32" alt="Ana Herrera" />
            <div>
              <strong>Ana Herrera</strong>
              <small>41 Years, San Miguel</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  

  <br><br><br>
  <!-- ===== FOOTER ===== -->
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

  <!-- ===== SCRIPTS ===== -->
  <script src="js/main.js"></script>
  <!-- Script del menú de autenticación (NUEVO) -->
  <script src="js/navbar_auth.js"></script>

</body>
</html>
