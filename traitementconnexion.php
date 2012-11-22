<?php
    session_start();
    require_once ("class_connexionBDD.php");
    require_once ("class_utilisateur.php");
    
    $coBDD = new connexion();
    $coBDD->connexionBDD();
    $login = $_POST['login'];
    $password = $_POST['password'];
    

    $user = new utilisateur();
    $_SESSION['Pass'] = $user->Connexion($login, $password);
    print_r($_SESSION['Pass']);
    $coBDD->deconnexionBDD();
    $_SESSION['login'] = $login;
    header('Location: index.php');    
?>
