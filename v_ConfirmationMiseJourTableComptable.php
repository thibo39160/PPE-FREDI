<?php
session_start();
include ("class_Frais.php");
$pdo = new class_Frais();
?>

<form method="POST"  action="ficheFrais.php?action=AffichageMiseAJour"> 
<?php            
         $id = $_REQUEST['id'];
         if ($id == '0')
         {
             $idFrais =$_POST['motif']; 
         }
         if ($id == '1')
         {
             $idFrais =$_POST['km']; 
         }
         if ($id == '2')
         {
             $idFrais =$_POST['coutPeage'];
         }
         if ($id == '3')
         {
             $idFrais =$_POST['coutRepas'];
         }
         if ($id == '4')
         {
             $idFrais =$_POST['coutHebergement'];
         }
         $_SESSION['utilisateurCourant'] = $_SESSION['utilisateur'];
         $_SESSION['numeroCourant'] = $_SESSION['numero'];
         $pdo->MiseAJourFraisForfait($idFrais,$id,$_SESSION['utilisateur'],$_SESSION['numero']);
         echo'La Mise a jour a bien ete prise en compte';
    ?>
        <input id="lol" type="submit" value="retour" size="20" />  
</form>