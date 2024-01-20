

<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>
<?php $png = file_get_contents(base_url("images/logo.png"));
    $pngbase64 = base64_encode($png);?>
<div>
<img src='data:image;base64,<?= $pngbase64?>' alt="">
<p>ll</p>
</div>
    
<div class="container">
    <div class="row">
        <div class="col-12">
        <h1>Váš seznam četby</h1>
        
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $one): ?>   
                <tr>
                    <th><?= $one->nazev; ?></th>
                </tr>
            <?php endforeach; ?>
    </table>
        </div>
    </div>
</div>

<?= $this->endSection();?>