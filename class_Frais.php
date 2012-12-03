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

        function ajoutFichedeFrais($mail, $motif, $nbkm, $peage, $hebergement,$trajet)
        {
            $today = date("j, n, Y");
            $requete = "
                INSERT INTO `lignes_frais`
                (`adresse-mail`, `date`, `motif`, `trajet`, `km`, `cout-peage`, `cout-repas`, `cout-hebergement`, `km-valide`, `peage-valide`, `repas-valide`, `hebergement-valide`, `valide`) 
                VALUES ('".$mail."', NOW(), '".$motif."', '".$nbkm."', '".$trajet."', '".$nbkm."', '".$peage."', '".$hebergement."','0','0','0','0','0')
                ";
            $test = mysql_query($requete) or die(mysql_error());
            if ($test === true) {
                return true;
            }
            else {
                return false;
            }

        }
        function getLesFraisForfait($unUtilisateur,$unNumeroFiche)
        {
         $query ="select `date`,`motif`,`trajet`,`km`,`cout-peage` as coutpeage,`cout-repas` as coutrepas,`cout-hebergement` as couthebergement from lignes_frais inner join demandeurs on lignes_frais.`adresse-mail` = demandeurs.`adresse-mail` where demandeurs.nom='$unUtilisateur' and lignes_frais.`Numero_fiche`='$unNumeroFiche'";
         $result = mysql_query($query);         
         $renvoi2 = "";
                         while ($data2 = mysql_fetch_array($result)) 
                { 
                           
                    $renvoi2 .='<fieldset>';
                    $renvoi2 .='<legend>Elements forfaitises</legend>';
                    $renvoi2 .='<label for="motif">motif :'.$data2['motif'].'</label>';
                    $renvoi2 .='<p>';
                    $renvoi2 .='<label for="idFrais">Date fiche de Frais:'.$data2['date'].'</label>';                 
                    $renvoi2 .='<p>';
                    $renvoi2 .= '<form action="v_ConfirmationMiseJourTableComptable.php?id=1" method="post" id="lol">';
		    $renvoi2 .='<label for="idFrais"> km :</label>';
		    $renvoi2 .='<input type="text" name="km" size="10" maxlength="5" value="'.$data2['km'].'" >';
                    $renvoi2 .='<input type="submit" value="Corriger" />';
		    $renvoi2 .='</form>';
		    $renvoi2 .='</p>'; 
                    $renvoi2 .='<p>';
                    $renvoi2 .= '<form action="v_ConfirmationMiseJourTableComptable.php?id=2" method="post" id="lol">';
		    $renvoi2 .='<label for="idFrais"> cout-peage :</label>';
		    $renvoi2 .='<input type="text" name="coutPeage" size="10" maxlength="5" value="'.$data2['coutpeage'].'" >';
                    $renvoi2 .='<input type="submit" value="Corriger" />';
		    $renvoi2 .='</form>';
		    $renvoi2 .='</p>';
                    $renvoi2 .='<p>';
                    $renvoi2 .= '<form action="v_ConfirmationMiseJourTableComptable.php?id=3" method="post" id="lol">';
		    $renvoi2 .='<label for="idFrais"> cout-repas :</label>';
		    $renvoi2 .='<input type="text" name="coutRepas" size="10" maxlength="5" value="'.$data2['coutrepas'].'" >';
                    $renvoi2 .='<input type="submit" value="Corriger" />';
		    $renvoi2 .='</form>';
		    $renvoi2 .='</p>';
                    $renvoi2 .='<p>';
                    $renvoi2 .= '<form action="v_ConfirmationMiseJourTableComptable.php?id=4" method="post" id="lol">';
		    $renvoi2 .='<label for="idFrais"> cout-hebergement :</label>';
		    $renvoi2 .='<input type="text" name="coutHebergement" size="10" maxlength="5" value="'.$data2['couthebergement'].'">';
                    $renvoi2 .='<input type="submit" value="Corriger" />';
		    $renvoi2 .='</form>';
                    $renvoi2 .='</p>';
                    $renvoi2 .='<p>';
                    $renvoi2 .='<p>';
                    $renvoi2 .= '<form action="ValidationFicheDeFraisParComptable.php" method="post" id="lol">';
                    $renvoi2 .='<input type="submit" value="Validation Fiche de Frais" />';
                    $renvoi2 .='</fieldset>';
                }
                return $renvoi2;
        }
       
        function MiseAJourFraisForfait($unFrais,$unid,$unUtilisateur,$unNumero)
        {
            $host = "localhost";
            $user = "root";
            $bdd = "fredi";
            $passwd  = "";

                    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
                        mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
            if($unid == '1')
            {
                $query ="UPDATE lignes_frais,demandeurs set `km`= '$unFrais' where lignes_frais.`adresse-mail` = demandeurs.`adresse-mail` and demandeurs.nom ='$unUtilisateur' and lignes_frais.`Numero_fiche`='$unNumero'";
                $result = mysql_query($query);
            }
            if($unid == '2')
            {
                $query ="UPDATE lignes_frais,demandeurs set `cout-peage`= '$unFrais' where lignes_frais.`adresse-mail` = demandeurs.`adresse-mail` and demandeurs.nom ='$unUtilisateur' and lignes_frais.`Numero_fiche`='$unNumero'";
                $result = mysql_query($query);
            }
            if($unid == '3')
            {
                $query ="UPDATE lignes_frais,demandeurs set `cout-repas`= '$unFrais' where lignes_frais.`adresse-mail` = demandeurs.`adresse-mail` and demandeurs.nom ='$unUtilisateur' and lignes_frais.`Numero_fiche`='$unNumero'";
                $result = mysql_query($query);
            }
            if($unid == '4')
            {
                $query ="UPDATE lignes_frais,demandeurs set `cout-hebergement`= '$unFrais' where lignes_frais.`adresse-mail` = demandeurs.`adresse-mail` and demandeurs.nom ='$unUtilisateur' and lignes_frais.`Numero_fiche`='$unNumero'";
                $result = mysql_query($query);
            }          
        }
        
        function  ValidationFicheDeFrais($unUtilisateur,$unNumero)
        {
            $host = "localhost";
            $user = "root";
            $bdd = "fredi";
            $passwd  = "";

                    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
                        mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
            $query ="UPDATE lignes_frais,demandeurs set `valide`= '1' where lignes_frais.`adresse-mail` = demandeurs.`adresse-mail` and demandeurs.nom ='$unUtilisateur' and lignes_frais.`Numero_fiche`='$unNumero'";
            $result = mysql_query($query);
        }
        function  GetNombreKilometre()
        {
            $host = "localhost";
            $user = "root";
            $bdd = "fredi";
            $passwd  = "";

                    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
                        mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
            $query ="select sum(km)as km from lignes_frais where valide ='1'";
            $result = mysql_query($query);
            $renvoi2 = "";
                         while ($data2 = mysql_fetch_array($result)) 
                { 
                    $renvoi2 .= 'Kilometre Total des Bordereaux: '.$data2['km'].'';
                }
                return $renvoi2;
        }
        function  GetNombreCoutPeage()
        {
            $host = "localhost";
            $user = "root";
            $bdd = "fredi";
            $passwd  = "";

                    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
                        mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
            $query ="select sum(`cout-peage`)as coutpeage from lignes_frais where valide ='1'";
            $result = mysql_query($query);
            $renvoi2 = "";
                         while ($data2 = mysql_fetch_array($result)) 
                { 
                    $renvoi2 .= 'cout-peage Total des Bordereaux: '.$data2['coutpeage'].'';
                }
                return $renvoi2;
        }
        function  GetNombreCoutRepas()
        {
            $host = "localhost";
            $user = "root";
            $bdd = "fredi";
            $passwd  = "";

                    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
                        mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
            $query ="select sum(`cout-repas`) as coutrepas from lignes_frais where valide ='1'";
            $result = mysql_query($query);
            $renvoi2 = "";
                         while ($data2 = mysql_fetch_array($result)) 
                { 
                    $renvoi2 .= 'cout-repas Total des Bordereaux: '.$data2['coutrepas'].'';
                }
                return $renvoi2;
        }
        function  GetNombreCoutHebergement()
        {
            $host = "localhost";
            $user = "root";
            $bdd = "fredi";
            $passwd  = "";

                    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
                        mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
            $query ="select sum(`cout-hebergement`)as couthebergement from lignes_frais where valide ='1'";
            $result = mysql_query($query);
            $renvoi2 = "";
                         while ($data3 = mysql_fetch_array($result)) 
                { 
                    $renvoi2 .= 'cout-hebergement Total des Bordereaux: '.$data3['couthebergement'].'';
                }
                return $renvoi2;
        }
    }


?>
