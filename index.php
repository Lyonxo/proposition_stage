<!DOCTYPE html>
<html>
    
    <head>
         <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Acceuil</title>
    </head>

<?php
    include 'header.php';
    if(isset($_POST['choix']))
    {
    if($_POST['choix']=="entreprise")
    {
        header('location: ident_entreprise.php');
    }
    else if($_POST['choix']=="prof")
    {
        header('location: ident_prof.php');
    }
    }
?>
    <body>
        <fieldset><legend>êtes vous une entreprise ou un professeur</legend>
        <form id="accueil" action="index.php" method="post">
            <br>
            <label><input class='radio' name="choix"  type="radio" value="entreprise">entreprise</label><br>
            <label><input class='radio' name="choix" type="radio" value="prof">professeur</label><br>
            <br>
            <input name="valider" type="submit" class='button'> 
        </form>
        </fieldset>
        
    </body>
    
</html>



