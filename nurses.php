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

<section class="page-hero nurses-hero">
    <div class="page-hero-content">
        <h1>Choose your professional</h1>
        <p>Select the best care for your family in seconds quality & empathy</p>
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
            <h2><i class="fas fa-calendar-check"></i> Contratar Servicio</h2>
            <button class="modal-close" id="modalClose"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="status-badge available">
                <span class="status-dot"></span>
                <span>Disponible ahora</span>
            </div>
            <div class="professional-info">
                <div class="professional-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3 id="modalProfessionalName">Dra. Elena Méndez</h3>
                <div class="professional-specialty" id="modalSpecialty">
                    <i class="fas fa-stethoscope"></i> Geriatría & Cuidados Paliativos
                </div>
            </div>
            <div class="details-grid">
                <div class="detail-item">
                    <i class="fas fa-briefcase"></i>
                    <div class="detail-label">Experiencia</div>
                    <div class="detail-value">12+ años</div>
                </div>
                <div class="detail-item">
                    <i class="fas fa-graduation-cap"></i>
                    <div class="detail-label">Especialidad</div>
                    <div class="detail-value">Geriatría Clínica</div>
                </div>
            </div>
            <p style="text-align: center; margin-bottom: 24px; color: #4B5F6C; line-height: 1.5;">
                Atención especializada para adultos mayores en la comodidad de su hogar.
                Evaluación integral, manejo de enfermedades crónicas y cuidado con calidez humana.
            </p>
            <div class="availability-section">
                <h4><i class="fas fa-clock"></i> Horarios Disponibles</h4>
                <div class="availability-times">
                    <span class="time-badge"><i class="fas fa-sun"></i> 8:00 am - 12:00 pm</span>
                    <span class="time-badge"><i class="fas fa-moon"></i> 2:00 pm - 5:00 pm</span>
                </div>
                <h4><i class="fas fa-calendar-week"></i> Días disponibles</h4>
                <div class="days-available">
                    <span class="day-badge">Lunes</span>
                    <span class="day-badge">Martes</span>
                    <span class="day-badge">Miércoles</span>
                    <span class="day-badge">Jueves</span>
                    <span class="day-badge">Viernes</span>
                    <span class="day-badge unavailable-day">Sábado</span>
                    <span class="day-badge unavailable-day">Domingo</span>
                </div>
            </div>
            <button class="modal-action-btn" id="hireNowBtn">
                <i class="fas fa-calendar-alt"></i> Agendar cita <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</div>

