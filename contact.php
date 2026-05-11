<?php
require_once __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us – GoldAge</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/contact.css" />
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
  <section class="page-hero contact-hero">
    <div class="page-hero-content fade-in">
      <h1>We are here<br /><em>for you</em></h1>
      <p>Schedule an appointment, resolve your questions, or join the team. We respond in less than 2 hours.</p>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <section class="contact-section section">
    <div class="container">
      <div class="contact-grid">

        <!-- Info -->
        <div class="contact-info scroll-reveal">
          <h2>Let’s talk</h2>
          <p>You can contact us through any of these channels or fill out the form and we will respond shortly.</p>

          <div class="contact-cards">
            <div class="contact-card">
              <div class="cc-icon">📞</div>
              <div>
                <strong>Phone</strong>
                <span>+503 7000-0000</span>
                <small>Mon–Sun 6am – 10pm</small>
              </div>
            </div>
            <div class="contact-card">
              <div class="cc-icon">📧</div>
              <div>
                <strong>Email</strong>
                <span>hola@goldage.com</span>
                <small>We reply in &lt;2 hrs</small>
              </div>
            </div>
            <div class="contact-card">
              <div class="cc-icon">💬</div>
              <div>
                <strong>WhatsApp</strong>
                <span>+503 7000-0001</span>
                <small>Immediate support</small>
              </div>
            </div>
            <div class="contact-card">
              <div class="cc-icon">📍</div>
              <div>
                <strong>Office</strong>
                <span>San Salvador, El Salvador</span>
                <small>Escalón District, Main Avenue</small>
              </div>
            </div>
          </div>
        </div>

        <!-- Form -->
        <div class="contact-form-wrap scroll-reveal" style="--delay:0.2s">
          <div class="form-header">
            <h3>Schedule an appointment</h3>
            <p>Fill out the form and a specialist will contact you.</p>
          </div>
          <div class="contact-form" id="contactForm">
            <div class="form-row">
              <div class="form-group">
                <label>Full name</label>
                <input type="text" id="name" placeholder="Maria Garcia" />
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="tel" id="phone" placeholder="+503 0000-0000" />
              </div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" id="email" placeholder="maria@email.com" />
            </div>
            <div class="form-group">
              <label>Service of interest</label>
              <select id="service">
                <option value="">Select a service...</option>
                <option>24/7 home care</option>
                <option>Palliative care</option>
                <option>General consultations</option>
                <option>Geriatric consultations</option>
                <option>In-home physiotherapy</option>
                <option>Standard monthly plan</option>
                <option>Premium annual plan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Message</label>
              <textarea id="message" rows="4" placeholder="Tell us more about your family member’s needs..."></textarea>
            </div>
            <button type="button" class="btn btn-primary submit-btn" onclick="submitForm()">
              Send message ✉️
            </button>
            <div class="form-success" id="formSuccess">
              ✅ Message sent! We will contact you soon.
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="faq-section section">
    <div class="container">
      <div class="section-label">Frequently Asked Questions</div>
      <h2 class="section-title">We answer your <span>questions</span></h2>
      <div class="faq-list">
        <div class="faq-item scroll-reveal">
          <button class="faq-question" onclick="toggleFAQ(this)">
            How do I schedule an appointment? <span class="faq-arrow">▼</span>
          </button>
          <div class="faq-answer">
            <p>You can schedule through this form, via WhatsApp, or by calling directly. A coordinator will assign the most suitable professional and confirm your appointment.</p>
          </div>
        </div>
        <div class="faq-item scroll-reveal" style="--delay:0.1s">
          <button class="faq-question" onclick="toggleFAQ(this)">
            How long does it take for a professional to arrive? <span class="faq-arrow">▼</span>
          </button>
          <div class="faq-answer">
            <p>For scheduled visits, we confirm 12 hours in advance. For emergencies, our response time is 30 to 60 minutes depending on the area.</p>
          </div>
        </div>
        <div class="faq-item scroll-reveal" style="--delay:0.2s">
          <button class="faq-question" onclick="toggleFAQ(this)">
            What does the annual plan include? <span class="faq-arrow">▼</span>
          </button>
          <div class="faq-answer">
            <p>The annual plan includes unlimited visits, medication reminders, general and geriatric consultations, 24/7 emergency care, and palliative care if needed.</p>
          </div>
        </div>
        <div class="faq-item scroll-reveal" style="--delay:0.3s">
          <button class="faq-question" onclick="toggleFAQ(this)">
            Are the professionals verified? <span class="faq-arrow">▼</span>
          </button>
          <div class="faq-answer">
            <p>Yes, all professionals undergo credential verification, background checks, psychological interviews, and internal training before attending patients.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
        <div class="footer-content">

            <!-- BRAND -->
            <div class="footer-brand">
                <a href="index.php" class="footer-logo">
                    <img src="img/logo.png" alt="GoldAge Logo" class="footer-logo-img">
                    <span class="footer-logo-text">
                        Gold<span>Age</span>
                    </span>
                </a>

                <p>
                    Home health care with compassion, professionalism
                    and warmth for every family.
                </p>

                <div class="footer-socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-x-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- LINKS -->
            <div class="footer-links">
                <h4>Navigation</h4>

                <a href="index.php">Home</a>
                <a href="services.php">Services</a>
                <a href="nurses.php">Professionals</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact</a>
            </div>

            <!-- SERVICES -->
            <div class="footer-links">
                <h4>Services</h4>

                <a href="#">Home Care</a>
                <a href="#">24/7 Assistance</a>
                <a href="#">Medical Visits</a>
                <a href="#">Elderly Support</a>
            </div>

            <!-- CONTACT -->
            <div class="footer-contact">
                <h4>Contact</h4>

                <p><i class="fas fa-envelope"></i> hello@goldage.com</p>
                <p><i class="fas fa-phone"></i> +503 7000-0000</p>
                <p><i class="fas fa-location-dot"></i> San Salvador, El Salvador</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2026 GoldAge. All rights reserved.</p>
        </div>
    </div>
</footer>
 
  <script src="js/main.js"></script>
  <script src="js/contact.js"></script>
</body>
</html>
