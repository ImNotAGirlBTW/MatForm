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
    
    if (isset($cond['okruh'])) {
        echo $cond['popis'] . '<div id="' . $cond['okruh'] . '_count">' . $cond['oPocet'] . '</div>' . " " . $cond['okruh'];
    }

   
    if (isset($cond['zanr'])) {
        echo $cond['popis'] . '<div id="' . $cond['zanr'] . '_count">' . $cond['zPocet'] . '</div>' . " " . $cond['zanr'];
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
    //*Zkus změnit conditionsJson na zanrCond a okruh cond, pošli dva listy do dvou forcyklů */
const conditions1 = <?= $conditionsJson ?>;
const conditions2 = <?= $LengthJson?>;
let allConndition = [];
let metConditions = false;
let okruhConditionsMet = false;
let zanrConditionsMet = false;
var cond = [];
for (let i = 0; i < conditions1.length; i++) {
    cond[i] = conditions1[i].pocet;
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
    let zanrCounts = {};
    let okruhCounts = {};
    let totalCount = 0;
    let okruhCon = false;
    let zanrCon = false;

    for (const condition of conditions1) {
        const oPocet = parseInt(condition.oPocet, 10);
        const zPocet = condition.zanr ? parseInt(condition.zPocet, 10) : 0;

        const okruh = condition.okruh || '';
        const zanr = condition.zanr || '';
        
        if (okruh) {
            okruhCounts[okruh] = 0;
        }
        if (zanr) {
            zanrCounts[zanr] = 0;
        }
    }

    for (const val of selectedValues) {
        if (val.okruh && okruhCounts[val.okruh] !== undefined) {
            okruhCounts[val.okruh]++;
        }
        if (val.zanr && zanrCounts[val.zanr] !== undefined) {
            zanrCounts[val.zanr]++;
            totalCount ++;
        }
    }

    for (const condition of conditions1) {
        if (condition.okruh) {
            const oPocet = parseInt(condition.oPocet, 10);
            const okruhCount = okruhCounts[condition.okruh] || 0;

            if (oPocet - okruhCount <= 0) {
                document.getElementById(`${condition.okruh}_count`).style.backgroundColor = '#0FFF50';
                document.getElementById(`${condition.okruh}_count`).textContent = "SPLNĚNO";
            } else {
                document.getElementById(`${condition.okruh}_count`).textContent = `${oPocet - okruhCount}`;
                document.getElementById(`${condition.okruh}_count`).style.backgroundColor = 'white';
            }
        }

        if (condition.zanr) {
            const zPocet = parseInt(condition.zPocet, 10);
            const zanrCount = zanrCounts[condition.zanr] || 0;

            if (zPocet - zanrCount <= 0) {
                document.getElementById(`${condition.zanr}_count`).style.backgroundColor = '#0FFF50';
                document.getElementById(`${condition.zanr}_count`).textContent = "SPLNĚNO";
            } else {
                document.getElementById(`${condition.zanr}_count`).textContent = `${zPocet - zanrCount}`;
                document.getElementById(`${condition.zanr}_count`).style.backgroundColor = 'white';
            }

            //Celkem Odpočet
            if(condPocet - totalCount ==0){
                document.getElementById(`total_count`).style.backgroundColor = '#0FFF50';
                document.getElementById(`total_count`).textContent = "SPLNĚNO";
            } else {
                document.getElementById(`total_count`).textContent = `${condPocet - totalCount}`;
                document.getElementById(`total_count`).style.backgroundColor = 'white';
            }
        }
    }

    for (const condition of conditions1) {
     if (condition.okruh) {
      const okruhConditionsMet = conditions1.every(condition => {
        if (condition.okruh) {
            const oPocet = parseInt(condition.oPocet, 10);
            return okruhCounts[condition.okruh] >= oPocet;
        }
        okruhCon = true;
    });
        }


        if (condition.zanr) {
            for (const condition of conditions1) {
     if (condition.zanr) {
      const zanrConditionsMet = conditions1.every(condition => {
        if (condition.zanr) {
            const zPocet = parseInt(condition.oPocet, 10);
            return okruhCounts[condition.zanr] >= zPocet;
        }
        zanrCon = true;
    });
        }
    }
}
    

    if (okruhCon && zanrCon && selectedValues.length ==  condPocet) {
       metConditions = true;
    } else {
        metConditions = false;
    }

    console.log("Zanr Counts: ", zanrCounts);
    console.log("Okruh Counts: ", okruhCounts);
    console.log("Met Conditions: ", metConditions);
}
}

function validateForm() {
    console.log("Form validation result:", metConditions);
    if (!metConditions) {
        alert("Nesplněné podmínky!!");
    }
    return metConditions;
}
</script>

<?= $this->endSection();?>