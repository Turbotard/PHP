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


?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';

?>
<div>
    <h1 class="soldes">MES SOLDES</h1>
</div>
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
    </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>