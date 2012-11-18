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
class class_utilisateur {

     private  $_login;       //nom d'utilisateur = adresse e-mail
     private  $_password;    //mot de passe utilisateur
     private  $_numlicence;
     private  $_numligue;
     private  $_datenaissance;
     private  $_sexe;
     private  $_notification;
     private  $_nbnotification;
    
    //____Constructeur______________________________________________________________________________________________________________________________________________________________________________   
    
     public function __contruct($login, $password, $numlicence = null, $numligue = null, $datenaissance = null, $sexe = null, $notification = null, $nbnotification = null)
     {
         if($numlicence == null)//object avec login et mdp donc Object dans la BDD
         {
            /* $req = "Select * from adherents where login ='".$login."'and mdp='".$password."'";
             $res = mysql_query($req);
             $resultat = mysql_fetch_array($res);
             $this->_login = $resultat[""]*/
         }
         else
         {
            $this->_login = $login;       
            $this->_password = $password;    
            $this->_numlicence = $numlicence;
            $this->_numligue = $numligue;
            $this->_datenaissance = $datenaissance;
            $this->_sexe = $sexe;
            $this->_notification = $notification;
            $this->_nbnotification = $nbnotification;
            
            $requete = "";
         }
     }
     
     //____Getter & Setter______________________________________________________________________________________________________________________________________________________________________________
        
     
        //Setter pour uniquement la modification du profil : Login, mdp, numligue (on pars du princi^pe que la date de naissance change pas ...)
        public function get_login() { return $this->_login; }
        public function set_login($value) { $this->_login = $value; }
        
        public function get_password() { return $this->_password; }
        public function set_password($value) { $this->_password = $value; }
        
        public function get_numligue() { return $this->_numligue; }
        public function set_numligue($value) { $this->_numligue = $value; }
        
        public function get_numlicence() { return $this->_numlicence; }
        public function get_datenaissance() { return $this->_datenaissance; }
        public function get_sexe() { return $this->_sexe; }
        public function get_notification() { return $this->_notification; }
        public function get_nbnotification() { return $this->nbnotification; }   
        
        
     //____Function______________________________________________________________________________________________________________________________________________________________________________
        
    function Connexion($obj_user)//renvoie true au false pour la varriable de session
    {
       
    }
    
    function Inscription()
    {
        
    }
    
    function Connexion_Utilisateur()
    {

    }
    
    
    
}

?>
