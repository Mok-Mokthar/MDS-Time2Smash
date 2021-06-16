<?php 
   include_once "treatment/config.php";
  
  if(@session_start() && !isset($_SESSION['unique_id'])){
    header("location: login.php");
  }else{

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
    <?php include_once "partials/header.php"; ?>

    <div class="wrapper">
      <section class="users">
        <header>
            <div class="content">
                <?php 
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
            <img src="./treatment/imgprofil/<?php echo $row['img_profil']; ?>" alt="">
            <div class="details">
              <span style="color : #fff"><?php echo $row['prenom']. " " . $row['nom']?></span>
            </div>
            <span class="ville"><?php echo $row['ville']?></span>           
          </div>          
          <a href="treatment/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Se déconnecter</a>
        </header>  
        <div class="infoUser">
            <span class="comment"><strong>Pseudo</strong> : <?php echo $row['pseudo']?></span>
            <span class="comment"><strong>Niveau</strong> : <?php echo $row['niveau']?></span>
            <span class="comment"><strong>Commentaire du niveau</strong> : <?php echo $row['commentaire_niveau']?></span>
            <span class="comment"><strong>Périmètre de déplacement</strong> : <?php echo $row['perimetre_deplacement']?> km</span>
        </div>
            <a href="partner.php" class="btnInfo">mettre à jour mes informations</a>    
        </div>
      </section>
    </div>

</body>

    <?php include_once "partials/footer.php"; ?>
    <?php }?>
</html>