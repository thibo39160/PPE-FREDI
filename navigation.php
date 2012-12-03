
<?php 

if ($_SESSION['type'] == 'V')
{
    echo'<div id="navigation">
            <div id="home_link"><a href="home.php">HOME</a></div>
            <div id="profil_link"><a href="profil.php">PROFIL</a></div>
            <div id="Outils_link"><a href="NewFiche.php">OUTILS</a></div>
            <div id="deconnexion_link"><a href="deconnexion.php">DECONNEXION</a></div>        
        </div>';
}
else
{  
    echo'<div id="navigation">
            <div id="home_link"><a href="home.php">HOME</a></div>
            <div id="profil_link"><a href="profil.php">PROFIL</a></div>
            <div id="Outils_link"><a href="ficheFrais.php?action=Choix">Administration des fiches</a></div>
            <div id="deconnexion_link"><a href="deconnexion.php">DECONNEXION</a></div>        
        </div>'; 
}



