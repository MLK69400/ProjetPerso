<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titrePage; ?></title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Faster+One|Nosifer" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <header>
                <h1><?= $titrePage; //<?= est equivalent a <?php echo?></h1>
                <?php

            // Menu de navigation

            include"include/navbar.php"
            ?>
            </header>
      