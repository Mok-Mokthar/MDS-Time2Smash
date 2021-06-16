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
  
  <?php include_once "./partials/header.php"; ?>

  <body>
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
              <span style="color: #fff"><?php echo $row['prenom']. " " . $row['nom'] ?></span>
              <p style="color: #fff"><?php echo $row['status']; ?></p>
            </div>
          </div>
          <a href="treatment/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Se déconnecter</a>
        </header>
        <div class="search">
          <span class="text2">Clic sur quelqu'un pour tchater</span>
          <input type="text" placeholder="Entrer un nom à chercher...">
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
      </section>
    </div>

    <script src="assets/js/users.js"></script>
    <?php include 'partials/footer.php' ?>

  </body>
<?php
}
?>
</html>



