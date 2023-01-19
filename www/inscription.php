<?php

require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Inscription';

if(isset($_POST['inscription'])){
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $dateNaiss = $_POST['dateNaiss'];
    $numTel = $_POST['numTel'];
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['confirm_mdp']);
    $client_number = rand();

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        if ($mdp2 == $mdp) {
            $var = $db->prepare('INSERT INTO users (nom, prenom, mdp, mail, tel, naissance, grade, client_number) VALUES (?, ?, ?, ?, ?, ?, 1, ?)');
            $var->execute([$name, $first_name, $mdp, $email, $numTel, $dateNaiss, $client_number]);
            $donnees = $var->fetch();

            $variable = $db->prepare('SELECT * FROM users WHERE client_number = ? AND mdp = ?');
            $variable->execute([$client_number, $mdp]);
            $data = $variable->fetch();
            $_SESSION['user'] = $data;
            $_SESSION['loggedin'] = true;

            $sql = $db->prepare('SELECT solde FROM bankaccounts WHERE id_user = ?');
            $sql->execute([$data['id']]);
            $solde = $sql->fetch();
            $_SESSION['solde'] = $solde;

            $number_count = rand();
            $_SESSION['number_account'] = $number_count;
            $currencies = array(1, 2, 3, 4, 5, 6, 7);
            foreach ($currencies as $currencie) {
                $val_cur = $currencie;
                $sql = $db->prepare('INSERT INTO bankaccounts (numerocompte, id_user, solde, id_currencies) VALUES (?, ?, 0, ?)');
                $sql->execute([$number_count, $_SESSION['user']['id'], $currencie]);
            }


            
            header('Location:/myaccount.php');
        }
    }
    

}
?>
<body>
<?php 
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/templates/partials/headers.inc.php';

?>

<div>
    <h1 class="inscription">INSCRIPTION</h1>
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
    Mot de passe :<label for="password">
        <input type="password" class="input_white" id="password" name="mdp" autocomplete="off">
    </label>
    Confirmer le mot de passe :<label for="password" >
            <input type="password" class="input_white" id="confirm_password" name="confirm_mdp"  autocomplete="off">
        </label>
        <input type="submit" class="bouton_envoi" class="buttonInscription" name="inscription" value="INSCRIPTION">
        <p class="redirect">Déjà inscrit ? <a href="/connexion.php">Connectez-vous !</a></p>
</div>
</div>
</div>
    </section>
    <?php



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