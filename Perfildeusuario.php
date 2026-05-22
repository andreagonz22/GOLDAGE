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
  <!-- Font Awesome (ICONOS PRO) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- CSS del menú de autenticación (NUEVO — no toca styles.css) -->
  <link rel="stylesheet" href="css/navbar_auth.css">
    <link rel="stylesheet" href="css/perfildeusuario.css">
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

  <!-- MAIN -->

<div class="container">

    <div class="dashboard-grid">

        <!-- LEFT -->

        <div class="left-column">

            <!-- PROFILE -->

            <div class="card profile-card">

                <div class="profile-cover"></div>

                <img 
                    class="profile-image"
                    src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                    alt="Usuario"
                >

                <h2 id="nombre"></h2>

                <p class="email" id="email"></p>

                <div class="info-list">

                    <div class="info-item">

                        <div class="icon-box">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div>
                            <span>Phone</span>
                            <p id="telefono"></p>
                        </div>

                    </div>

                    <div class="info-item">

                        <div class="icon-box">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>
                            <span>Location</span>
                            <p id="ubicacion"></p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- PATIENT INFO -->

            <div class="card">

                <div class="card-header">

                    <h3>
                        <i class="fa-solid fa-heart-pulse"></i>
                        Patient Information
                    </h3>

                </div>

                <div class="patient-grid">

                    <div class="patient-box">
                        <span>Name</span>
                        <strong id="pNombre"></strong>
                    </div>

                    <div class="patient-box">
                        <span>Age</span>
                        <strong id="pEdad"></strong>
                    </div>

                    <div class="patient-box">
                        <span>Condition</span>
                        <strong id="pCondicion"></strong>
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="right-column">

            <!-- PENDING -->

            <div class="card">

                <div class="card-header">

                    <h3>
                        <i class="fa-regular fa-calendar"></i>
                        Pending Appointments
                    </h3>

                </div>

                <div id="pendientes"></div>

            </div>

            <!-- COMPLETED -->

            <div class="card">

                <div class="card-header">

                    <h3>
                        <i class="fa-solid fa-circle-check"></i>
                        Completed Appointments
                    </h3>

                </div>

                <div id="realizadas"></div>

            </div>

        </div>

    </div>

</div>

<!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

<script>

const citas = [

    {
        fecha:"2026-05-01",
        hora:"10:00 AM",
        motivo:"General Consultation",
        estado:"pendiente"
    },

    {
        fecha:"2026-04-20",
        hora:"09:00 AM",
        motivo:"Routine Checkup",
        estado:"realizada"
    },

    {
        fecha:"2026-05-03",
        hora:"02:00 PM",
        motivo:"Dermatology",
        estado:"pendiente"
    }

];

const usuario = {

    nombre:"Juan Esteban",
    email:"juanesteban19@gmail.com",
    telefono:"+503 4568 3190",
    ubicacion:"San Martín"

};

const paciente = {

    nombre:"Juan Esteban",
    edad:17,
    condicion:"General Control"

};

document.getElementById("nombre").textContent = usuario.nombre;
document.getElementById("email").textContent = usuario.email;
document.getElementById("telefono").textContent = usuario.telefono;
document.getElementById("ubicacion").textContent = usuario.ubicacion;

document.getElementById("pNombre").textContent = paciente.nombre;
document.getElementById("pEdad").textContent = paciente.edad + " years";
document.getElementById("pCondicion").textContent = paciente.condicion;

const pendientes = document.getElementById("pendientes");
const realizadas = document.getElementById("realizadas");

function render(){

    pendientes.innerHTML = "";
    realizadas.innerHTML = "";

    citas.forEach((cita,index)=>{

        const div = document.createElement("div");

        div.className = `appointment ${
            cita.estado === "pendiente"
            ? "pending"
            : "done"
        }`;

        div.innerHTML = `

            <div class="appointment-info">

                <h4>${cita.motivo}</h4>

                <p>
                    <i class="fa-regular fa-calendar"></i>
                    ${cita.fecha}
                </p>

                <p>
                    <i class="fa-regular fa-clock"></i>
                    ${cita.hora}
                </p>

                <span class="status ${
                    cita.estado === "pendiente"
                    ? "pending-status"
                    : "done-status"
                }">

                    ${
                        cita.estado === "pendiente"
                        ? "Pending"
                        : "Completed"
                    }

                </span>

            </div>

            ${
                cita.estado === "pendiente"
                ?
                `<button onclick="completar(${index})">
                    Complete
                </button>`
                :
                ""
            }

        `;

        if(cita.estado === "pendiente"){
            pendientes.appendChild(div);
        }else{
            realizadas.appendChild(div);
        }

    });

}

function completar(index){

    citas[index].estado = "realizada";

    render();

}

render();

</script>

</body>
</html>