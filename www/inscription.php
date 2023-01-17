<?php
$page_title = 'Inscription';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
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


    Nom :<label for="nom">
        <input type="text" class="input_white" id="name" name="name" autocomplete="off">
    </label>

    Prénom : <label for="first_name"> 
        <input type="text" class="input_white" id="first_name" name="first_name" autocomplete="off">
    </label>
    Adresse mail :<label for="email">
        <input type="email" class="input_white" id="email" name="email" autocomplete="off">
    </label>   
    Date de naissance  :<label for="dateNaiss">
        <input type="date" class="input_white" id="dateNaiss" name="dateNaiss" autocomplete="off">
    </label> 
    Numéro de téléphone : <label for="numTel">
        <input type="text" class="input_white" id="numTel" name="numTel" autocomplete="off">
    </label> 
<div class="centrale">
    <section class="inputBox">
    Mot de passe :
    <div class="passwordBox">
        <input type="password" class="input_white" id="password">
    </div>
        <div class="buttons">
            <button class="bouton_mdp" onclick="getPassword()">Générer un mot de passe</button>
        </div>
    </section>
    <script>
        function getPassword(){
        var chars="0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ"
        var passwordLength= 16;
        var password= "";

        //générer le mot de passe
        for(let i = 0; i < passwordLength ; i++){
            let randomNumber = Math.floor(Math.random() * chars.length)

            password += chars.substring(randomNumber , randomNumber + 1)
        }
            //afficher le mot de pass
            document.getElementById('password').value = password;
        }
    </script>
</div>

     Confirmer le mot de passe :<label for="password" >
        <input type="password" class="input_white" id="confirm_password" name="confirm_mdp"  autocomplete="off" class="formInscription3">

       
    </label>
    <input type="submit" class="bouton_envoi" class="buttonInscription" name="inscription">
    <p class="redirect">Registered ? <a href="/connexion.php">Connect to your account</a></p>

    <?php

//session_start();

$bdd=new PDO('mysql:host=localhost;dbname=BNParihaut;charset=utf8;','root','root');
if(isset($_POST["inscription"])){
    if(!empty($_POST["email"])AND !empty($_POST["pseudo"])AND !empty($_POST["mdp"])AND !empty($_POST["confirm_mdp"])AND $_POST['mdp']==
    $_POST['confirm_mdp']AND strlen($_POST['pseudo']>4) AND strlen($_POST['mdp']>8)AND
    preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{10,}$#',$_POST['mdp'])AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email=htmlspecialchars($_POST["email"]);
        $nom=htmlspecialchars($_POST["name"]);
        $prenom=htmlspecialchars($_POST["first_name"]);
        $dateNaiss=date("d-m-Y", strtotime($_POST["dateNaiss"]));
        $numTel=htmlspecialchars($_POST["numTel"]);
        $mdp=sha1($_POST["mdp"]);
        $insertUser = $bdd->prepare('INSERT INTO utilisateur(email,mot_de_passe,pseudo) VALUES(?, ?, ?)');
        $insertUser->execute(array($email,$mdp,$pseudo));
    }   
    else{
        if(empty($_POST["email"])AND empty($_POST["name"])AND empty($_POST["first_name"])
        AND empty($_POST["dateNaiss"])AND empty($_POST["numTel"]AND empty($_POST["mdp"])
        AND empty($_POST["confirm_mdp"]))){
            echo "Veuillez remplir tous les champs";
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo "L'adresse email doit être valide";
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
</form>
</div>
</div>
</section>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>