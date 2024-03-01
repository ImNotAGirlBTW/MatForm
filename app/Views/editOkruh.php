<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>
    <div class="wrap">
        <div class="container form-container">
            <?= helper('form'); ?>
            <?= form_open_multipart('editOkruh/save'); ?>
           <?php foreach ($okruhOptions as $one):?>
            <input type="hidden"  name="okruhID" id="okruhID" value="<?= $one->idOkruh?>" >
            <input type="text" class="form-control" name="okruh" id="okruh" value="<?= $one->nazev?>" required>
            <input type="text" class="form-control" name="oPopis" id="oPopis" value="<?= $one->popis?>" required>
            <input type="number" class="form-control" name="oPocet" id="oPocet" value="<?= $one->pocet?>" required>
            <br>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary btn-block">Uložit</button>

            <?= form_close(); ?>
        </div>
    </div>
<?= $this->endSection(); ?>
