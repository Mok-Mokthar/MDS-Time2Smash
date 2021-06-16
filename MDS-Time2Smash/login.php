<?php 
    // session_start();
    // if(isset($_SESSION['unique_id'])){
    //     echo("hi");
    //     header("location: accueil.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    <?php include_once "./partials/header.php"; ?>
    <div class="wrapper">
        <section class="form login">
            <header>Connectez vous !</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="field input">
                    <label>Adresse email</label>
                    <input type="email" name="email" placeholder="Adresse email">
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Se connecter">
                </div>
            </form>
            <div class="link">
                Pas de compte ? 
                <a href="register.php">Rejoingez nous!</a></div>
            <div class="linkLost"><a href="lostPassword.php">Mot de passe oublié ?</a></div>
        </section>
    </div>

    <script src="assets/js/pass-show-hide.js"></script>
    <script src="assets/js/login.js"></script>
    <?php include 'partials/footer.php' ?>

</body>
</html>