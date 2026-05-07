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
          <p>To provide excellent home health services, with human warmth and modern technology, to improve the quality of life of each patient and their family.</p>
        </div>
        <div class="mv-card scroll-reveal" style="--delay:0.15s">
         
          <h3>Vision</h3>
          <p>To be the most trusted home health network in Central America, transforming the way families access personalized medical care.</p>
        </div>
        <div class="mv-card scroll-reveal" style="--delay:0.3s">
          
          <h3>Values</h3>
          <p>Empathy, professionalism, transparency and commitment to the well-being of each person who trusts us.</p>
        </div>
      </div>
    </div>
  </section>

  
  <!-- VALUES -->
  <section class="values-section section">
    <div class="container">
      <div class="section-label">What guides us</div>
      <h2 class="section-title">Principles that <span>define us</span></h2>
      <div class="values-grid">
        <div class="value-item scroll-reveal">
         
          <h4>Empathy </h4>
          <p>Every patient deserves to be heard and treated with respect and genuine love.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.1s">
         
          <h4>Medical excellence</h4>
          <p>All our professionals have up to date certifications and ongoing training.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.2s">
         
          <h4>Transparency</h4>
          <p>Clear prices, honest diagnoses, and open communication with the family.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.3s">
         
          <h4>Innovation</h4>
          <p>We use technology to improve the experience and outcomes for each patient.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="index.html" class="logo"><span class="logo-icon"></span><span class="logo-text">Gold<span class="logo-accent">Age</span></span></a>
          <p>Home healthcare with heart.</p>
        </div>
        <div class="footer-links"><h5>Navegation</h5><ul>
          <li><a href="index.html">Home</a></li><li><a href="services.html">Services</a></li>
          <li><a href="nurses.html">Nurses</a></li><li><a href="about.html">About Us</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul></div>
        <div class="footer-links"><h5>Services</h5><ul>
          <li><a href="services.html">Attencion 24/7</a></li><li><a href="services.html">Palliative Care</a></li>
          <li><a href="services.html">General Inquiries</a></li><li><a href="services.html">Geriatrics</a></li>
        </ul></div>
        <div class="footer-contact"><h5>Contact</h5>
          <p> h@goldage.com</p><p> +503 7000-0000</p><p>📍 San Salvador, El Salvador</p>
        </div>
      </div>
      <div class="footer-bottom"><p>© 2026 GoldAge. All rights reserved.</p></div>
    </div>
  </footer>

  <script src="js/main.js"></script>
  <script src="js/about.js"></script>
</body>
</html>
