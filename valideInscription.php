<?php
        // informations inscription        
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $mdp = $_POST['mot_de_passe'];
        $courriel = $_POST['courriel'];
        $rue = $_POST['rue'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $numrecu = 0;

        $NomAdmin = 'Thibaut';
        $PrenomAdmin = 'Mickael';
        $MailAdmin = 'micka_thibaut@hotmail.fr';

        // informations BDD
        $bdd = 'mysql:host=localhost;dbname=fredi';        
        $login = 'root';
        $mdpbdd = '';

        try{
            $cnx = new PDO($bdd,$login,$mdpbdd);
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $reqVerif = "select count(*) from demandeur where `adresse-mail` = ?";
            
            $qidVerif = $cnx->prepare($reqVerif);
            
            $qidVerif->bindParam(1, $courriel, PDO::PARAM_STR,20);
            
            $sqlresult = $qidVerif->rowCount();
            
            if ($sqlresult =! 0 ) {
                          
                    echo 'Vous &ecirctes d&eacutej&agrave inscrit ! <br><br><br>';
            }            
                        
            else {           
            
                    $req = "INSERT into demandeurs (`adresse-mail`,nom,prenom,rue,cp,ville,`num-recu`,mdp,sexe) VALUES (?,?,?,?,?,?,?,?,?)";

                    $qid =  $cnx->prepare($req);

                    $qid->bindParam(1, $courriel, PDO::PARAM_STR,50);
                    $qid->bindParam(2, $nom, PDO::PARAM_STR,20);
                    $qid->bindParam(3, $prenom, PDO::PARAM_STR,20);
                    $qid->bindParam(4, $rue, PDO::PARAM_STR,20);
                    $qid->bindParam(5, $cp, PDO::PARAM_STR,20);
                    $qid->bindParam(6, $ville, PDO::PARAM_STR,20);
                    $qid->bindParam(7, $numrecu, PDO::PARAM_INT,20);
                    $qid->bindParam(8, $mdp, PDO::PARAM_STR,20);
                    $qid->bindParam(9, $sexe, PDO::PARAM_STR,20);

                    $qid->execute();


                    ini_set("SMTP","smtp.orange.fr") OR ini_set("SMTP","smtp.free.fr") OR ini_set("SMTP","smtp.bouygtel.fr");



                    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $courriel)) // On filtre les serveurs qui rencontrent des bogues.
                    {
                            $passage_ligne = "\r\n";
                    }
                    else
                    {
                            $passage_ligne = "\n";
                    }

                    //=====Déclaration des messages au format texte et au format HTML.
                    $message_txt = "Vous avez été inscrit avec succès voici un récapitulatif de vos coordonnées :\n
                                            - Adresse Mail : $courriel\n
                                            - Nom : $nom\n
                                            - Pr&eacutenom : $prenom\n
                                            - Sexe : $sexe\n
                                            - Mot de Passe : $mdp\n
                                            - Rue : $rue\n
                                            - Code Postal : $cp\n
                                            - Ville : $ville";
                    $message_html = "<html><head></head><body><b>Vous avez été inscrit avec succès voici un récapitulatif de vos coordonnées :</b>,<br> 
                                            - Adresse Mail : $courriel\n<br>
                                            - Nom : $nom\n<br>
                                            - Pr&eacutenom : $prenom\n<br>
                                            - Sexe : $sexe\n<br>
                                            - Mot de Passe : $mdp\n<br>
                                            - Rue : $rue\n<br>
                                            - Code Postal : $cp\n<br>
                                            - Ville : $ville
                                            .</body></html>";
                    //==========

                    //=====Création de la boundary
                    $boundary = "-----=".md5(rand());
                    //==========

                    //=====Définition du sujet.
                    $sujet = "Mail Activation";
                    //=========

                    //=====Création du header de l'e-mail.
                    $header = "From: \"$nom $prenom\"<$courriel>".$passage_ligne;
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
                    mail($courriel,$sujet,utf8_decode(utf8_encode($message)),$header);
                    //==========

                    echo 'Vous avez &eacutet&eacute inscrit avec succ&egraves ! Vous aller revevoir un mail d\'activation, veuillez consulter votre bo&icircte mail pour l\'activation de votre de compte';

                }
        
            $qidVerif->closeCursor();
            $cnx=NULL;
                 
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<a href="index.php"> Accueil </a>';
            
            }
            catch (PDOException $error)
            {
                die ("Erreur de connexion : ". $error->getMessage());
            }               
        
 ?>
