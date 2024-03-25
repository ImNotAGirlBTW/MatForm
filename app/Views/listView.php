
<?= $this->extend('layouts/pdfLay');?>

<?= $this->section('content')?>
<?php
     $count = 1;
     $draCount = 0;
     $proCount = 0;
    $png = file_get_contents(base_url("images/logo2.png"));
    $pngbase64 = base64_encode($png);?>
<div>
<img src='data:image;base64,<?= $pngbase64?>' alt="oauhLogo">
</div>
<div class="container">
    <div class="row">
        <div class="col-12">    
        <h1>Žákovský seznam literárních děl k maturitní zkoušce</h1>
        <p>
        Žák si musí ze školního seznamu vybírá 20 ,položek z toho minimálně
        <?php
        foreach($zanr as $name)
        {
            echo ",".$name['pocet'] . "krát " .$name['popis'] . " " ; 
        }
        ?>
        </p>
        <table class="informace">
    <tr>
        <th>
            Jméno: 
        </th>
        <td>

        <?= 
        isset($user['username']) ?>
        </td>
    </tr>

    <tr>
        <th>
            Třída:
        </th>
        <td>
        <?= isset($group)?>
        </td>
    </tr>

    <tr>
        <th>
            Školní rok:
        </th>
        <td>
            <?=$year->skolni_rok?>
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
                <th><?= $one->nazev . "  (" . $one->autor . ")"; ?></th>
                <th><?= $one->okruh?></th>
                <?php
                if($one->zanr == "Poe"){
                echo "<th>*</th>";
                echo "<th></th>";
                $proCount ++;
                }elseif($one->zanr == "Dra"){
                    echo "<th></th>";
                    echo "<th>*</th>";
                    $draCount ++;
                }else{
                    echo "<th></th>";
                    echo "<th></th>"; 
                }
                ?>
            <?php endforeach; ?>
            <tr>
            <th style="border-color:white"></th>
                <th style="border-color:white"></th>
                <th style="border-color:white; border-right: 1px solid"></th>

                <th><?=$proCount?></th>
                <th><?=$draCount?></th>
            </tr>
    </table>
        </div>
    </div>
</div>

<br>
<div class="bottom">
    <div class="podpis">
        <p>................................................</p>
        <p>Datum a podpis žáka</p>
    </div>
    <div class="legenda">
        <table>
            <?php foreach($okruh as $one): ?>
                <tr>
                    <td><?=$one['nazev'] . " - " . $one['popis']."; Nutno vybrat minimálně ". $one['pocet']. "lit. děl"?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= $this->endSection();?>