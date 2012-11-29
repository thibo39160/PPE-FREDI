<!--
To change this template, choose Tools | Templates
and open the template in the editor.
--><?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php 
        require_once ("class_Frais.php");
        $objFrais = new class_Frais();
        
        function ajout()
        {
            $objFrais->ajoutFichedeFrais();
                   
        } ?>
    </head>
    <body>
        <?php 
        
        
        
        include 'navigation.php'; 
        echo'
            <form method="POST" action=""> 
            
            <div id="Fiche_Contain>
                <div id ="Fiche_Contain_Menu">  
                    <div id="Fiche_Information">
                        Saisie du nouvelle fiche de frais, pensez à bien remplir tout les champs
                    </div>
                    <div id="Fiche_adresse-mail"></div>                 
                    <div id="Fiche_Motif"></div>
                    <div id="Fiche_Km"></div>
                    <div id="Fiche_Cout-peage"></div>
                    <div id="Fiche_Cout-hebergement></div>
                    <input type="submit" id="Fiche_validation" class="btn" />
                    <div id="Fiche_annulation"></div>
                </div>
            </div>
            

             </form> ';
        
        ?>
        
    </body>
</html>
