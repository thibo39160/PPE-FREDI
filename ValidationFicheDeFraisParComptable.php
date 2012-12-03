<?php
session_start();
include ("class_Frais.php");
$pdo = new class_Frais();
?>

<form method="POST"  action="ficheFrais.php?action=Choix"> 
<?php
         $pdo->ValidationFicheDeFrais($_SESSION['utilisateur'],$_SESSION['numero']);
         echo'La Validation de cette Fiche a ete effectue avec succes';
?>
        <input id="lol" type="submit" value="retour" size="20" />  
</form>
