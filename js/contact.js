/* =====================================================
   GoldAge – contact.js
   Form validation + FAQ accordion
===================================================== */
/* ===== STAR RATING ===== */

let selectedRating = 0;

const stars = document.querySelectorAll('#ratingStars span');

stars.forEach((star, index) => {

  // CLICK
  star.addEventListener('click', () => {

    selectedRating = index + 1;

    stars.forEach((s, i) => {

      if (i < selectedRating) {
        s.classList.add('active');
      } else {
        s.classList.remove('active');
      }

    });

  });

});
// ---- FORM SUBMIT ----
function submitForm() {

  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const message = document.getElementById('message').value.trim();

  const success = document.getElementById('formSuccess');

  if (!name || !email || !message || selectedRating === 0) {

    alert('Please complete all required fields and rating.');
    return;

  }

  const btn = document.querySelector('.submit-btn');

  btn.textContent = 'Sending...';
  btn.disabled = true;

  setTimeout(() => {

    success.classList.add('visible');

    btn.textContent = 'Submit Review';
    btn.disabled = false;

    document.getElementById('reviewForm').reset();

    // Reset stars
    selectedRating = 0;

    stars.forEach(s => {
      s.classList.remove('active');
    });

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