
<?= $this->extend('layouts/pdfLay');?>

<?= $this->section('content')?>
<?php
     $count = 1;
    $png = file_get_contents(base_url("images/logo2.png"));
    $pngbase64 = base64_encode($png);?>
    <body>
<div>
<img src='data:image;base64,<?= $pngbase64?>' alt="oauhLogo">
</div>
    
<div class="container">
    <div class="row">
        <div class="col-12">    
        <h1>Žákovský seznam literárních děl k maturitní zkoušce</h1>
        <table class="informace">
    <tr>
        <th>
            Jméno:
        </th>
        <td>

        </td>
    </tr>

    <tr>
        <th>
            Třída:
        </th>
        <td>

        </td>
    </tr>

    <tr>
        <th>
            Školní rok:
        </th>
        <td>

        </td>
    </tr>
        </table>
        <br>
    <table class="table">
        <thead>
            <tr>
                <th>
                    
                </th>
                <th>Autor: Dílo</th>
                <th>Okruh</th>
                <th>Poezie</th>
                <th>Drama</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($books as $one): ?> 
                    
                <tr>
                <th><?=$count ++?></th>
                <th><?= $one->nazev . " : " . $one->autor; ?></th>
                <th><?= $one->okruh?></th>
                <?php
                if($one->zanr == "Poe"){
                echo "<th>*</th>";
                echo "<th></th>";
                }elseif($one->zanr == "Dra"){
                    echo "<th></th>";
                    echo "<th>*</th>";
                }else{
                    echo "<th></th>";
                    echo "<th></th>"; 
                }
            
                ?>
            <?php endforeach; ?>
    </table>
        </div>
    </div>
</div>

<div class="podpis">
<p>.................................</p>
<p>Datum a podpis žáka</p>
<?= $this->endSection();?>