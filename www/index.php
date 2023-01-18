<?php

require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Accueil';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>

<div>
    <h1 class="accueil">BIENVENUE SUR LE SITE DE BNPARIHAUT</h1>
</div>
    <div class="slogan">
    <h2>BNPariHaut, la banque jamais vers le bas</h2>
    <h3>Vous pouvez vous connecter à votre espace personnel en cliquant sur le bouton ci-dessous</h3>
    <a href="/myaccount.php"><button class="bouton">MON ESPACE</button></a>
    </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>