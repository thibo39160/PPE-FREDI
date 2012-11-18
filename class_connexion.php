<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_connexion
 *
 * @author thibaud
 */
class class_connexion {
 
    	private static $_serveur='mysql:host=localhost';
      	private static $_bdd='dbname=fredi';   		
      	private static $_user='root' ;    		
      	private static $_mdp='' ;
        private static $liaison=null ;
        
        function __construct() { }
        function connexionBDD()
        {
           $this->liaison = mysql_connect($this->_serveur, $this->_user, $this->_mdp);
            mysql_select_db($this->_bdd);
        }
        function deconnexionBDD()
        {
            
        }

    
    
    
    
    
}

?>
