<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Acceptations';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

$var = $db->prepare('SELECT * FROM deposits WHERE done = 1');
$var->execute();
$donnees = $var->fetchAll();

?>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';
?>
<body>
    <div class="infos">
        <div class="ligne2">
            <h2>Demande Dépôts</h2>
            <?php
                foreach($donnes as $donnee){
                    echo $donnee['somme'];
                }
            ?>
        </div>
    </div>

<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>