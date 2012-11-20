<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>home.php</title>
<link rel="stylesheet" type="text/css" href="general.css" />
</head>

<body>

    <?php
        require_once ("class_connexionBDD.php");
        require_once ("class_utilisateur.php");
    ?>
    
  <ul>
    <li><a href="home.php"><span>Home</span></a></li>
    <li><a href="profil.php"><span>Profil</span></a></li>
    <li><a><span>Deconnexion<!--Appel function deco / objet passer en variable de sessions--></span></a></li>
  </ul>

    
        
</body>

</html>
