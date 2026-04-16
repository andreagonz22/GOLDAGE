/* =====================================================
   GoldAge – nurses.js
   Filter team by specialty
   ===================================================== */

const filterBtns = document.querySelectorAll('.filter-btn');
const nurseCards = document.querySelectorAll('.nurse-card');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    // Update active state
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const filter = btn.dataset.filter;

    nurseCards.forEach(card => {
      const type = card.dataset.type;
      if (filter === 'all' || type === filter) {
        card.classList.remove('hidden');
        card.style.animation = 'fadeInUp 0.4s ease forwards';
      } else {
        card.classList.add('hidden');
      }
    });
  });
});
