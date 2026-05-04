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
  <link rel="stylesheet" href="css/perfildeusuario.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

  <!-- CONTENIDO -->
  <div class="container">
    <div class="grid">

      <div>
        <div class="card profile">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Foto de perfil">
          <h3 id="nombre"></h3>
          <p id="email"></p>

          <div class="info">
            <p id="telefono"></p>
            <p id="ubicacion"></p>
          </div>
        </div>

        <div class="card" style="margin-top:20px;">
          <h4>Patient Info</h4>
          <p><strong>Name:</strong> <span id="pNombre"></span></p>
          <p><strong>Age:</strong> <span id="pEdad"></span></p>
          <p><strong>Condition:</strong> <span id="pCondicion"></span></p>
        </div>
      </div>

      <div>
        <div class="card">
          <h4 class="section-title">Pending Appointments</h4>
          <div id="pendientes"></div>
        </div>

        <div class="card" style="margin-top:20px;">
          <h4 class="section-title">Completed Appointments</h4>
          <div id="realizadas"></div>
        </div>
      </div>

    </div>
  </div>

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

<script>
let citas = [
  {fecha:"2026-05-01", hora:"10:00", motivo:"Consulta", estado:"pendiente"},
  {fecha:"2026-04-20", hora:"09:00", motivo:"Chequeo", estado:"realizada"},
  {fecha:"2026-05-03", hora:"02:00", motivo:"Dermatología", estado:"pendiente"}
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
  condicion:"Control general"
};

// CORREGIDO (más seguro)
document.getElementById("nombre").textContent = usuario.nombre;
document.getElementById("email").textContent = usuario.email;
document.getElementById("telefono").textContent = usuario.telefono;
document.getElementById("ubicacion").textContent = usuario.ubicacion;

document.getElementById("pNombre").textContent = paciente.nombre;
document.getElementById("pEdad").textContent = paciente.edad;
document.getElementById("pCondicion").textContent = paciente.condicion;

const pendientes = document.getElementById("pendientes");
const realizadas = document.getElementById("realizadas");

function render(){
  pendientes.innerHTML="";
  realizadas.innerHTML="";

  citas.forEach((c,i)=>{
    const div = document.createElement("div");
    div.className = `appointment ${c.estado==="pendiente"?"pending":"done"}`;

    div.innerHTML = `
      <span>${c.fecha} - ${c.hora} | ${c.motivo}</span>
      ${c.estado==="pendiente" ? `<button onclick="completar(${i})">Done</button>`:""}
    `;

    if(c.estado==="pendiente"){
      pendientes.appendChild(div);
    } else {
      realizadas.appendChild(div);
    }
  });
}

function completar(i){
  citas[i].estado="realizada";
  render();
}

render();
</script>

</body>
</html>