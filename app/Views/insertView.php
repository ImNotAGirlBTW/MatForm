<!-- upload_view.php -->
<?= $this->extend('layouts/master'); ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background color */
        }

        .wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height of the viewport */
        }

        .form-container {
            background-color: #fff; /* White background color */
            border: 2px solid #ddd; /* Solid border */
            border-radius: 10px; /* Rounded corners */
            padding: 20px;
            max-width: 500px; /* Adjust the maximum width as needed */
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="container form-container">
            <h2 class="text-center">Vyberte excel soubor</h2>
            <?= helper('form'); ?>
            <?= form_open_multipart('dataUpload'); ?>

           
            <input type="file" class="form-control" name="excel_file" id="excel_file" accept=".xls, .xlsx" required>

            <br>

            <button type="submit" class="btn btn-primary btn-block">Upload</button>

            <?= form_close(); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?= $this->endSection(); ?>
