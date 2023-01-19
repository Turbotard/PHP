<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Mon espace';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
if(isset($_POST['converter'])){
    $montant = $_POST['montant'];
    $devise = $_POST['convert'];
    $devise2 = $_POST['convert1'];
    $montant2 = $montant * $devise2 / $devise;
    echo $montant2;
}
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
        <h2>NUMERO DE CLIENT : <?php echo ($_SESSION['user']['client_number']);?></h2>
        <h2>GRADE : <?php if($_SESSION['user']['grade'] == 1){
            echo "Client";
        }else if($_SESSION['user']['grade'] == 1000){
            echo "Admin";
        };?></h2>
        <div class="solde"><a href="/soldes.php"><button class="bouton">MES SOLDES</button></a></div>
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
        <input type="submit" class="bouton_envoi" name="retrait" value="RETRAIT">
        </div>
        <div class="dépot">
        <label for="dépôt">
            <h2>Faire un dépot : </h2>
            Montant : <input type="text" class="input_white" id="depot" name="depot" autocomplete="off"><br>
        </label>
        <input type="submit" class="bouton_envoi" name="dépot" value="DEPOT">
    </div>
            <div class="virement">
        <label for="virement">
            <h2>Faire un virement : </h2>
            Numéro de compte : <input type="text" class="input_white" id="depot" name="compte_virement" autocomplete="off"><br>
            Montant : <input type="text" class="input_white" id="depot" name="montant_virement" autocomplete="off"><br>
        </label>
    <input type="submit" class="bouton_envoi" value="FAIRE UN VIREMENT">
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