<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF_maturita</title>
    <style type="text/css" media="all" >
  body {
     font-family: "DejaVu Sans", sans-serif;
     font-size: 80%; 
    }

    h1{
        text-align: center;
    }

    .informace {
        border-collapse: collapse;

    }
    .container{
        height: 700px;
    }

    .informace td,tr{
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
        width: 700px;
    }

    .table,tr,th{
        border: 1px solid;
        text-align: left;
    }
    .table td{
        border: 1px solid;
        text-align: center;
    }


    .podpis{
        padding-top: 13%;
        text-align: right;
    }
 
    
    .legenda tr,td{
        text-align: left;
        border-color:white;
        font-size: 80%;  
    }
    .legenda table{
        margin: 0 auto;
    }
    
    p { 
        font-size: 80%; 
        margin:0
         }

    .bottom{
        position: bottom;
    }
</style>
</head>
<body>


    <?php $this->renderSection('content'); ?>
</body>
</html>