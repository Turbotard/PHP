<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Mes soldes';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

$sql = $db->prepare('SELECT solde FROM bankaccounts WHERE id_currencies = 1 AND id_user = ?');
$sql->execute([$_SESSION['user']['id']]);
$solde = $sql->fetch();

$sql2 = $db->prepare('SELECT solde FROM bankaccounts WHERE id_currencies = 2 AND id_user = ?');
$sql2->execute([$_SESSION['user']['id']]);
$solde2 = $sql2->fetch();

$sql3 = $db->prepare('SELECT solde FROM bankaccounts WHERE id_currencies = 3 AND id_user = ?');
$sql3->execute([$_SESSION['user']['id']]);
$solde3 = $sql3->fetch();

$sql4 = $db->prepare('SELECT solde FROM bankaccounts WHERE id_currencies = 4 AND id_user = ?');
$sql4->execute([$_SESSION['user']['id']]);
$solde4 = $sql4->fetch();

$sql5 = $db->prepare('SELECT solde FROM bankaccounts WHERE id_currencies = 5 AND id_user = ?');
$sql5->execute([$_SESSION['user']['id']]);
$solde5 = $sql5->fetch();

$sql6 = $db->prepare('SELECT solde FROM bankaccounts WHERE id_currencies = 6 AND id_user = ?');
$sql6->execute([$_SESSION['user']['id']]);
$solde6 = $sql6->fetch();

$sql7 = $db->prepare('SELECT solde FROM bankaccounts WHERE id_currencies = 7 AND id_user = ?');
$sql7->execute([$_SESSION['user']['id']]);
$solde7 = $sql7->fetch();

if(isset($_POST['converter'])){
    $convert= $db->prepare('SELECT valeure FROM currencies WHERE nomoney = ?');
    $euro= ($convert->execute([$_POST['convert']]))*($_POST['montant']);
    $montant2 = $euro/($convert->execute([$_POST['convert2']]));
    echo $montant2;
}
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';

?>
<div>
    <h1 class="soldes">MES SOLDES</h1>
</div>
<h4>Numéro de compte: <?php echo ($_SESSION['number_account']);?></h4>
<div class="monnaies">
        <div class="euro">
            <img src="/assets/euro.png" alt="€"><br>
            <h4><?php echo number_format($solde['solde'], 2);?></h4><br>
        </div>
        <div class="bitcoin">
            <img src="/assets/Bitcoin-Logo.png" alt="Bitcoin"><br>
            <h4><?php echo number_format($solde2['solde'], 2);?></h4><br>
        </div>
        <div class="chamo">
            <img src="/assets/chameau.png" alt="Chamo"><br>
            <h4><?php echo number_format($solde3['solde'], 2);?></h4><br>
        </div>
        <div class="dollar">
            <img src="/assets/dollar.png" alt="$"><br>
            <h4><?php echo number_format($solde4['solde'], 2);?></h4><br>
        </div>
        </div>
    <br>
        <div class="monnaies">
        <div class="euro_belge">
            <img src="/assets/euro_belge.png" alt="€ Belge"><br>
            <h4><?php echo number_format($solde5['solde'], 2);?></h4><br>
        </div>
        <div class="coding">
            <img src="/assets/coding.jpg" alt="Coding"><br>
            <h4><?php echo number_format($solde6['solde'], 2);?></h4><br>
        </div>
        <div class="dong">
            <img src="/assets/dong.png" alt="Dong"><br>
            <h4><?php echo number_format($solde7['solde'], 2);?></h4><br>
        </div>
    </div> <br>
    <div class="transactions">
        <div class="ligne1">
        <div class="retrait">
            <form>
        <label for="retrait">
            <h2>Faire un retrait : </h2>
            Montant : <input type="text" class="input_white" id="retrait" name="retrait" autocomplete="off"><br>
        </label>
        <input type="submit" class="bouton_envoi" name="retrait" value="RETRAIT">
            </form>
        </div>
            <form>
        <div class="dépot">
        <label for="dépôt">
            <h2>Faire un dépot : </h2>
            Montant : <input type="text" class="input_white" id="depot" name="depot" autocomplete="off"><br>
        </label>
        <input type="submit" class="bouton_envoi" name="dépot" value="DEPOT">
</form>
    </div>
    </div>
    <div class="ligne2">
        <div class="convert">
            <form>
            <label for="convert">
                <h2>Convertir une monnaie : </h2>
                Monnaie à convertir : <input type="text" class="input_white" id="convert" name="convert" autocomplete="off"><br>
                Monnaie de destination : <input type="text" class="input_white" id="convert1" name="convert1" autocomplete="off"><br>
                Montant : <input type="text" class="input_white" id="convert" name="convert" autocomplete="off"><br>
            </label>
            <input type="submit" class="bouton_envoi" name="converter" value="CONVERTIR">
            </form>
        </div>
        <form>
            <div class="virement">
            <label for="virement">
            <h2>Faire un virement : </h2>
            Numéro de compte : <input type="text" class="input_white" id="depot" name="compte_virement" autocomplete="off"><br>
            Montant : <input type="text" class="input_white" id="depot" name="montant_virement" autocomplete="off"><br>
            </label>
            <input type="submit" class="bouton_envoi" value="FAIRE UN VIREMENT">
        </form>
        </div>
    </div> 
    </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>