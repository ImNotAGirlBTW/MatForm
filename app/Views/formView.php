<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="<?= base_url(''); ?>">
                <?php 
                    foreach($books as $book):
                ?>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="<?= $book['id'] ?>" name="<?= $book['id']; ?>">
                        <label class="form-check-label" for="<?= $book['id'] ?>"><?= $book['title'] ?></label>
                    </div>
                <?php 
                    endforeach;
                ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection();?>