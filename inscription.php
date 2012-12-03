<html>
<head>
<LINK rel="stylesheet" type="text/css" href="general.css">
<title>Inscription</title>
 <link rel="stylesheet" type="text/css" href="css/index.css"/>
        <link rel="stylesheet" type="text/css" href="css/navigation.css"/>
                <link rel="stylesheet" type="text/css" href="css/inscription.css"/>
<script type="text/javascript">
<!--
function verif_formulaire()
{
    var Nom = document.formulaire.nom.value;
    var Prenom = document.formulaire.prenom.value;
    var Sexe = document.formulaire.sexe.value;
    var MDP = document.formulaire.mot_de_passe.value;
    var MDP2 = document.formulaire.mot_de_passe.value;
    var Courriel = document.formulaire.courriel.value;
    var Rue = document.formulaire.rue.value;
    var CP = document.formulaire.cp.value;
    var Ville = document.formulaire.ville.value;
    
 if(Nom == "")  {
   alert("Veuillez entrer votre nom!");
   return false;
   Nom.focus();
  }
 if(Prenom == "")  {
   alert("Veuillez entrer votre pr&eacutenom!");   
   return false;
   Prenom.focus();
 }
 if(Sexe == "")  {
   alert("Veuillez entrer votre sexe!");
   return false;
   Sexe.focus();
 }
 if(MDP == "") {
   alert("Veuillez entrer votre mot de passe!");   
   return false;
   MDP.focus();
  }
 if(MDP2 == "") {
   alert("Veuillez confirmer votre mot de passe!");   
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
 if(Courriel == "") {
   alert("Veuillez entrer votre adresse mail!");   
   return false;
   Courriel.focus();
  }
 if(Courriel.indexOf('@') == -1) {
   alert("Veuillez mettre l'@!");   
   return false;
   Courriel.focus();
  }
 if(Rue == "") {
   alert("Veuillez entrer votre adresse!");   
   return false;
   Rue.focus();
  }
 if(CP == "" || isNaN(CP)) {
   alert("Le code postal doit &ecirctre un nombre!");   
   return false;
   CP.focus();
  }
 var chkZ = 1;
 for(i=0;i<CP.value.length;++i)
   if(CP.value.charAt(i) < "00209"
   || CP.value.charAt(i) > "98091")
     	 chkZ = -1;
 if(chkZ == -1) {
   alert("votre code postal n'est pas correcte !");       
   return false;
   CP.focus();
  }
 if(Ville == "") {
   alert("Veuillez entrer votre ville!");   
   return false;
   Ville.focus();
  }

}

//-->
</script>
</head>
<body>
<div id="title">INSCRIPTION</div>
<div id="inscription">
    <span style="font-style: italic;">Les champs avec * sont obligatoires</span>
    <form name="formulaire" action="valideInscription.php" method="post" OnSubmit="return verif_formulaire()">
    <br><br>
    <div id="nom">*Nom:<input id="input_nom"type="text" size="40" name="nom"></div>
    <div id="prenom">*Prenom:<input id="input_prenom" type="text" size="40" name="prenom"></div>
    <div id="sexe">*Sexe:<input id="input_sexe" type="text" size="40" name="sexe"></div>
    <div id="mdp">*Mot de Passe:<input id="input_mdp" type="password" size="40" name="mot_de_passe"></div>
    <div id="mail">*Adresse-mail:<input id="input_mail" type="text" size="40" name="courriel"></div>
    <div id="rue">*Rue:<input id="input_rue" type="text" size="40" name="rue"></div>
    <div id="cp">*Code-Postal:<input id="input_cp" type="text" size="40" name="cp"></div>
    <div id="ville">*Ville:<input id="input_ville" type="text" size="40" name="ville"></div>
    <input type="submit" value="Envoyer" id="inscription_id"><input type="reset" value="Annuler" id="inscription_reset">
    </form>
</div>

</body>
</html>
