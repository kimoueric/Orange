<?php
    require_once './inc/init.inc.php' ;

    if (isset($_GET['id']) AND !empty($_GET['id'])) {
        
        $getid = addslashes($_GET['id']) ;
        $recupUser = $pdo ->prepare('SELECT * FROM utilisateur WHERE id_user = ? ') ;
        $recupUser->execute(array($getid)) ;
        
        if ($recupUser->rowCount() > 0) {
            
            $request = $pdo->prepare('DELETE FROM utilisateur  WHERE id_user = ?') ;
            $request->execute(array($getid));

            header("location:gestion.php") ;
    
        }
        else
        {
            echo "Desole nous n'avons pas trouve un utilisateur correspondant" ;
    }
}
?>
      