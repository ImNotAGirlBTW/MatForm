<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">Navbar</span>
    <ul class="navbar-nav d-flex mb-2 mb-lg-0">
      <li class="nav-item" style="padding-right: 10px;">
        <a class="nav-link" href="#">Přihlásit se</a>
      </li>
    </ul>
</nav>
    <?php $this->renderSection('content'); ?>
   
    
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
let prevScrollPos = window.pageYOffset;
const navbar = document.querySelector('.navbar');
const tableContainer = document.querySelector('.table-container');

window.onscroll = function() {
  const currentScrollPos = window.pageYOffset;

  if (currentScrollPos === 0) {
    // User is at the top of the screen
    navbar.style.display = 'flex';
    tableContainer.style.marginTop = navbar.offsetHeight + 'px'; // Push down the table-container
  } else {
    // User is not at the top of the screen
    navbar.style.display = 'none';
    tableContainer.style.marginTop = '0'; // Reset the margin
  }

  prevScrollPos = currentScrollPos;
};
</script>
</body>
</html>