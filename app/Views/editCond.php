<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content');?>
    <div class="wrap">
        <div class="container form-container">
            <?= helper('form'); ?>
            <?= form_open('editChar/save') ?>
           <?php foreach ($zanrOptions as $one):?>
            <input type="hidden"  name="zanrID" id="zanrID" value="<?= $one->idZanr?>" >
            <input type="text" class="form-control" name="zanr" id="zanr" value="<?= $one->nazev?>" required>
            <input type="text" class="form-control" name="zPopis" id="zPopis" value="<?= $one->popis?>" required>
            <input type="number" class="form-control" name="zPocet" id="zPocet" value="<?= $one->pocet?>" required>
            <br>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary btn-block">Uložit</button>

            <?= form_close(); ?>
        </div>
    </div>
<?= $this->endSection(); ?>
