<?php
$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/config.php';
?>
<body>
<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>

<div>
    <h1  class="contacter">NOUS CONTACTER</h1>
</div>
<div class="user-inputs">
      <form action="#" method="POST">
        Adresse email : <input type="text" class="input_white" name="author" id="author">
        Votre message : <textarea type="message" class="message" id="content" name="content"></textarea>
        <button type="submit" class="bouton_envoi">📤 Envoyer !</button>
      </form>
</div>
<div class='team'>
    <h2>L'équipe</h2>
    <button id="fermer" class="croix"
    onclick="document.getElementById('Sonic').style.display='none';
    document.getElementById('Sonic').pause();
    document.getElementById('Sonic').currentTime=0;
    document.getElementById('Putin').style.display='none';
    document.getElementById('Putin').pause();
    document.getElementById('Putin').currentTime=0;
    document.getElementById('Meme').style.display='none';
    document.getElementById('Meme').pause();
    document.getElementById('Meme').currentTime=0;
    document.getElementById('fermer').style.display='none'">X</button>
    <video id="Sonic" class="video" src="/assets/super sonic frontiers status sans fond.mp4" ></video>
    <video id="Putin" class="video" src="/assets/Wide Putin Walking.mp4" ></video>
    <video id="Meme" class="video" src="/assets/meme chat.mp4" ></video>
    
   
   <div class='pp'>
        <div class="Ethan"
        onclick="document.getElementById('Sonic').style.display='block';
        document.getElementById('Sonic').play();
        document.getElementById('Putin').style.display='none';
        document.getElementById('Putin').pause();
        document.getElementById('Putin').currentTime=0;
        document.getElementById('Meme').style.display='none';
        document.getElementById('Meme').pause();
        document.getElementById('Meme').currentTime=0;
        document.getElementById('fermer').style.display='block'">
            <img class='pdp' src='/assets/Stanewolfer.png'>
            <h3>Ethan <br/> développeur</h3>
        </div>
        <div class="Aya"
        onclick="document.getElementById('Meme').style.display='block';
        document.getElementById('Meme').play();
        document.getElementById('Sonic').style.display='none';
        document.getElementById('Sonic').pause();
        document.getElementById('Sonic').currentTime=0;
        document.getElementById('Putin').style.display='none';
        document.getElementById('Putin').pause();
        document.getElementById('Putin').currentTime=0;
        document.getElementById('fermer').style.display='block'">
            <img class='pdp' src='/assets/Aya.png'; >
            <h3>Aya <br/> développeur</h3>
        </div>
        <div class="Benjamin"
        onclick="document.getElementById('Putin').style.display='block';
        document.getElementById('Putin').play();
        document.getElementById('Meme').style.display='none';
        document.getElementById('Meme').pause();
        document.getElementById('Meme').currentTime=0;
        document.getElementById('Sonic').style.display='none';
        document.getElementById('Sonic').pause();
        document.getElementById('Sonic').currentTime=0;
        document.getElementById('fermer').style.display='block'">
            <img class="pdp" src='/assets/Benjamin.gif'; >
            <h3>Benjamin <br/> scrum master</h3>
        </div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php
require_once __DIR__. "/../src/templates/partials/footer.inc.php";?>
</body>

</html>