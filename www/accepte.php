<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Acceptations';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

$var = $db->prepare('SELECT * FROM deposits WHERE done = 0');
$var->execute();
$donnees = $var->fetchAll();

$var2 = $db->prepare('SELECT * FROM withdrawals WHERE done = 0');
$var2->execute();
$donnees2 = $var2->fetchAll();

$var3 = $db->prepare('SELECT * FROM users WHERE grade = 1');
$var3->execute();
$donnees3 = $var3->fetchAll();

if(isset($_GET['userid'])){
    $id = $_GET['userid'];
    $var4 = $db->prepare('UPDATE users SET grade = 10 WHERE id = ?');
    $var4->execute([$id]);
    header('Location: accepte.php');
}

if(isset($_GET['userid'])){
    $id = $_GET['userid'];
    $var4 = $db->prepare('UPDATE users SET grade = 10 WHERE id = ?');
    $var4->execute([$id]);
    header('Location: accepte.php');
}

if(isset($_GET['retraitid']) && isset($_GET['sommeretrait']) && isset($_GET['idaccount'])){
    $id = $_GET['retraitid'];
    $somme = $_GET['sommeretrait'];
    $id_account = $_GET['idaccount'];

    $id_user = $db->prepare('SELECT users.id FROM users JOIN bankaccounts ON bankaccounts.id_user = users.id WHERE bankaccounts.id = ? AND bankaccounts.id_currencies = ?');
    $id_user->execute([$id_account, 1]);
    $id_user = $id_user->fetch();

    $sql = $db->prepare('UPDATE bankaccounts SET solde = solde - ? WHERE id_currencies = 1 AND id = ?');
    $sql->execute([$somme, $id_account]);

    $sql_trans = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    $sql_trans->execute([$id_account, $somme, 1, $id_user['id']]);

    $var4 = $db->prepare('UPDATE withdrawals SET done = 1 WHERE id = ?');
    $var4->execute([$id]);

    header('Location: accepte.php');
}

if(isset($_GET['depotid']) && isset($_GET['sommedepot']) && isset($_GET['idaccount'])){
    $id = $_GET['depotid'];
    $somme = $_GET['sommedepot'];
    $id_account = $_GET['idaccount'];

    $id_user = $db->prepare('SELECT users.id FROM users JOIN bankaccounts ON bankaccounts.id_user = users.id WHERE bankaccounts.id = ? AND bankaccounts.id_currencies = ?');
    $id_user->execute([$id_account, 1]);
    $id_user = $id_user->fetch();

    $sql = $db->prepare('UPDATE bankaccounts SET solde = solde + ? WHERE id_currencies = 1 AND id = ?');
    $sql->execute([$somme, $id_account]);

    $sql_trans = $db->prepare('INSERT INTO transactions (id_account, somme, id_currencie, id_user) VALUES (?, ?, ?, ?)');
    $sql_trans->execute([$id_account, $somme, 1, $id_user['id']]);

    $var4 = $db->prepare('UPDATE deposits SET done = 1 WHERE id = ?');
    $var4->execute([$id]);

    header('Location: accepte.php');
}



?>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';
?>
<body>
<div class="container">
    <div class="infos">
        <div class="ligne2">
            <div class="tableau">
                <h2>Demandes Dépôts</h2>
                    <div class="tableau">
                    <?php
                        foreach($donnees as $donnee){
                            echo " ";
                            echo $donnee['somme'];
                            echo " ";
                            if ($donnee['id_currencie'] == 1){
                                echo "€";
                            }
                            elseif ($donnee['id_currencie'] == 2){
                                echo "₿";
                            }
                            elseif ($donnee['id_currencie'] == 3){
                                echo "&#x1F42B";
                            }
                            elseif ($donnee['id_currencie'] == 4){
                                echo "$";
                            }
                            elseif ($donnee['id_currencie'] == 5){
                                echo "€B";
                            }
                            elseif ($donnee['id_currencie'] == 6){
                                echo "Co";
                            }
                            elseif ($donnee['id_currencie'] == 7){
                                echo "₫";
                            }
                            echo " ";
                            echo '<a  class="bouton_accepte" name="accepte_depot" href="/accepte.php?depotid='.$donnee['id'].'&sommedepot='.$donnee['somme'].'&idaccount='.$donnee['id_account'].'" value="✔️">✔️</a>';
                            
                            echo "</br>";
                        }
                    ?>
                    </div>
            </div>
        </div>
    </div>
    <div class="infos">
        <div class="ligne2">
            <div class="tableau">
                <h2>Demandes Retraits</h2>
                    <div class="tableau">
                    <?php
                        foreach($donnees2 as $donnee){
                            echo " ";
                            echo $donnee['somme'];
                            echo " ";
                            if ($donnee['id_currencie'] == 1){
                                echo "€";
                            }
                            elseif ($donnee['id_currencie'] == 2){
                                echo "₿";
                            }
                            elseif ($donnee['id_currencie'] == 3){
                                echo "&#x1F42B";
                            }
                            elseif ($donnee['id_currencie'] == 4){
                                echo "$";
                            }
                            elseif ($donnee['id_currencie'] == 5){
                                echo "€B";
                            }
                            elseif ($donnee['id_currencie'] == 6){
                                echo "Co";
                            }
                            elseif ($donnee['id_currencie'] == 7){
                                echo "₫";
                            }
                            echo " ";
                            echo '<a  class="bouton_accepte" href="/accepte.php?retraitid='.$donnee['id'].'&sommeretrait='.$donnee['somme'].'&idaccount='.$donnee['id_account'].'" name="accepte_retrait">✔️</a>';
                            
                            echo "</br>";
                        }
                    ?>
                    </div>
            </div>
        </div>
    </div>
    <div class="infos">
        <div class="ligne2">
            <div class="tableau">
                <h2>Demandes de Verifications</h2>
                    <div class="tableau">
                    <?php
                        foreach($donnees3 as $donnee){
                            echo " ";
                            echo $donnee['nom'];
                            echo " ";
                            echo $donnee['prenom'];
                            echo " ";
                            echo $donnee['mail'];
                            echo " ";
                            echo $donnee['tel'];
                            echo " ";
                            echo '<a href="/accepte.php?userid='.$donnee['id'].'" class="bouton_accepte" name="accepte" value="✔️">✔️</a>';
                            echo "</br>";
                        }
                    ?>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>