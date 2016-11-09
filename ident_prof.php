<?php

    include 'header.php';
    //initialisation variables
    $message="";
    $login="";
    $mdp="";
    $result="";
    
    if(isset($_POST['login']) && ($_POST['mdp']))
    {//vérification si les champs ont bien été remplit
        
        //connexion à la base de données
        include 'BDD.php';
        $connexion=new BDD('proposition_stage');
        
        //les champs ont été vérifiés donc on remplit les variables
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];

        
        //préparation et envoi de la requête
        $requete="Select * from professeur where prof_login='$login' and prof_mdp='$mdp';";
        $result=$connexion->select($requete);
        
        //vérification du résultat
        if(isset($result[0]))
        {
            //$message ='gg';
            header("location: accueil_prof.php");
        }      
}
 
?> 
    
         <fieldset><legend>identification entreprise</legend>

             <form id="accueil"  method="post">

                <br>
                    <label>login:        </label><br><input id="log" class='input' type="text" name="login" >      <br><br>
                    <label>mot de passe: </label><br><input id="mdp" class='input' type="password" name="mdp">   <br><br>     
                <br>

                <input type="submit" name="valider" value="valider" class='button' id="vald"/><br>
              

            </form>

        </fieldset>

<?php include "footer.php"; ?>

    
        <script src="jquery.js"></script>
        <script>

             $(document).ready(function() {

            var logintest= $('#log');
            var mdptest = $('#mdp');

            $('#vald').click(function(){
            if(logintest.val()=="" || mdptest.val()== ""){
                alert("remplissez les champs");
            }
            });


                               

             });


        </script>