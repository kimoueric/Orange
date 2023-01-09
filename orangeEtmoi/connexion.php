<?php
    require_once './inc/init.inc.php' ;

    if(isset($_SESSION['class']) && isset($_SESSION['contenu']))
    {
        $class = "on pop-up1" ;
        $contenu = "Utilsateur enregistre avec succes ";

        unset($_SESSION['class']);
        unset($_SESSION['contenu']);
    }

  if($_POST){


    if ( !empty(isset($_POST['numeroConnexion'])) && !empty(isset($_POST['mdpConnexion']))) {

            $recupNumeroConnexion = htmlspecialchars($_POST['numeroConnexion']);
            $recupMdpConnexion = htmlspecialchars($_POST['mdpConnexion']) ;

            $recupUser = $pdo ->prepare('SELECT * FROM utilisateur WHERE num_user = ? and mdp_user = ? ') ;
            $recupUser->execute(array($recupNumeroConnexion , $recupMdpConnexion)) ;
            
            if ($recupUser->rowCount() > 0) {
                
                $res = $recupUser -> fetch(PDO::FETCH_ASSOC) ;

                $_SESSION['mpd'] = $res['mdp_user'] ;
                $_SESSION['number'] = $res['num_user'] ;
                $_SESSION['id'] = $res['id_user'];
                $_SESSION['statut_user'] = $res['statut_user'] ;

                if(userClient()){

                    header("location:message.php") ;
                }
                if (userAdmin()) {
                    header("location:./gestion.php") ;
                }
            }
            else
            {
                $class = "off";
                $contenu = "Utilsateur non reconnu , verifiez vos informations puis ressayer a nouveau ";
            }
            

    }

    if ( empty($_POST['numeroConnexion']) || empty($_POST['mdpConnexion'])) {

                $class = "off";
                $contenu = "Verifiez que vous avez renseigne tous les champs ";
    }

    if ( !empty($_POST['numeroEnr']) && !empty($_POST['mdpEnr']) && !empty($_POST['rmdpEnr']) ) {
        

        $_SESSION['numeroEnr'] =  htmlspecialchars($_POST['numeroEnr']) ;
        $_SESSION['rmdpEnr'] = htmlspecialchars($_POST['rmdpEnr']) ;
        header("location:enregistrer.php");
    }


  }


?>


<?php require_once './inc/haut.inc.php' ;?>

<div class="widget-ctn">
        <div class="form-ctn">
            <div class="login-ctn commun">
                <div class="title">
                    <span class="font"><img src="./inc/icons/fleche-droite.svg" alt="" height="30px" width="50px"></span>
                    <div class="info">
                        <h6>Deja un compte ?</h6>
                        <h5>CONNECTEZ-VOUS ICI</h5>
                    </div>
                </div>
                <form method="POST" >
                    <input type="text" title="Le numero doit respecte la syntaxe des numeros ivoiriens et doit etre de 10 chiffres " placeholder="Veuillez saisir votre numero" maxlength="10" id="two" name="numeroConnexion" pattern="(01|05|07)[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}"><br>
                    <input type="password" placeholder="Mot de passe" id="two" maxlength="18" name ="mdpConnexion" title="Le mot de passe doit etre egal a 8 caracteres et doit contenir des chiffres et lettres"   pattern="[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}">
                    <input type="submit" value="SE CONNECTER">
                </form>
            </div>
            <div class="sign-up-ctn commun">
                <div class="title">
                    <span class="font"><img src="./inc/icons/plus.svg" alt="" height="30px" width="50px"></span>
                    <div class="info">
                        <h6>Pas de compte ?</h6>
                        <h5>INSCRIVEZ-VOUS ICI</h5>
                    </div>
                </div>
                <form method="POST" >
                    <input type="text" title="Le numero doit respecte la syntaxe des numeros ivoiriens et doit etre de 10 chiffres " placeholder="Veuillez saisir votre numero" maxlength="10" id="two" class="enterNumber" name="numeroEnr" pattern="(01|05|07)[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}">
                   
                    <input type="password"  placeholder="Mot de passe" id="two"   class="enterMdp" maxlength="15" name="mdpEnr" title="Le mot de passe doit etre egal a 8 caracteres et doit contenir des chiffres et lettres"   pattern="[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}">

                    <input type="password"  placeholder="Repeter votre mot de passe" id="two"  class="confirmMdp"  maxlength="15" name="rmdpEnr" title="Le mot de passe doit etre egal a 8 caracteres et doit contenir des chiffres et lettres"   pattern="[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}">

                    <input type="text" value="S'INSCRIRE" readonly id="inscrire" style="background-color: rgba(255, 227, 204, 0.589);font-weight: bold;transition:0.5s">
                    <span class=" validateNumber" ><img src="./inc/icons/checkmark.png" width="15px"></span>
                    <span class=" validateMdp"><img src="./inc/icons/checkmark.png" width="15px"></span>
                    <span class=" revalidateMdp"><img src="./inc/icons/checkmark.png" alt="icon" width="18px" ></span>

                    
                </form>
            </div>
            <div class="or">
                <div class="text-ctn">
                    <h4>OU</h4>
                </div>
            </div>
            <img src="./inc/icons/utilisateur.svg" alt="" height="70px" style="position: absolute; top: 58px; padding: 10px;border-radius: 100%;z-index: 1;    background: white;border:2px solid orangered;">
            <img src="./inc/icons/telephone-cercle.svg" alt="" height="20px" style="position: absolute; z-index: 1; left: 29%;top: 40.5%;">
            <img src="./inc/icons/telephone-cercle.svg" alt="" height="20px" style="position: absolute; z-index: 1; left: 53%;top: 40.5%;">
            <img src="./inc/icons/verrouiller-alt.svg " alt="" height="23px" style="position: absolute; z-index: 1; left: 29%;top: 47.4%;">
            <img src="./inc/icons/verrouiller-alt.svg" alt="" height="23px" style="position: absolute; z-index: 1; left: 53%;top: 47.5%;">
            <img src="./inc/icons/verrouiller-alt.svg" alt="" height="23px" style="position: absolute; z-index: 1; left: 53%;top: 54.1%;">


        </div>
    </div>
    
        </div>
    </div>

    <div class="pop-up <?= $class ?> "><h5><?= $contenu ?></h5></div>
    

<?php require_once './inc/bas.inc.php';?>