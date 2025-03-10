<!-- protège toutes les pages -->
<?php
//protéger la page accès 

//cherche dans le serveur --> le tableau $_SESSION et dans le tableau --> le nom d'utilisateur 
   session_start();
    if (!isset($_SESSION['utilisateur'])){ //Donc on est pas connecté
        header('Location:login.php'); //header=redirection sur la page login
        exit; // on sort du serveur
    }
?>