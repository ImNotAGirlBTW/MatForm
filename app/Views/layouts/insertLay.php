<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vložení děl</title>
    <link href="<?= base_url('/vendor/twbs/bootstrap/dist/css/bootstrap.min.css' )?>" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; 
        }
        .wrap{
            margin-top: 10px;
        }
        h2{
            text-align: center;
        }

        .form-container {
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 10px; 
            padding: 20px;
            max-width: 500px; 
            width: 100%;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url("insertView")?>">Excel</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url("insert")?>">Vložení</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url("edit/books")?>">Knihy</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url("editCond")?>">Podmínky</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php $this->renderSection('content'); ?>

</body>

</html>
