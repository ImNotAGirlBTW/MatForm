<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>
<div class="container">
<div class="row">
        <div class="col-12">
<?php
foreach($conditions as $cond){
    echo '<table class ="table">';
    echo '<th scope="row"';
    echo '<td>';
    echo $cond->Popis ." ". $cond->okruh; 
    echo '</td>';
    echo '</th>';
    echo '</table>';
}
?>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="<?= base_url(''); ?>">
                <?php 
                $currentCategory = null;
                    foreach($books as $book):
                        if ($book->okruh != $currentCategory) {
                            echo '<h2>' . $book->okruh . '</h2>';
                            $currentCategory = $book->okruh; 
                        }
                ?>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="<?= $book->idKniha ?>" name="<?= $book->idKniha; ?>">
                        <label class="form-check-label" for="<?= $book->idKniha ?>"><?=$book->Autor ." -- ".$book->Nazev?></label>
                    </div>
                <?php 
                    endforeach;
                ?>
                <button type="submit" class="btn btn-primary">Vytiskni</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection();?>