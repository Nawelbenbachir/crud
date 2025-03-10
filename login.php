<?php
//boucle if pour vérifier si le tableau existe sinon affiche une erreur
//La page login va afficher un tableau avec la valeur du nom et mdp du formulaire 
// if (isset( $_POST['utilisateur'])) echo "<br>".$_POST['utilisateur'];
// if (isset( $_POST['mot_de_passe'])) echo "<br>".$_POST['mot_de_passe'];

session_start(); //on démarre la session pour utiliser les $SESSION

require_once 'config.php';
$pdo= new PDO ('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);

if (isset( $_POST['submit'])){  //si le formulaire a été soumis
    $utilisateur=$_POST['utilisateur'];
    $mot_de_passe= $_POST['mot_de_passe'];
    //$query=$pdo->prepare('SELECT *FROM utilisateurs where email= .$utilisateur') interdit pour des raisons de sécurité : il faut toujours vérifier ce qui est rentré dans le champ (les paramètres) sinon potentiels hackeurs peuvent récupérer des données ou tout supprimer par exemple
    //: devant est un token qui indique juste l'emplacement d'un paramètre à cet endroit 
    $query=$pdo->prepare('SELECT *FROM personnes WHERE email= :utilisateur');
    //execute permet de tester le paramètre en les mettant dans un tableau
    $query->execute(array(':utilisateur'=> $utilisateur));
    //on récupère le tableau avec l'utilisateur demandé
    $data= $query->fetch();
    //var_dump comme echo mais pour récupérer des objets plus complexes comme tableau
    //var_dump($data);
    if ($data){ //la personne existe
        //vérifie si les mots de passe correspondent 
        //password_verify est une méthode pour encrypter les mots de passes
        if(password_verify($mot_de_passe, $data['mot_de_passe'])){
            $_SESSION['utilisateur']=$utilisateur;
            header('Location:index.php');
        }
        else{
            echo "Username/password invalide";
        }
    }
    else{
        echo "Username/password invalide";
    }
}

// if ($utilisateur=='admin' && $mot_de_passe =='admin'){
//     //pour ne pas être redirigé vers la page login voir code index.php
//     $_SESSION['user']=$utilisateur; //on enregistre le nom d'utilisateur dans la session
//     header('Location:index.php'); //redirection vers la page index.php
//     exit; //optimisation : on arrête le script
// }
// else{
//     echo "Mauvais nom d'utilisateur ou mot de passe !";
// }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez vous</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
         require_once 'composants/menu.php';
    ?>
    <h1>Connectez-vous</h1>
    <!-- champ de formulaire= form 
     action = fichier sur lequel on envoie le formualire
     method=post/get avec post envoi les données sur le navigateur
     donc dans l'ordre lance la page on remplit les champs, methode post puis action recharge la page qui a récupéré la valeur des champs-->
    <form action="login.php" method="post">
        <!-- libellé du champ de saisie -->
        <label for="utilisateur">Nom d'utilisateur :</label>
        <!--name pour récupérer la balise en PHP et id pour la récupérer en JS-->
        <input type="text" name="utilisateur" id="utilisateur" required>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        <!-- type mot de passe comme text mais avec des étoiles pour cacher la saisie -->
        <button type="submit" name="submit">Se connecter</button>
        <!-- type submit pour soumettre le formulaire -->
</body>
</html>