<?php
$this->extend('layouts/master');
$this->section('content')
?>
<div class="table-container">
    <?php


    foreach ($conditions as $cond) {
        echo '<table class="table">';
        echo '<tr>';
        echo '<th scope="row">';
        echo '<td>';

        if (isset($cond['okruh'])) {
            echo '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $cond['popis'] . '">';
            echo "Nutno vybrat" . '<div id="' . $cond['okruh'] . '_count">' . $cond['oPocet'] . '</div>' . " " . $cond['okruh'];
            echo '</span>';
        }


        if (isset($cond['zanr'])) {
            echo '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $cond['popis'] . '">';
            echo 'Nutno vybrat' . '<div id="' . $cond['zanr'] . '_count">' . $cond['zPocet'] . '</div>' . " " . $cond['zanr'];
            echo '</span>';
        }

        echo '</td>';
        echo '</th>';
        echo '</tr>';
        echo '</table>';
    }

    foreach ($conditions2 as $cond) {

        echo '<table class="table">';
        echo '<tr>';
        echo '<th scope="row">';
        echo '<td>';
        echo '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $cond['popis'] . '">';
        echo " Celkem nutno vybrat" . '<div id="'  . 'total_count">' . $cond['pocet'] . '</div>';
        echo '</span>';
        echo '</td>';
        echo '</th>';
        echo '</tr>';
        echo '</table>';
    }
    ?>
</div>
<?php
if(isset($user) && $user['isAdmin'] == 1){
        echo '<div class="config">';
        echo '<form method="POST" action="'. base_url('editYear') .'" " id="yearForm">';
        echo '<input type="hidden" name="yearId" id="yearId" value="'. $year->id .'">';
        echo '<input type="text"  name="year" id="year" class="form-control" value="'. $year->skolni_rok .'">';
        echo '</form>';
        echo '<a href="'.base_url('allBooks').'">Tisk učitel</a>';
        echo '</div>';
    }
    ?>
<form method="POST" action="<?= base_url(''); ?>" onsubmit="return validateForm()" id="myForm">
    <div class="container">
        <?php
        $currentCategory = null;
        foreach ($books as $book) :
            if ($book->okruh != $currentCategory) {
                if ($currentCategory !== null) {
                    echo '</div>'; 
                }
                echo '<div class="category-container">';
                $currentCategory = $book->okruh;
                echo '<h2>' . $book->okruh . '</h2>';
            }
        ?>
            <div class="mb-3 form-check">
                <input type="checkbox" id="<?= $book->idKniha ?>" class="form-check-input" value="<?= $book->okruh . "-" . $book->zanr ?>" id="<?= $book->idKniha ?>" name="<?= $book->idKniha; ?>" onclick="handleOnClick()">
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
</div>
<div class="text-center">
        <button id="butt" class="btn btn-primary">Vytiskni</button>
    </div>
</form>


<script>
    const conditions1 = <?= $conditionsJson ?>;
    const conditions2 = <?= $LengthJson ?>;


    document.addEventListener('DOMContentLoaded', function() {
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });
    });
  </script>

  <script>
    const navbar = document.querySelector('.navbar');
    const tableContainer = document.querySelector('.table-container');


    function handleScroll() {
      if (window.scrollY == 0) {
        navbar.style.display = 'flex';
        tableContainer.style.marginTop = navbar.offsetHeight + 'px';
      } else {
        navbar.style.display = 'none';
        tableContainer.style.marginTop = '0';
      }
    }
    handleScroll();
    window.onscroll = handleScroll;

    function checkCheckboxesFromArray(checkboxIds) {
      checkboxIds.forEach(id => {
        const checkbox = document.getElementById(id);
        if (checkbox) {
          checkbox.checked = true;
        }
      });
    }
  </script>
  <script src="<?= base_url('assets/checking.js') ?>"></script>
  <script>
    if (<?= $checkboxID ?> != null) {
      preslectCheckbox(<?= $checkboxID ?>);
    }
  </script>
  <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<?= $this->endSection(); ?>