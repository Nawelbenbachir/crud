<?php
    //protéger la page accès 
    include 'composants/start.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php //on ajoute le menu dans chaque page
        require_once 'composants/menu.php';
    ?>
    <h1>Etudiants</h1>
    <a href="">Ajouter un étudiant</a>
    <br><br>
    
    <table>
        <tr> 
            <th>Id</th>
            <th>Nom</th> <!--table header ligne en tete -->
            <th>Prénom</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Admin</th>
            <th>Etudiant</th>
            <th>Professeur</th>
            <th></th>
        </tr>
        <?php
            require_once 'config.php';
            $pdo= new PDO ('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
            
            $requete=$pdo->query('SELECT *FROM personnes ORDER BY nom, prenom;');
            //boucle while qui parcourt chaque résultat de la requête
            while($data=$requete->fetch()){
                //créer le tableau cellule par cellule
                echo '<tr>';
                echo'<td>'.$data['id'].'</td>';
                echo'<td>'.$data['nom'].'</td>';
                echo'<td>'.$data['prenom'].'</td>';
                echo'<td>'.$data['email'].'</td>';
                echo'<td>'.$data['telephone'].'</td>';
                echo'<td>'.$data['admin'].'</td>';
                echo'<td>'.$data['etudiant'].'</td>';
                echo'<td>'.$data['professeur'].'</td>';
                echo '<td> <a href="">Modifier</a>&nbsp;<a href="">Supprimer</a></td>';
                echo '</tr>';
            }
        ?>
        <!-- <tr>
            <td>1</td>
            <td>Smith</td> table data 
            <td>John</td>
            <td>john@gmail.com</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Doe</td> table data 
            <td>Jane</td>
            <td>jane@gmail.com</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
</body>
</html>


