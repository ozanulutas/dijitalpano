<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATAKENT ÖĞRENCİ YURDU</title>

    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,700;1,700&family=Open+Sans:wght@400;700;800&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="./css/home.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

    <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>


</head>

<body>

    <?php include 'nav-home.php'; ?>


    <?php include 'view/' . $template . '.php'; ?>


    <script type="text/javascript" src="./js/home.js"></script>
    
</body>
</html>