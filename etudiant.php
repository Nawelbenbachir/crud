<?php 
include 'composants/start.php';

if (isset($_POST['submit'])){ //Si le formulaire a été soumis
    require_once 'config.php';//On inclut la connexion à la bdd
    // DSN data source name endroit où on va chercher les données
    $pdo=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    // instruction ternaire si admin dans le tableau alors elle est cochée donc vaut 1 sinon 0
    $admin=isset($_POST['admin']) ? 1 : 0;
    $etudiant=isset($_POST['etudiant']) ? 1 : 0;
    $professeur=isset($_POST['professeur']) ? 1 : 0;

    $requete=$pdo->prepare('INSERT INTO personnes(nom, prenom, email, telephone, admin, etudiant, professeur) VALUES (:nom,:prenom,:email,:telephone,:admin,:etudiant,:professeur)');
    $requete->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':telephone' => $telephone,
        ':admin' => $admin,
        ':etudiant' => $etudiant,
        ':professeur' => $professeur
    ));
    //redirection vers la page étudiant
    header('Location:etudiants.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once 'composants/menu.php';
    ?>
    <h1>Etudiant</h1>

    <form class="etudiant" action="etudiant.php" method=post>
        <div>
            <label for= "nom">Nom: </label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div>
            <label for= "prenom">Prénom: </label>
            <input type="text" name="prenom" id="prénom" required>
        </div>
        <div>
            <label for= "email">Email: </label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for= "telephone">Téléphone: </label>
            <input type="tel" name="telephone" id="telephone" required>
        </div>
        <div class="checkbox">
            <label for= "admin">Admin </label>
            <input type="checkbox" name="admin" id="admin" >
        </div>
        <div class="checkbox">
            <label for= "etudiant">Etudiant </label>
            <input type="checkbox" name="etudiant" id="etudiant" >
        </div>
        <div class="checkbox">
            <label for= "Professeur">Professeur </label>
            <input type="checkbox" name="professeur" id="professeur" >
        </div>
        <div>
            <input name="submit" type="submit" value="Ajouter" >
        </div>
    </form>

</body>
</html>