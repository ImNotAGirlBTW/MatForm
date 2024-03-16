<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>
<div class="wrap">
    <div class="container form-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Popis</th>
                    <th>Pocet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zanrOptions as $one): ?>
                    <tr>
                        <td><?= $one->idZanr ?></td>
                        <td><?= $one->nazev ?></td>
                        <td><?= $one->popis ?></td>
                        <td><?= $one->pocet ?></td>
                        <td>
                        <button class="btn btn-primary" onclick="window.location.href='<?= base_url('editChar' . $one->idZanr) ?>'">Upravit</button>
                        <button class="btn btn-danger" onclick="window.location.href='<?= base_url('delete/Cond1/' . $one->idZanr) ?>'">Smazat</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Popis</th>
                    <th>Pocet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($okruhOptions as $one): ?>
                    <tr>
                        <td><?= $one->idOkruh ?></td>
                        <td><?= $one->nazev ?></td>
                        <td><?= $one->popis ?></td>
                        <td><?= $one->pocet ?></td>
                        <td>
                        <button class="btn btn-primary" onclick="window.location.href='<?= base_url('editOkruh' . $one->idOkruh) ?>'">Upravit</button>
                        <button class="btn btn-danger" onclick="window.location.href='<?= base_url('delete/Cond2/' . $one->idOkruh) ?>'">Smazat</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
