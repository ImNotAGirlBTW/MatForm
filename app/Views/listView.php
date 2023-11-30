<h1>Váš seznam četby</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $one): ?>   
                <tr>
                    <th><?= $one; ?></th>
                </tr>
            <?php endforeach; ?>
    </table>