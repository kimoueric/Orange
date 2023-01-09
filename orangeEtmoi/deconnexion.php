<?php
    require_once "./inc/init.inc.php" ;
    session_destroy() ;
    header("location:connexion.php") ;
?>