<script>
(function() {
    const data = [
        { name:"Karla Hernández", type:"medico", specialty:"General Medicine", desc:"Experienced in home care and prevention, personalized follow-up.", rating:"4.9", reviews:"120", img:"img/1.jpg" },
        { name:"José Martínez", type:"medico", specialty:"Geriatrics", desc:"Specialist in heart conditions & geriatric cardiac health.", rating:"4.8", reviews:"90", img:"img/Photo 5.jpg" },
        { name:"Ana López", type:"cuidador", specialty:"Geriatric Nursing", desc:"Daily support, companionship and personal assistance.", rating:"4.7", reviews:"80", img:"img/2.jpg" },
        { name:"María Pérez", type:"enfermero", specialty:"Geriatric Nursing", desc:"Emergency & monitoring expert, post-op care specialist.", rating:"5.0", reviews:"150", img:"img/3.jpg" },
        { name:"Luis Gómez", type:"medico", specialty:"Geriatric Physical Therapy", desc:"Child health specialist, gentle and attentive.", rating:"4.9", reviews:"110", img:"img/enfermero 5.jpg" },
        { name:"Carolina Rivas", type:"enfermero", specialty:"Psychogeriatrics", desc:"Advanced healing techniques & chronic care management.", rating:"4.9", reviews:"95", img:"img/4.jpg" },
        { name:"Fernando Ortiz", type:"cuidador", specialty:"Geriatric Nutrition", desc:"Certified dementia caregiver, empathetic approach.", rating:"4.8", reviews:"112", img:"img/enfermero 6.jpg" },
        { name:"Elena Méndez", type:"medico", specialty:"Geriatrics", desc:"Comprehensive elderly health management.", rating:"5.0", reviews:"204", img:"img/5.jpg" },
        { name:"Ricardo Torres", type:"medico", specialty:"Geriatric Neurology", desc:"Stroke rehabilitation and neurological disorders.", rating:"4.9", reviews:"87", img:"img/Photo 1.jpg" },
        { name:"Patricia Soto", type:"enfermero", specialty:"Geriatric Cardiology", desc:"Compassionate end-of-life care and family support.", rating:"4.9", reviews:"134", img:"img/6.jpg" },
        { name:"Jorge Ramírez", type:"enfermero", specialty:"Palliative Care", desc:"Mobility exercises and fall prevention specialist.", rating:"4.7", reviews:"68", img:"img/enfermero 1.jpg" },
        { name:"Silvia Castro", type:"medico", specialty:"Geriatric Rehabilitation", desc:"Diabetes and metabolic disorders expert.", rating:"4.8", reviews:"76", img:"img/7.jpg" },
        { name:"Andrés Mendoza", type:"enfermero", specialty:"Geriatric Pharmacology", desc:"Specialized care for children with chronic conditions.", rating:"4.9", reviews:"103", img:"img/enfermero 2.jpg" },
        { name:"Laura Flores", type:"cuidador", specialty:"Geriatrics", desc:"Recovery assistance and medication management.", rating:"4.8", reviews:"92", img:"img/8.jpg" },
        { name:"Daniel Vega", type:"medico", specialty:"Geriatric Nursing", desc:"Mental health support for elderly patients.", rating:"4.9", reviews:"118", img:"img/Photo 3.jpg" },
        { name:"Verónica Luna", type:"enfermero", specialty:"Geriatric Physical Therapy", desc:"Respiratory therapy and ventilator management.", rating:"4.8", reviews:"71", img:"img/9.jpg" },
        { name:"Mario Peña", type:"cuidador", specialty:"Psychogeriatrics", desc:"Social engagement and daily activity planning.", rating:"4.7", reviews:"89", img:"img/enfermero 3.jpeg" },
        { name:"Claudia Reyes", type:"medico", specialty:"Geriatric Nutrition", desc:"Arthritis and mobility joint treatment.", rating:"4.8", reviews:"64", img:"img/10.jpg" },
        { name:"Hugo Sandoval", type:"enfermero", specialty:"Geriatric Neurology", desc:"Specialized in complex wound care.", rating:"4.9", reviews:"107", img:"img/Photo 4.jpg" },
        { name:"Natalia Bravo", type:"cuidador", specialty:"Geriatric Cardiology", desc:"Validation therapy and memory stimulation.", rating:"4.9", reviews:"131", img:"img/11.jpg" },
        { name:"Roberto Fuentes", type:"medico", specialty:"Palliative Care", desc:"Geriatric urological conditions specialist.", rating:"4.7", reviews:"59", img:"img/Photo 7.jpg" },
        { name:"Isabel Ortega", type:"enfermero", specialty:"Geriatric Rehabilitation", desc:"Insulin management and glucose monitoring.", rating:"4.9", reviews:"98", img:"img/12.jpg" },
        { name:"Gabriel Navarro", type:"cuidador", specialty:"Geriatric Pharmacology", desc:"Emotional and physical support for terminal patients.", rating:"4.8", reviews:"85", img:"img/enfermero 3.jpg" },
        { name:"Valentina Cruz", type:"medico", specialty:"General Medicine", desc:"Comprehensive primary care at home.", rating:"4.9", reviews:"146", img:"img/13.jpg" },
        { name:"Sergio Delgado", type:"enfermero", specialty:"Geriatrics", desc:"IV antibiotics and hydration at home.", rating:"4.8", reviews:"77", img:"img/enfermero 3.jpg" }
    ];

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
        if (modalName) modalName.textContent = name;
        if (modalSpecialtySpan) modalSpecialtySpan.innerHTML = `<i class="fas fa-stethoscope"></i> ${specialty}`;
        if (modal) modal.classList.add('active');
        document.body.style.overflow = 'hidden';
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