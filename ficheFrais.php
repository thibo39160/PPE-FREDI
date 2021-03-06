<?php
session_start();
include ("navigation.php");
$_SESSION['fiche'] = 'pas de fiche';  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" xml:lang="fr" />
        <LINK rel="stylesheet" type="text/css" href="general.css">
        <LINK rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/navigation.css">

<title>Gestion Fiche de Frais</title>
<script type="text/javascript" src="./dept_xhr.js" charset="iso_8859-1"></script>
<script>
function Verification()
{
    if(document.getElementById('departement').value =="pas de fiche")
        {
            alert("pas de fiche pour cet utilisateur");   
            document.getElementById("chgdept").action = "ficheFrais.php?action=Choix";
            return false;
        }
        else
        {
            document.getElementById("chgdept").action = "ficheFrais.php?action=Affichage";
            return true;
        }
}
</script>
<?php

include ("class_connexionBDD.php");
include ("class_Frais.php");
include ("navigation.php");
$action = $_GET['action'];
$coBDD = new connexion();
$pdo = new class_Frais();
$connexion = $coBDD->connexionBDD();

switch ($action)
{
    
    case  "Choix":
    {
        if($connexion != false)
        {
            $sql = "select nom,prenom from demandeurs";
            $recherche = mysql_query($sql);
            /* Création du tableau PHP des valeurs récupérées */
            $regions = array();
            /* Index du département par tableau régional */
            $id = 0;
            while($ligne = mysql_fetch_assoc($recherche))
            {
                $regions[$ligne['nom']] = $ligne['nom'];
            }   
        ?>
</head>
<br><br><br><br><br><br><br>
        <form action="" method="post" id="chgdept" onSubmit="Verification()">
          <fieldset style="border: 3px double whitesmoke; text-align:center" >
          <legend>Utilisateur</legend>
            <select name="region" id="region" onchange="getDepartements(this.value);">
              <option value="vide">- - - Choisissez un utilisateur - - -</option>
            <?php
            /* Construction de la première liste : on se sert du tableau PHP */
            foreach($regions as $nr => $nom)
            {
                ?>
            <option value="<?php echo($nr); ?>"><?php echo($nom); ?></option>
            <?php
            }
            ?>
            </select>
          <span id="blocDepartements"></span><br />
          
          <input type="submit" name="ok" id="ok" value="Envoyer"/>
          </fieldset>
        </form>
        <?php
        }
        break;
    }
    
    case  "Affichage":
    {
        $utilisateur = $_POST['region'];
        $numero =$_POST['departement'];
        if($numero!="")
        {

            $sql = "select nom,prenom from demandeurs";
                 $recherche = mysql_query($sql);
                 /* Création du tableau PHP des valeurs récupérées */
                 $regions = array();
                 /* Index du département par tableau régional */
                 $id = 0;
                 while($ligne = mysql_fetch_assoc($recherche))
                 {
                     $regions[$ligne['nom']] = $ligne['nom'];
                 }   
             ?>
             <form action="ficheFrais.php?action=AffichageFicheFrais" method="post" id="chgdept" >
               <fieldset style="border: 3px double whitesmoke; text-align:center">
               <legend>Utilisateur</legend>
                 <select name="region" id="region" onchange="getDepartements(this.value);">
                 <?php
                 /* Construction de la première liste : on se sert du tableau PHP */
                 foreach($regions as $nr => $nom)
                 {
                     ?>
                 <option value="<?php echo($nr); ?>"><?php echo($nom); ?></option>
                 <?php
                 }
                 ?>
                 </select>
               <span id="blocDepartements"></span><br />

               <input type="submit" name="ok" id="ok" value="Envoyer" onClick="Verification()" />
               </fieldset>
             </form>
             <script>
              document.getElementById('region').value = "<?php echo $utilisateur; ?>";
              getDepartements("<?php echo $utilisateur; ?>");
             </script>
             <?php $_SESSION['numero'] = $_POST['departement'];?>
             <?php $_SESSION['utilisateur'] = $_POST['region'];?>
             <?php
             $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['utilisateur'],$_SESSION['numero']);
             echo $lesFraisForfait; 
        }
       break;
     }
     
      case  "AffichageMiseAJour":
    {
         $utilisateur = $_SESSION['utilisateur'];
        $numero = $_SESSION['numero'];
        if($numero!="")
        {

            $sql = "select nom,prenom from demandeurs";
                 $recherche = mysql_query($sql);
                 /* Création du tableau PHP des valeurs récupérées */
                 $regions = array();
                 /* Index du département par tableau régional */
                 $id = 0;
                 while($ligne = mysql_fetch_assoc($recherche))
                 {
                     $regions[$ligne['nom']] = $ligne['nom'];
                 }   
             ?>
             <form action="ficheFrais.php?action=AffichageFicheFrais" method="post" id="chgdept" >
               <fieldset style="border: 3px double whitesmoke; text-align:center">
               <legend>Utilisateur</legend>
                 <select name="region" id="region" onchange="getDepartements(this.value);">
                 <?php
                 /* Construction de la première liste : on se sert du tableau PHP */
                 foreach($regions as $nr => $nom)
                 {
                     ?>
                 <option value="<?php echo($nr); ?>"><?php echo($nom); ?></option>
                 <?php
                 }
                 ?>
                 </select>
               <span id="blocDepartements"></span><br />

               <input type="submit" name="ok" id="ok" value="Envoyer" onClick="Verification()" />
               </fieldset>
             </form>
             <script>
              document.getElementById('region').value = "<?php echo $utilisateur; ?>";
              getDepartements("<?php echo $utilisateur; ?>");
             </script>
             <?php
             $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['utilisateur'],$_SESSION['numero']);
             echo $lesFraisForfait; 
        }
       break; 
    }
      
}

?>
</body>
</html>