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

    <?php include 'nav-home.php'; ?>


    <?php include 'view/' . $template . '.php'; ?>


    <script type="text/javascript">

        // TERCİHLER

        const marquee_hiz = <?php echo $data['tercihler']['marquee_hiz']->deger; ?>;
        const slide_hiz = <?php echo $data['tercihler']['slide_hiz']->deger; ?>;

        document.documentElement.style.setProperty('--marquee-hiz', marquee_hiz + 's');

    </script>

    <script type="text/javascript" src="./js/home.js"></script>
    
</body>
</html>