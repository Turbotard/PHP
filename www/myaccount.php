<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Mon espace';
require_once __DIR__ . '/../src/templates/partials/html_head.php';


?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';
// fonctionne 
$var = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$var->execute([$_SESSION['user']['id']]);
$donnees = $var->fetchAll();
$_SESSION['bank'] = $donnees; // prend tout les comptes en rapport avec le user
$var2 = $db-> prepare('SELECT * FROM transactions WHERE id_user = ?');
$var2->execute([$_SESSION['user']['id']]);
$donnees2 = $var2->fetchAll();
if (count($donnees2) == 0){
    $verif = false;
}
else{
    $verif = true;
    $_SESSION['transactions'] = $donnees2;
    $somme = $_SESSION['transactions'][0]['somme']; 
    $currencie = $_SESSION['transactions'][0]['id_currencie'];
}

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
    </div> <br>
    <div class="ligne2">
            <div class="historique">
            <h2>MES TRANSACTION</h2>
            <div class="tableau">
            <?php
            // Check if there are any transactions
            if($verif){


            // Loop through the transactions and display them in a table
            foreach($donnees2 as $transaction){
                echo $transaction['somme'];
                    echo " ";
                if ($transaction['id_currencie'] == 1){
                    echo "€";
                }
                elseif ($transaction['id_currencie'] == 2){
                    echo "₿";
                }
                elseif ($transaction['id_currencie'] == 3){
                    echo "&#x1F42B";
                }
                elseif ($transaction['id_currencie'] == 4){
                    echo "$";
                }
                elseif ($transaction['id_currencie'] == 5){
                    echo "€B";
                }
                elseif ($transaction['id_currencie'] == 6){
                    echo "Co";
                }
                elseif ($transaction['id_currencie'] == 7){
                    echo "₫";
                }
                echo '</br>';
            }
           
            
            } else {
            echo "Il n'y a pas d'historique de transaction pour ce compte.";
        }
        ?>    
            </div>
            <br>
        </div>
        <div class="infos">
            <h2>MODIFIER MES INFORMATIONS</h2>
            <div class="nom">
                <form method="POST">
                    <label for="nom">NOM : 
                        <input type="text" name="nom" id="nom" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="prénom">
                <form method="POST">
                    <label for="prénom">PRENOM : 
                        <input type="text" name="prénom" id="prénom" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="email">
                <form method="POST">
                    <label for="email">EMAIL : 
                        <input type="text" name="email" id="email" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="mdp">
                <form method="POST">
                    <label for="mdp">MOT DE PASSE : 
                        <input type="text" name="mdp" id="mdp" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="dateNaiss">
                <form method="POST">
                    <label for="dateNaiss">DATE DE NAISSANCE : 
                        <input type="date" name="dateNaiss" id="dateNaiss" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div><br>
            <div class="tel">
                <form method="POST">
                    <label for="tel">TELEPHONE : 
                        <input type="text" name="tel" id="tel" class="input_white">
                    </label>
                    <input type="submit" class="bouton_envoi" value="MODIFIER">
                </form>
            </div>
    </div>
</div><br><br><br>
<div class="solde"><a href="./deconnexion.php"><button class="bouton">DECONNEXION</button></a></div>

</div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>