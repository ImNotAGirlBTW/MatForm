<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>
<style>
    h2{
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

    .container{
        margin-top: 8%;
        display: flex;
        flex-wrap: wrap; 
        justify-content: center;
    }

    .okruhSector {
        width: 100px;
        height: 100px;
        margin: 10px;
        border: 1px solid #000;
    }

    .category-container {
        flex-basis: 48%;
        margin: 1%;
        border-radius: 10px;
        background-color: #fff;
        border: 2px solid #ddd; 
        padding: 15px;
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
    <?php echo '</div>'; // Close the last container ?>
    <button id="butt"  class="btn btn-primary">Vytiskni</button>
    </form> 
</div>


<script>
const conditions1 = <?= $conditionsJson ?>;
const conditions2 = <?= $LengthJson?>;
let allConndition = [];
let metConditions = false;
let okruhConditionsMet = false;
let zanrConditionsMet = false;
let zanrCounts = {};
let okruhCounts = {};
let unMetZ =  {};
let unMetO = {};
let totalCount = 0;
const unmetOkruhConditions = [];
var cond = [];

for (const condition of conditions1) {
        unMetZ[condition.zanr] = condition.zanr;
        unMetO[condition.okruh] = condition.okruh;}

for (let i = 0; i < conditions1.length; i++) {
    cond[i] = conditions1[i].pocet;
}
var condPocet = conditions2[0].pocet;
function handleOnClick() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
    totalCount = checkedCheckboxes.length;
    const checkedValues = checkedCheckboxes.map(checkbox => checkbox.value);
    const selectedValues = [];


    checkedValues.forEach(val => {
        const [okruh, zanr] = val.split("-");
        selectedValues.push({ okruh, zanr });
    });
    checkSelectedBooks(selectedValues);

}

function checkSelectedBooks(selectedValues) {

    let okruhCon = false;
    let zanrCon = false;
 

    for (const condition of conditions1) {
      //  unMetZ[condition.zanr] = condition.zanr;

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
                console.log("Celk :" + condPocet);
                document.getElementById(`total_count`).style.backgroundColor = 'white';
            }

            for(const condition of conditions1){
                if(zanrCounts[condition.zanr] >=  parseInt(condition.zPocet, 10)){
                    zanrCon[condition.zanr] = 1;
                    delete unMetZ[condition.zanr];
                    console.log("zanr : " +zanrCon[condition.zanr]);
                }

                if(okruhCounts[condition.okruh] >= parseInt(condition.oPocet,10)){
                    delete unMetO[condition.okruh];
                }
            }
        }
    }

    for (const condition of conditions1) {
        for (const condition of conditions1) {
  if (condition.okruh) {
    const oPocet = parseInt(condition.oPocet, 10);

    const isOkruhGreaterOrEqual = okruhCounts[condition.okruh] >= oPocet;

    if (isOkruhGreaterOrEqual) {
      okruhCon = true;
      for (const val of selectedValues) {
      if (val.okruh && okruhCounts[val.okruh] !== undefined) {
            delete unMetO[val.okruh];
        }}
    } else {
      okruhCon = false; 
      //console.log("ne pro :" + conditon.okruh);
      break; 
    }
  }
        }

        for (const condition of conditions1) {
  if (condition.zanr) {
    const zPocet = parseInt(condition.zPocet, 10);

    const isZanrGreaterOrEqual = zanrCounts[condition.zanr] >= zPocet;

    if (isZanrGreaterOrEqual) {
      zanrCon = true;
    } else {
      zanrCon = false; 
      //console.log("ne pro :" + conditon.okruh);
      break; 
    }
  }
        }


}

    

    if (zanrCon && okruhCon && selectedValues.length ==  condPocet) {
        metConditions = true;
    } else {
        metConditions = false;
    }
    
    console.log("Žánr počet: ", zanrCounts);
    console.log("Okruh počet: ", okruhCounts);
    console.log("Podmínka: ", metConditions);
    console.log("zanr : " +zanrCon);
    console.log("okruh : " + okruhCon);
    console.log(zanrConditionsMet);
  
}






function validateForm() {
    const unMetZValues = Object.values(unMetZ).filter(value => value !== undefined);
    const unMetOValues = Object.values(unMetO).filter(value => value !== undefined);
  if (!metConditions) {
alert(
    "Nesplňené podmínky pro : " +  unMetZValues.join(' ,') + "\n"
     + "Nesplňené podmínky pro : "+ unMetOValues.join(' ,') +"\n"
      + "Potřeba ještě vybrat : "+  JSON.stringify(condPocet - totalCount));

 return false;
  }
  return metConditions;
}



 


</script>

<?= $this->endSection();?>  