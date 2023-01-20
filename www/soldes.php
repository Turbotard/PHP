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

$bankaccount = $db->prepare('SELECT id FROM bankaccounts WHERE id_user = ? AND id_currencies = 1');
$bankaccount->execute([$_SESSION['user']['id']]);
$bankaccount = $bankaccount->fetch();



if (isset($_POST['depot'])){
    $quantiter_depot = $_POST['montant_depot'];

    // $sql = $db->prepare('UPDATE bankaccounts SET solde = solde + ? WHERE id_currencies = 1 AND id_user = ?');
    // $sql->execute([$quantiter_depot, $_SESSION['user']['id']]);

    $sql_depo =$db->prepare('INSERT INTO deposits ( id_account, somme, id_currencie, done) VALUES(? ,?, ?, ?)');
    $sql_depo->execute([ $bankaccount['id'], $quantiter_depot, 1, 0]);

    // $sql_trans = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    // $sql_trans->execute([$bankaccount['id'], '+'.$quantiter_depot,1, $_SESSION['user']['id']]);
    
    header('location:/soldes.php');
}




if (isset($_POST['retrait'])){
    $quantiter_retrait = $_POST['montant_retrait'];

    // $sql = $db->prepare('UPDATE bankaccounts SET solde = solde - ? WHERE id_currencies = 1 AND id_user = ?');
    // $sql->execute([$quantiter_retrait, $_SESSION['user']['id']]);

    // $sql_trans = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    // $sql_trans->execute([$bankaccount['id'], '-'.$quantiter_retrait,1, $_SESSION['user']['id']]);
    
    $sql_depo =$db->prepare('INSERT INTO withdrawals ( id_account, somme, id_currencie, done) VALUES(? ,?, ?, ?)');
    $sql_depo->execute([ $bankaccount['id'], '-'.$quantiter_retrait, 1, 0]);

    header('location:/soldes.php');
}

if (isset($_POST['virement'])){
    $montant_virement = $_POST['montant_virement'];
    $compte_virement = $_POST['compte_virement'];
    $devise = $_POST['devise_virement'];

    $id_virement = $db->prepare('SELECT id_user FROM bankaccounts WHERE numerocompte = ?');
    $id_virement->execute([$compte_virement]);
    $id_virement = $id_virement->fetch();

    $bankaccount2 = $db->prepare('SELECT id FROM bankaccounts WHERE id_user = ? AND id_currencies = ?');
    $bankaccount2->execute([$id_virement['id_user'], $devise]);
    $bankaccount2 = $bankaccount2->fetch();


    $sql = $db->prepare('UPDATE bankaccounts SET solde = solde - ? WHERE id_currencies = ? AND id_user = ?');
    $sql->execute([$montant_virement, $devise, $_SESSION['user']['id']]);

    $sql_trans = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    $sql_trans->execute([$bankaccount['id'], '-'.$montant_virement,$devise , $_SESSION['user']['id']]);

    $sql2 = $db->prepare('UPDATE bankaccounts SET solde = solde + ? WHERE id_currencies = ? AND id_user = ?');
    $sql2->execute([$montant_virement,$devise, $id_virement['id_user']]);

    $sql_trans = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    $sql_trans->execute([$bankaccount2['id'], '+'.$montant_virement, $devise, $id_virement['id_user']]);

    header('location:/soldes.php');

}

