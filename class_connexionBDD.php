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
        private static $_liaison=null ;
        
        function __construct() { }
        function connexionBDD()
        {
            
           $this->_liaison = mysql_connect($this->_serveur, $this->_user, $this->_mdp);
           if ($this->_liaison == false) {
              echo "<script>alert('Erreur lors de connexion');</script>"; 
           }
           else
           {
            mysql_select_db($this->_bdd);
           }
        }
        function deconnexionBDD()
        {
            $test = mysql_close($this->_liaison);
            if ($test == false) {
                echo "<script>alert('Erreur lors de la deconnexion');</script>";
            }
        }

    
    
    
    
    
}

?>
