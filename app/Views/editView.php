<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content'); ?>
<div class="wrap">
    <div class="container form-container">
        <h2>Edit Book</h2>
        <?php echo helper('form'); ?>
        <?php echo form_open('save/book', ['id' => 'editForm']); ?>

        <input type="hidden" name="idKniha" value="<?= $book->idKniha ?>">

        <label for="nazev">Dílo:</label>
        <input type="text" name="nazev" id="nazev" class="form-control" value="<?= $book->nazev ?>" required>

        <br><br>
        <label for="zanr">Druh:</label>
        <select name="zanr" id="zanr" class="form-control" required>
            <option value="" selected disabled>Vyberte lit. druh</option>
            <?php foreach ($zanrOptions as $zanrOption) : ?>
                <option value="<?= $zanrOption->idZanr ?>" <?= ($book->Zanr_idZanr == $zanrOption->idZanr) ? 'selected' : '' ?>>
                    <?= $zanrOption->nazev ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="okruh">Okruh:</label>
        <select name="okruh" id="okruh" class="form-control" required>
            <option value="" selected disabled>Vyberte okruh</option>
            <?php foreach ($okruhOptions as $okruhOption) : ?>
                <option value="<?= $okruhOption->idOkruh ?>" <?= ($book->Okruh_idOkruh == $okruhOption->idOkruh) ? 'selected' : '' ?>>
                    <?= $okruhOption->nazev ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" value="<?= $book->autor ?>" required>

        <br><br>

        <button type="submit" class="btn btn-primary btn-block">Uložit změny</button>

        <?php echo form_close(); ?>
    </div>
</div>



<?= $this->endSection(); ?>