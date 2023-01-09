<?php
    require_once "./inc/init.inc.php";
    
    if (userAdmin()) {
    }
    else
    {
            header("location:connexion.php");
            session_destroy();
    }

    if($_POST)
    {
        $numeroUser =addslashes(htmlentities($_POST['numeroUser'])) ;
        $motdepasse =addslashes(htmlentities($_POST['mdpUser'])) ;
        $statut =addslashes(htmlentities($_POST['statut'])) ;
       
        $resultat = $pdo->prepare("INSERT INTO utilisateur (num_user , mdp_user, statut_user) values (? , ? , ?)");
        $resultat->execute(array($numeroUser , $motdepasse , $statut)) ;


        
    }
?>

<?php require_once "./inc/hautAdmin.inc.php"?>
<header>
        <nav>
            <h3>ORANGE ET MOI<sub>Espace admin</sub></h3>
        </nav>
        <a href="gestion.php">Gestion utilisateurs</a>
        <a href="gestionMessage.php">Gestion de Messages </a>
        <a href="deconnexion.php">Deconnexion</a>
        </nav>
</header>
<form action="" method="post">
    <br>
        Numero Utilisateur : <br>
        <input type="text"  title="Le numero doit respecte la syntaxe des numeros ivoiriens et doit etre de 10 chiffres " required name="numeroUser" pattern="(01|05|07)[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}" maxlength = "10"><br><br>
        Mot de passe : <br>
            <input type="password"  title="Le mot de passe doit etre egal a 8 caracteres et doit contenir des chiffres et lettres" required name="mdpUser" maxlength = "12" pattern="[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}[\.\-]?[0-9a-zA-Z]{2}"><br><br>
        Statut : <br>
        <input type="text"  title="Renseigner 0 pour le satatut membre ou 1 pour le statut admin " required name="statut" maxlength = "1" pattern="(0|1)"><br><br>
        <input type="submit" value="Ajouter">
    </form>
<div class="conteneur">

<?php
            
            $sql_request = "SELECT * FROM utilisateur" ;
            $resultat = $pdo -> query($sql_request);

            echo "<table ><tr>" ;

                for ($i=0; $i < $resultat -> columnCount() ; $i++) {

                    $colonne = $resultat -> getColumnMeta($i) ;
                    echo '<th>'.$colonne['name'].'</th>';
                }

                echo '<th>'."Modification".'</th>';
                echo '<th>'."Suppression".'</th>';
                
                echo '</tr>' ;

                $i = 0 ;
                while($lignes = $resultat->fetch(PDO::FETCH_ASSOC)) 
                {
                    $recup_data[] = $lignes['id_user'] ;
                    echo '<tr>';
                        foreach ($lignes as $ligne => $valeur) {

                            echo '<td>';
                                echo $valeur ;
                                echo '</td>';
                                
                }

                    echo "<td><a href='./modifier.php?id=$recup_data[$i]' class='modif'>֍</a></td>" ;
                    echo "<td><a href='./supprimer.php?id=$recup_data[$i]' class='suppr'>X</a></td>" ;
                    '</tr>';
                            
                }
        ?>
</div>
<?php require_once "./inc/basAdmin.inc.php";
