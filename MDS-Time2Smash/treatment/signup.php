<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexeSelect']);
    $postalAdress = mysqli_real_escape_string($conn, $_POST['postalAdress']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
    $pseudo = mysqli_real_escape_string($conn, $_POST['pseudo']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $question = mysqli_real_escape_string($conn, $_POST['secretQuestions']);
    $reponse = mysqli_real_escape_string($conn,$_POST['responseSecretQuestion']);

    //Regex
    $emailRGEX = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/";
    $cityRGEX = "/[a-zA-Z0-9éèêëàâîïôöûü.-]+$/";
    $responseSecretQuestionRGEX = "/^[a-zA-Z0-9- ]+$/";
    $passwordRGEX = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
    $zipCodeRGEX = "/^[0-9]{5}$/";

    //preg_match pour test les regexs
    $ResRGEXEmail = preg_match($emailRGEX, $email);
    $ResRGEXZipcode = preg_match($zipCodeRGEX, $zipcode);
    $ResRGEXCity = preg_match($cityRGEX, $city && $postalAdress);
    $ResRGEXRepSecretQuestion = preg_match($responseSecretQuestionRGEX, $reponse);
    $ResRGEXPassword = preg_match($passwordRGEX, $password);

    //debug
    // var_dump($ResRGEXEmail);
    // var_dump($ResRGEXZipcode);
    // var_dump($ResRGEXCity);
    // var_dump($ResRGEXRepSecretQuestion);
    // var_dump($ResRGEXPassword);

    if(!empty($fname) && !empty($lname) && !empty($date) && !empty($sexe)
    && !empty($postalAdress)  && !empty($city)  && !empty($zipcode)  && !empty($pseudo)
    && !empty($email)  && !empty($reponse)){              
        if(($ResRGEXEmail = 1) && ($ResRGEXZipcode = 1) && ($ResRGEXCity = 1) && ($ResRGEXRepSecretQuestion = 1)  && ($ResRGEXPassword = 1)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($sql) > 0){
                    echo "$email - Cet email est déjà utiliser!";
                }else{
                    if(isset($_FILES['image'])){
                        $img_name = $_FILES['image']['name'];
                        $img_type = $_FILES['image']['type'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        
                        $img_explode = explode('.',$img_name);
                        $img_ext = end($img_explode);
        
                        $extensions = ["jpeg", "png", "jpg"];
                        if(in_array($img_ext, $extensions) === true){
                            $types = ["image/jpeg", "image/jpg", "image/png"];
                            if(in_array($img_type, $types) === true){
                                $time = time();
                                $new_img_name = $time.$img_name;
                                if(move_uploaded_file($tmp_name,'imgprofil/'.$new_img_name)){
                                    $ran_id = rand(time(), 100000000);
                                    $status = "En ligne";
                                    $encrypt_pass = md5($password);
                                    $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, prenom, nom, pseudo, email, password, adresse, ville,
                                                                        code_postal, question, reponse, date_de_naissance, sexe, img_profil, status)

                                    VALUES ({$ran_id}, '{$fname}','{$lname}', '{$pseudo}', '{$email}', '{$encrypt_pass}', '{$postalAdress}',
                                     '{$city}', '{$zipcode}','{$question}', '{$reponse}', '{$date}', '{$sexe}', '{$new_img_name}', '{$status}')");

                                    if($insert_query){
                                        $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                        if(mysqli_num_rows($select_sql2) > 0){
                                            $result = mysqli_fetch_assoc($select_sql2);
                                            $_SESSION['unique_id'] = $result['unique_id'];
                                            echo "success";
                                        }else{
                                            echo "Cette adresse mail n'existe pas!";
                                        }
                                    }else{
                                        echo "Il y a un problème. Réessayer svp!";
                                    }
                                }
                            }else{
                                echo "Le format de l'image doit être - jpeg, png, jpg";
                            }
                        }else{
                            echo "Le format de l'image doit être - jpeg, png, jpg";
                        }
                    }
                }
            }else{
                echo "$email n'est pas une adresse valide !";
            }
        }else{
            echo "Veuillez respecter les contraintes d'authentification !";
        }                        
    }else{
    echo "Tous les champs sont obligatoires !";
    }   
?>