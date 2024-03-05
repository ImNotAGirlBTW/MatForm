<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>
<style>
  h2 {
        text-align: center;
    }

    body {
        background-color: #f8f9fa;
    }

 
    .table-container {
        display: flex;
        justify-content: space-between;
        position: fixed;
        top: 0;
        width: 100%;
    }

    .table {
        border: 1px solid #ddd;
        padding: 8px;
        background-color: white;
    }

    @media (max-width: 768px) {
        .table-container {
            flex-direction: column; 
            align-items: center;
            top: 0;
            position:relative;
            justify-content: center;
        }

        .table {
            width: 100%; 
            margin-bottom: 5px; 
        }
    }

    .container {
        margin-top: 8%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .category-container {
        flex-basis: 100%; /* Full width on small screens */
        margin: 1%;
        border-radius: 10px;
        background-color: #fff;
        border: 2px solid #ddd;
        padding: 15px;
    }

    @media (min-width: 576px) {
        .category-container {
            flex-basis: 48%; /* 2 columns on larger screens */
        }
    }


</style>
<div class="table-container">
<?php


foreach ($conditions as $cond) {
    echo '<table class="table">';
    echo '<tr>'; 
    echo '<th scope="row">';
    echo '<td>';
    
    if (isset($cond['okruh'])) {
        echo '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $cond['popis'] . '">';
        echo "Potřeba vybrat" . '<div id="' . $cond['okruh'] . '_count">' . $cond['oPocet'] . '</div>' . " " . $cond['okruh'];
        echo '</span>';
    }

   
    if (isset($cond['zanr'])) {
        echo '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $cond['popis'] . '">';
        echo 'Potřeba vybrat' . '<div id="' . $cond['zanr'] . '_count">' . $cond['zPocet'] . '</div>' . " " . $cond['zanr'];
        echo '</span>';
    }

    echo '</td>';
    echo '</th>';
    echo '</tr>'; 
    echo '</table>';
}

foreach ($conditions2 as $cond){
    echo '<table class="table">';
    echo '<tr>'; 
    echo '<th scope="row">';
    echo '<td>';
    

        echo $cond['popis'] . '<div id="'  . 'total_count">' . $cond['pocet'] . '</div>';

    echo '</td>';
    echo '</th>';
    echo '</tr>'; 
    echo '</table>'; 
}
?>
</div>
<form method="POST" action="<?= base_url(''); ?>"  onsubmit="return validateForm()" id="myForm">
<div class="container">
    <?php
    $currentCategory = null;
    foreach ($books as $book):
        if ($book->okruh != $currentCategory) {
            if ($currentCategory !== null) {
                echo '</div>'; // Close the previous container
            }
            echo '<div class="category-container">'; // Open a new container
            $currentCategory = $book->okruh;
            echo '<h2>' . $book->okruh . '</h2>';
        }
        ?>
  <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" value="<?= $book->okruh . "-" . $book->zanr ?>" id="<?= $book->idKniha ?>" name="<?= $book->idKniha; ?>" onclick="handleOnClick()">
                <label class="form-check-label" for="<?= $book->idKniha ?>">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>
                                <span style="color:#5A5A5A"><?= $book->autor ?></span>
                                <span class="mx-2"> <?= " | " . $book->kniha . " | " ?></span>
                        </div>
                        <span style="color:red"> <?= $book->zanr ?></span>
                        </strong>
                    </div>
                </label>
            </div>
    <?php endforeach; ?>
    <?php echo '</div>'; ?>
</div>
<div class="text-center">
<button id="butt"  class="btn btn-primary">Vytiskni</button>
</div>
</form> 

<script>
const conditions1 = <?= $conditionsJson ?>;
const conditions2 = <?= $LengthJson?>;
</script>
<script src="<?= base_url('assets/checking.js')?>"></script>

<?= $this->endSection();?>  