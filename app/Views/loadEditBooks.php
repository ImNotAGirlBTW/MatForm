<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Dílo</th>
          <th scope="col">Autor</th>
          <th scope="col">Druh</th>
          <th scope="col">Okruh</th>
        </tr>
      </thead>
      <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book->idKniha ?></td>
                        <td><?= $book->kniha ?></td>
                        <td><?= $book->autor ?></td>
                        <td><?= $book->zanr ?></td>
                        <td><?= $book->okruh ?></td>
                        <td>
                        <button class="btn btn-primary" onclick="window.location.href='<?= base_url('edit/book/' . $book->idKniha) ?>'">Upravit</button>

                        <button class="btn btn-danger" onclick="window.location.href='<?= base_url('delete/' . $book->idKniha) ?>'">Smazat</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
    </table>
  </div>

<?= $this->endSection(); ?>
