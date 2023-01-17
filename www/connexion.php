<?php
$page_title = 'Connexion';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>

<div>
    <h1>CONNEXION</h1>
</div>
<div class="ens">
<div class="login-page">
  <div class="form">
    
    <form class="login-form" method="POST" action="login_exec.php">
      Nom d'utilisateur : <input class="input_white" type="text" name="username"/>
      Mot de passe : <input class="input_white" type="password" name="password"/>
      <input class="bouton_envoi" type="submit" href="myaccount.php" value="login" name="submit">
      <p class="redirect">Not registered? <a href="/inscription.php">Create an account</a></p>
    </form>
  </div>
</div>
  </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>