<?php
if(isset($_POST["submit1"]))
 {
    $pwd=$_POST['pwd'];
    $pwd = trim($pwd);
    $pwd = stripslashes($pwd);
    $pwd = htmlspecialchars($pwd);
   
    function pwd_valide($pwd)
    {
        if(strlen ($pwd)<8)
        {
            return false ;
        }
    else if (!preg_match('/[0-9]/',$pwd) ||!preg_match('/[A-Z]/',$pwd) || !preg_match('/[a-z]/',$pwd) || !preg_match('/[*&%$#@!?]/',$pwd))
        {
            return false ;
        }
        else 
        return true;

    }
    
    if (pwd_valide($pwd) != true)
    {
        echo "Format du mot de passe non valide!<br>";	
    }
    else 
    {
        echo "Format du mot de passe valide<br>"; 
    }

    
   $email =$_POST['login'] ;
     function email_valide($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    } 
    else 
        return false;

}  
  if (email_valide($email) != true)
{
	echo "Format email  non valide!<br>";	
}
else 
	echo "Format email valide <br>"; 



 if((email_valide($email) == true) && (pwd_valide($pwd) == true))
 {        
     $i=0;
    $fichier = fopen("login.txt", "r") or die("Impossible d'ouvrir le fichier courant!");
   
    while(!feof($fichier)){
        
        $ligne= fgets($fichier);
        $tab= explode('|', $ligne);
        
          if(in_array($email, $tab)==1)
          {     
               $i=1;
                    $tab[1]= trim($tab[1]);
                    $tab[1] = stripslashes($tab[1]);
                    $tab[1] = htmlspecialchars($tab[1]);
             
                if((strcmp($email, $tab[0]) == 0) && (strcmp($pwd, $tab[1]) == 0))
                {
                 echo'Authentification réussie';
                }
              else
              {
                  echo'Mot de passe invalide';
              }
          }
         
        }
     if($i==0)
     {
          echo'Login inexistant';
     }
      
        fclose($fichier);
      
    
}
}
?>
