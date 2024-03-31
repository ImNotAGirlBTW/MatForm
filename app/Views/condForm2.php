<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>

<div class="wrap">
    <div class="container form-container">
        <?php echo helper('form'); ?>
        <?php echo form_open('insert/cond2', ['id' => 'mainForm1']); ?>
        <label for="nazev">Zkratka:</label>
        <input type="text" name="nazev" id="nazev" class="form-control" required>

        <br><br>

        <label for="popis">Popis:</label>
        <input type="text" name="popis" id="popis" class="form-control" required>

        <br><br>

        <label for="pocet">Počet:</label>
        <input type="number" min="0" name="pocet" id="pocet" class="form-control" required>


        <br><br>
        <hr>
        <button type="submit" class="btn btn-primary btn-block" >Odeslat</button>
        <?php echo form_close(); ?>
    </div>

<?= $this->endSection(); ?>
