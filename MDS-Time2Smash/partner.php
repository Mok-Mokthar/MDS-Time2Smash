<?php 
   include_once "treatment/config.php";
   require "treatment/helper.php";
  
  if(@session_start() && !isset($_SESSION['unique_id'])){
    header("location: login.php");
  }else{
    $monUserId = $_SESSION['unique_id'];
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
        <section class="users">
            <form action="treatment/partner.php" enctype="multipart/form-data" autocomplete="off" method="post"> 
            <div class="error-text"></div>
            <h1>Vos données</h1>
                <div class="niveau">
                    <?php $currentUser = getCurrentUser();
                    $choices = ['choix','débutant', 'intermédiaire', 'élevé', 'expert'];
                    ?>
                    <label for="name">Niveau</label>
                    <select name="niveau" id="pet-select">
                        <?php foreach($choices as $choice): ?>
                            <option 
                            <?php if($choice == $currentUser['niveau']){ echo 'selected';} ?>
                            value="<?= $choice ?>">
                                <?= $choice ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="perimetre">
                    <label for="name">Perimètre de déplacement</label>
                    <input type="range" min="1" max="50" value="<?= $currentUser['perimetre_deplacement'] ?>" class="slider" name="perimetre_deplacement" id="myRange"
                    onchange="AfficheRange2(this.value)">
                    <span span id="valBox">Valeur =</span>
                </div>
                <div class="commentaire">
                    <label for="name">Commentaire</label>                   
                </div>
                <div class="textCommentaire">
                    <textarea id="commentaire_niveau" name="commentaire_niveau"  rows="10" cols="30"><?= $currentUser['commentaire_niveau'] ?></textarea>
                </div>
                <div class="button">
                    <input type="submit" class="cta" name="submit" value="valider"/>
                </div>
            </form>
        </section>
        </div>

        <script>
        function AfficheRange2(newVal){
        document.getElementById("valBox").innerHTML="Valeur="+newVal+" km";
        }
        </script>
        
        </body>

        <script src="assets/js/partner.js"></script>
        <?php include_once "./partials/footer.php"; ?>

    </html>
    <?php
}
?>
