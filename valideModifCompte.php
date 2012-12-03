<?php

include 'class_connexionBDD.php';
include 'class_utilisateur.php';

$courriel = $_POST['courriel'];
$mdp = $_POST['mot_de_passe'];

try{
        //Appel de la fonction connexon BDD de la class connexion
        $cnx = new connexion();
        $cnx->connexonBDDinPDO();
        $connexion = $cnx->_liaison;

        $user = new utilisateur();
        $user->pushInfosUser($connexion,$courriel,$mdp);



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
