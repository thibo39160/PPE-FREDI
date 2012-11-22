<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_utilisateur
 *
 * @author thibaud
 */
class utilisateur {

     private  $_login;       //nom d'utilisateur = adresse e-mail
     private  $_password;    //mot de passe utilisateur
     private  $_cp;
     private  $_nom;
     private  $_prenom;
     private  $_adresse;
     private  $_sexe;
     

    
    //____Constructeur______________________________________________________________________________________________________________________________________________________________________________   
    
     public function __contruct($login=null)
     {
         if ($login != null ) 
         {
             $this->_login = $login;
             $req = "select * from demandeurs where `adresse-mail` like `".$login."`;";
             $rep = mysql_query($req);
             $resultat = mysql_fetch_array($rep);
             $this->_password = $resultat['password'];
             $this->_cp = $resultat['cp'];
             $this->_nom = $resultat['nom'];
             $this->_prenom = $resultat['prenom'];
             $this->_adresse = $resultat['adresse'];
             $this->_sexe = $resultat['sexe'];
             $this->_ville = $resultat['ville'];
         }
         else//constructeur vide
         {
         }
     }
     
     //____Getter & Setter______________________________________________________________________________________________________________________________________________________________________________
        
     
        //Setter pour uniquement la modification du profil : Login, mdp, numligue (on pars du princi^pe que la date de naissance change pas ...)
        public function get_login() { return $this->_login; }
        
        public function get_password() { return $this->_password; }
        public function set_password($value) { $this->_login = $value; }
        
        public function get_cp() { return $this->_cp; }
        public function set_cp($value) { $this->_cp = $value; }
        
        public function get_nom() { return $this->_nom; }
        
        public function get_prenom() { return $this->_prenom; }
        
        public function get_adresse() { return $this->_adresse; }  
        public function set_adresse($value) { $this->_adresse = $value; }
        
        public function get_ville() { return $this->_ville; }  
        public function set_ville($value) { $this->_ville = $value; }
        
        public function get_sexe() { return $this->_sexe; }

     //____Function______________________________________________________________________________________________________________________________________________________________________________
        
    function Connexion($log, $pass)//renvoie true au false pour la varriable de session
    {     
        $req="select * from demandeurs where `adresse-mail` like '".$log."' and `mdp` like '".$pass."'";
        $rep = mysql_query($req);
        if(mysql_num_rows($rep) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function Inscription()
    {
        //voire jerem
    }
    
    function liste_utilisateur()//pour chef tableau d'utilisateur //ps oublie de te connecter a la bdd
    {
        $req = "select `adresse-mail` from demandeurs;";
        $rep = mysql_query($req);
        $resultat = mysql_fetch_array($rep);
        return $resultat;
    }


    
    
    
}

?>
