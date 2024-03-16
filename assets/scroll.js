document.addEventListener('DOMContentLoaded', function() {
  const navbar = document.querySelector('.navbar');
  const tableContainer = document.querySelector('.table-container');

  function handleScroll() {
    if (window.scrollY == 0) {
      navbar.style.display = 'flex';
      tableContainer.style.marginTop = navbar.offsetHeight + 'px';
    } else {
      navbar.style.display = 'none';
      tableContainer.style.marginTop = '0';
    }
  }

  handleScroll();

  window.onscroll = handleScroll;
});
