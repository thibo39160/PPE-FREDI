<?php
    session_start();
    require_once ("class_connexionBDD.php");
    require_once ("class_utilisateur.php");
    
    $coBDD = new connexion();
    $coBDD->connexionBDD();
    $nom = $_POST['nom'];
    $num = $_POST['license'];
    $prenom = $_POST['prenom'];
    

    $user = new utilisateur();
    $_SESSION['Pass'] = $user->Connexion($num ,$nom, $prenom);
    print_r($_SESSION['Pass']);
    $coBDD->deconnexionBDD();

    
    header('Location: index.php');    
?>
