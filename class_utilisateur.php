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

     private $_login;       //nom d'utilisateur = adresse e-mail
     private $_password;    //mot de passe utilisateur
     private $_numlicence;
     private $_numligue;
     private $_datenaissance;
     private $_sexe;
     private $_notification;
     private $_nbnotification;
    
    
     public function __contruct($login, $password, $numlicence = null, $datenaissance = null, $sexe = null, $notification = null, $nbnotification = null)
     {
         if($numlicence == null)
         {
             //constructeur $login + mdp
         }
         else
         {
            $_login = $login;       
            $_password = $password;    
            $_numlicence = $numlicence;
            $_numligue = $numligue;
            $_datenaissance = $datenaissance;
            $_sexe = $sexe;
            $_notification = $notification;
            $_nbnotification = $nbnotification;
            
            $requete = "";
         }
     }
     
    function newuser()
    {
        
    }
     
    function Krieg_Connexion()
    {

    }
    
    function Krieg_Inscription()
    {

    }
    
    function Krieg_Connexion_Utilisateur()
    {

    }
    
    
    
}

?>
