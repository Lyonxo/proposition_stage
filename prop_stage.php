<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style"/>
        <title>Proposition de Stage</title>
    </head>
    
    <?php
        include 'header.php';
    
        $message="";
        $nom="";
        $adresse="";
        $intitulé="";
        $description="";
        $competences="";
        //est redirigé vers index.php si il n'y a pas de retour sur le nom et l'adresse
        
        if(!empty($_POST['nom_ent']) && !empty($_POST['adresse_ent']) && isset($_POST['nom_ent']) && isset($_POST['adresse_ent']))
        {
          
            if(!empty($_POST['intitulé']) && !empty($_POST['description']) && !empty($_POST['competence']))
            {
                include 'BDD.php';
                $connexion=new BDD('proposition_stage');
                
                $nom=$_POST['nom_ent'];
                $adresse=$_POST['adresse_ent'];
                $intitule=$_POST['intitulé'];
                $description=$_POST['description'];
                $competences=$_POST['competence'];
                
                //appel à la base de données pour récupérer l'id de l'entreprise
                $requete="Select ent_num from entreprise where ent_nom='$nom' and ent_adresse='$adresse'";
                $result=$connexion->select($requete);
                
                //if($result==null)
                //{
                   
                    //echo "code".$result[0]['ent_num'];
                    $indice=$result[0]['ent_num'];
                    
                    //ensuite enregistrement des données dans la bdd
                    $requete2="insert into proposition_stage (prop_num,ent_num,et_code,prop_intitule,prop_description,prop_competence_recherche)
                                                       values('','$indice',0,'$intitule','$description','$competences')";
                    $result2 = $connexion->exec($requete2);
                    echo $result2;
               // }

                    if ($result2 = true){
                        $message = "votre proposition de stage a bien été émise";
                    }
        
                
            }
            /*else
            {
                echo "Veuillez remplir les champs.";
            }*/
        }
    
        //1° version (arrivé sur la page pour la 1° fois)
        elseif(!empty($_GET['nom']) && !empty($_GET['adresse']) && isset($_GET['nom']) && isset($_GET['adresse']))
        {
            $nom=$_GET['nom'];
            $adresse=$_GET['adresse'];
        }
        /*else
        {
            header("location: index.php");
        }*/
    ?>
    <body>
        <fieldset>
            <legend>Proposez un stage</legend>
            <form method="post" action="prop_stage.php" class="form2">
                <label>Nom de l'entreprise :     </label><input    class="input2" type="text" name="nom_ent"     value="<?php echo $nom;?>">      </br></br>
                <label>Adresse de l'entreprise : </label><input    class="input2" type="text" name="adresse_ent" value="<?php echo $adresse;?>">  </br></br>
                <label>Intitulé du stage :       </label><input    class="input2" type="text" name='intitulé'/>                                   </br></br>
                <label>Description du stage :    </label><textarea class="area"   rows="4"    cols="50"          name='description'/></textarea>  </br></br>
                <label>Compétences recherchées:  </label><textarea class="area"   rows="4"    cols="50"          name='competence'/></textarea>   </br></br>
                <input type="submit" value="envoyer" class="button2" id="vald"/>
                <label><?php echo $message; ?></label>
            </form>
        </fieldset>

   <?php include "footer.php"; ?>

    
      
 
