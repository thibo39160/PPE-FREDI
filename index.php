<?php
    session_start();
    print_r($_SESSION);  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Index.php</title>
</head>

<body>
    
    <?PHP 
        
        if(isset($_SESSION['Pass']) && !empty($_SESSION['Pass']))
        {
            if($_SESSION['Pass']==true)
            {
                header('Location: home.php');  
                
                
            }
        }
        else
        {
            echo '<div id="GlobalConnexion">
                    <form method="POST" action="traitementconnexion.php"> 
                        
                        <div id="textnom">Nom:</div>
                        <input type="text" name="nom" id="nom" />
                        
                        <div id="textprenom"><br>Prenom:</div>
                        <input type="text" name="prenom" id="prenom" />
                        
                        <div id="textlicense"><br>Numero License Sportive:</div>
                        <input type="text" name="license" id="license" />
                        <br><br>
                        <input type="submit" name="submit" id="submit" value="Connexion">
                        <br><br>Pour les besoins du cours :
                        <br>Nom: NomTest  <br>Prenom: PrenomTest   <br>Numero: 4548 <br><br>
                        Mot de passe oublié ?<br>
                        <a href="inscription.php">Pas encore inscrit ?</a>
                        <br><br>
                        <div id="deconnexion_link"><a href="deconnexion.php">DESTRUCT</a></div> 


                    </form>   
                </div>';
        }
        
            ?>
        
</body>

</html>
