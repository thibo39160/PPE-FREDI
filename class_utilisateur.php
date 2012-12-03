<?php
session_start();
class utilisateur {
 
    private $nom;
    private $prenom;
    private $sexe;
    private $mdp ;
    private $courriel;
    private $rue;
    private $cp;
    private $ville;
    private $numrecu;
    
    
     public function init($nom1,$prenom,$sexe,$mdp,$courriel1,$rue,$cp,$ville,$numrecu)
     {
         $this->nom = $nom1;
         $this->prenom = $prenom;
         $this->sexe = $sexe;
         $this->mdp = $mdp;
         $this->courriel = $courriel1;
         $this->rue = $rue;
         $this->cp = $cp;
         $this->ville = $ville;
         $this->numrecu = $numrecu;
     }
     
     
        
    function Connexion($login, $mdp)//renvoie true au false pour la varriable de session : 
    {     
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        
        $requete = "select * from demandeurs where demandeurs.`adresse-mail` = '$login' and demandeurs.`mdp` = '$mdp'"; //ECRITURE REQUETE
        $resultat = mysql_query($requete); //EXECUTION REQUETE 
        
        
            if (mysql_num_rows($resultat) == 1) //TEST LE NOMBRE DE LIGNE RECUPEREES
            {
                 $bool = true;
                 
                 $type = mysql_fetch_array($resultat);
                 $_SESSION['type']=$type['type'];
                
            }
            else {$bool = false;}  
       
        
        return $bool; //RENVOIR UN BOOL POUR LA VARIABLE DE SESSION ['PASS']
    }
    
    
    //---------------FUNCTION MIKA------------------------
    function checkUsersInBdd($connexion)
    {
            $reqVerif = "select count(*) from demandeur where `adresse-mail` = ?";
            
            $qidVerif = $connexion->prepare($reqVerif);
            
            $qidVerif->bindParam(1, $this->courriel, PDO::PARAM_STR,20);
            
            $sqlresult = $qidVerif->rowCount();
            
            $qidVerif->closeCursor();
            $connexion=NULL;
            
            return $sqlresult;
            
    }
    
    function Inscription($conn,$NomAdmin,$PrenomAdmin,$MailAdmin)
    {

                    $req = "INSERT into demandeurs (`adresse-mail`,nom,prenom,rue,cp,ville,`num-recu`,mdp,sexe) VALUES (?,?,?,?,?,?,?,?,?)";
                    //$req = "select * from demandeurs";
                    
                    $qid =  $conn->prepare($req);

                    
                    $qid->bindParam(1, $c, PDO::PARAM_STR,50);
                    $qid->bindParam(2, $this->nom, PDO::PARAM_STR,20);
                    $qid->bindParam(3, $this->prenom, PDO::PARAM_STR,20);
                    $qid->bindParam(4, $this->rue, PDO::PARAM_STR,20);
                    $qid->bindParam(5, $this->cp, PDO::PARAM_STR,20);
                    $qid->bindParam(6, $this->ville, PDO::PARAM_STR,20);
                    $qid->bindParam(7, $this->numrecu, PDO::PARAM_INT,20);
                    $qid->bindParam(8, $this->mdp, PDO::PARAM_STR,20);
                    $qid->bindParam(9, $this->sexe, PDO::PARAM_STR,20);

                    $qid->execute();


                    ini_set("SMTP","smtp.orange.fr") OR ini_set("SMTP","smtp.free.fr") OR ini_set("SMTP","smtp.bouygtel.fr");



                    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $this->courriel)) // On filtre les serveurs qui rencontrent des bogues.
                    {
                            $passage_ligne = "\r\n";
                    }
                    else
                    {
                            $passage_ligne = "\n";
                    }

                    //=====Déclaration des messages au format texte et au format HTML.
                    $message_txt = "Vous avez été inscrit avec succès voici un récapitulatif de vos coordonnées :\n
                                            - Adresse Mail : $this->courriel\n
                                            - Nom : $this->nom\n
                                            - Pr&eacutenom : $this->prenom\n
                                            - Sexe : $this->sexe\n
                                            - Mot de Passe : $this->mdp\n
                                            - Rue : $this->rue\n
                                            - Code Postal : $this->cp\n
                                            - Ville : $this->ville";
                    $message_html = "<html><head></head><body><b>Vous avez été inscrit avec succès voici un récapitulatif de vos coordonnées :</b>,<br> 
                                            - Adresse Mail : $this->courriel\n<br>
                                            - Nom : $this->nom\n<br>
                                            - Pr&eacutenom : $this->prenom\n<br>
                                            - Sexe : $this->sexe\n<br>
                                            - Mot de Passe : $this->mdp\n<br>
                                            - Rue : $this->rue\n<br>
                                            - Code Postal : $this->cp\n<br>
                                            - Ville : $this->ville
                                            .</body></html>";
                    //==========

                    //=====Création de la boundary
                    $boundary = "-----=".md5(rand());
                    //==========

                    //=====Définition du sujet.
                    $sujet = "Mail Activation";
                    //=========

                    //=====Création du header de l'e-mail.
                    $header = "From: \"$this->nom $this->prenom\"<$this->courriel>".$passage_ligne;
                    $header.= "Reply-to: \"$NomAdmin $PrenomAdmin\" <$MailAdmin>".$passage_ligne;
                    $header.= "MIME-Version: 1.0".$passage_ligne;
                    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
                    //==========

                    //=====Création du message.
                    $message = $passage_ligne."--".$boundary.$passage_ligne;
                    //=====Ajout du message au format texte.
                    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
                    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                    $message.= $passage_ligne.$message_txt.$passage_ligne;
                    //==========
                    $message.= $passage_ligne."--".$boundary.$passage_ligne;
                    //=====Ajout du message au format HTML
                    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
                    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                    $message.= $passage_ligne.$message_html.$passage_ligne;
                    //==========
                    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                    //==========

                    //=====Envoi de l'e-mail. 
                    mail($this->courriel,$sujet,utf8_decode(utf8_encode($message)),$header);
                    //==========

                    echo 'Vous avez &eacutet&eacute inscrit avec succ&egraves ! Vous aller revevoir un mail d\'activation, veuillez consulter votre bo&icircte mail pour l\'activation de votre de compte';
                    
                    $qid->closeCursor();
                    $connexion=NULL;
    }
}

?>
