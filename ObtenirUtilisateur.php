

<?php
session_start();


/**
 * Code qui sera appelé par un objet XHR et qui
 * retournera la liste déroulante des numero de fiche de frais
 * correspondant à l'a région'utilisateur sélectionnée.
 */
/* Paramètres de connexion */
include ("class_connexionBDD.php");
$coBDD = new connexion();


/* On récupère l'identifiant de la région choisie. */
$idr = isset($_GET['idr']) ? $_GET['idr'] : false;
/* Si on a une région, on procède à la requête */
if(false !== $idr)
{
    /* Cération de la requête pour avoir les départements de cette région */
    $sql2 = "select Numero_fiche from lignes_frais inner join demandeurs on lignes_frais.`adresse-mail` = demandeurs.`adresse-mail` where demandeurs.nom = '$idr' and valide = 0";
    $connexion = $coBDD->connexionBDD();
    $rech_dept = mysql_query($sql2);
    /* Un petit compteur pour les départements */
    $nd = 0;
    /* On crée deux tableaux pour les numéros et les noms des départements */
    $code_dept = array();
    
    /* On va mettre les numéros et noms des départements dans les deux tableaux */
    while(false != ($ligne_dept = mysql_fetch_assoc($rech_dept)))
    {
        $code_dept[] = $ligne_dept['Numero_fiche'];
        $nd++;
    }
    /* Maintenant on peut construire la liste déroulante */
    $liste = "";
    $liste .= '<select name="departement" id="departement">'."\n";
    
    for($d = 0; $d < $nd; $d++)
    {
        $liste .= '  <option value="'. $code_dept[$d] .'">'. $code_dept[$d] .'</option>'."\n";      
    }
    if($nd==0)
    {
      $liste.= '<option value="'. $_SESSION['fiche'] .'">'. $_SESSION['fiche'] .'</option>';  
    }   
    $liste .= '</select>'."\n";
    /* Un petit coup de balai */
    mysql_free_result($rech_dept);
    /* Affichage de la liste déroulante */
    echo($liste);
}
/* Sinon on retourne un message d'erreur */
else
{
    echo("<p>Une erreur s'est produite. La l'utilisateur sélectionnée comporte une donnée invalide.</p>\n");
}
?>