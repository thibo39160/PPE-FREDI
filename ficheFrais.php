<?php
session_start();
$_SESSION['fiche'] = 'pas de fiche';  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" xml:lang="fr" />
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
$action = $_GET['action'];
$coBDD = new connexion();
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

        <form action="" method="post" id="chgdept" onSubmit="Verification()">
          <fieldset style="border: 3px double #333399">
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
        <form action="" method="post" id="chgdept" >
          <fieldset style="border: 3px double #333399">
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
    <?php echo $_POST['departement'];?>
        <?php
       }           
     }
       break;
}

?>
</body>
</html>