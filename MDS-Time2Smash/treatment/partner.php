<?php 
    @session_start();
    require 'helper.php';
    if (isset ($_POST['submit'])){
        $niveau =$_POST['niveau']; 
        $commentaire_niveau = $_POST['commentaire_niveau'];
        $perimetre_deplacement =$_POST['perimetre_deplacement']; 
        updateUserInfos($niveau, $commentaire_niveau, $perimetre_deplacement);
        header("location: ../monCompte.php");
    }
    
?>