<!-- upload_view.php -->
<?= $this->extend('layouts/master'); ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Upload</title>
</head>
<body>
    <div style="margin: 20px;">
        <h2>Upload Excel File</h2>
        <?= helper('form');?>
        <?= form_open_multipart('dataUpload'); ?>

        <label for="excel_file">Select Excel File:</label>
        <input type="file" name="excel_file" id="excel_file" accept=".xls, .xlsx" required>

        <br><br>

        <input type="submit" value="Upload">

        <?= form_close(); ?>
    </div>
</body>
</html>
<?= $this->endSection(); ?>
