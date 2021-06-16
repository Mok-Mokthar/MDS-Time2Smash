$(document).ready(function(){
    //$(".numbers").counterUp({ delay: 10, time: 1000 });

    $("#registerForm").on('submit',function(e){
        e.preventDefault();
        //resetErrors();
        alert("test");

        $.ajax({
            type: "POST",
            url: "./treatment/register.php",
            data:new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,

            success: function (retour) {
                console.log(retour);
                $(".errorDisplay").css("display", "block");

                if(retour.status == 1){

                    $("#registerForm")[0].reset();
                    $(".errorDisplay").html('<p>' + retour.message + '</p>');
                }else{

                    $(".errorDisplay").html('<p>' + retour.message + '</p>');
                }
            }
        });
    });

    $("#file_img").change(function(){
        var file = this.files[0];
        var fileType = file.type;
        var match = ['image/jpeg', 'image/jpg', 'image/png', 
                     'image/JPEG', 'image/JPG', 'image/PNG'];

        if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
            alert("Désolé, uniquement les fichiers au format JPEG, JPG, PNG sont autorisés");
            $("#file_img").val('');
            return false;
        }
    });

    


    


        

        // //Comme en php avec les $_POST
        // let name = $("name").val();
        // let firstName = $("firstName").val();
        // let date = $("date").val();
        // //let sexe = $("sexe").val();
        // let postalAdress = $("postalAdress").val();
        // let zipCode = $("zipCode").val();
        // let fileExtension = $("file_img").val().split('.').pop();
        // let pseudo = $("pseudo").val();
        // let mailAdress = $("mailAdress").val();
        // let password = $("password").val();
        // let cpassword = $("cpassword").val();
        // let responseSecretQuestion = $("responseSecretQuestion").val();

        // let usernameRGEX = /^[a-zA-Z0-9_-]{3,}$/;
        // let allowedExtensions = ["jpg", "JPG", "png", "PNG", 'JPEG'];
        // let responseSecretQuestionRGEX = /^[a-zA-Z0-9- ]+$/;
        // let passwordRGEX = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
        // let emailRGEX = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/;
        // let zipCodeRGEX = /^[0-9]{5}$/;


        // //Test des regex
        // usernameRGEX = usernameRGEX.test(name);
        // usernameRGEX = usernameRGEX.test(firstName);
        // usernameRGEX = usernameRGEX.test(postalAdress);
        // passwordRGEX = passwordRGEX.test(password);
        // emailRGEX = emailRGEX.test(mailAdress);
        // zipCodeRGEX = zipCodeRGEX.test(zipCode);
        // allowedExtensions = allowedExtensions.includes(fileExtension);
        // responseSecretQuestionRGEX = responseSecretQuestionRGEX.test(responseSecretQuestion);
        // usernameRGEX = usernameRGEX.test(pseudo);
});