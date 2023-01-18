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
</div class="table">
    <div>
    <div class="ligne 1">
        <h2>NOM : <?php echo ($_SESSION['user']['nom']);?></h2> 
        <h2>PRENOM : <?php echo ($_SESSION['user']['prenom']);?></h2>
        <h2>NUMERO DE COMPTE : <?php echo ($_SESSION['user']['client_number']);?></h2>
        <h2>SOLDE : <?php echo ($_SESSION['solde']);?></h2>
        <h2>GRADE : <?php if($_SESSION['user']['grade'] == 1){
            echo "Client";
        }else if($_SESSION['user']['grade'] == 1000){
            echo "Admin";
        };?></h2>
    </div>
    <div class="ligne2">
        <h2>MES TRANSACTION</h2>
        <div class="tableau">
        
        </div>
        <div class="transactions">
        <div class="retrait">
        <label for="retrait">
            <h2>Faire un retrait : </h2>
            Montant : <input type="text" class="input_white" id="retrait" name="retrait" autocomplete="off"><br>
        </label>
        <button class="bouton_envoi">RETIRER</button>
        </div>
        <div class="dépot">
        <label for="dépôt">
            <h2>Faire un dépot : </h2>
            Montant : <input type="text" class="input_white" id="depot" name="depot" autocomplete="off"><br>
        </label>
        <button class="bouton_envoi">DEPOSER</button>
        </div>
        <div class="virement">
        <label for="virement">
            <h2>Faire un virement : </h2>
            Numéro de compte : <input type="text" class="input_white" id="depot" name="compte_virement" autocomplete="off"><br>
            Montant : <input type="text" class="input_white" id="depot" name="montant_virement" autocomplete="off"><br>
        </label>
        <button class="bouton_envoi">FAIRE UN VIREMENT</button>
        </div>
    </div>
    </div>
</div>
<div class="menu">
    <a class="menu" href="./deconnexion.php"><button class="bouton">DECONNEXION</button></a>
</div>

</div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>