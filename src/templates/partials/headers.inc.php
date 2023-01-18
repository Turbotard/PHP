<?php 
require_once __DIR__ . '/../../init.php';
require_once __DIR__ . './../../config.php';
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
    <? if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo ("connecté 🟩");
        $isconnect = '../../../myaccount.php';
    }
    else {
        echo ("non connecté 🟥");
        $isconnect = '../../../connexion.php';
    }
    ?>
    </nav>
</header>