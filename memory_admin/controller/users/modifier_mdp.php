<?php
session_start();
require('../../connexion_bdd/bdd.php');

$erreur = 0;

if(isset($_POST['submit_modif'])){
    $password = $_POST['password'] ;
    $password_verif = $_POST['password_verif'] ;
           

    if(empty($password) && $erreur == 0){
        $erreur = "Nouveau Mot de passe vide ! Merci de remplir le champ " ;
        $_SESSION['succes_inscription_verif'] = $erreur; 
        $erreur = 1; 
        Header('Location: ../../vue/index.html.php');
    }
    if(empty($password_verif) && $erreur == 0){
        $erreur = "Confirmation Nouveau Mot de passe Vide ! Merci de remplir le champ " ;
        $_SESSION['succes_inscription_verif'] = $erreur; 
        $erreur = 1; 
        Header('Location: ../../vue/index.html.php');

    }else if(($password != $password_verif) && ($erreur == 0)){
        $erreur = "Les deux mots de passe ne correspondent pas ! " ;
        $_SESSION['succes_inscription_verif'] = $erreur; 
        $erreur = 1; 
        Header('Location: ../../vue/index.html.php');
    }
  
    if($erreur == 0){
        $password = md5($password);
        $password_crypt = $password;

        $req1 = $bdd->prepare('UPDATE usersfestival SET passeword = :passeword WHERE id = :id');
        $req1->execute(array(
            "id" => $_SESSION['id'],
            "passeword" => $password_crypt
        ));
        $erreur = "Modification enregistrée ! " ;
        $_SESSION['succes_inscription_verif'] = $erreur; 
        Header('Location: ../../vue/index.html.php');

    }
}else{
    Header('Location: ../vue/index.html.php');
}

?>