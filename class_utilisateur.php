<?php

class utilisateur {
 
    
    
     public function __contruct()
     {
        
     }
     
     
        
    function Connexion($num, $nom, $prenom)//renvoie true au false pour la varriable de session : 
    {     
  
        $requete = "select * from adherents where 'Nom' like '".$nom."' and 'Prenom' like '".$prenom."' and 'numero-license' like '".$num."'"; //ECRITURE REQUETE
        $requeteR = mysql_query($requete); //EXECUTION REQUETE  
        
            if (mysql_num_rows($requeteR) == 1) //TEST LE NOMBRE DE LIGNE RECUPEREES
            {
                 $bool = true;
            }
            else {$bool = false;}              
        return $bool; //RENVOIR UN BOOL POUR LA VARIABLE DE SESSION ['PASS']
    }
    
    function Inscription($numero, $nom, $prenom, $num_ligue, $date_Naissance, $sexe) //inscription d'un adherent
    {
        $bool = false;
        $requete = "INSERT INTO 'adherents'('numero-licence', 'Nom', 'Prenom', 'num-ligue', 'date_Naissance', 'sexe') VALUES ('".$numero."','".$nom."','".$prenom."','".$num_ligue."' ,'".$date_Naissance."','".$sexe."')";
        $requeteR = mysql_query($requete);
        if ($requeteR != false) //TEST ERREUR REQUETE INSERTION LIGNE
        {$bool = true;}
        else 
        {$bool = false;}
        return $bool;//RENVOIE UN BOOL POUR VALIDATION DE LA REQUETE
    }    
}

?>
