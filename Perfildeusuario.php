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

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/navbar_auth.css">
<link rel="stylesheet" href="css/perfildeusuario.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="logo">
            <img src="img/logo.png" class="logo-img">
            <span class="logo-text">Gold<span class="logo-accent">Age</span></span>
        </a>
        <?php include __DIR__ . '/navbar_auth.php'; ?>
    </div>
</nav>

<div class="container">

<div class="dashboard-grid">

<!-- LEFT -->
<div class="left-column">

<!-- PROFILE -->
<div class="card profile-card">
    <div class="profile-cover"></div>
    <img class="profile-image" src="https://cdn-icons-png.flaticon.com/512/149/149071.png">

    <h2 id="name"></h2>

    <div class="info-list">

        <div class="info-item">
            <div class="icon-box"><i class="fa-solid fa-envelope"></i></div>
            <div><p id="email"></p></div>
        </div>

        <div class="info-item">
            <div class="icon-box"><i class="fa-solid fa-phone"></i></div>
            <div><p id="phone"></p></div>
        </div>

        <div class="info-item">
            <div class="icon-box"><i class="fa-solid fa-location-dot"></i></div>
            <div><p id="location"></p></div>
        </div>

    </div>
</div>

<!-- PATIENT -->
<div class="card">
    <div class="card-header">
        <h3><i class="fa-solid fa-user"></i> Patient Information</h3>
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
            <span>Condition</span>
            <strong id="pCondition"></strong>
        </div>
    </div>
</div>

</div>

<!-- RIGHT -->
<div class="right-column">

<!-- HEADER -->
<div class="top-bar">
    <div>
        <h1>Hello, <span id="greeting"></span></h1>
        <p>Here is a summary of your appointments</p>
    </div>
    <div class="date-box" id="currentDate"></div>
</div>

<!-- SUMMARY CARDS -->
<div class="summary-cards">

    <div class="summary-card">
        <i class="fa-regular fa-calendar"></i>
        <div>
            <h2 id="countPending">0</h2>
            <p>Pending</p>
        </div>
    </div>

    <div class="summary-card success">
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



<!-- ===== FOOTER ===== -->


  <!-- ===== FOOTER ===== -->

  <?php include 'footer.php'; ?>

<!-- PENDING -->
<div class="card">
    <div class="card-header">
        <h3><i class="fa-regular fa-calendar"></i> Pending Appointments</h3>
    </div>
    <div id="pending"></div>
</div>

<!-- COMPLETED -->
<div class="card">
    <div class="card-header">
        <h3><i class="fa-solid fa-circle-check"></i> Completed Appointments</h3>
    </div>
    <div id="completed"></div>
</div>


</div>

</div>
</div>

<!-- FOOTER -->
<?php include 'footer.php'; ?>

<script>

// DATA
const user = {
    name:"Juan Esteban",
    email:"juanesteban19@gmail.com",
    phone:"+503 4568 3190",
    location:"San Martín"
};

const patient = {
    name:"Juan Esteban",
    age:57,
    condition:"General Checkup"
};

const appointments = [
    { date:"2026-05-01", time:"10:00 AM", reason:"General Consultation", status:"pending" },
    { date:"2026-04-20", time:"09:00 AM", reason:"Mental Checkup", status:"completed" },
    { date:"2026-05-03", time:"02:00 PM", reason:"General Checkup", status:"completed" }
];

// USER
document.getElementById("name").textContent = user.name;
document.getElementById("email").textContent = user.email;
document.getElementById("phone").textContent = user.phone;
document.getElementById("location").textContent = user.location;
document.getElementById("greeting").textContent = user.name;

// PATIENT
pName.textContent = patient.name;
pAge.textContent = patient.age + " years";
pCondition.textContent = patient.condition;

// DATE
currentDate.textContent = new Date().toLocaleDateString("en-US",{day:"numeric",month:"long",year:"numeric"});

// RENDER
const pending = document.getElementById("pending");
const completed = document.getElementById("completed");

function render(){

    pending.innerHTML="";
    completed.innerHTML="";

    let countP=0, countD=0, next=null;

    appointments.forEach((a,i)=>{

        if(a.status==="pending"){
            countP++;
            if(!next) next=a.date;
        }else{
            countD++;
        }

        const div=document.createElement("div");
        div.className=`appointment ${a.status}`;

        div.innerHTML=`
            <div class="appointment-info">
                <h4>${a.reason}</h4>
                <p>${new Date(a.date).toLocaleDateString()} | ${a.time}</p>
            </div>
            ${
                a.status==="pending"
                ? `<button onclick="complete(${i})">Complete appointment</button>`
                : `<span class="status done-status">Completed</span>`
            }
        `;

        (a.status==="pending"?pending:completed).appendChild(div);
    });

    countPending.textContent=countP;
    countDone.textContent=countD;
    nextDate.textContent=next?new Date(next).toLocaleDateString():"--";
}

function complete(i){
    appointments[i].status="completed";
    render();
}

render();

</script>

</body>
</html>