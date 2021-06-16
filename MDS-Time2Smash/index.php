<?php include 'partials/header.php'; 

if (!isset($_SESSION['unique_id'])){
    header("Location: login.php");
}else{
    header("Location: accueil.php");
}
?>

<?php include 'partials/footer.php' ?>