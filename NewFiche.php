<!--
To change this template, choose Tools | Templates
and open the template in the editor.
--><?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>        
        <script>
            function annulation()
            {
                document.forms['form1'].reset();
            }
            
            function validation()
            {
                if (document.getElementById('mail').value == '') {
                    alert('Adresse E-mail vide !');
                }
                if (document.getElementById('Fiche_Motif').value == '') {
                    alert('Aucun Motif renseigné !');
                }
                if (document.getElementById('Fiche_Km').value == '') {
                    alert('Aucun Km renseigné !');
                }
                if (document.getElementById('Fiche_Cout-peage').value == '') {
                    alert('Aucun Cout-peage renseigné !');
                }
                if (document.getElementById('Fiche_Cout-hebergement').value == '') {
                    alert('Aucun Cout-hebergement renseigné !');
                }
                else
                    {
                        windows.location = 'traitementFiche.php';
                    }
            }
            
        </script>
    </head>
    <body style="background-color: yellow;">
        <?php 
        
        
        
        include 'navigation.php'; 
        echo'<br><br><br><br><br><h1 style="background-color:red;">Fiche de frais </h1>
            <form method="POST" id="form1" action="traitementFiche.php">            
                <div id="Fiche_Contain>
                    <div id ="Fiche_Contain_Menu" style="background-color:green;">  
                        <div id="Fiche_Information">
                            Saisie du nouvelle fiche de frais, pensez à bien remplir tout les champs
                        </div>
                        <br>Adresse E-mail :<br>
                        <input type="text" class="text" id="mail"/><br>
                        Motif :<br>
                        <input type="text" id="Fiche_Motif"/><br>
                        Trajet effectué  : [VilleDépart-VilleArrivé]<br>
                        <input type="text" id="Fiche_trajet" /><br>
                        Nombre de kilométres :<br>
                        <input type="text" id="Fiche_Km" /><br>
                        Cout du péage :<br>
                        <input type="text" id="Fiche_Cout-peage" /><br>
                        Cout hébergement : <br>
                        <input type="text"  id="Fiche_Cout-hebergement"><br>
                        <br>
                        <input type="submit" id="Fiche_validation" onclick="validation()" class="btn" value="Valider"/>
                        <input type="button" id="Fiche_annulation" onclick="annulation()" class="btn" value="Annuler"/>
                    </div>
            </div>
            

             </form> ';
        
        ?>
        
    </body>
</html>
