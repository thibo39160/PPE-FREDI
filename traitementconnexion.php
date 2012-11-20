<?php
session_start();
    $inscription = false;
    require_once ("class_connexionBDD.php");
    require_once ("class_utilisateur.php");
    
    $coBDD = new connexion();
    $coBDD->connexionBDD();
    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = new utilisateur($login, $password);
    $_SESSION['Pass'] = $user->Connexion($user->get_login(), $user->get_password(), $inscription=false);
    $coBDD->deconnexionBDD();
    header('Location: index.php');      
?>
