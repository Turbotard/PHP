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
        <div class="infos">
            <h2>MODIFIER MES INFORMATIONS</h2>
            <div class="nom">
                <form>
                    <label for="nom">NOM : 
                        <input type="text" name="nom" id="nom" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="prénom">
                <form>
                    <label for="prénom">PRENOM : 
                        <input type="text" name="prénom" id="prénom" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="email">
                <form>
                    <label for="email">EMAIL : 
                        <input type="text" name="email" id="email" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="mdp">
                <form>
                    <label for="mdp">MOT DE PASSE : 
                        <input type="text" name="mdp" id="mdp" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="dateNaiss">
                <form>
                    <label for="dateNaiss">DATE DE NAISSANCE : 
                        <input type="date" name="dateNaiss" id="dateNaiss" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="tel">
                <form>
                    <label for="tel">TELEPHONE : 
                        <input type="text" name="tel" id="tel" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div>
    </div>
</div><br><br><br>
<div class="solde"><a href="./déconnexion.php"><button class="bouton">DECONNEXION</button></a></div>

</div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>