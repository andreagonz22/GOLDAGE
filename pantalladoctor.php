<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Doctor Dashboard | GoldAge</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/navbar_auth.css" />
  <link rel="stylesheet" href="css/pantalladoctor.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<!-- =========================================
                NAVBAR
========================================= -->
<nav class="navbar" id="navbar">

  <div class="nav-container">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <img src="img/logo.png" alt="GoldAge Logo" class="logo-img">

      <span class="logo-text">
        Gold<span class="logo-accent">Age</span>
      </span>
    </a>

    <!-- Auth Menu -->
    <?php include __DIR__ . '/navbar_auth.php'; ?>

    <!-- Hamburger -->
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>

</nav>


<!-- =========================================
                HERO SECTION
========================================= -->
<section class="hero">

  <div class="hero-text">

    <h1>Welcome back, Dr. Perez</h1>

    <p>
      Manage your appointments, check your schedule,
      and stay connected with your patients.
    </p>

  </div>

</section>


<!-- =========================================
              MAIN CONTAINER
========================================= -->
<main class="main-container">

  <div class="content">


    <!-- =========================================
                    STATS
    ========================================= -->
    <section class="stats">

      <div class="stat-box">
        <h3>12</h3>
        <p>Pending Appointments</p>
      </div>

      <div class="stat-box">
        <h3>48</h3>
        <p>Completed Appointments</p>
      </div>

      <div class="stat-box">
        <h3>5</h3>
        <p>Appointments Today</p>
      </div>

    </section>


    <!-- =========================================
                  APPOINTMENT CARDS
    ========================================= -->

    <section class="cards-container">

      <!-- Pending -->
      <div class="card">

        <div class="card-icon">
          <i class="fa-solid fa-clock"></i>
        </div>

        <h2>Pending Appointments</h2>

        <p>
          Review upcoming appointments and confirm patient visits.
        </p>

        <a href="#">
          View Details
        </a>

      </div>


      <!-- Completed -->
      <div class="card">

        <div class="card-icon">
          <i class="fa-solid fa-circle-check"></i>
        </div>

        <h2>Completed Appointments</h2>

        <p>
          Check consultations that have already been completed.
        </p>

        <a href="#">
          View Details
        </a>

      </div>


      <!-- Scheduled -->
      <div class="card">

        <div class="card-icon">
          <i class="fa-solid fa-calendar-days"></i>
        </div>

        <h2>Scheduled Appointments</h2>

        <p>
          Organize your calendar and manage future appointments.
        </p>

        <a href="#">
          View Details
        </a>

      </div>

    </section>

  </div>

</main>


<!-- =========================================
                  FOOTER
========================================= -->
<?php include 'footer.php'; ?>


<!-- =========================================
                  JAVASCRIPT
========================================= -->
<script src="js/main.js"></script>

</body>
</html>