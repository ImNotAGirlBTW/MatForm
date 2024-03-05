<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link href="<?= base_url('/vendor/twbs/bootstrap/dist/css/bootstrap.min.css' )?>" rel="stylesheet">
   <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
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
<script src="<?= base_url('assets/scroll.js')?>"></script>
</body>
</html>