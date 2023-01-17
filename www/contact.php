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
    <video id="video_ID" class="video" src="/assets/super sonic frontiers status sans fond.mp4" ></video>
    <div class='pp'>
        <div class="Ethan"
        onclick="document.getElementById('video_ID').style.display='block';
        document.getElementById('video_ID').play();">
            <img class='pdp' src='/assets/Stanewolfer.png'>
            <h3>Ethan <br/> développeur</h3>
        </div>
        <div class="Aya">
            <img class='pdp' src='/assets/Aya.png'; >
            <h3>Aya <br/> développeuse</h3>
        </div>
        <div class="Benjamin">
            <img class="pdp" src='/assets/Benjamin.png'; >
            <h3>Benjamin <br/> scrum master</h3>
        </div>
</div>
<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>