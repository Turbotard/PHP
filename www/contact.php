<?php
$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>

<div>
    <h1>NOUS CONTACTER</h1>
</div>
<div class='team'>
    <h2>L'équipe</h2>
    <video id="Sonic" class="video" src="/assets/super sonic frontiers status sans fond.mp4" ></video>
    <button id="fermer" class="croix"
    onclick="document.getElementById('Sonic').style.display='none';
    document.getElementById('Sonic').pause();
    document.getElementById('fermer').style.display='none'">X</button>
   <div class="user-inputs">
      <form action="#" method="POST">
        Nom d'utilisateur : <input type="text" class="input_white" name="author" id="author">
        Votre message : <input type="message" class="input_white" id="content" name="content">
        <button type="submit" class="bouton_envoi">🔥 Envoyer !</button>
      </form>
    </div>
   <div class='pp'>
        <div class="Ethan"
        onclick="document.getElementById('Sonic').style.display='block';
        document.getElementById('Sonic').play();
        document.getElementById('fermer').style.display='block'">
            <img class='pdp' src='/assets/Stanewolfer.png'>
            <h3>Ethan <br/> développeur</h3>
        </div>
        <div class="Aya">
            <img class='pdp' src='/assets/Aya.png'; >
            <h3>Aya <br/> développeur</h3>
        </div>
        <div class="Benjamin">
            <img class="pdp" src='/assets/Benjamin.gif'; >
            <h3>Benjamin <br/> scrum master</h3>
        </div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>