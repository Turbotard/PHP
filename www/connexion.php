<?php

require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Connexion';

if(isset($_POST['submit'])){
    $client_number = $_POST['client_number'];
    $mdp = sha1($_POST['mdp']);

  if ($client_number != '' && $mdp != '') {

    $var = $db->prepare('SELECT * FROM users WHERE client_number = ? AND mdp = ?');
    $var->execute([$client_number, $mdp]);
    $donnees = $var->fetch();

    if ($donnees != "") {
      $_SESSION['user'] = $donnees;
      $_SESSION['loggedin'] = true;
      $_SESSION['client_number'] = $donnees['client_number'];
      $_SESSION['nom'] = $donnees['nom'];
      $_SESSION['prenom'] = $donnees['prenom'];
      $_SESSION['grade'] = $donnees['grade'];

      $count = $db->prepare('SELECT numerocompte FROM bankaccounts WHERE id_user = ?');
      $count->execute([$donnees['id']]);
      $number = $count->fetch();
      $_SESSION['number_account'] = $number['numerocompte'];

      $sql = $db->prepare('SELECT solde FROM bankaccounts WHERE id_user = ?');
      $sql->execute([$donnees['id']]);
      $solde = $sql->fetch();
      $_SESSION['solde'] = $solde['solde'];
      header('Location:/myaccount.php');
    } else {
      echo "Your Login Name or Password is invalid";
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
    <h1 class="page_connexion">CONNEXION</h1>
</div>
<div class="ens">
<div class="login-page">
  <div class="form">
    
    <form class="login-form" method="POST" >
      Numéro Client : <input class="input_white" type="text" name="client_number"/>
      Mot de passe : <input class="input_white" type="password" name="mdp"/>
      <input class="bouton_envoi" type="submit" value="CONNEXION" name="submit">
      <p class="redirect">Pas inscrit ? <a href="/inscription.php">Créez un compte !</a></p>
    </form>
  </div>
</div>
  </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>