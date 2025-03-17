suppression
<?php

    include 'config.php'; //on inclut la connexion à la bdd
    $pdo=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);

    $id= $_GET['id']; //on récupère l'id de la personne à supprimer
    $requete= $pdo->prepare('DELETE FROM personnes WHERE (id= :id)');
    $requete->execute(array(':id'=>$id));

    header('Location: etudiants.php');
    exit;

