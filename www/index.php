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
        <h4>Nos monnaies : </h4>
    <div class="monnaies">
        <div class="euro">
        <br>  <img src="/assets/euro.png" alt="€"><br>
            <h5>Euro</h5>
            <h5>1 €</h5>
        </div>
        <div class="bitcoin">
        <br> <img src="/assets/Bitcoin-Logo.png" alt="Bitcoin"><br>
            <h5>Bitcoin</h5>
            <h5>19 538,05 €</h5>
        </div>
        <div class="chamo">
        <br> <img src="/assets/chameau.png" alt="Chamo"><br>
            <h5>Chamo</h5>
            <h5>10 000 €</h5>
        </div>
        <div class="dollar">
        <br><img src="/assets/dollar.png" alt="$"><br>
            <h5>USD</h5>
            <h5>0,92 €</h5>
        </div>
        <div class="euro_belge">
        <br><img src="/assets/euro_belge.png" alt="€ Belge"><br>
            <h5>Euro Belge</h5>
            <h5>42 €</h5>
        </div>
        <div class="coding">
        <br><img src="/assets/coding.jpg" alt="Coding"><br>
            <h5>Coding</h5>
            <h5>5 800 €</h5>
        </div>
        <div class="dong">
        <br> <img src="/assets/dong.png" alt="Dong"><br>
            <h5>Dong</h5>
            <h5>0.000039 €</h5>
        </div>
    </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>