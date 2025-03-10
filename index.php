<?php
    //protéger la page accès 
    //_once pour vérifier que l'instruction n'a pas déjà été incluse
    //include_once 'start.php';
    //require_once 'composants/start.php'; //vérifier que l'instruction existe sinon exit (plus sécurisé)
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once 'composants/menu.php'; //on inclut le menu
    ?>
    <h1> Bienvenue sur le CRUD !</h1>
    
</body>
</html>