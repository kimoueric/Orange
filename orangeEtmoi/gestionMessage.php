<?php
    require_once "./inc/init.inc.php";
    
    if (userAdmin()) {
    }
    else
    {
            header("location:connexion.php");
            session_destroy();
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
<div class="conteneur">

<?php
            
            $sql_request = "SELECT * FROM messageenvoyer" ;
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
