<?php

require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Connexion';

if(isset($_POST['submit'])){
    $client_number = $_POST['client_number'];
    $mdp = $_POST['mdp'];

  if ($client_number != '' && $mdp != '') {

    $var = $db->prepare('SELECT * FROM users WHERE client_number = ? AND mdp = ?');
    $var->execute([$client_number, $mdp]);
    $donnees = $var->fetch();

    if ($donnees != "") {
      $_SESSION['user'] = $donnees;
      $_SESSION['loggedin'] = true;
      $_SESSION['client_number'] = $donnees['client_number'];
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
    <h1>CONNEXION</h1>
</div>
<div class="ens">
<div class="login-page">
  <div class="form">
    
    <form class="login-form" method="POST" >
      Numéro Client : <input class="input_white" type="text" name="client_number"/>
      Mot de passe : <input class="input_white" type="password" name="mdp"/>
      <div><input type="checkbox" class="case">Afficher le mot de passe</div>
      <input class="bouton_envoi" type="submit" value="login" name="submit">
      <p class="redirect">Not registered? <a href="/inscription.php">Create an account</a></p>
    </form>
    <script>
      const togglePassword = document.querySelector('.case');
      const password = document.querySelector('.input_white');
      togglePassword.addEventListener('click', function (e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye / eye slash icon
      this.classList.toggle('fa-eye-slash');
      });
  </div>
</div>
  </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>