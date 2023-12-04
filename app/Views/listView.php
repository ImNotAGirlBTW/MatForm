

<?= $this->extend('layouts/master');?>

<?= $this->section('content')?>

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
                    <th><?= $one->Nazev; ?></th>
                </tr>
            <?php endforeach; ?>
    </table>
        </div>
    </div>
</div>

<?= $this->endSection();?>