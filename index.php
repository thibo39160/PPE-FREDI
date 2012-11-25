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
            ?><div id="GlobalConnexion">
                    <form method="POST" action="traitementconnexion.php"> 
                        
                        <div id="login">E-Mail:</div>
                        <input type="text" name="login" id="login" />
       
                        <div id="password"><br>Mot de passe:</div>
                        <input type="text" name="password" id="password" />
                        <br><br>
                        <input type="submit" name="submit" id="submit" value="Connexion">
                        <a href="inscription.php">Pas encore inscrit ?</a>
                        <div id="deconnexion_link"><a href="deconnexion.php">DESTRUCT</a></div> 
                     </form>   
                </div>
            <?PHP
            
        }
    ?>
        
</body>

</html>
