<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
         include 'navigation.php'; 
         
        
        ?>
        
        <?php 
        
            $mail = $_POST['mail'];
            $motif = $_POST['Fiche_Motif'];
            $nbkm = $_POST['Fiche_Km'];
            $peage = $_POST['Fiche_Cout-peage'];
            $hebergement = $_POST['Fiche_Cout-hebergement'];
            $trajet = $_POST['Fiche_trajet'];
        
            require_once ("class_connexionBDD.php");
            $coBDD = new connexion();
            $coBDD->connexionBDD();
            
            require_once ("class_Frais.php");
            $objFrais = new class_Frais();
            
            $test = $objFrais->ajoutFichedeFrais($mail, $motif, $nbkm, $peage, $hebergement,$trajet);
            
            if ($test == true) 
            {
                echo'<div id="Fiche_valid">Votre fiche de frais à bien été prise en compte.<br>Elle sera soumise à la validation de notre agent comptable, puis vous vous verrez rembourser vos frais de déplacement</div>';
            }
            else
            {
                echo'<div id="Fiche_valid">Un ou plusieurs problèmes ont été rencontrés durant pendant le stockage de votre fiche de frais.<br>Excusez nous pour la géne occasionnée</div>';
            }
            
            $coBDD->deconnexionBDD();
            
        ?>
    </body>
</html>
