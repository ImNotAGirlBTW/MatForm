<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link href="<?= base_url('/vendor/twbs/bootstrap/dist/css/bootstrap.min.css' )?>" rel="stylesheet">
   <link href="<?= base_url('assets/mainForm.css' )?>" rel="stylesheet">
   
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Logo?</span>
    <ul class="navbar-nav d-flex mb-2 mb-lg-0">
      <li class="nav-item" style="padding-right: 10px;">
        <?php if($user) { ?>
          <a class="nav-link" href="<?=base_url('logout')?>">Odhlásit se</a>
        <?php } else { ?>
          <a class="nav-link" href="<?=base_url('login')?>">Přihlásit se</a>
        <?php } ?>
      </li>
    </ul>
</nav>
    <?php $this->renderSection('content'); ?>

<script>
const navbar = document.querySelector('.navbar');
const tableContainer = document.querySelector('.table-container');

// Function to handle scroll event
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
</script>
</body>
</html>