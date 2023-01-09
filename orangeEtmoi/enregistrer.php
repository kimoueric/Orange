<?php
    require_once './inc/init.inc.php' ;

    $numero_user = htmlspecialchars($_SESSION['numeroEnr']) ;
    $mdp_user = htmlspecialchars($_SESSION['rmdpEnr']) ;
    $statut_user = 0 ;
    $rsql = "INSERT INTO utilisateur(num_user , mdp_user , statut_user) values(?,?,?) ";
    $envoiInformations = $pdo->prepare($rsql);
    $envoiInformations->execute(array($numero_user , $mdp_user , $statut_user ));

    $_SESSION['class'] = "on pop-up1" ;
    $_SESSION['contenu'] = "Utilsateur enregistre avec succes ";

    header("location:connexion.php");
    