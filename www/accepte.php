<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Acceptations';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

$var = $db->prepare('SELECT * FROM deposits WHERE done = 1');
$var->execute();
$donnees = $var->fetchAll();

$var2 = $db->prepare('SELECT * FROM withdrawals WHERE done = 1');
$var2->execute();
$donnees2 = $var2->fetchAll();

$var3 = $db->prepare('SELECT * FROM users WHERE grade = 1');
$var3->execute();
$donnees3 = $var3->fetchAll();

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