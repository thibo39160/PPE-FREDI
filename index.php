<?php
    session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" type="text/css" href="css/index.css"/>


<title>Index.php</title>
</head>
<body>
<div id="Header"></div>
<div id="GlobalConnexion2">
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
            echo'<div id="GlobalConnexion">
                    <form method="POST" action="traitementconnexion.php"> 
                        
                        <div id="login">E-Mail:</div>
                        <input type="text" name="login" id="login" />
       
                        <div id="password"><br>Mot de passe:</div>
                        <input type="text" name="password" id="password" />
                        <br><br>
                        <input type="submit" class="submit" name="submit" id="submit" value="Connexion">
                        <div id="inscription"><a href="inscription.php">Pas encore inscrit ?</a>                    
                     </div></form>   
                </div>';
            
            
        }
    ?>
</div>
<div id="Footer"></div>        
</body>

</html>
