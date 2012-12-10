<?php

include 'class_connexionBDD.php';
include 'class_utilisateur.php'; 
?>
<html>
    
    <head>
        
        <LINK rel="stylesheet" type="text/css" href="general.css">
        <LINK rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/navigation.css">

        
        <title>Profil</title>
        
        <script type="text/javascript">
        <!--
        function verif_formulaire()
        {
            var MDP = document.formulaire.mot_de_passe.value;
            var MDP2 = document.formulaire.mot_de_passe2.value;            

         if(MDP == "") {
           alert("Veuillez entrer votre nouveau mot de passe!");   
           return false;
           MDP.focus();
          }         
         if(MDP2 == "") {
           alert("Veuillez confirmer votre nouveau mot de passe!");   
           return false;
           MDP2.focus();
          }
         if (MDP != MDP2){
           alert ("\nTon mot de passe n'est pas identique.Il faut encore essayer.")
           return false;
         }
         else {
           return true;
         }
         if (MDP == <?php $password ;?>){
           alert ("\nTon mot de passe est identique au premier.Il faut recommencer.")
           return false;
         }
         else {
           return true;
         }         

        }
        //-->
        </script>        
    </head>
    
    <body>
         <?php
       		include ("navigation.php");
   		 ?>

        <?php
        $login = "kriegwilliamsen@gmail.com";//$_SESSION["login"];
        $password = "design"; //$_SESSION["password"];

        //Appel de la fonction connexon BDD de la class connexion
        $cnx = new connexion();
        $cnx->connexonBDDinPDO();
        $connexion = $cnx->_liaison;

        $user = new utilisateur();
        $user->init2($connexion,$password,$login);
        ?>
        
        <h3>Modifier les param&egravetres du compte</h3>
                
        <form name="formulaire" action="valideModifCompte.php" method="post" OnSubmit="return verif_formulaire()">
        <div class="nom">          
            <b>Nom :</b> <?php echo $user->nom;?><br><br>        
        </div>
        <div class="prenom">     
            <b>Prenom :</b> <?php echo $user->prenom;?><br><br>
        </div>
        <div class="sexe"> 
            <b>Sexe :</b> <?php echo $user->sexe;?><br><br>  
        </div>
        <div class="courriel"> 
            <b>Confirmation de l'adresse-mail :</b> <input type="hidden" size="40" value="<?php echo $user->courriel;?>" name="courriel"><?php echo $user->courriel;?><br><br>
        </div>
        <div class="mdp"> 
            <b>Nouveau mot de Passe :</b>  <input type="password" size="40" name="mot_de_passe"><br><br><form>
        </div>
        <div class="mdp2"> 
        <b>Confirmation du mot de Passe :</b> <input type="password" size="40" name="mot_de_passe2"><br>
        <b>Vous devez confirmer le mot<br>
           de passe uniquement si vous<br>
           l'avez modifi&eacute ci-dessus.</b><br><br>        
        </div>
        <div class="rue"> 
            <b>Rue :</b>  <?php echo $user->rue;?><br><br>  
        </div>
        <div class="cp"> 
            <b>Code-Postal :</b>  <?php echo $user->cp;?><br><br>    
        </div>
        <div class="ville"> 
            <b>Ville :</b>  <?php echo $user->ville;?>  
        </div>        
            <input type="submit" value="Envoyer"><input type="reset" value="Tout enlever">

        </form>

        
    </body>
    
</html>

<?php
?>



