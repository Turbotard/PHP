

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/asstets/generateurMP.css">

    <!-- importation font family "Anton"-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <!-- ilmportation font family "Archivo"-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&display=swap" rel="stylesheet">

    <!-- importation icones-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>
    
    <title>Générateur de mot de passe</title>

</head>
<?php
$page_title = 'Accueil';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
?>
<body>

<?php require_once __DIR__ . '/../src/templates/partials/headers.inc.php'; ?>



<div class="inscription">
    <div class="text1">
        <h1>GENERATEUR DE MOT DE PASSE</h1>
    </div>
</div>
<div class="centrale">
    <section class="inputBox">
        <h2>Générateur de mot de passe</h2>
        <div class="passwordBox">
            <input type="text" id="password" readonly>
        </div>
        <div class="buttons">
            <button onclick="getPassword()">Générer</button>
            <button id="copy" onclick="copyMdp()">Copier</button>
        </div>
    </section>
    <script src="/actions/generateur.js"></script>
</div>


<?php require_once __DIR__ . '/../src/templates/partials/bouton_scroll_haut.php'; ?>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>

</body>


</html>