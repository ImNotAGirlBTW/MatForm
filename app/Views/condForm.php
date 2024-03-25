<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>

<div class="wrap">
    <div class="container form-container">
        <?php echo helper('form'); ?>
        <?php echo form_open('insert/cond', ['id' => 'mainForm1']); ?>
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
        <button type="submit">ff</button>
        <?php echo form_close(); ?>
    </div>
</div>
<div class="mt-1 d-flex justify-content-center align-items-center">
    <button type="button" class="btn btn-primary btn-block" onclick="submitAllForms()">Odeslat</button>
    <button type="button" class="btn btn-success btn-block" onclick="addNewForm()">+</button>
</div>
<script>
    let formCount = 1;

    function addNewForm() {
        const mainForm = document.getElementById('mainForm1');
        const clonedForm = mainForm.cloneNode(true);
        formCount++;

        clonedForm.id = 'mainForm' + formCount;

        clonedForm.reset();

        document.querySelector('.container').appendChild(clonedForm);
    }

    function submitAllForms() {
        const forms = document.querySelectorAll('form[id^="mainForm"]');
        forms.forEach(form => form.submit());
    }
</script>


<?= $this->endSection(); ?>