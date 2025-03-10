<?php
   session_start ();
   //détruit la session
   session_destroy();
   header("Location: login.php");
?>