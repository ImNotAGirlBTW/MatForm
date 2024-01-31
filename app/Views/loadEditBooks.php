<?= $this->extend('layouts/master'); ?>

<?= $this->section('content') ?>
<div class="wrap">
    <div class="container form-container">
     

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dílo</th>
                    <th>Autor</th>
                    <th>Zanr</th>
                    <th>Okruh</th>
                    
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
                                <a href="<?= base_url('edit/book/' . $book->idKniha) ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
