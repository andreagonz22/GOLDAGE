/* ============================================================
   navbar_auth.js
   Archivo: /Gold/GOLDAGE/js/navbar_auth.js

   Pegar el <script> ANTES de </body> en todas las páginas:
   <script src="js/navbar_auth.js"></script>
   (ajustar ruta relativa si estás en subcarpeta)

   Este archivo NO modifica main.js.
   Solo agrega el toggle del menú desplegable de perfil.
   ============================================================ */

(function () {
  'use strict';

  const profileBtn = document.getElementById('gaProfileBtn');
  const dropdown   = document.getElementById('gaDropdown');

  if (!profileBtn || !dropdown) return; // No hay sesión activa, salir

  // Abrir / cerrar dropdown
  profileBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    const isOpen = dropdown.classList.toggle('open');
    profileBtn.setAttribute('aria-expanded', isOpen);
  });

  // Cerrar al hacer click fuera
  document.addEventListener('click', function (e) {
    if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.remove('open');
      profileBtn.setAttribute('aria-expanded', 'false');
    }
  });

  // Cerrar con Escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      dropdown.classList.remove('open');
      profileBtn.setAttribute('aria-expanded', 'false');
      profileBtn.focus();
    }
  });

  // Navegar con teclado dentro del dropdown (accesibilidad)
  dropdown.addEventListener('keydown', function (e) {
    const items = Array.from(dropdown.querySelectorAll('.nav-dd-item'));
    const idx   = items.indexOf(document.activeElement);
    if (e.key === 'ArrowDown') {
      e.preventDefault();
      (items[idx + 1] || items[0]).focus();
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      (items[idx - 1] || items[items.length - 1]).focus();
    }
  });

})();