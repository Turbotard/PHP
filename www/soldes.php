<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
$page_title = 'Mes soldes';
require_once __DIR__ . '/../src/templates/partials/html_head.php';


?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php';
?>
<div>
    <h1 class="soldes">MES SOLDES</h1>
</div>
<div class="monnaies">
        <div class="euro">
        <br><img src="/assets/euro.png" alt="€"><br>
            <h4>Euro</h4><br>
        </div>
        <div class="bitcoin">
        <br> <img src="/assets/Bitcoin-Logo.png" alt="Bitcoin"><br>
            <h4>Bitcoin</h4><br>
        </div>
        <div class="chamo">
        <br><img src="/assets/chameau.png" alt="Chamo"><br>
            <h4>Chamo</h4><br>
        </div>
        <div class="dollar">
        <br> <img src="/assets/dollar.png" alt="$"><br>
            <h4>USD</h4><br>
        </div>
        </div>
    <br>
        <div class="monnaies">
        <div class="euro_belge">
        <br><img src="/assets/euro_belge.png" alt="€ Belge"><br>
            <h4>Euro Belge</h4><br>
        </div>
        <div class="coding">
            <br><img src="/assets/coding.jpg" alt="Coding"><br>
            <h4>Coding</h4><br>
        </div>
        <div class="dong">
        <br><img src="/assets/dong.png" alt="Dong"><br>
            <h4>Dong</h4><br>
        </div>
    </div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.inc.php'; ?>
</body>
</html>