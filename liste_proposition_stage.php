<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Identification</title>
    </head>
    
<?php
    include 'BDD.php';
    $connexion=new BDD('proposition_stage');
    include "header.php";
    //initialisation variables
   
    $requete = "select * from proposition_stage;";
    $result = $connexion -> select($requete);
    $max=count($result);
    
            //pour chaque ligne du tableau
            for($i=0;$i<$max;$i=$i+1){
            $ligne=$result[$i];
            echo " <fieldset><legend>proposition de stage numéro: ".$ligne['prop_num']."</legend>".
                 " <form class='form3' id='liste_prop' action='liste_proposition_stage.php' method='post'>".
                 "<label>intitulé:   ".$ligne['prop_intitule']."</label><br/><br/>".
                 "<label>description: </label><br/><p>".$ligne['prop_description']."</p><br/><br/>".
                 "<label>competences recherchées : </label><br/><p>".$ligne['prop_competence_recherche']."</p><br/><br/>".
                 "<input type='button' class='buttonprop1' id='vald' value='valider'>".
                 "<input type='button' class='buttonprop2' id='refs' value='refuser'><br/>".
                 "</form>".
                 "</fieldset></br></br>";
                
            } 
            $updt= "UPDATE `proposition_stage` SET `et_code`= '1' WHERE ".$ligne['prop_num']." = prop_num;";          

    include "footer.php";
?>

 
        <script src="jquery.js"></script>
        <script>

             $(document).ready(function() {

            $('.buttonprop1').click(function(){
            <?php
            
            $result_up =$connexion-> exec($updt);
            echo $result_up;
            ?>
            alert("test de validation");
            });
            
             $('.buttonprop2').click(function(){
            /*<?php
            $updt= "UPDATE `proposition_stage` SET `et_code`= '1' WHERE ;";
            $result_up =$connexion-> exec($updt);
            echo $result_up;
            ?>*/
            alert("test de refus");
            });
           


                               

             });


        </script>
 