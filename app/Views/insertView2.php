<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content') ?>
<div class="wrap">
    <div class="container form-container">
        <?php echo helper('form'); ?>
        <?php echo form_open('insert/book', ['id' => 'mainForm1']); ?>

        <label for="nazev">Název díla:</label>
        <input type="text" name="nazev" id="nazev" class="form-control" required>

        <br><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" class="form-control" required>

        <br><br>

        <label for="zanr">Druh:</label>
        <select name="zanr" id="zanr" class="form-control" required>
            <option value="" selected disabled>Vyberte lit. druh</option>
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
        <hr>
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
    console.log("Submit all forms button clicked."); // Check if function is called
    const forms = document.querySelectorAll('form[id^="mainForm"]');
    forms.forEach(form => {
        if (form.checkValidity()) { 
            form.submit();
        }
    });
}
</script>


<?= $this->endSection(); ?>
