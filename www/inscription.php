<?php
$page_title = 'Inscription';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>

<div>
    <h1>INSCRIPTION</h1>
</div>
<section>
<div class="ens">
<div class="login-page">
<div class="form">
<form method="POST" action="">


    Adresse mail :<label for="email">
        <input type="email" class="input_white" id="email" name="email" autocomplete="off" class="formInscription1">
    </label>

   Nom d'utilisateur : <label for="pseudo"> 
        <input type="text" class="input_white" id="pseudo" name="pseudo" autocomplete="off" class="formInscription2">
    </label>


               
               
    <div class="centrale">
    <section class="inputBox">
    Mot de passe :<div class="passwordBox">
            <input type="text" class="input_white" id="password" readonly>
        </div>
        <div class="buttons">
            <button class="bouton_envoi" onclick="getPassword()">Générer</button>
        </div>
    </section>
    <script src="/actions/generateur.js"></script>
</div>

     Confirmer le mot de passe :<label for="password" >
        <input type="password" class="input_white" id="confirm_password" name="confirm_mdp"  autocomplete="off" class="formInscription3">

       
    </label>
    <input type="submit" class="bouton_envoi" class="buttonInscription" name="inscription">
    <p class="message">Registered ? <a href="/connexion.php">Connect to your account</a></p>


</form>


<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function($) {
        $('#password').passtrength({
          minChars: 4,
          passwordToggle: true,
          tooltip: true
        });
      });
      </script>
      <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  youtu.be/JRHARtLZLk8

</script>

<?php

//session_start();

$bdd=new PDO('mysql:host=localhost;dbname=BNParihaut;charset=utf8;','root','root');
if(isset($_POST["inscription"])){
    if(!empty($_POST["email"])AND !empty($_POST["pseudo"])AND !empty($_POST["mdp"])AND !empty($_POST["confirm_mdp"])AND $_POST['mdp']==
    $_POST['confirm_mdp']AND strlen($_POST['pseudo']>4) AND strlen($_POST['mdp']>8)AND
    preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{10,}$#',$_POST['mdp'])AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email=htmlspecialchars($_POST["email"]);
        $pseudo=htmlspecialchars($_POST["pseudo"]);
        $mdp=sha1($_POST["mdp"]);
        $insertUser = $bdd->prepare('INSERT INTO utilisateur(email,mot_de_passe,pseudo) VALUES(?, ?, ?)');
        $insertUser->execute(array($email,$mdp,$pseudo));
    }   
    else{
        if(empty($_POST["email"])AND empty($_POST["pseudo"])AND empty($_POST["mdp"])AND empty($_POST["confirm_mdp"])){
            echo "Veuillez remplir tous les champs";
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo "L'adresse email doit être valide";
        }
        elseif(strlen($_POST['pseudo']<=4)){
            echo "Le nom d'utilisateur doit contenir au moins 4 caractères";
        }
        elseif($_POST['mdp']!=$_POST['confirm_mdp']){
            echo "Veuillez répéter le mot de passe à confirmer";
        }
        elseif(strlen($_POST['mdp']<=8)){
            echo "Le mot de passe doit contenir au moins 8 caractères";
        }
        elseif(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{10,}$#',$_POST['mdp'])){
            echo "Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial (. * $ etc)";
        }
    }
}
?>
</div>
</section>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>