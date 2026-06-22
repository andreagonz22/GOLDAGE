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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" Shref="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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


  <section class="story-section section" style="margin-top: 150px;">
    <div class="container">
      <div class="story-inner">
        <div class="story-img scroll-reveal">
          <img src="https://canal2tv.com/wp-content/uploads/2023/01/Maria-Branyas-anciana-mundo1-1200x675.jpg"
            alt="Historia de GoldAge" />
        </div>
        <div class="story-content scroll-reveal" style="--delay:0.2s">
          <div class="section-label">We created this because</div>
          <h2 class="section-title">Isabell's Story <span>Inspired Us</span></h2>
          <p>This company was born from the heart, after an experience that deeply affected us. We saw how a beloved
            member of our community did not receive the care, attention, or respect she deserved. The uncertainty, lack
            of trust, and poor commitment from her caregiver pushed us to take action. That’s why we created a different
            kind of service—one that offers compassionate, reliable, and dignified care, where every person is treated
            with love, respect, and the safety every family deserves.</p>
          <p style="margin-top:16px; color: var(--text-light); font-size:15px; line-height:1.75">Every family deserves
            peace of mind.</p>
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

          <div class="section-label">Our guide</div>
          <h2 class="section-title">The center of <span>everything</span></h2>
          <div class="values-grid">

            <div class="mv-card scroll-reveal" style="--delay:0.15s">
              <h3>Mission</h3>
              <p>Bring comfort and care into every home. With compassion we support patients and their families, helping
                them to live with dignity, peace, and a better quality of life. </p>
            </div>
            <div class="mv-card scroll-reveal" style="--delay:0.15s">

              <h3>Vision</h3>
              <p>Be the home healthcare network families trust the most in Central America. We want every family feel
                cared with personalized support, bringing health and comfort right where they live.</p>
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

          <h4>Better Living</h4>
          <p>We help patients feel more comfortable and live with dignity at home.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.1s">

          <h4>Peace of Mind</h4>
          <p>families feel safe and supported knowing their loved one are acred for.</p>
        </div>
        <div class="value-item scroll-reveal" style="--delay:0.2s">

          <h4>Respect for People</h4>
          <p>We treat every person with kindness, respect, and humanity.</p>
        </div>
      </div>
    </div>
  </section>

  <!--Carousel de presentacion-->
  <section class="team-carousel-section">

    <div id="label-team">
      <i class="fa-solid fa-users"></i>
      Our Team
    </div>

    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500"
      data-bs-pause="false">


      <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <img src="img/William.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <img src="img/Andrea.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <img src="img/Nicole.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item ">
          <img src="img/Adonay.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 5 -->
        <div class="carousel-item">
          <img src="img/Emely.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 6 -->
        <div class="carousel-item">
          <img src="img/Diana.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 7 -->
        <div class="carousel-item ">
          <img src="img/Katherine.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 8 -->
        <div class="carousel-item">
          <img src="img/Angie.png" alt="">
          <div class="team-info">
          </div>
        </div>

        <!-- Slide 9 -->
        <div class="carousel-item">
          <img src="img/Grupo.png" alt="">
          <div class="team-info">
          </div>
        </div>
      </div>

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></button>

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></button>

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></button>

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"></button>

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5"></button>

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6"></button>

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7"></button>

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="8"></button>

      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
      </button>

    </div>

  </section>


  <!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {

      const slides = document.querySelectorAll('.carousel-item');
      const dots = document.querySelectorAll('.carousel-indicators button');

      let current = 0;

      function showSlide(index) {

        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        slides[index].classList.add('active');
        dots[index].classList.add('active');

        current = index;
      }

      document.querySelector('.carousel-control-next')
        .addEventListener('click', () => {
          showSlide((current + 1) % slides.length);
        });

      document.querySelector('.carousel-control-prev')
        .addEventListener('click', () => {
          showSlide((current - 1 + slides.length) % slides.length);
        });

      dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
      });

      setInterval(() => {
        showSlide((current + 1) % slides.length);
      }, 2500);

    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/navbar_auth.js"></script>

</body>

</html>