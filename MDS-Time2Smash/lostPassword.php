<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
</head>
<body>
    <?php include 'partials/header.php' ?>

    <div class="wrapper">
        <section class="form lostPass">
            <header>Mot de passe oublié ?</header>
            <form class="global" id="lostPasswordForm" method="post" action="treatment/lostPassword.php">
                <div class="error-text"></div>
                <div class="field input">
                    <div class="inputsLostPassword">
                        <input type="email" name="emailLostPassword" placeholder="Email" autocomplete="off" id="emailLostPassword">
                    </div>
                </div>
                <div class="field button">
                    <input type="submit" value="Afficher ma question secrète" id="lostPasswordFormSubmit">
                </div>
            </form>
        </section>
    </div>
    <script src="assets/js/updatePass.js"></script>
    <?php include 'partials/footer.php' ?>
</body>
</html>
