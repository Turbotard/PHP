<?php
$page_title = 'Connexion';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';

if(isset($_POST['submit'])){
    $clientNumber = $_POST['clientNumber'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM clients WHERE clientNumber = ? AND password = ?";
    $var = $db->prepare($sql);
    $var->execute([$clientNumber, $password]);
    $row = $var->fetch();
    $count = $var->rowCount();

    if($count == 1){
        $_SESSION['clientNumber'] = $row['clientNumber'];
        $_SESSION['password'] = $row['password'];
        header("location: myaccount.php");
    }else{
        echo "Your Login Name or Password is invalid";
    }
}

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
      Numéro Client : <input class="input_white" type="text" name="clientNumber"/>
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