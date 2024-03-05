
let prevScrollPos = window.pageYOffset;
const navbar = document.querySelector('.navbar');
const tableContainer = document.querySelector('.table-container');

window.onscroll = function() {
  const currentScrollPos = window.pageYOffset;

  if (currentScrollPos === 0) {
    navbar.style.display = 'flex';
    tableContainer.style.marginTop = navbar.offsetHeight + 'px'; 
  } else {
    navbar.style.display = 'none';
    tableContainer.style.marginTop = '0'; 
  }

  prevScrollPos = currentScrollPos;
};

