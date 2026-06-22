<?php
require_once __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us – GoldAge</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/navbar_auth.css">
  <link rel="stylesheet" href="css/styles.css"/>
  <link rel="stylesheet" href="css/contact.css"/>
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
<section class="page-hero contact-hero">
  <div class="page-hero-content fade-in">
    <h1>
      We are here <br/>
      <em>for you</em>
    </h1>
    <p>Schedule an appointment, resolve your doubts,or join the team. </p>
  </div>
</section>

<!-- ===== CONTACT ===== -->
<section class="contact-section section">

  <div class="container">

    <div class="modern-contact-layout">

      <!-- LEFT -->
      <div class="modern-contact-left">

        <!-- IMAGE -->
       <div class="modern-contact-image">
    <img src="https://vivie.org/hs-fs/hubfs/iStock-1719538609-min.jpg?width=2000&height=1333&name=iStock-1719538609-min.jpg" alt="Contacto">
</div>

        <!-- INFO -->
        <div class="modern-contact-info">

          <h3>Let's Talk</h3>


          <div class="modern-info-cards">

      <!-- CARD -->
            <div class="modern-info-card">

              <div class="modern-icon">
                <i class="fa-solid fa-phone"></i>
              </div>

              <div>
                <strong>Call Us</strong>
                <span>+503 7000-0000</span>
              </div>
            </div>

            <!-- CARD -->
            <div class="modern-info-card">

              <div class="modern-icon">
                <i class="fa-solid fa-envelope"></i>
              </div>

              <div>
                <strong>Our Email</strong>
                <span>goldage.sv@gmail.com</span>
              </div>
            </div>

            <!-- CARD -->
            <div class="modern-info-card">

              <div class="modern-icon whatsapp">
                <i class="fa-brands fa-whatsapp"></i>
              </div>

              <div>
                <strong>WhatsApp</strong>
                <span>+503 6860-7484</span>
              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- ===== FORM ===== -->
      <div class="contact-form-wrap scroll-reveal">

        <div class="form-header">

          <h1>Leave a review</h1>

          <p>
            Share your experience with GoldAge.
            Your feedback helps us improve.
          </p>

        </div>

        <form class="contact-form" id="reviewForm">

          <!-- ROW -->
          <div class="form-row">

            <div class="form-group">

              <label>Full Name</label>

              <input
                type="text"
                id="name"
                placeholder="Maria Garcia"
              />

            </div>

            <div class="form-group">

              <label>Email</label>

              <input
                type="email"
                id="email"
                placeholder="maria@email.com"
              />

            </div>

          </div>

          <!-- STARS -->
          <div class="form-group">

            <label>Rating</label>

            <div class="rating-stars" id="ratingStars">

              <span data-value="1">★</span>
              <span data-value="2">★</span>
              <span data-value="3">★</span>
              <span data-value="4">★</span>
              <span data-value="5">★</span>

            </div>

          </div>

          <!-- MESSAGE -->
          <div class="form-group">

            <label>Your review</label>

            <textarea
              id="message"
              rows="4"
              placeholder="Tell us about your experience..."
            ></textarea>

          </div>

          <!-- BUTTON -->
          <button
            type="button"
            class="btn btn-primary submit-btn"
            onclick="submitForm()"
          >
            Submit Review
          </button>

          <div class="form-success" id="formSuccess">
             Review submitted successfully!
          </div>

        </form>

      </div>

    </div>

  </div>

</section>

<!-- ===== FAQ SECTION ===== -->
<section class="faq-section section">

  <div class="container">

    <!-- TITLE -->

    <h2 class="section-title">
      We answer your <span>questions</span>
    </h2>

    <!-- FAQ LIST -->
    <div class="faq-list">

      <!-- FAQ 1 -->
      <div class="faq-item scroll-reveal">

        <button
          class="faq-question"
          onclick="toggleFAQ(this)"
        >
          How do I schedule an appointment?
          <span class="faq-arrow">▼</span>
        </button>

        <div class="faq-answer">

          <p>
You can schedule an appointment through our contact numbers. You can also schedule an appointment by following these steps:

1- Go to the services section.

2- Click on "Schedule an Appointment."

3- Schedule an appointment by filling out the required fields.

4- Click on "Continue Payment."

5- Enter your card details.

6- Click on "Book."

7- Your appointment is now booked.
          </p>

        </div>

      </div>

      <!-- FAQ 4 -->
      <div class="faq-item scroll-reveal">

        <button
          class="faq-question"
          onclick="toggleFAQ(this)"
        >
          Are the professionals verified?
          <span class="faq-arrow">▼</span>
        </button>

        <div class="faq-answer">

          <p>
            Yes. All professionals go through
            title verification, background checks,
            psychological interviews, and internal
            training before attending patients.
          </p>

        </div>

      </div>

      <!-- FAQ 5 -->
      <div class="faq-item scroll-reveal">

        <button
          class="faq-question"
          onclick="toggleFAQ(this)"
        >
          Do you offer emergency services?
          <span class="faq-arrow">▼</span>
        </button>

        <div class="faq-answer">

          <p>
            Yes. We provide 24/7 emergency care services
            for urgent medical assistance at home. You can call us and we are a service in which you can call us whenever you need and we will be available, whether for medical attention, emergencies, or different types of circumstances
          </p>

        </div>

      </div>

      <!-- FAQ 6 -->
      <div class="faq-item scroll-reveal">

        <button
          class="faq-question"
          onclick="toggleFAQ(this)"
        >
          Can I choose my preferred nurse?
          <span class="faq-arrow">▼</span>
        </button>

        <div class="faq-answer">

          <p>
            Absolutely. You may request a preferred nurse
            depending on availability and your care needs.
          </p>
        </div>
      </div>

      <!-- FAQ 8 -->
      <div class="faq-item scroll-reveal">

        <button
          class="faq-question"
          onclick="toggleFAQ(this)"
        >
          Can family members receive updates about the patient?
          <span class="faq-arrow">▼</span>
        </button>

        <div class="faq-answer">

          <p>
            Yes. We maintain communication with authorized family members to provide them with up-to-date information and peace of mind. In addition, family members can monitor their relatives' accounts and stay informed about every detail of our work in providing medical assistance to seniors. We can also provide more detailed information through the patient's medical record.
          </p>
        </div>
      </div>

      <!-- FAQ 10 -->
      <div class="faq-item scroll-reveal">

        <button
          class="faq-question"
          onclick="toggleFAQ(this)"
        >
          Are your services available on weekends and holidays?
          <span class="faq-arrow">▼</span>
        </button>

        <div class="faq-answer">

          <p>
            Yes. GoldAge operates every day,
            including weekends and holidays. Our services are 24/7, to attend to our elderly in the best way. Remembering that we look after the well-being of our elderly, and we are 100% available whenever you need us, that is why we provide services 7 days a week and 24 hours a day.
          </p>

        </div>
      </div>
    </div>
  </div>
</section>

         
 <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

<!-- JS -->
<script src="js/main.js"></script>
<script src="js/contact.js"></script>
<script src="js/navbar_auth.js"></script>
</body>
</html>