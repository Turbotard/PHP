<?php
require_once __DIR__ . '/../../init.php';
require_once __DIR__ . './../../config.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if($_SESSION['grade'] == 1000){
        $isconnect = '../../../admin.php';

      }
      else if($_SESSION['grade'] == 1){
        $isconnect = '../../../myaccount.php';

      }
      else{
        $isconnect = '../../../ban.php';

      }
    }
    else {

        $isconnect = '../../../connexion.php';
    }
?>
<body class="body">
<footer class="footer">

<div class="box11">

    <p class="white yo">Information</p>
    <p class="gris"><span class="orange">Tel : </span>07 83 49 44 12</p>
    <p class="gris"><span class="orange">Email : </span>aya.aidouni@edu.esiee-it.fr</p>
    <p class="gris"><span class="orange">Location : </span>Chez AYA</p>
    <p><a href="https://www.facebook.com/" target="_blank"> <i  class="fa-brands fa-square-facebook"></i></a>
        <a href="https://www.twitter.com/" target="_blank"> <i class="fa-brands fa-square-twitter"></i></a>
        <a href="https://www.google.com/" target="_blank"> <i class="fa-brands fa-google"></i></a>
        <a href="https://www.pinterest.com/" target="_blank"> <i class="fa-brands fa-square-pinterest"></i></a>
        <a href="https://www.instagram.com//" target="_blank"> <i class="fa-brands fa-square-instagram"></i></a></p>

        <p class="copy">Copyright © 2023 Tous droits réservés</p>
</div>



<section class="box22">
<h5 class="white">BNPariHaut</h5>
<div id="bullet">
    <ul class="bullet">
        <li><a href="/index.php">Accueil</a></li><br>
        <li><a href="/connexion.php">Se connecter</a></li><br>
        <li><a href="/inscription.php">S'inscrire</a></li><br>
        <li><a href="<?php echo $isconnect?>">Mon escpace client</a></li><br>
        <li><a href="/contact.php">Nous contacter</a></li><br>
    </ul>
</div>
</section>
</footer>
    
</body>
