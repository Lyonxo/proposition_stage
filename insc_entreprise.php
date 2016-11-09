<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Inscription entreprise</title>
    </head>
    
<?php
    include 'header.php';
    include 'BDD.php';
    $connexion=new BDD('proposition_stage');

    $requete ="";

    $nom_entreprise="";
    $adresse_entreprise="";
    $ville="";
    $code_postal="";
    $fonction="";
    $nom_correspondant="";
    $telephone="";
    $adresse_mail="";
    $fonction="";

    $message="";

if(isset($_POST['nom_entreprise']))
{

    $nom_entreprise      =$_POST['nom_entreprise'];
    $adresse_entreprise  =$_POST['adresse_entreprise'];
    $ville               =$_POST['ville'];
    $code_postal         =$_POST['code_postal'];
    $fonction            =$_POST['tp_code'];
    $nom_correspondant   =$_POST['nom_correspondant'];
    $telephone           =$_POST['telephone'];
    $adresse_mail        =$_POST['adresse_mail'];


    if ($message=="")
    {
         
        $requete="insert into entreprise ( ent_num, ent_nom, ent_adresse, ent_ville, ent_codepostal, ent_nom_correspondant, ent_tel,  ent_mail,             tp_code) values                   ('','$nom_entreprise','$adresse_entreprise','$ville','$code_postal','$nom_correspondant','$telephone','$adresse_mail','$fonction')";

                  
        //$requete2= "select * from type;";               


        try 
        {
            // permet d'inserer une ligne
            $resultats = $connexion->exec($requete);
        } 
        catch (PDOException $e) 
        {
            $message = $message."probleme pour executer cette requete $requete : ";
            $message = $message."les valeur existe deja dans la base de données";
            //echo $message;
        }
        echo $resultats;
        echo $requete;
        echo $message;
    /*
        try 
        {
            // permet d'inserer une ligne
            $resultats2 = $connexion->select($requete2);
        }    
        catch (PDOException $e) 
        {
            $message = $message."probleme pour executer cette requete $requete : ";
            $message = $message."les valeur existe deja dans la base de données";
            //echo $message;
        }
        echo $requete2;
        echo $message;
        $max=count($resultats2);*/
    }

    
    if($resultats==null)
    {
       header("location: prop_stage.php?nom=$nom_entreprise&adresse=$adresse_entreprise");
    }

}


?>
  
    <body>
        <fieldset><legend>inscription d'une entreprise entreprise</legend>
            <form method="post" action="insc_entreprise.php">
                
                <label>Nom Entreprise          </label> <br> <input class='input' type="text"      name='nom_entreprise'        /></br></br>
                <label>Adresse Entreprise      </label> <br> <input class='input' type="text"      name='adresse_entreprise'    /></br></br>
                <label>ville                   </label> <br> <input class='input' type="text"      name="ville"                 /></br></br>
                <label>code postale            </label> <br> <input class='input' type="text"      name="code_postal"           /></br></br>




                <label>fonction</label></br> 
                <select name='tp_code' class='input'>
                <?php
                        $requete2= "select * from type;";
                    
                    try 
                    {
                        // permet d'inserer une ligne
                        $resultats2 = $connexion->select($requete2);
                    }    
                    catch (PDOException $e) 
                    {
                        $message = $message."probleme pour executer cette requete $requete : ";
                        $message = $message."les valeur existe deja dans la base de données";
                        //echo $message;
                    }
                    //echo $message;
                    $max=count($resultats2);
                    
                    for($i=0;$i<$max;$i=$i+1)
                    {
                        $ligne=$resultats2[$i];
                        echo "<option value=",$ligne['tp_code'],">",$ligne['tp_libelle'],"</option>";
                    }
                ?>
                </select></br></br>


                <label>nom du correspondant    </label> <br> <input class='input' type="text"      name="nom_correspondant"     /></br></br>
                <label>telephone               </label> <br> <input class='input' type="text"      name="telephone"             /></br></br>
                <label>adresse e-mail          </label> <br> <input class='input' type="text"      name="adresse_mail"          /></br></br>
                <input type="submit" value="valider" class='button'/>
            </form>
    </body>
</html>