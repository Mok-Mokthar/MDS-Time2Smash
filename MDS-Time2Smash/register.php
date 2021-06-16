<?php 
    if(isset($_SESSION['unique_id'])){
        echo("hi");
        header("location: accueil.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all">
</head>

<body>
    <?php include_once "./partials/header.php"; ?>  

    <?php
            $questions = [
                [
                    "question" => 'Dans quelle ville êtes-vous né ?'
                ],
                [
                    "question" => 'Quel est votre film favori ?'
                ],
                [
                    "question" => 'Quelle est la marque de votre première voiture ?'
                ],
            ];

            $sexes = [
                [
                    "sexe" => 'Homme'
                ],
                [
                    "sexe" => 'Femme'
                ],
                [
                    "sexe" => 'Autre'
                ],
                [
                    "sexe" => 'Ne souhaite pas le préciser'
                ],
            ];
        ?>

    <div class="wrapper">
        <section class="form signup">
            <header>Rejoingez nous !</header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <label>Nom</label>
                    <input type="text" name="lname" placeholder="Nom" required>
                </div>
                <div class="field input">
                    <label>Prénom</label>
                    <input type="text" name="fname" placeholder="Prénom" required>
                </div>
            </div>
            <div class="field input">
                    <label>Date de naissance</label>
                    <input type="date" name="date" required="required">
            </div>
            <div class="field input">
                <label>Sexe</label>
                <select name="sexeSelect" div="grid" style="margin-bottom:10px; padding:10px 2px;">
                    <?php foreach ($sexes as $sexe){
                        echo '<option value="'.$sexe['sexe'].'">'.$sexe['sexe'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="field input">
                <label>Adresse Postale</label>
                <input type="text" name="postalAdress" placeholder="Adresse postale" required>
            </div>
            <div class="field input">
                <label>Ville</label>
                <input type="text" name="city" placeholder="Ville" required>
            </div>
            <div class="field input">
                <label>Code postal</label>
                <input type="text" name="zipcode" placeholder="Code postal" required>
            </div>
            <div class="field image">
                <label>Photo de profil</label>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field input">
                <label>Pseudo</label>
                <input type="text" name="pseudo" placeholder="Pseudo" required>
            </div>
            <div class="field input">
                <label>Adresse email</label>
                <input type="text" name="email" placeholder="adresse email" required>
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Entrer votre mot de passe" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="inputField secretQuestions">
                <label>Question secrète</label>
                <select name="secretQuestions" div="grid" style="margin-bottom:10px; padding:10px 2px;">
                    <?php foreach ($questions as $question){
                        echo '<option value="'.$question['question'].'">'.$question['question'].'</option>';
                    }
                    ?>
                </select>
                <input type="text" required="required" name="responseSecretQuestion" id="responseSecretQuestion" placeholder="Votre réponse"/>
            </div>

            <input type="hidden" name="token" id="token">

            <div class="field button">
                <input type="submit" name="submit" value="S'enregistrer">
            </div>
        </form>
            <div class="link">Vous avez déjà un compte ? <a href="login.php">Connectez vous!</a></div>
        </section>
    </div>

    <script src="assets/js/pass-show-hide.js"></script>
    <script src="assets/js/signup.js"></script>
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
            grecaptcha.execute('6Lf9SygbAAAAAHURHTFDQFVNAB4T7Z06_sb-X9IS', {action: 'submit'}).then(function(token) {
                document.getElementById("token").value = token;
                });
            });
        }
    </script>
    <?php include 'partials/footer.php' ?>
</body>
</html>