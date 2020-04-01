<!DOCTYPE html>
<html>
<body>

<h1>Validation de la date</h1>

<?php
    
    function check_date($jour,$mois,$annee)
    {
        
        if($annee==2020)
        {
            return true;
        }
        else 
        {
            return false;
        }
        
    }

    if ($_POST["envoi"]=="envoyer") {
        
        $jour = $_POST["jour"];
        $mois = $_POST["mois"];
        $annee = $_POST["annee"];
        
        echo "<h3>La date saisie est: <strong> $jour/$mois/$annee </strong></h3>";
        
        if(check_date($jour,$mois,$annee)==true)
        {
            
        echo "<h3><strong> La date saisie <span style=\"color:green;\">est valide</span> </strong></h3>";
            
        }
        else
        {
            
        echo "<h3>L'année $annee est non bissexstile : <strong style=\"color:red;\">Date invalide </strong></h3>";
 
        }
    }
?>