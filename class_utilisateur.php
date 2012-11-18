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
     private  $_numlicence;
     private  $_numligue;
     private  $_datenaissance;
     private  $_sexe;
     private  $_notification;
     private  $_nbnotification;
    
    //____Constructeur______________________________________________________________________________________________________________________________________________________________________________   
    
     public function __contruct($login, $password, $numlicence = null, $numligue = null, $datenaissance = null, $sexe = null, $notification = null, $nbnotification = null)
     {
            //temporaire pour les tests 
         
            /*$this->_login = $login;       
            $this->_password = $password;    
            $this->_numlicence = $numlicence;
            $this->_numligue = $numligue;
            $this->_datenaissance = $datenaissance;
            $this->_sexe = $sexe;
            $this->_notification = $notification;
            $this->_nbnotification = $nbnotification;*/
            
            $this->_login = "kriegwilliamsen@gmail.com";       
            $this->_password = "design";    
            $this->_numlicence = "numlicence";
            $this->_numligue = "numligue";
            $this->_datenaissance = "datenaissance";
            $this->_sexe = "sexe";
            $this->_notification = "notification";
            $this->_nbnotification = "nbnotification";


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
        
    function Connexion($log, $pass)//renvoie true au false pour la varriable de session
    {

      $req = mysql_query("select * from demandeurs where adresse-mail like '".$log."' and mdp like '".$pass."';");
      if ($req==false) {
      }
      else {
          $test=true;         
      }
      $test =true;
        return true;
    }
    
    function Inscription()
    {
        
    }

    
    
    
}

?>
