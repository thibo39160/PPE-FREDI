<?php

class utilisateur {
 
    
    
     public function __contruct()
     {
        
     }
     
     
        
    function Connexion($login, $mdp,)//renvoie true au false pour la varriable de session : 
    {     
        $requete = "select * from demandeurs where 'adresse-mail' like '".$login."' and 'mdp' like '".$mdp."'"; //ECRITURE REQUETE
        $requete = mysql_query($requete); //EXECUTION REQUETE  
        
            if (mysql_num_rows($requete) == 1) //TEST LE NOMBRE DE LIGNE RECUPEREES
            {
                 $bool = true;
            }
            else {$bool = false;}              
        return $bool; //RENVOIR UN BOOL POUR LA VARIABLE DE SESSION ['PASS']
    }
    
    function Inscription()
    {

    }    
}

?>
