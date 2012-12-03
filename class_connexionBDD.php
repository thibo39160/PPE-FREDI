<?php

class connexion {
 
    	private  $_liaison;

        
        function __construct() { }
        
        function connexionBDD()
        {              
           $this->_liaison = mysql_connect("localhost","root","");
           if ($this->_liaison == false) {
              echo "<script>alert('Erreur lors de connexion BDD');</script>";             
              return false;
           }
           else
           {
            mysql_select_db("fredi");
            echo "<script>alert('Choix BDD OK');</script>"; 
            return true;
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
