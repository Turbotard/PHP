<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Mon espace';
require_once __DIR__ . '/../src/templates/partials/html_head.php';


?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';
$var = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$var->execute([$_SESSION['user']['id']]);
$donnees = $var->fetchAll();
$_SESSION['bank'] = $donnees;
$var2 = $db-> prepare('SELECT * FROM transactions WHERE id_account = ?');
$var2->execute([$_SESSION['bank']['id']]);
$donnees2 = $var2->fetch();
$_SESSION['transactions'] = $donnees2;
$somme = $_SESSION['transactions']['somme']; 
$currencie = $_SESSION['transactions']['id_currencie'];
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
                    
                    <table>
                        <thead>
                        <tr>
                            <th>Numéro de compte</th>
                            <th>Montant</th>
                            <th>Devise</th>
                            <th>Date</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $count = count($_SESSION['transactions']);
                        while($i < $count) {
                            echo '<tr>';
                            echo '<td>' . $_SESSION['transactions'][$i]['numerocompte'] . '</td>';
                            echo '<td>' . $_SESSION['transactions'][$i]['montant'] . '</td>';
                            echo '<td>' . $_SESSION['transactions'][$i]['id_currencie'] . '</td>';
                            echo '<td>' . $_SESSION['transactions'][$i]['date'] . '</td>';
                            echo '<td>' . $_SESSION['transactions'][$i]['type'] . '</td>';
                            echo '</tr>';
                            $i++;
                            }
                            ?>
                        </tbody>
                    </table>

                    
            </div>
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