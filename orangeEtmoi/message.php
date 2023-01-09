<?php require_once './inc/init.inc.php'?>
<?php require_once './inc/haut.inc.php' ;?>

<?php

if(!isset($_SESSION['id'])){
    header("location:connexion.php");
}

if ( isset($_SESSION['id']))  {

    $recupidConnect = htmlspecialchars($_SESSION['id']);
    $recupNombre = $pdo ->prepare('SELECT * FROM messageEnvoyer WHERE id_user = ? ') ;
    $recupNombre->execute(array($recupidConnect)) ;

    if ($recupNombre->rowCount() == 5) {
        header("location:fin.php");
    }
    else
    {
       $contenu = $recupNombre -> rowCount() ;
    }

    
}
if($_POST){
    if ($_POST && !empty($_POST['numero'] && !empty($_POST['mess_envoy']))) {
        

        $id = htmlspecialchars($_SESSION['id']) ;
        $numero = nl2br(htmlspecialchars($_POST['numero']));
        $mess = htmlspecialchars($_POST['mess_envoy']);
        

        $rsql = "INSERT INTO messageEnvoyer(id_user , num_dest , message_env) values(?,?,?) ";
        $envoiInformations = $pdo->prepare($rsql);
        $envoiInformations->execute(array($id , $numero , $mess ));
        header("location:message.php?id=$id");  
    }

}


?>

    <div class="widget-ctn">
        <div class="form-ctn ">
            <div class="login-ctn commun">
                <div class="title titlenew">
                    <span class="number-ctn"><span class="number"><?=$contenu?></span>/<span class="number">5</span></span>
                    <div class="info">
                        <h5>Nouveau message</h5>
                    </div>
                </div>
                <form method="POST" class="messageF">
                    <span id="one">+225</span>
                    <input type="text" placeholder="Numero du destinataire" name="numero" maxlength="10" id="two" ><br>
                    <textarea name="mess_envoy" id ="message" maxlength="150"> </textarea>
                    <span style="float: right;"><span class="number compteur-message">150</span></span>
                    <input type="text" value="ENVOYER" id="envoyer" readonly class="oui">
                    <span class="first"><img src="./inc/icons/checkmark.png" alt="" width="15px" ></span>
                    <span class="two"><img src="./inc/icons/checkmark.png" width="15px"></span>
                    <a href="deconnexion.php">Deconnexion</a>
                </form>
            </div>
            
            <img src="./inc/icons/commentaire-alt.svg" alt="" height="70px" style="position: absolute; top: 58px; padding: 15px;border-radius: 33%;z-index: 1;  background: white;border:2px solid orangered;">
            
        </div>
    </div>

<?php require_once './inc/basScript.inc.php' ;?>