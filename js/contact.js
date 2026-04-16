/* =====================================================
   GoldAge – contact.js
   Form validation + FAQ accordion
   ===================================================== */

// ---- FORM SUBMIT ----
function submitForm() {
  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const service = document.getElementById('service').value;
  const success = document.getElementById('formSuccess');

  if (!name || !email || !service) {
    alert('Por favor completa los campos requeridos: nombre, correo y servicio.');
    return;
  }

  // Simulate sending
  const btn = document.querySelector('.submit-btn');
  btn.textContent = 'Enviando...';
  btn.disabled = true;

  setTimeout(() => {
    success.classList.add('visible');
    btn.textContent = '✅ Enviado';
    document.getElementById('contactForm').querySelectorAll('input, select, textarea').forEach(el => el.value = '');
  }, 1200);
}

// ---- FAQ ACCORDION ----
function toggleFAQ(btn) {
  const answer = btn.nextElementSibling;
  const isOpen = btn.classList.contains('open');

  // Close all
  document.querySelectorAll('.faq-question').forEach(q => {
    q.classList.remove('open');
    q.nextElementSibling.classList.remove('open');
  });

  // Open clicked if it was closed
  if (!isOpen) {
    btn.classList.add('open');
    answer.classList.add('open');
  }
}
