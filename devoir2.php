<?php
echo "<h2>Exercice 1:<br></h2>";
function decoupage($string,$car)
{
    $tab = explode($car, $string);
    return $tab;
}


$tabb= decoupage('mariamasmamohamed','a');
for($i=0;$i<sizeof($tabb);$i++)
{
    echo $tabb[$i]."<br>";
}

echo "<h2><br>Exercice 2:<br></h2>";
echo "<style>
    
table {
  border-collapse: collapse;
  width:100%;
}

table, th, td {
  border: 1px solid black;
  text-align:center;
}

h3{
  text-align:center;
}
    
</style>
        
<h3>Commandes Clients</h3>
<table>
    
    <tr>
        
      <th>Numéro de commande</th>
       <th>Numéro Client</th>
       <th>Date de commande</th>
       <th>Désignation article</th>
       <th>Quantité(PAL)</th>
       <th>Prix unitaire(HT)</th>
       <th>Date de livraison</th>
       <th>Adresse Client</th>
      
    </tr>";

$fichier = fopen("commande.txt", "r") or die("Impossible d'ouvrir le fichier courant!");
$myfile1 = fopen("pscde01_CLI1001.txt", "w") or die("Impossible d'ouvrir le fichier courant!");
$myfile2 = fopen("psccl01_CLI1004.txt", "w") or die("Impossible d'ouvrir le fichier courant!");

$txt="";

while(!feof($fichier)){
    
    $ligne= fgets($fichier);
    $tab= explode('|', $ligne);
    
      if(in_array("CLI1001", $tab)==0)
      {
                    
          for($i=0;$i<sizeof($tab);$i++)
          {
              $txt.=$tab[$i]."|";
          }         
          
        fwrite($myfile1, $txt);
        $txt="";
          
      }
      else if(in_array("CLI1004", $tab)==0)
      {
                    
          for($i=0;$i<sizeof($tab);$i++)
          {
              $txt.=$tab[$i]."|";
          }         
          
        fwrite($myfile2, $txt);
        $txt="";
          
      }
    echo "<tr>";
    
        for($i=0;$i<sizeof($tab);$i++)
          {
            
              echo "<td> $tab[$i] </td>";

          }  
      
    echo "</tr>";
                
}

echo "</table>";
fclose($fichier);
fclose($myfile1);
fclose($myfile2);

echo "<h2><br>Exercice 3:<br></h2>";
?>
<!DOCTYPE html>
<html>
<body>

<h1>Choisir une date</h1>
    
<form  action="valideDate.php">
        
        <div class="row">
            
            <label for="jour">Jour </label>
            <label for="mois">Mois </label>
            <label for="annee">Année</label>

        </div>
        
        <div class="row">
   
            <select name="jour">
                <?php
                for($i=1;$i<32;$i++)
                {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
            <select name="mois">
                 <?php
                for($i=1;$i<13;$i++)
                {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
            <select name="annee">
                 <?php
                for($i=1900;$i<2031;$i++)
                {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
    
        </div>
        
        <button type="submit" value="envoyer" name="envoi">Envoyer</button>
    
</form>
  
<?php
echo "<br><h2>Exercice 4:<br></h2>";
?>


<form method="post" action="authentification.php"  style="width:50%;">
    <fieldset border="2px solid #DF3F3F"  >
    <div align-text="center"><br>
            <label for="text" >Login:</label>&nbsp &nbsp &nbsp &nbsp 
            <input type="text" name="login"><br><br>
    </div>
    <div align-text="center">
            <label for="text"  >Password:</label>&nbsp&nbsp 
            <input type="text" name="pwd" ><br><br>
    </div>
            <input type="submit" value="connecter" name="submit1"><br>
    </fieldset>
</form>
<br>
<br>
<br>

</body>
</html>
