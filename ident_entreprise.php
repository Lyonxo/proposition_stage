<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Identification</title>
    </head>
    
<?php
    include "header.php";
    //initialisation variables
    $message="";
    $nom="";
    $adresse="";
    $result="";
    
    if(!empty($_POST['nom_entreprise']) && !empty($_POST['adresse_entreprise']) && isset($_POST['nom_entreprise']) && isset($_POST['adresse_entreprise']))
    {//vérification si les champs ont bien été remplit
        
        //connexion à la base de données
        include 'BDD.php';
        $connexion=new BDD('proposition_stage');
        
        //les champs ont été vérifiés donc on remplit les variables
        $nom=$_POST['nom_entreprise'];
        $adresse=$_POST['adresse_entreprise'];
        
        //préparation et envoi de la requête
        $requete="Select * from entreprise where ent_nom='$nom' and ent_adresse='$adresse'";
        $result=$connexion->select($requete);
        
        //vérification du résultat
        if($result!=null)
        {
            echo "code :".$result[0]['ent_num'];
            header("location: prop_stage.php?nom=$nom&adresse=$adresse");
        }
        else
        {
            header("location: insc_entreprise.php");   
        }
    }
    else
    {
        $message ="Valeurs non rentrées";
    }
    

?>
    
    <body>
         <fieldset><legend>identification entreprise</legend>
             <form id="accueil" action="ident_entreprise.php" method="post">
                <br>
                    <label>Nom Entreprise </label><br><input class='input' type="text" name="nom_entreprise" >      <br><br>
                    <label>Adresse        </label><br><input class='input' type="text" name="adresse_entreprise">   <br><br>
                <br>
                <input type="submit" name="valider" value="valider" class='button'/></br>
                <!--<?php //echo "message :".$message;?>-->
            </form>
            
    </body>
    
</html>