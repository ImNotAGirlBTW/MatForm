<?= $this->extend('layouts/insertLay'); ?>

<?= $this->section('content');?>
<div class="wrap">
    <div class="container form-container">
        <?php echo helper('form'); ?>
        <?php echo form_open('editUsers/save', ['id' => 'editForm']); ?>

        <input type="hidden" name="idUser" value="<?= $user->id?>">

        <label for="jmeno">Jméno:</label>
        <input type="text" name="jmeno" id="jmeno" class="form-control" value="<?= $user->username ?>" readonly>

        <br><br>
      
        <label for="email">email:</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= $user->email ?>" readonly>

        <br><br>

        <label for="oprav">Oprávnění:</label>
        <select name="oprav" id="oprav" class="form-control" required>
            <option value="" selected disabled>Udělte oprávnění</option>
            <option value="1">Admin</option>
            <option value="0">Student</option>
                </option>
        </select>

        <br><br>

        <button type="submit" class="btn btn-primary btn-block">Uložit změny</button>

        <?php echo form_close(); ?>
    </div>
</div>



<?= $this->endSection(); ?>
