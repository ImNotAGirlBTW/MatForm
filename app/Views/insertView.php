<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>

    <div class="wrap">
        <div class="container form-container">
            <h2 class="text-center">Vyberte excel soubor</h2>
            <?= helper('form'); ?>
            <?= form_open_multipart('dataUpload'); ?>

           
            <input type="file" class="form-control" name="excel_file" id="excel_file" accept=".xls, .xlsx" required>

            <br>

            <button type="submit" class="btn btn-primary btn-block">Uložit</button>

            <?= form_close(); ?>
        </div>
    </div>
<?= $this->endSection(); ?>
