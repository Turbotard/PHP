<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Mon espace';
require_once __DIR__ . '/../src/templates/partials/html_head.php';


?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';
?>

<div>
    <h1 class="espace_banque">MON ESPACE</h1>
    <h2> Votre compte n'a pas encore été accepter</h2>
    <h2>NOM : <?php echo ($_SESSION['user']['nom']);?></h2> 
    <h2>PRENOM : <?php echo ($_SESSION['user']['prenom']);?></h2>
    <h2>NUMERO DE CLIENT : <?php echo ($_SESSION['user']['client_number']);?></h2>
    <div class="solde"><a href="./deconnexion.php"><button class="bouton">DECONNEXION</button></a></div>
    



</div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>