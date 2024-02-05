<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
        }

        .wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 20px;
            margin-bottom: 20px;
            
        }
        .i{ 
            margin:5%;
            width: 100%;
            background-color: red;
        }

        h2{
            text-align: center;
        }

        .form-container {
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 10px; 
            padding: 20px;
            max-width: 500px; 
            width: 100%;
        }
    </style>
</head>

<body>
<?php $this->renderSection('content'); ?>

</body>

</html>
