<?php

    global $pdo ;
    global $contenu ;
    global $class ;
   


    try {
        //code...
        $db_array = [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ] ;
        
        $pdo = new PDO("mysql:host=localhost;dbname=oetm" , 'root' , '' , $db_array) ;
    
        session_start();
    
        $contenu = "" ;
        $class ="" ;

    } catch (PDOException $e) {
        echo "<pre>" ;
            echo $e ;
        echo "</pre>";
    }

    require_once "fonctions.php" ;

?>