if(isset($_POST['converter'])){
    $convert=0;
    if($_POST['convert']=="Euro"){
        $convert = "1";
    }elseif ($_POST['convert']=="Bitcoin"){
        $convert = "2";
    }elseif ($_POST['convert']=="Chamo"){
        $convert = "3";
    }elseif ($_POST['convert']=="Dollar"){
        $convert = "4";
    }elseif ($_POST['convert']=="Euro Belge"){
        $convert = "5";
    }elseif ($_POST['convert']=="Coding"){
        $convert = "6";
    }elseif ($_POST['convert']=="Dong"){
        $convert = "7";
    }
    $convert2=0;
    if($_POST['convert2']=="Euro"){
        $convert2 = "1";
    }elseif ($_POST['convert2']=="Bitcoin"){
        $convert2 = "2";
    }elseif ($_POST['convert2']=="Chamo"){
        $convert2 = "3";
    }elseif ($_POST['convert2']=="Dollar"){
        $convert2 = "4";
    }elseif ($_POST['convert2']=="Euro Belge"){
        $convert2 = "5";
    }elseif ($_POST['convert2']=="Coding"){
        $convert2 = "6";
    }elseif ($_POST['convert2']=="Dong"){
        $convert2 = "7";
    }
    $montant = $_POST['montant'];
    $sql = $db->prepare('UPDATE bankaccounts SET solde = solde - ? WHERE id_currencies = ? AND id_user = ?');
    $sql2 = $db->prepare('UPDATE bankaccounts SET solde = solde + ? WHERE id_currencies = ? AND id_user = ?');
    $sql3 = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    $sql4 = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    $taux = $db->prepare('SELECT valeure FROM currencies WHERE id=?');
    $taux2 = $db->prepare('SELECT valeure FROM currencies WHERE id=?');
    $sql->execute([$montant, $convert, $_SESSION['user']['id']]);
    $sql2->execute([$montant, $convert2, $_SESSION['user']['id']]);
    $retrait = '-' . ($montant * $taux->execute([$convert]));
    $depot = ($montant * $taux->execute([$convert])) / $taux2->execute([$convert2]);
    $retrait=$retrait->fetch();
    $depot = $depot->fetch();
    $sql3->execute(array($bankaccount['id'], $retrait, [$convert], $_SESSION['user']['id']));
    $sql4->execute(array($bankaccount['id'], $depot, [$convert2], $_SESSION['user']['id']));
    header('location:/soldes.php');
}
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>
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
            <form method = "POST">
        <label for="retrait">
            <h2>Faire un retrait : </h2>
            Montant : <input type="number" class="input_white" id="retrait" name="montant_retrait" autocomplete="off"><br>
        </label>
        <input type="submit" class="bouton_envoi" name="retrait" value="RETRAIT">
            </form>
        </div>
        <form method ="POST">
        <div class="dépot">
        <label for="dépôt">
            <h2>Faire un dépot : </h2></label>
            Montant : <input type="number" class="input_white" id="montant_depot" name="montant_depot" autocomplete="off"><br>
        
        <input type="submit" class="bouton_envoi" name="depot" value="DEPOT">
        </form>
    </div>
    </div>
    <div class="ligne2">
        <div class="convert">
            <form method = "POST">
            <label for="convert">
                <h2>Convertir une monnaie : </h2>
                Devise à convertir : <select name="convert">
                <?php
                $options = array("Euro", "Bitcoin", "Chamo", "Dollar", "Euro Belge", "Coding", "Dong");
                foreach ($options as $option) {
                    echo "<option class='input_white' value='$option'>$option</option>";
                }
                ?>
</select><br>
                Devise de destination : <select name="convert2">
                <?php
                $options = array("Euro", "Bitcoin", "Chamo", "Dollar", "Euro Belge", "Coding", "Dong");
                foreach ($options as $option) {
                    echo "<option class='input_white' value='$option'>$option</option>";
                }
                ?></select><br>
                Montant : <input type="number" class="input_white" id="convert" name="montant" autocomplete="off"><br>
            </label>
            <input type="submit" class="bouton_envoi" name="converter" value="CONVERTIR">
            </form>
        </div>
        <form method="POST">
            <div class="virement">
            <label for="virement">
            <h2>Faire un virement : </h2>
            Numéro de compte : <input type="text" class="input_white" id="depot" name="compte_virement" autocomplete="off"><br>
            Devise de virement :  <select name="devise_virement">
                <?php
                $options = array("Euro", "Bitcoin", "Chamo", "Dollar", "Euro Belge", "Coding", "Dong");
                foreach ($options as $option) {
                    echo "<option class='input_white' value='$option'>$option</option>";
                }
                ?></select><br>
            Montant : <input type="text" class="input_white" id="depot" name="montant_virement" autocomplete="off"><br>
            </label>
            <input type="submit" class="bouton_envoi" value="FAIRE UN VIREMENT" name="virement">
        </form>
        </div>
    </div> 
    </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>