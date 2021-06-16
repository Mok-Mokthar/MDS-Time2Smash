<?php

function bddConnect(){
    $host="localhost";
    $db="time2smash";
    $user="root";
    $passwd=""; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $passwd,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch(Exception $e) {
        return "Erreur : ".$e->getMessage()."<br />";
    }
    
}


function getCurrentUser(){
    if(isset($_SESSION['unique_id'])){
        $unique_id = $_SESSION['unique_id'];   
        $bdd = bddConnect();

        $sql = "SELECT * FROM users WHERE unique_id=?";
        $query = $bdd->prepare($sql);
        $query->execute([$unique_id]);
        $result = [];
        while($line = $query->fetch()){
            $result[] = $line;
        }  
        return $result[0];
    }else{
        return null;
    }
}

function updateUserInfos($niveau, $commentaire, $perimetre){
    $unique_id = $_SESSION['unique_id'];   
    $bdd = bddConnect();
    $sql = "UPDATE users SET niveau=?, commentaire_niveau=?,
     perimetre_deplacement=? WHERE unique_id=?";
    $query = $bdd->prepare($sql);
    $query->execute([$niveau, $commentaire, $perimetre, $unique_id]);
}

// function updatePassword($password){ 
//     if(isset($_POST['emailLostPassword'])){
//         $bdd = bddConnect();
//         $unique_id = $_SESSION['unique_id'];
//         $sql = "UPDATE users SET password=? WHERE unique_id=?"; 
//         $query = $bdd->prepare($sql);
//         $query->execute([$password, $unique_id]);
//     }
      
// }


//Vérifier si l'email correspond avec celle dans la bdd pour le user
    //si oui afficher bloc text pour mdp
        // rentrer mdp
        // encode mdp
        // inserer new mdp


    //sinon erreur

// function lostPassword(){
//     if(isset($_POST['emailLostPassword'])){
//         $email = ($_POST['emailLostPassword']);
//         $bdd = bddConnect();
//         $sql = "SELECT * FROM users WHERE email=?";
//         $query = $bdd->prepare($sql);
//         $query->execute([$email]);
//     }else{
//     echo 'null';
// }
//}   
