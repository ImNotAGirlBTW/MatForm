<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>
<div class="wrap">
    <div class="container form-container">
        <h2>Insert Book</h2>
        <?php echo helper('form'); ?>
        <?php echo form_open('insert/book'); ?>

        <label for="nazev">Book Name:</label>
        <input type="text" name="nazev" id="nazev" class="form-control" required>

        <br><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" required>

        <br><br>

        <label for="zanr">Zanr:</label>
        <select name="zanr" id="zanr" class="form-control" required>
            <option value="" selected disabled>Vyberte žánr</option>
            <?php foreach ($zanrOptions as $zanrOption): ?>
                <option value="<?= $zanrOption['idZanr'] ?>"><?= $zanrOption['nazev'] ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="okruh">Okruh:</label>
        <select name="okruh" id="okruh" class="form-control" required>
            <option value="" selected disabled>Vyberte okruh</option>
            <?php foreach ($okruhOptions as $okruhOption): ?>
                <option value="<?= $okruhOption['idOkruh'] ?>"><?= $okruhOption['nazev'] ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <button type="submit" class="btn btn-primary btn-block">Upload</button>

        <?php echo form_close(); ?>
    </div>
</div>
<?= $this->endSection(); ?>
