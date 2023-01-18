<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Mon espace';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>

<div>
    <h1>MON ESPACE</h1>
</div class="table">
    <div>
    <div class="ligne 1">
        <h2>MES INFORMATIONS</h2>
        <div class="infos">
        <h3>NOM :</h3>
        <h3>PRENOM :</h3>
        <h3>NUMERO DE COMPTE :</h3>
    </div>
    <div class="ligne2">
        <h2>MES TRANSACTION</h2>
        <div class="tableau">
        
        </div>
        <div class="dépot">
        <label for="dépôt">
            <h2>Faire un dépot : </h2>
            <input type="text" class="input_white" id="depot" name="depot" autocomplete="off" placeholder="numéro de compte">
            <input type="text" class="input_white" id="depot" name="depot" autocomplete="off" placeholder="montant">
        </label>
        <button class="bouton_depot">déposer</button>
        </div>
    </div>
</div>
    <a class="menu" href="./deconnexion.php">Déconnexion</a>
</div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>