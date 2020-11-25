<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="./css/home.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

    <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>

</head>

<body>

    <?php if(isset($_SESSION['k_id'])) {

        include 'nav-home.php';    


        include 'view/' . $template . '.php'; 
    
    }?>


    <script type="text/javascript" src="./js/home.js"></script>
    
</body>
</html>