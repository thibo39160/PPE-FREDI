<?php

class connexion {
 
    	private static $_liaison;

        
        function __construct() { }
        
        function connexionBDD()
        {     
           $this->_liaison = mysql_connect("localhost","root","");
           if ($this->_liaison == false) {
              echo "<script>alert('Erreur lors de connexion BDD');</script>"; 
           }
           else
           {
            mysql_select_db("fredi");
            echo "<script>alert('Choix BDD OK');</script>"; 
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
