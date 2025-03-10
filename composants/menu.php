
<ul class="menu">
    <li><a href="index.php">Accueil </a></li>
    <li><a href="etudiant.php">Etudiants</a></li>
    <li><a href="cours.php">Cours </a></li>
    <?php
    //option connexion si on est déconnecté ou déconnexion dans le menu
        if (isset($_SESSION['utilisateur'])){
            echo '<li> <a href="deconnexion.php">Deconnexion </a> </li>';
        }
        else{
            echo '<li><a href="login.php">Connexion </a> </li>';
        }
    ?>

</ul>
