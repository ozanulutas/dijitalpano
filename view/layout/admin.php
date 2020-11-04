<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    
    <link rel="stylesheet" href="./css/admin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

    <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>

</head>
<body>
    
    <header id="header">
        <h1>ADMİN PANELİ</h1>
    </header>
    
    <div class="container">
        

        <div class="main-wrapper">   

            <?php include 'nav-admin.php'; ?>
            
            <main id="main-admin">

                <?php include 'view/' . $template . '.php'; ?>

            </main>

        </div>

    </div>

    <script type="text/javascript" src="./js/admin.js"></script>

</body>
</html>