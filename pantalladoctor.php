<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GOLDAGE</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/navbar_auth.css">
<link rel="stylesheet" href="css/pantalladoctor.css">

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <div class="nav-container">
    <a href="index.php" class="logo">
      <img src="img/logo.png" alt="GoldAge Logo" class="logo-img">
      <span class="logo-text">Gold<span class="logo-accent">Age</span></span>
    </a>
    <?php include __DIR__ . '/navbar_auth.php'; ?>
  </div>
</nav>

<!-- HERO PRINCIPAL -->
<section class="page-hero services-hero">
  <div class="page-hero-content fade-in">

   <h1>
    Welcome <span class="doctor-part">back</span>
</h1>

    <p>
Manage your appointments, check your schedule, and stay connected with your patients.
    </p>
  </div>

  <div class="hero-wave">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
      <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#f8faf7"/>
    </svg>
  </div>
</section>

<!-- DASHBOARD -->
<div class="container">

<div class="dashboard-grid">

<!-- LEFT -->
<div class="left-column">

<div class="card profile-card">
    <img class="profile-image"
    src="img/image.png">

    <h2 id="name"></h2>

    <div class="info-list">

        <div class="info-item">
            <div class="icon-box">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="info-text">
                <p id="email"></p>
            </div>
        </div>

        <div class="info-item">
            <div class="icon-box">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="info-text">
                <p id="phone"></p>
            </div>
        </div>

        <div class="info-item">
            <div class="icon-box">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="info-text">
                <p id="location"></p>
            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>
            <i class="fa-solid fa-user"></i>
            Doctor Information
        </h3>
    </div>
<div class="patient-grid">

    <div class="patient-box">
        <span>Name</span>
        <strong id="pName"></strong>
    </div>

    <div class="patient-box">
        <span>Age</span>
        <strong id="pAge"></strong>
    </div>

    <div class="patient-box">
        <span>Gender</span>
        <strong id="pGender"></strong>
    </div>

</div>
</div>

</div>

<!-- RIGHT -->
<div class="right-column">

<div class="summary-cards">

    <div class="summary-card">
        <i class="fa-regular fa-calendar"></i>
        <div>
            <h2 id="countPending">0</h2>
            <p>Pending</p>
        </div>
    </div>

    <div class="summary-card">
        <i class="fa-solid fa-check"></i>
        <div>
            <h2 id="countDone">0</h2>
            <p>Completed</p>
        </div>
    </div>

    <div class="summary-card">
        <i class="fa-regular fa-clock"></i>
        <div>
            <h2 id="nextDate">--</h2>
            <p>Next appointment</p>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <h3>Pending Appointments</h3>
    </div>
    <div id="pending"></div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Completed Appointments</h3>
    </div>
    <div id="completed"></div>
</div>

</div>

</div>
</div>

<?php include 'footer.php'; ?>

<script>

/* DATA */
const user = {
    name: "Hernandez Perez",
    email: "hernandez@gmail.com",
    phone: "+503 7020 3567",
    location: "San Marcos"
};

const patient = {
    name: "Hernandez Peréz",
    age: 52,
  gender: "Male",
  
};

const appointments = [
    { date:"2026-05-01", time:"10:00 AM", reason:"General Consultation", status:"pending" },
    { date:"2026-04-20", time:"09:00 AM", reason:"The caregiver's arrival", status:"completed" },
    { date:"2026-05-03", time:"02:00 PM", reason:"General Checkup", status:"pending" }
];

/* ELEMENTOS */
const $ = id => document.getElementById(id);

/* USER */
$("name").textContent = user.name;
$("email").textContent = user.email;
$("phone").textContent = user.phone;
$("location").textContent = user.location;

/* PATIENT */
$("pName").textContent = patient.name;
$("pAge").textContent = patient.age + " years";
$("pGender").textContent = patient.gender;

/* RENDER */
function render(){

    $("pending").innerHTML = "";
    $("completed").innerHTML = "";

    let pendingCount = 0;
    let doneCount = 0;
    let next = null;

    appointments.forEach(a => {

        if(a.status === "pending"){
            pendingCount++;
            if(!next) next = a.date;
        } else {
            doneCount++;
        }

        const item = document.createElement("div");
        item.className = "appointment " + a.status;

        item.innerHTML = `
            <div class="appointment-info">
                <h4>${a.reason}</h4>
                <p>${a.date} | ${a.time}</p>
            </div>
        `;

        if(a.status === "pending"){

            const btn = document.createElement("button");
            btn.textContent = "Complete";

            btn.onclick = () => {
                a.status = "completed";
                render();
            };

            item.appendChild(btn);
            $("pending").appendChild(item);

        } else {

            const done = document.createElement("span");
            done.className = "done-status";
            done.textContent = "Completed";

            item.appendChild(done);
            $("completed").appendChild(item);
        }

    });

    $("countPending").textContent = pendingCount;
    $("countDone").textContent = doneCount;
    $("nextDate").textContent = next || "--";
}

render();

</script>
<script src="js/navbar_auth.js"></script>

</body>
</html>
