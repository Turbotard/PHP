<?php

require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Accueil';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $isconnect = '../../../myaccount.php';
}
else {

    $isconnect = '../../../connexion.php';
}
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>

<div>
    <h1 class="accueil">BIENVENUE SUR LE SITE DE BNPARIHAUT</h1>
</div>
    <div class="slogan">
    <h2>BNPariHaut, la banque jamais vers le bas</h2>
    <h3>Vous pouvez vous connecter à votre espace personnel en cliquant sur le bouton ci-dessous</h3>
    <a href="<?php echo $isconnect?>"><button class="bouton">MON ESPACE</button></a>
    </div>
    <div class="i">
        <h4>Créez votre compte</h4>
    <a href="/inscription.php"><button class="bouton">INSCRIPTION</button></a>
    </div>
    <div class="monnaies">
        <div class="euro">
            <img src="/assets/euro.png" alt="€"><br>
            <h5>1 €</h5>
        </div>
        <div class="bitcoin">
            <img src="/assets/Bitcoin-Logo.png" alt="Bitcoin"><br>
            <h5>19 538,05 €</h5>
        </div>
        <div class="chamo">
            <img src="/assets/chameau.png" alt="Chamo"><br>
            <h5>10 000 €</h5>
        </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>