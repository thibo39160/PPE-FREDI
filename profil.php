<?php
session_start();
$_SESSION['valide'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>sans titre 1</title>
</head>

<body>
    
    <?php
    include("class_Frais.php");
    
	    
            $objet = new class_Frais();
            
    ?>
    <?php
    if($_SESSION['valide']==false)
    {
    ?>
<form action="profil.php" method="post">
<select name="utilisateur">               
		<?php
                $retourUtilisateur = $objet->GetUtlisateur();
                echo $retourUtilisateur;
                $_SESSION['valide'] = true;
		?>
</select>
<input name="send" type="submit" value="Valider votre choix">
</form>
<?php
 }
 else
 {
?>
<p>
</p>
    
<?php if(isset($_POST['send']))
{
?>
<form action="" method="post">
<select name="numeroFiche">
                
		<?php

                  $retourFiche = $objet->getNumeroFicheDeFrais();
                  echo $retourFiche;
		?>
</select>
</form>
<?php
}
}
?>
</body>

</html>
