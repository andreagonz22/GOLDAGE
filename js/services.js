function togglePrices(btn) {
  const dropdown = btn.querySelector('.price-dropdown');
  const isOpen = dropdown.classList.contains('open');
  document.querySelectorAll('.price-dropdown.open').forEach(d => d.classList.remove('open'));
  if (!isOpen) dropdown.classList.add('open');
}

document.addEventListener('click', function(e) {
  if (!e.target.closest('.btn-price')) {
    document.querySelectorAll('.price-dropdown.open').forEach(d => d.classList.remove('open'));
  }
});