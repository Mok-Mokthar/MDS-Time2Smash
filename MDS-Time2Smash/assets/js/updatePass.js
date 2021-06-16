
     $(document).ready(function () {
        $("form#lostPasswordForm").submit(function(e) {
            e.preventDefault();

            // Première étape -> validation de l'email + affichage de la question
            if ($('#emailLostPassword').length){

                let data = new FormData(this);
                let email = $('#emailLostPassword').val();
                let emailRGEX = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/;

                emailRGEX = emailRGEX.test(email);

                if (emailRGEX === false) {
                    displayErrors('L\'addresse email fourni n\'est pas valide');
                }else {
                    emailExist(data, function (retour) {
                        if (retour != false){
                            $('#emailLostPassword').remove();
                            $('.inputsLostPassword').append('<p id="textQuestionLostPassword">'+retour+'</p><input type="text" name="responseLostPassword" id="responseLostPassword" placeholder="votre reponse">');
                            $('#lostPasswordFormSubmit').val("valider ma réponse");
                        }else {
                            displayErrors('L\'addresse email fourni n\'est pas connue');
                        }
                    });
                }
            }

            // 2 ème étape, validation de la réponse + affichage du formualaire de changement de mot de passe
            if ($('#responseLostPassword').length){
                let data = new FormData(this);
                let responseSecretQuestion = $('#responseLostPassword').val();

                let responseSecretQuestionRGEX = /^[a-zA-Z0-9 ]+$/;
                responseSecretQuestionRGEX = responseSecretQuestionRGEX.test(responseSecretQuestion);

                if (responseSecretQuestionRGEX === false) {
                    displayErrors('La réponse à la question secrète n\'est pas valide');
                }else {
                    reponseTest(data, function (retour) {
                        if (retour == true){
                            $('#textQuestionLostPassword').remove();
                            $('#responseLostPassword').remove();
                            $('.inputsLostPassword').append('<input type="password" name="newPassword" id="newPassword" placeholder="nouveau mot de passe"><input type="password" name="newPasswordVerif" id="newPasswordVerif" placeholder="confirmer le mot de passe">');
                            $('#lostPasswordFormSubmit').val("changer mon mot de passe");
                        }else {
                            displayErrors('La réponse à la question secrète n\'est pas valide');
                        }
                    });
                }
            }

            // 3 ème étape, validation des mots de passe et changement dans la bdd
            if ($('#newPassword').length){
                let data = new FormData(this);

                let password = $('#newPassword').val();
                let cpassword = $('#newPasswordVerif').val();

                let passwordRGEX = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
                let  countErrors = 0;
                if (passwordRGEX === false) {
                    displayErrors('Les mots de passe ne sont pas au bon format');
                    countErrors++;
                }
                if (cpassword !== password) {
                    displayErrors('Les mots de passe ne correspondent pas');
                    countErrors++;
                }if (countErrors > 0) {
                    return
                }else {
                    updatePasswords(data, function (retour) {
                        if (retour == true){
                            window.location.href='./index.php';
                        }else {
                            displayErrors('Erreur de connection à la base de données');
                        }
                    });
                }
            }
        }        
    )}
);
