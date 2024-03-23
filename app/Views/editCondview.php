<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Název</th>
          <th scope="col">Popis</th>
          <th scope="col">Pocet</th>
        </tr>
      </thead>
      <tbody>
                <?php foreach ($zanrOptions as $one): ?>
                    <tr>
                        <td><?= $one->nazev ?></td>
                        <td><?= $one->popis ?></td>
                        <td><?= $one->pocet ?></td>
                        <td>
                        <button class="btn btn-primary" onclick="window.location.href='<?= base_url('editChar' . $one->idZanr) ?>'">Upravit</button>
                        <button class="btn btn-danger" onclick="window.location.href='<?= base_url('delete/Cond1/' . $one->idZanr) ?>'">Smazat</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($okruhOptions as $one): ?>
                    <tr>
                        <td><?= $one->nazev ?></td>
                        <td><?= $one->popis ?></td>
                        <td><?= $one->pocet ?></td>
                        <td>
                        <button class="btn btn-primary" onclick="window.location.href='<?= base_url('editOkruh' . $one->idOkruh) ?>'">Upravit</button>
                        <button class="btn btn-danger" onclick="window.location.href='<?= base_url('delete/Cond2/' . $one->idOkruh) ?>'">Smazat</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td>Celkem</td>
                    <form  method="POST" action="<?= base_url('saveEditCond')?>">
                    <input type="num"  name="idPodm" id="idPodm" class="form-control" value="<?= $cond->idPodminky?> " hidden> 
                        <td>
                        <input type="text"  name="popis" id="popis" class="form-control" value="<?= $cond->popis?>">

                    </td>
                            <td>
                                <input type="num"  name="cond" id="cond" class="form-control" value="<?= $cond->pocet?>">
                            </td>
                            <td>
                                <button class="btn btn-primary"?>Uložit</button>
                            </td>
                     </form>
                    </tr>
                </tbody>
    </table>

<?= $this->endSection(); ?>
