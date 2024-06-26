<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard-admin</title>
  <link href="<?= base_url('/vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
<script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>




  <style>
    .wrap {
      margin-top: 10px;
    }

    h2 {
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
            <a class="nav-link" href="<?= base_url("/") ?>">Formulář</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("edit/books") ?>">Díla</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("editCond") ?>">Podmínky</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("editUsers") ?>">Uživatelé</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Vložení
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href=" <?= base_url("insert") ?>">Dílo</a></li>
              <li><a class="dropdown-item" href=" <?= base_url("insertView") ?>">Excel</a></li>
              <li><a class="dropdown-item" href="<?= base_url("insertCond") ?>">Druh</a></li>
              <li><a class="dropdown-item" href="<?= base_url("insertCond2") ?>">Okruh</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav d-flex mb-2 mb-lg-0">
        <li class="nav-item" style="padding-right: 10px;">
          <a class="nav-link" href="<?= base_url('logout') ?>">Odhlásit se</a>
        </li>
      </ul>
    </div>
  </nav>

  <?php $this->renderSection('content'); ?>

</body>

</html>