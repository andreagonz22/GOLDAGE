<?php
require_once __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldAge - Nurses</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/nurses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/navbar_auth.css">
    <link rel="stylesheet" href="css/styles.css">
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


<!-- ===== HERO SECTION ===== -->
  <section class="page-hero nurses-hero">

    <div class="page-hero-content fade-in">

      <h1>
        <h1>Choose your <em>professional</em></h1>
      </h1>
     <p>Select the best care for your family in seconds</p>
    </div>
</section>

<section class="nurses-filters section">
    <div class="container">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search by name, specialty or expertise...">
        </div>
        <div class="filter-bar" id="filterBar">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="medico">Doctors</button>
            <button class="filter-btn" data-filter="enfermero">Nurses</button>
            <button class="filter-btn" data-filter="cuidador">Caregivers</button>
        </div>
        <div class="nurses-grid" id="grid"></div>
    </div>
</section>
<!-- ===== FOOTER ===== -->
  <?php include 'footer.php'; ?>

<div class="modal-overlay" id="hireModal">
    <div class="modal-container">
        <div class="modal-header">
            <h2><i class="fas fa-calendar-check"></i> Hire Service</h2>
            <button class="modal-close" id="modalClose"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="status-badge available">
                <span class="status-dot"></span>
                <span>Available now</span>
            </div>
            <div class="professional-info">
                <div class="professional-icon" id="modalIcon">
    <i class="fas fa-user-md"></i>
</div>
                <h3 id="modalProfessionalName">Dra. Elena Méndez</h3>
                <div class="professional-specialty" id="modalSpecialty">
                    <i class="fas fa-stethoscope"></i> Geriatrics
                </div>
            </div>
            <div class="details-grid">
                <div class="detail-item">
                    <i class="fas fa-briefcase"></i>
                    <div class="detail-label">Experience</div>
                    <div class="detail-value" id="modalExperience">12+ years</div>
                </div>
                <div class="detail-item">
                    <i class="fas fa-graduation-cap"></i>
                    <div class="detail-label">Specialty</div>
                    <div class="detail-value">Clinical Geriatrics</div>
                </div>
            </div>
            <p id="modalDescription" style="text-align: center; margin-bottom: 24px; color: #4B5F6C; line-height: 1.5;">
                We care for you in the comfort of your own home.

We check your health fully, help you manage your everyday medical conditions, and support you with kindness and respect.
            </p>
            <div class="availability-section">
                
                <h4><i class="fas fa-calendar-week"></i> Available days</h4>
                <div class="days-available">
                    <span class="day-badge">Monday</span>
                    <span class="day-badge">Tuesday</span>
                    <span class="day-badge">Wednesday</span>
                    <span class="day-badge">Thursday</span>
                    <span class="day-badge">Friday</span>
                    <span class="day-badge unavailable-day">Saturday</span>
                    <span class="day-badge unavailable-day">Sunday</span>
                </div>
            </div>
            <button class="modal-action-btn" id="hireNowBtn">
                <i class="fas fa-calendar-alt"></i> Hire now<i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</div>

