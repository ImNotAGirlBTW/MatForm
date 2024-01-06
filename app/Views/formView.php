<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>
<div class="container">
<div class="row">
        <div class="col-12">
<?php
foreach ($books as $cond) {
    echo '<table class="table">';
    echo '<tr>'; 
    echo '<th scope="row">';
    echo '<td>';
    echo $cond->Popis . '<div id="' . $cond->okruh . '_count">' . $cond->oPocet . '</div>' . " " . $cond->okruh;
    echo '</td>';
    echo '</th>';
    echo '</tr>'; 
    echo '</table>';
}
?>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="<?= base_url(''); ?>" onsubmit=" return validateForm()" >
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
let metConditions =false;
var cond = [];
for(let i=0; i < conditions1.length; i++){
     cond[i] = conditions1[i].PozadovanyPocet;
}



function handleOnClick() {
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
const checkedValues = checkedCheckboxes.map(checkbox => checkbox.value);
//const bookGen = [... new Set(checkedValues)];
checkSelectedBooks(checkedValues);


    
}

function checkSelectedBooks(checkedValues) {
    const genreCounts = {};

    checkedValues.forEach(genre => {
        genreCounts[genre] = (genreCounts[genre] || 0) + 1;
    });

   
    for (const condition of conditions1) {
        const selectedCount = genreCounts[condition.okruh] || 0;
        const requiredCount = parseInt(condition.PozadovanyPocet, 10);
        const remainingNeeded = Math.max(0, requiredCount - selectedCount);

      
        const countElement = document.getElementById(`${condition.okruh}_count`);
        
        if (countElement) {
            countElement.innerHTML = `${remainingNeeded} potřeba`;
        }

        

        if (selectedCount < requiredCount && remainingNeeded > 0) {
            console.log(`Pro ${condition.okruh}. Potřeba: ${requiredCount}, Vybráno: ${selectedCount}, Zbývá: ${remainingNeeded}`);
     
        }else{
            metConditions= true;
        }

}
}
function validateForm() {
    console.log("Form validation result:", metConditions);
    alert("Nesplněné podmínky!!");
    return metConditions;
}





</script>
<?= $this->endSection();?>