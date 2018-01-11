<?php
require_once("auth_check.php");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="<?php echo CSS_URL . "index.css"?>" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_URL . "seller.css"?>" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_URL . "customer.css"?>" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_URL . "administrator.css"?>" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_URL . "cart.css"?>" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_URL . "item.css"?>" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://unpkg.com/flickity@2.0.10/dist/flickity.pkgd.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.10/dist/flickity.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <style>body * { font-family: 'Varela Round', sans-serif;}</style>

    <link rel="icon" href=<?php echo IMAGES_URL . "favicon.ico"?> type="image/x-icon">
</head>