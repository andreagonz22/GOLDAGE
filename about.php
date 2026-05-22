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
  <title>About Us – GoldAge</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="about.css" />
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

<!-- STORY -->
  <section class="story-section section" style="margin-top: 150px;">
    <div class="container">
      <div class="story-inner">
        <div class="story-img scroll-reveal">
          <img src="https://canal2tv.com/wp-content/uploads/2023/01/Maria-Branyas-anciana-mundo1-1200x675.jpg" alt="Historia de GoldAge" />
        </div>
        <div class="story-content scroll-reveal" style="--delay:0.2s">
          <div class="section-label">We created this because</div>
          <h2 class="section-title">Isabell's Story <span>Inspired Us</span></h2>
          <p>This company was born from the heart, after an experience that deeply affected us. We saw how a beloved member of our community did not receive the care, attention, or respect she deserved. The uncertainty, lack of trust, and poor commitment from her caregiver pushed us to take action. That’s why we created a different kind of service—one that offers compassionate, reliable, and dignified care, where every person is treated with love, respect, and the safety every family deserves.</p>
          <p style="margin-top:16px; color: var(--text-light); font-size:15px; line-height:1.75">Every family deserves peace of mind.</p>
          <div class="story-stats">
           
          </div>
        </div>
      </div>
    </div>
  </section>

 

  

  <!-- MISSION / VISION -->
  <section class="mv-section section">
    <div class="container">
      <div class="mv-grid">
        <div class="mv-card scroll-reveal">
         
          <h3>Mission</h3>
          <p>
           Our mission is to provide compassionate, professional home healthcare using modern technology to improve the quality of life for patients and their families.
        </div>
        <div class="mv-card scroll-reveal" style="--delay:0.15s">
         
          <h3>Vision</h3>
          <p>
           Our vision is to become the most trusted home healthcare network in Central America by making personalized care available to every family.

          </p>
        </div>
        <div class="mv-card scroll-reveal" style="--delay:0.3s">
         
          <h3>Values</h3>
          <p>
            Our values are empathy, professionalism, honesty, and a strong commitment to the health and quality of life of every patient we serve.
          </p>
        </div>
      </div>
    </div>
  </section>

 
  <!-- VALUES -->
  <section class="values-section section">
    <div class="container">
      <h2 class="section-title">Principles that <span>define us</span></h2>
      <div class="values-grid">
        <div class="value-item scroll-reveal">
         
          <h4>Empathy</h4>
          <p>
            We treat every patient with kindness, respect, and understanding.
          </p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.1s">
         
          <h4>Medical Excellence</h4>
          <p>
            Our healthcare professionals are fully trained and continuously improving their skills.
          </p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.2s">
         
          <h4>Transparency</h4>
          <p>
            We believe in honest communication, clear pricing, and trust with every family.
   
         
        
        </div>
      </div>
    </div>
  </div>
  </section>

  <section class="about-us">
  <div class="container">

 <h2 class="section-title">ABOUT <span>US</span></h2>

    <div class="about-grid">

      <!-- BLOQUE 1 -->
      <div class="about-item">
        <img src="img/enfermero 2.jpg" alt="Nuestro equipo">
        <div class="about-text">
          <h3 class="section-title">WHO WE ARE</h3>
          <p>
            We are a dedicated team focused on providing reliable and compassionate home healthcare services for every patient.
          </p>
        </div>
      </div>

      <!-- BLOQUE 2 -->
      <div class="about-item reverse">
        <img src="img/enfermero 3.jpeg" alt="Nuestro servicio">
        <div class="about-text">
          <h3 class="section-title">WHAT WE DO</h3>
          <p>
            We provide personalized medical care at home, helping patients feel safe, comfortable, and supported.
          </p>
        </div>
      </div>

      <!-- BLOQUE 3 -->
      <div class="about-item">
        <img src="img/enfermero 5.jpg" alt="Nuestra misión">
        <div class="about-text">
          <h3 class="section-title">OUR COMMITMENT</h3>
          <p>
            We are committed to supporting families with professional, accessible, and human-centered healthcare services.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>


  <script src="js/main.js"></script>
  <script src="js/about.js"></script>
  <script src="js/navbar_auth.js"></script> 
</body>
</html>