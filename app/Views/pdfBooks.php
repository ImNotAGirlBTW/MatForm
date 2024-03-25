<?= $this->extend('layouts/pdfLay'); ?>

<?= $this->section('content') ?>
<?php
$count = 1;
$draCount = 0;
$proCount = 0;
$png = file_get_contents(base_url("images/logo2.png"));
$pngbase64 = base64_encode($png); ?>
<div>
    <img src='data:image;base64,<?= $pngbase64 ?>'  alt="oauhLogo">
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Seznam četby k ústní části maturitní zkoušky</h1>
            <table class="informace">
                <tr>
                    <th style="border-color:white;">
                        Školní rok: <?= $year->skolni_rok ?>
                    </th>
                </tr>
            </table>
            <div class="legenda">
                    <table>
                        <?php foreach ($okruh as $one) : ?>
                            <tr>
                                <td><?= $one['nazev'] . " - " . $one['popis'] . "; Nutno vybrat minimálně " . $one['pocet'] . "lit. děl" ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>

                        </th>
                        <th>Autor: Dílo</th>
                        <th>Okruh</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($books as $one) : ?>

                        <tr>
                            <th><?= $count++ . "." ?></th>
                            <th><?= $one['autor'] . ": " . $one['dilo']; ?></th>
                            <th><?= $one['okruh'] ?></th>
                        <?php endforeach; ?>
            </table>
        </div>
    </div>
    <br>
    <div class="bottom">
    <p>
        Žák si musí ze školního seznamu vybírá 20 ,položek z toho minimálně
        <?php
        foreach ($zanr as $name) {
            echo "," . $name['pocet'] . "krát " . $name['popis'] . " ";
        }
        ?>
    </p>
    <p>V Uh. Hradišti dne</p>
</div>
</div>
<?= $this->endSection(); ?>