<?php @session_start() ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.scss">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    
    
    <title>Time2Smash</title>
</head>
<body>
    <div class="header">
        <a href="accueil.php"><img class="logo" src="./img/logo-time2smash-original.svg"/></a>
        <input type="checkbox" id="check">
            <label for="check" class="showMenuButton">
                <i class="fas fa-bars"></i>          
            </label>
            <ul class="menu">
            <a href="trouver_partenaire.php">Trouver un partenaire</a>
            <a href="qui-sommes-nous.php">Qui sommes-nous ?</a>
            <a href="actus.php">Actualites</a>
            <a href="users.php">Tchat</a>

            <?php
                if(isset($_SESSION['unique_id'])){
            ?>  
                <a href="monCompte.php">Mon compte</a>
            <?php
                }
            ?>
            <?php                 
                if(isset($_SESSION['unique_id'])){ 
                if(strpos($_SERVER['REQUEST_URI'], './users.php') !== false){ ?>
                   <a class="connection" href="./treatment/logout.php">déconnexion</a> 
                <?php
                }}else{ ?>
                    <a class="connection" href="index.php">Se connecter</a> 
                    
                    <?php
                }
            ?>
            
            <label for="check" class="hideMenuButton">
                <i class="fas fa-times"></i>          
            </label>
        </ul>
    </div>


