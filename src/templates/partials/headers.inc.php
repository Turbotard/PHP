<?php 
require_once __DIR__ . '/../../init.php';
require_once __DIR__ . './../../config.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo ("connecté 🟩");
        $isconnect = '../../../myaccount.php';
    }
    else {
        echo ("non connecté 🟥");
        $isconnect = '../../../connexion.php';
    }
?>
<header>
   <nav>
    <a href="/index.php" class="connexion">
        <img class="fit-picture" src="/assets/Logo_BNParihaut_texte.png" alt="BNParihaut">
    </a>
    <a href="/connexion.php"  class="connexion">
        <p> CONNEXION</p>
    </a> 
    <a href="/inscription.php"  class="connexion">
        <p>INSCRIPTION</p>
    </a>
    <a href="<?php echo $isconnect?>" class="connexion">
        <p>MON ESPACE</p>
    </a>
    <a href="/contact.php" class="connexion">
        <p>NOUS CONTACTER</p>
    </a>
    </nav>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo ("connecté 🟩");
    }
    else {
        echo ("non connecté 🟥");
    }
    ?>
</header>