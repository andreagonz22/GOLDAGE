<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("login/conexion.php");

$idUsuario = $_SESSION['idusuario'] ?? 0;

$usuario = [];
$paciente = [];
$citas = [];

$sqlUsuario = "SELECT * FROM usuario WHERE IDUSUARIO = ?";
$stmt = $conn->prepare($sqlUsuario);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$resultado = $stmt->get_result();

if($resultado->num_rows > 0){
    $usuario = $resultado->fetch_assoc();
}

$sqlPaciente = "SELECT * FROM paciente WHERE IDUSUARIO = ?";
$stmt = $conn->prepare($sqlPaciente);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$resultado = $stmt->get_result();

if($resultado->num_rows > 0){
    $paciente = $resultado->fetch_assoc();
}

$sqlCitas = "SELECT * FROM citas WHERE IDUSUARIO = ?";
$stmt = $conn->prepare($sqlCitas);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$resultado = $stmt->get_result();

while($fila = $resultado->fetch_assoc()){

    $estado = strtolower($fila['ESTADOCITA']);

    if($estado == 'confirmada'){
        $estado = 'completed';
    }else{
        $estado = 'pending';
    }

    $citas[] = [
        "date" => $fila["FECHA"],
        "time" => $fila["HORA"],
        "reason" => $fila["DIRECCION"],
        "status" => $estado
    ];
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
<link rel="stylesheet" href="css/perfildeusuario.css">

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
      Welcome<br />
      <em>Here is yor summary</em>
    </h1>
    <p>
    Where you can view your appointments and personal information.
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
    src="https://cdn-icons-png.flaticon.com/512/149/149071.png">

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
            Patient Information
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

    <div class="patient-box">
        <span>Relationship</span>
        <strong id="pRelation"></strong>
    </div>

        <div class="patient-box">
            <span>Condition</span>
            <strong id="pCondition"></strong>
        </div>

        <div class="patient-box">
    <span>Address</span>
    <strong id="pAddress"></strong>
</div>

<div class="patient-box">
    <span>Allergies</span>
    <strong id="pAllergies"></strong>
</div>

<div class="patient-box">
    <span>Medications</span>
    <strong id="pMedications"></strong>
</div>

<div class="patient-box">
    <span>Mobility</span>
    <strong id="pMobility"></strong>
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
const user = <?php echo json_encode([
    "name" => ($usuario['NOMBRE'] ?? '') . ' ' . ($usuario['APELLIDO'] ?? ''),
    "email" => $usuario['CORREO_USU'] ?? '',
    "phone" => $usuario['CONTACTO_USUA'] ?? '',
    "location" => ''
]); ?>;

const patient = <?php echo json_encode([
    "name" => ($paciente['NOMBRE_PAC'] ?? '') . ' ' . ($paciente['APELLIDO_PAC'] ?? ''),
    "age" => $paciente['EDAD_PAC'] ?? '',
    "gender" => $paciente['GENERO'] ?? '',
    "condition" => $paciente['ENFERMEDADES'] ?? '',
    "address" => $paciente['DIRECCION'] ?? '',
    "allergies" => $paciente['ALERGIAS'] ?? '',
    "medications" => $paciente['MEDICAMENTOS_ACTIVOS'] ?? '',
    "mobility" => $paciente['NIVELDEMOVILIDAD'] ?? ''
]); ?>;

const appointments = <?php echo json_encode($citas); ?>;
</script>

<script src="js/perfil_usuario.js"></script>

</body>
</html>