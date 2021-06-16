<?php //include 'config/bdd.php'?>
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
    <?php include 'partials/header.php' ?>
    
    <div class="bannerImg">
        <img src="./img/banner-accueil.jpg" >
    </div>

    <div class="banner">
        <div class="countingInfo">
            <div class="innerWidth">
                <div class="col">             
                    partenaire
                    <div class="returnLine">
                        trouves
                    </div>                   
                </div>
                <div class="col">
                    <div class="numbers">250000</div>
                </div>
                <div class="col">
                    <strong>chiffre cles</strong>
                </div>              
                <div class="col">
                    <div class="numbers">4,5</div>
                </div>
                <div class="col">
                    notes
                    <div class="returnLine">
                        moyennes
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mainContent">
        <div class="ads">
            <div class="leftAd">

            </div>
        </div>
        <div class="discover">
            <div class="title">
                Découvre Time2Smash
            </div>
            <div class="desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Enim, blanditiis facere! Earum sunt consectetur perspiciatis
                  vero voluptatem numquam unde sint non perferendis 
            </div>
        </div>
        <div class="ads">
            <div class="RightAd">

            </div>
        </div>
    </div>

    <div class="adjectifs">
        <div class="monElements">
            Trouve un partenaire
            <i class="fas fa-user-friends"></i>
            <img src="./img/sacking-hand.jpg">           
        </div>
        

        <div class="monElements">
            Amuse toi
            <img src="./img/amuse-toi.png">
        </div>
    </div>

    <div class="adjectifs">
        <div class="monElements">
        Passe une bonne aprem
        </div>
        <div class="monElements">
            Progresse
            <i class="fas fa-chart-line"></i>
        </div>
    </div>

    <div class="cta">
            <a class="buttonCta" href="login.php">Trouve un partenaire !</a>
    </div>

    <script type="text/javascript">
        $(".numbers").counterUp({delay:10,time:1000});
    </script>
    
    <?php include 'partials/footer.php' ?>
</body>
</html>
