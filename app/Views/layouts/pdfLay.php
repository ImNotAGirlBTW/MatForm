<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF_maturita</title>
    <style type="text/css" media="all" >
  body {
     font-family: "DejaVu Sans", sans-serif;
     font-size: 95%; 
    }

    h1{
        text-align: center;
    }

    .informace {
        border-collapse: collapse;

    }
    .informace td,tr {
  border: 1px solid;
}

    .informace tr{
        text-align: left;
    }
    .informace td{
        width: 600px;
    }

    .table{
        border-collapse: collapse;
    }

    .table, td,tr,th{
        border: 1px solid;
    }

    .podpis{
        text-align: right;
    }
</style>
</head>
<body>


    <?php $this->renderSection('content'); ?>
</body>
</html>