<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_Frais
 *
 * @author thibaud
 */
class class_Frais {
    //put your code here
        
public function __construct() 
   {
    
   }
   
public function GetUtlisateur()
{
        $host = "localhost";
	    $user = "root";
            $bdd = "fredi";
            $passwd  = "";
            
            mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
		mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
                
        $query = "select nom,prenom from demandeurs";
            //inner join lignes_frais on demandeurs.adresse-mail = lignes_frais.adresse-mail where valide=0";
        $result = mysql_query($query);
        $renvoi2 = "";
		 while ($data2 = mysql_fetch_array($result)) 
        { 
            $renvoi2 .= '<option value="">'.$data2['prenom'].' '.$data2['nom'].'</option>'; 
        }      
        return $renvoi2;
}
public function getNumeroFicheDeFrais()
{
            $host = "localhost";
	    $user = "root";
            $bdd = "fredi";
            $passwd  = "";
            
            mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
		mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
                
        $query = "select motif from lignes_frais";
            //inner join lignes_frais on demandeurs.adresse-mail = lignes_frais.adresse-mail where valide=0";
        $result = mysql_query($query);
        $renvoi2 = "";
        	 while ($data2 = mysql_fetch_array($result)) 
        { 
            $renvoi2 .= '<option value="">'.$data2['motif'].'</option>'; 
        }
        return $renvoi2;
}
}
?>
