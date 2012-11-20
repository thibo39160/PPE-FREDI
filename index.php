<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Index.php</title>
<link rel="stylesheet" type="text/css" href="general.css" />
</head>

<body>
    
    <?PHP session_start();
        if(isset($_SESSION['Pass']))
        {
            if($_SESSION['Pass']==true)
            {
                echo "test pass ok"; //pour l'instant aucune différence entre demandeurs et adherents
                
                
            }
        }
        else
        {
            echo '<div id="GlobalConnexion">
                    <form method="POST" action="traitementconnexion.php"> 
                        <br><br><br><br>
                        <div id="textLogin">Login:</div>
                        <input type="text" name="login" id="login" />
                        <div id="textPassword"><br>Password:</div>
                        <input type="password" name="password" id="password" />
                        <br><br><input type="submit">
                        <br><br><br><br>
                        Mot de passe oublié ?<span <span style="margin-left:110px;">
                        <a href="inscription.php">Pas encore inscrit ?</a></span>
                    </form>   
                </div>';
        }session_destroy();//pour le teste
            ?>
        
</body>

</html>
