<html>
<head>
<title>Inscription</title>
<script type="text/javascript">
<!--
function verif_formulaire()
{
    var Age = document.formulaire.age.value;
    var Nom = document.formulaire.nom.value;
    var MDP = document.formulaire.mot_de_passe.value;
    var Courriel = document.formulaire.courriel.value;
    
 if(Nom == "")  {
   alert("Veuillez entrer votre nom!");
   Nom.focus();
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
 if(Age == "" && isNaN(Age)) {
   alert("L'age doit être un nombre!");
   Age.focus();
   return false;
  }
 var chkZ = 1;
 for(i=0;i<Age.value.length;++i)
   if(Age.value.charAt(i) < "1"
   || Age.value.charAt(i) > "99")
     	 chkZ = -1;
 if(chkZ == -1) {
   alert("votre age n'est pas correcte veuillez mettre un nombre !!!");
       Age.focus();
   return false;
  }
}
//-->
</script>
</head>
<body bgcolor="#EEEEEE" text="#000000">

<h1>Inscription</h1>
<p>Les champs avec * sont obligatoires</p>
<form name="formulaire" action="valideInscription" method="post" onSubmit="return verif_formulaire()">
<pre>
*Nom:     <input type="text" size="40" name="nom">
*Mot de Passe:  <input type="text" size="40" name="mot_de_passe"> <form>
*Courriel:   <input type="text" size="40" name="courriel">
*Âge:    <input type="text" size="40" name="age">
formulaire: <input type="submit" value="Envoyer"><input type="reset" value="Tout enlever">

Pour envoyer vous devez être connecté à Internet!
</pre>
</form>

</body>
</html>