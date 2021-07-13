<?php
session_start();
require('../../connexion_bdd/bdd.php');

$erreur = 0;

if(isset($_POST['submit'])){
    $nom = $_POST['nom'] ;
    $password = $_POST['password'] ;
    $password_verif = $_POST['password_verif'] ;
    $req2 = $bdd->prepare('SELECT * FROM usersfestival WHERE nom = :nom');
    $req2->execute(array(
        "nom" => $nom
    ));
    $compteur_req2 = $req2->rowCount();

       
    if(empty($nom)){
        $erreur = "Nom vide ! Merci de remplir de champ " ;
        $_SESSION['succes_inscription'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/inscription.html.php');
    }
    if(empty($password) && $erreur == 0){
        $erreur = "Mot de passe vide ! Merci de remplir de champ " ;
        $_SESSION['succes_inscription'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/inscription.html.php');
    }
    if(empty($password_verif) && $erreur == 0){
        $erreur = "Mot de passe verif vide ! Merci de remplir de champ " ;
        $_SESSION['succes_inscription'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/inscription.html.php');
    }else if(($password != $password_verif) && ($erreur == 0)){
        $erreur = "Les deux mots de passe ne correspondent pas ! " ;
        $_SESSION['succes_inscription'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/inscription.html.php');
    }
    if($compteur_req2 > 0){
        $erreur = "Le nom est déjà utilisé ! Merci de choisir un nouveau nom " ;
        $_SESSION['succes_inscription'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/inscription.html.php');

    }

    if($erreur == 0){
        $password = md5($password);
        $password_crypt = $password;

        $req1 = $bdd->prepare('INSERT INTO usersfestival(nom, passeword) VALUES(:nom, :passeword)');
        $req1->execute(array(
            "nom" => $nom,
            "passeword" => $password_crypt
        ));
        $erreur = "Inscription réussi" ;
        $_SESSION['succes_inscription'] = $erreur; 
        header('Location: ../../vue/inscription.html.php');

    }
}else{
    Header('Location: ../vue/index.html.php');
}

?>