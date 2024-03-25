<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Jméno</th>
          <th scope="col">email</th>
          <th scope="col">Práva</th>
        </tr>
      </thead>
      <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->isAdmin ?></td>
                        <td>
                        <button class="btn btn-primary" onclick="window.location.href='<?= base_url('editUsers/' . $user->id) ?>'">Upravit</button>
                        <button class="btn btn-danger" onclick="window.location.href='<?= base_url('delete/User/' . $user->id) ?>'">Smazat</button>

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
    </table>
  </div>

<?= $this->endSection(); ?>
