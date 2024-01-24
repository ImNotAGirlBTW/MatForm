<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>
<style>
    .table-container {
        display: flex;
        justify-content: space-between;
    }

    .table {
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>
<div class="table-container">
<?php
foreach ($conditions as $cond) {
    echo '<table class="table">';
    echo '<tr>'; 
    echo '<th scope="row">';
    echo '<td>';
    echo $cond['popis'] . '<div id="' . $cond['okruh'] . '_count">' . $cond['oPocet'] . '</div>' . " " . $cond['okruh'];
    echo '</td>';
    echo '</th>';
    echo '</tr>'; 
    echo '</table>';
}

foreach ($conditions as $cond) {
    echo '<table class="table">';
    echo '<tr>'; 
    echo '<th scope="row">';
    echo '<td>';
    echo $cond['popis'] . '<div id="' . $cond['zanr'] . '_count">' . $cond['zPocet'] . '</div>' . " " . $cond['zanr'];
    echo '</td>';
    echo '</th>';
    echo '</tr>'; 
    echo '</table>';
}
?>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="<?= base_url(''); ?>"  onsubmit="return validateForm()"> 
                <?php 
                $currentCategory = null;
                    foreach($books as $book):
                        if ($book->okruh != $currentCategory) {
                            echo '<h2>' . $book->okruh . '</h2>';
                            $currentCategory = $book->okruh; 
                        }
                ?>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input"  value="<?=$book->okruh . "-" . $book->zanr?>" id="<?= $book->idKniha ?>" name="<?= $book->idKniha;?>"onclick="handleOnClick()">
                        <label class="form-check-label" for="<?= $book->idKniha ?>"><?=$book->autor ." <-- ".$book->nazev?></label>
                    </div>
                <?php 
                    endforeach;
                ?>
             
                <button id="butt"  class="btn btn-primary">Vytiskni</button>

               
            </form>
        </div>
    </div>
</div>

<script>
const conditions1 = <?= $conditionsJson ?>;
const conditions2 = <?= $LengthJson?>;
let metConditions = false;
var cond = [];
for (let i = 0; i < conditions1.length; i++) {
    cond[i] = conditions1[i].PozadovanyPocet;
}
var condPocet = conditions2[0].pocet;

function handleOnClick() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
    const checkedValues = checkedCheckboxes.map(checkbox => checkbox.value);
    const selectedValues = [];

    checkedValues.forEach(val => {
        const [okruh, zanr] = val.split("-");
        selectedValues.push({ okruh, zanr });
    });
    checkSelectedBooks(selectedValues);
}
function checkSelectedBooks(selectedValues) {
    let zanrArray=[];
    let okruhArray=[];

    for (const condition of conditions1) {
        const oPocet = parseInt(condition.oPocet, 10); 
        const zPocet = parseInt(condition.zPocet, 10); 

        const okruh = condition.okruh;
        const zanr = condition.zanr;
      
        
    }
    for (const val of selectedValues){
            zanrArray.push(val.zanr);
            okruhArray.push(val.okruh);
        }

        for (const condition of conditions1) {
        const zPocet = parseInt(condition.zPocet, 10);
        const oPocet = parseInt(condition.oPocet, 10);
        const zanrCount = zanrArray.filter(zanr => zanr === condition.zanr).length;
        const okruhCount = okruhArray.filter(okruh => okruh === condition.okruh).length;
          
        document.getElementById(`${condition.okruh}_count`).textContent = `${oPocet - okruhCount}`;
        document.getElementById(`${condition.zanr}_count`).textContent = `${zPocet - zanrCount}`;


        if (zanrCount >= zPocet && okruhCount >= oPocet && selectedValues.length == condPocet) {
            metConditions = true;
        }else{
            metConditions = false;
            console.log(`Žánr: ${condition.zanr}, Okruh: ${condition.okruh} nesplňuje podmínky.`);
        }
    }
        console.log("Zanr "  + zanrArray+ ", okruh " + okruhArray);
        console.log(metConditions);

        

}


function validateForm() {
    console.log("Form validation result:", metConditions);
    if(!metConditions){
        alert("Nesplněné podmínky!!");
    }
    
    return metConditions;
}


</script>
<?= $this->endSection();?>