<script>
(function() {
    const data = [
    { name:"Karla Hernández", type:"medico", specialty:"General Medicine", desc:"General health checkups and treatment for common illnesses.", rating:"4.9", reviews:"120", img:"img/1.png" },

    { name:"José Martínez", type:"medico", specialty:"Geriatrics", desc:"Specialized care focused on the health and well-being of older adults.", rating:"4.8", reviews:"90", img:"img/Photo_5.png" },

    { name:"Ana López", type:"cuidador", specialty:"Geriatric Nursing", desc:"Daily assistance, personal care, and medication reminders.", rating:"4.7", reviews:"80", img:"img/2.png" },

    { name:"María Pérez", type:"enfermero", specialty:"Geriatric Nursing", desc:"Nursing care, health monitoring, and support with treatments.", rating:"5.0", reviews:"150", img:"img/3.png" },

    { name:"Luis Gómez", type:"medico", specialty:"Geriatric Physical Therapy", desc:"Exercises and therapy to improve strength, balance, and mobility.", rating:"4.9", reviews:"110", img:"img/enfermero 5.png" },

    { name:"Carolina Rivas", type:"enfermero", specialty:"Psychogeriatrics", desc:"Support for memory, emotional health, and mental well-being.", rating:"4.9", reviews:"95", img:"img/4.png" },

    { name:"Fernando Ortiz", type:"cuidador", specialty:"Geriatric Nutrition", desc:"Guidance on healthy eating and nutrition for older adults.", rating:"4.8", reviews:"112", img:"img/enfermero 6.png" },

    { name:"Elena Méndez", type:"medico", specialty:"Geriatrics", desc:"Comprehensive healthcare to help seniors stay healthy and active.", rating:"5.0", reviews:"204", img:"img/5.png" },

    { name:"Ricardo Torres", type:"medico", specialty:"Geriatric Neurology", desc:"Care for memory problems and conditions affecting the brain and nerves.", rating:"4.9", reviews:"87", img:"img/Photo_1.png" },

    { name:"Patricia Soto", type:"enfermero", specialty:"Geriatric Cardiology", desc:"Monitoring and support for heart health and cardiovascular conditions.", rating:"4.9", reviews:"134", img:"img/6.png" },

    { name:"Jorge Ramírez", type:"enfermero", specialty:"Palliative Care", desc:"Comfort-focused care that helps improve quality of life.", rating:"4.7", reviews:"68", img:"img/enfermero 1.png" },

    { name:"Silvia Castro", type:"medico", specialty:"Geriatric Rehabilitation", desc:"Recovery support after illness, injury, or surgery.", rating:"4.8", reviews:"76", img:"img/7.png" },

    { name:"Andrés Mendoza", type:"enfermero", specialty:"Geriatric Pharmacology", desc:"Medication review and guidance to ensure safe treatment.", rating:"4.9", reviews:"103", img:"img/enfermero 2.png" },

    { name:"Laura Flores", type:"cuidador", specialty:"Geriatrics", desc:"Companionship and assistance with daily activities.", rating:"4.8", reviews:"92", img:"img/8.png" },

    { name:"Daniel Vega", type:"medico", specialty:"Geriatric Nursing", desc:"Specialized nursing care tailored to older adults' needs.", rating:"4.9", reviews:"118", img:"img/Photo_3.png" },

    { name:"Verónica Luna", type:"enfermero", specialty:"Geriatric Physical Therapy", desc:"Therapy and exercises to help maintain independence and prevent falls.", rating:"4.8", reviews:"71", img:"img/9.png" },

    { name:"Camila Peña", type:"cuidador", specialty:"Psychogeriatrics", desc:"Emotional support and activities that keep the mind active.", rating:"4.7", reviews:"89", img:"img/13.png" },

    { name:"Claudia Reyes", type:"medico", specialty:"Geriatric Nutrition", desc:"Personalized nutrition plans to support healthy aging.", rating:"4.8", reviews:"64", img:"img/10.png" },

    { name:"Hugo Sandoval", type:"enfermero", specialty:"Geriatric Neurology", desc:"Care and support for neurological conditions and memory concerns.", rating:"4.9", reviews:"107", img:"img/Photo_4.png" },

    { name:"Natalia Bravo", type:"cuidador", specialty:"Geriatric Cardiology", desc:"Assistance for seniors managing heart-related conditions.", rating:"4.9", reviews:"131", img:"img/11.png" },

    { name:"Roberto Fuentes", type:"medico", specialty:"Palliative Care", desc:"Pain management, comfort care, and family support.", rating:"4.7", reviews:"59", img:"img/Photo_7.png" },

    { name:"Isabel Ortega", type:"enfermero", specialty:"Geriatric Rehabilitation", desc:"Rehabilitation support to regain strength and independence.", rating:"4.9", reviews:"98", img:"img/12.png" },

    { name:"Gabriel Navarro", type:"cuidador", specialty:"Geriatric Pharmacology", desc:"Help with medication schedules and treatment management.", rating:"4.8", reviews:"85", img:"img/enfermero 16.png" },

    { name:"Valentina Cruz", type:"medico", specialty:"General Medicine", desc:"Primary healthcare services provided in the comfort of home.", rating:"4.9", reviews:"146", img:"img/13.png" },

    ];

    const specialtyInfo = {

    "General Medicine": {
        icon: "fa-user-doctor",
        experience: "10+ years",
        description: "Provides routine health evaluations, diagnoses common illnesses, and helps older adults maintain their overall health."
    },

    "Geriatrics": {
        icon: "fa-user-doctor",
        experience: "15+ years",
        description: "Specialized medical care focused on healthy aging, chronic disease management, and improving quality of life."
    },

    "Geriatric Nursing": {
        icon: "fa-heart-pulse",
        experience: "12+ years",
        description: "Provides daily nursing care, medication assistance, health monitoring, and personalized support."
    },

    "Psychogeriatrics": {
        icon: "fa-brain",
        experience: "11+ years",
        description: "Supports emotional wellbeing, memory care, dementia management, and mental health needs."
    },

    "Geriatric Physical Therapy": {
        icon: "fa-person-walking",
        experience: "9+ years",
        description: "Improves mobility, strength, balance, and independence through personalized exercise programs."
    },

    "Geriatric Nutrition": {
        icon: "fa-apple-whole",
        experience: "8+ years",
        description: "Creates nutrition plans that support healthy aging and help manage chronic conditions."
    },

    "Geriatric Neurology": {
        icon: "fa-brain",
        experience: "14+ years",
        description: "Evaluates and treats memory disorders, neurological diseases, and cognitive decline."
    },

    "Geriatric Cardiology": {
        icon: "fa-heart-pulse",
        experience: "13+ years",
        description: "Specialized heart care focused on cardiovascular health in older adults."
    },

    "Palliative Care": {
        icon: "fa-hand-holding-heart",
        experience: "16+ years",
        description: "Provides comfort-focused care, symptom management, and emotional support."
    },

    "Geriatric Rehabilitation": {
        icon: "fa-dumbbell",
        experience: "10+ years",
        description: "Helps patients recover after illness, injury, or surgery and regain independence."
    },

    "Geriatric Pharmacology": {
        icon: "fa-pills",
        experience: "12+ years",
        description: "Reviews medications, prevents interactions, and ensures safe treatment plans."
    }

};

    let currentFilter = "all";
    const grid = document.getElementById("grid");
    const searchInput = document.getElementById("searchInput");
    const filterBtns = document.querySelectorAll(".filter-btn");
    const modal = document.getElementById("hireModal");
    const modalName = document.getElementById("modalProfessionalName");
    const modalSpecialtySpan = document.getElementById("modalSpecialty");

    function getStarRating(rating) {
        const fullStars = Math.floor(rating);
        const hasHalfStar = rating % 1 >= 0.5;
        let stars = '';
        for (let i = 0; i < fullStars; i++) stars += '<i class="fas fa-star"></i>';
        if (hasHalfStar) stars += '<i class="fas fa-star-half-alt"></i>';
        for (let i = 0; i < 5 - Math.ceil(rating); i++) stars += '<i class="far fa-star"></i>';
        return stars;
    }

    function renderCards() {
        if (!grid) return;
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : "";
        const filtered = data.filter(prof => {
            const matchType = currentFilter === "all" || prof.type === currentFilter;
            const matchSearch = prof.name.toLowerCase().includes(searchTerm) || 
                                prof.specialty.toLowerCase().includes(searchTerm) || 
                                prof.desc.toLowerCase().includes(searchTerm);
            return matchType && matchSearch;
        });

        grid.innerHTML = "";
        if (filtered.length === 0) {
            grid.innerHTML = `<div style="grid-column:1/-1; text-align:center; padding:60px; background:white; border-radius:32px;">
                                <i class="fas fa-user-md" style="font-size:48px; color:#547792; opacity:0.5;"></i>
                                <h3 style="margin-top:16px;">No professionals found</h3>
                                <p>Try adjusting your search or filters</p>
                             </div>`;
            return;
        }

        filtered.forEach((prof, idx) => {
            const card = document.createElement("div");
            card.className = "nurse-card";
            card.innerHTML = `
                <div class="nurse-img">
                    <img src="${prof.img}" alt="${prof.name}" loading="lazy" onerror="this.src='https://placehold.co/400x260?text=GoldAge'">
                </div>
                <div class="nurse-info">
                    <span class="nurse-specialty"><i class="fas fa-badge-check"></i> ${prof.specialty}</span>
                    <h3>${prof.name}</h3>
                    <p>${prof.desc}</p>
                    <div class="nurse-rating">
                        <div class="stars">${getStarRating(parseFloat(prof.rating))}</div>
                        <span class="rating-text">${prof.rating} · ${prof.reviews} reviews</span>
                    </div>
                    <button class="nurse-btn" data-name="${prof.name}" data-specialty="${prof.specialty}">Hire now <i class="fas fa-arrow-right"></i></button>
                </div>
            `;
            grid.appendChild(card);
        });

        setTimeout(() => {
            document.querySelectorAll(".nurse-card").forEach((card, i) => {
                setTimeout(() => card.classList.add("show"), i * 50);
            });
        }, 100);

        document.querySelectorAll('.nurse-btn').forEach(btn => {
            btn.removeEventListener('click', handleHireClick);
            btn.addEventListener('click', handleHireClick);
        });
    }

    function handleHireClick(e) {

    const btn = e.currentTarget;

    const name = btn.getAttribute('data-name');
    const specialty = btn.getAttribute('data-specialty');

    const info = specialtyInfo[specialty];

    modalName.textContent = name;

    modalSpecialtySpan.innerHTML =
        `<i class="fas fa-stethoscope"></i> ${specialty}`;

    document.getElementById("modalExperience").textContent =
        info ? info.experience : "10+ years";

    document.getElementById("modalDescription").textContent =
        info ? info.description : "Professional healthcare services tailored to older adults.";

    document.getElementById("modalIcon").innerHTML =
        `<i class="fas ${info ? info.icon : 'fa-user-doctor'}"></i>`;

    modal.classList.add("active");

    document.body.style.overflow = "hidden";
}

    function closeModal() {
        if (modal) modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    function redirectToForm() {
        const name = modalName ? modalName.textContent : 'Profesional';
        const specialtyText = modalSpecialtySpan ? modalSpecialtySpan.textContent.replace(/[^\w\sáéíóú]/g, '').trim() : 'Geriatría';
        sessionStorage.setItem('pendingHire', JSON.stringify({
            type: 'Geriatría',
            professional: name,
            specialty: specialtyText,
            timestamp: new Date().toISOString()
        }));
        window.location.href = 'contact.html?service=geriatria&professional=' + encodeURIComponent(name);
    }

    function updateUI() { renderCards(); }

    if (filterBtns.length) {
        filterBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                filterBtns.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                currentFilter = btn.getAttribute("data-filter");
                updateUI();
            });
        });
    }

    if (searchInput) searchInput.addEventListener("input", () => updateUI());

    renderCards();

    const navbar = document.getElementById("navbar");
    if (navbar) {
        window.addEventListener("scroll", () => {
            navbar.classList.toggle("scrolled", window.scrollY > 20);
        });
    }

    const hamburger = document.getElementById("hamburger");
    const navLinks = document.getElementById("navLinks");
    if (hamburger && navLinks) {
        hamburger.addEventListener("click", () => navLinks.classList.toggle("open"));
        document.querySelectorAll(".nav-link").forEach(link => {
            link.addEventListener("click", () => navLinks.classList.remove("open"));
        });
    }

    const modalCloseBtn = document.getElementById("modalClose");
    if (modalCloseBtn) modalCloseBtn.addEventListener("click", closeModal);
    if (modal) modal.addEventListener("click", (e) => { if (e.target === modal) closeModal(); });
    const hireNowBtn = document.getElementById("hireNowBtn");
    if (hireNowBtn) hireNowBtn.addEventListener("click", redirectToForm);
    document.addEventListener("keydown", (e) => { if (e.key === 'Escape') closeModal(); });
})();
</script>
<script src="js/navbar_auth.js"></script> 
</body>
</html>