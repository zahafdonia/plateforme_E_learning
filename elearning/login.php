<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="png" href="images/icon/iteam.jpg">
    <title>Login SignUp</title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="form-box">
        <div class="button-box">    
            <button type="button" name="role" id="student" class="toggle-btn1 " value="student">Student</button> 
            <button type="button" name="role" id="former" class="toggle-btn1" value="former">Former</button>
            <button type="button"  name="role" id="teacher" class="toggle-btn1" value="teacher">Teacher</button>
            <button type="button" name="role" id="admin" class="toggle-btn1" value="admin">Admin</button>
        </div>
        
        <div class="social-icons">
            <img src="images/icon/fb2.png" >
            <img src="images/icon/insta2.png">
            <img src="images/icon/tt2.png">
        </div>

        <!-- Login Form -->
        <form id="login" class="input-group" action="login.php" method="POST">
            <div class="inp">
                <img src="images/icon/user.png"><input type="text" name="username" id="username" class="input-field" placeholder="Nom d'utilisateur ou email" style="width: 88%; border:none;" required="required">
            </div>
            <div class="inp">
                <img src="images/icon/password.png"><input type="password" name="password" id="password" class="input-field" placeholder="Mot de passe" style="width: 88%; border: none;" required="required">
            </div>

            <!-- Affichage du message d'erreur -->
            <div class="erreur">
                <?php include_once "script_login.php"; ?>
                <?php echo $erreur; ?>
            </div>

            <input type="checkbox" class="check-box">Se souvenir du mot de passe
            <button type="submit" name="submit" class="submit-btn" id="log">Connexion</button>
        </form>

        <div class="other" id="other">
            <div class="instead">
                <h3>ou</h3>
            </div>
            <button class="connect"  onclick="onGoogleSignIn()">
                <img src="images/icon/google.png"><span>Se connecter avec Google</span>
            </button>
        </div>
    </div>



<script>  
// CheckBox Function
function goFurther(){
  if (document.getElementById("chkAgree").checked == true) {
    document.getElementById('btnSubmit').style = 'background: linear-gradient(to right, #FA4B37, #DF2771);';
  }
  else{
    document.getElementById('btnSubmit').style = 'background: lightgray;';
  }
}

function google() {
  	window.location.assign("https://accounts.google.com/signin/v2/identifier?service=accountsettings&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3Dsign_in_no_continue&csig=AF-SEnbZHbi77CbAiuHE%3A1585466693&flowName=GlifWebSignIn&flowEntry=AddSession", "_blank");
}


function onGoogleSignIn() {
    var googleAuth = gapi.auth2.getAuthInstance();
    googleAuth.signIn().then(function(googleUser) {
        var profile = googleUser.getBasicProfile();
        var userEmail = profile.getEmail();
        var userName = profile.getName();
        // Utilisez les informations de l'utilisateur comme vous le souhaitez
        // Redirigez ensuite l'utilisateur vers la page d'accueil ou une autre page pertinente de votre application
        window.location.href = 'index.html'; // Remplacez 'index.html' par l'URL de la page souhaitée
    }).catch(function(error) {
        console.error('Erreur de connexion Google:', error);
    });
}
</script>













    <script
    >


function handleClick(e) {
    // Supprimer la classe active-btn de tous les boutons
    toggleButtons.forEach((button) => {
        button.classList.remove('active-btn');
    });

    // Ajouter la classe active-btn uniquement au bouton cliqué
    e.target.classList.add('active-btn');
}

// Sélectionnez tous les boutons de bascule et ajoutez un écouteur d'événements à chacun
var toggleButtons = Array.from(document.querySelectorAll(".toggle-btn1"));
toggleButtons.forEach(function(button) {
    button.addEventListener('click', handleClick);
});


    </script>
    
</body>
</html>


