<html>
<head>
<title>Inscription</title>
<script type="text/javascript">
<!--
function verif_formulaire()
{
    var Nom = document.formulaire.nom.value;
    var Prenom = document.formulaire.prenom.value;
    var Sexe = document.formulaire.sexe.value;
    var MDP = document.formulaire.mot_de_passe.value;
    var Courriel = document.formulaire.courriel.value;
    var Rue = document.formulaire.rue.value;
    var CP = document.formulaire.cp.value;
    var Ville = document.formulaire.ville.value;
    
 if(Nom == "")  {
   alert("Veuillez entrer votre nom!");
   Nom.focus();
   return false;
  }
 if(Prenom == "")  {
   alert("Veuillez entrer votre pr&eacutenom!");
   Prenom.focus();
   return false;
 }
 if(Sexe == "")  {
   alert("Veuillez entrer votre sexe!");
   Sexe.focus();
   return false;
 }
 if(MDP == "") {
   alert("Veuillez entrer votre mot de passe!");
   MDP.focus();
   return false;
  }
 if(Courriel == "") {
   alert("Veuillez mettre l'@!");
   Courriel.focus();
   return false;
  }
 if(Courriel.indexOf('@') == -1) {
   alert("Veuillez mettre l'@!");
   Courriel.focus();
   return false;
  }
 if(Rue == "") {
   alert("Veuillez entrer votre adresse!");
   Rue.focus();
   return false;
  }
 if(CP == "" || isNaN(CP)) {
   alert("Le code postal doit &ecirctre un nombre!");
   CP.focus();
   return false;
  }
 var chkZ = 1;
 for(i=0;i<CP.value.length;++i)
   if(CP.value.charAt(i) < "00209"
   || CP.value.charAt(i) > "98091")
     	 chkZ = -1;
 if(chkZ == -1) {
   alert("votre code postal n'est pas correcte !");
       CP.focus();
   return false;
  }
 if(Ville == "") {
   alert("Veuillez entrer votre ville!");
   Ville.focus();
   return false;
  }  
}

//-->
</script>
</head>
<body bgcolor="#EEEEEE" text="#000000">

<h1>Inscription</h1>
<p>Les champs avec * sont obligatoires</p>
<form name="formulaire" action="valideInscription.php" method="post" onSubmit="return verif_formulaire()">
<pre>
*Nom:     <input type="text" size="40" name="nom">
*Prenom:     <input type="text" size="40" name="prenom">
*Sexe:     <input type="text" size="40" name="sexe">
*Mot de Passe:  <input type="text" size="40" name="mot_de_passe"> <form>
*Adresse-mail:   <input type="text" size="40" name="courriel">
*Rue:    <input type="text" size="40" name="rue">
*Code-Postal:    <input type="text" size="40" name="cp">
*Ville:    <input type="text" size="40" name="ville">
formulaire: <input type="submit" value="Envoyer"><input type="reset" value="Tout enlever">

Pour envoyer vous devez &ecirctre connect&eacute &agrave Internet!
</pre>
</form>

</body>
</html>