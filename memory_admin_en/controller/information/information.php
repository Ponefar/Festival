<?php
session_start();
require('../../connexion_bdd/bdd.php');


if(isset($_POST['submit'])){
    
    if(empty($_POST['contenu_information_generales']) && $erreur == 0){
        $erreur = "Contenu vide !" ;
        $_SESSION['succes_information_generales'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/information.html.php');
    }
    
    if($erreur != 1){
 
        $req1 = $bdd->prepare('INSERT INTO informations_generales_en(contenu_informations_generales) VALUES( :contenu)');
        $req1->execute(array(
            "contenu" => $_POST['contenu_information_generales']
        ));

        $succes = "Message Envoyé !" ;
        $_SESSION['succes_information_generales'] = $succes;
        header('Location: ../../vue/information.html.php');
    }

}else if(isset($_POST['submit_1'])){
    
    if(empty($_POST['contenu_actualites']) && $erreur == 0){
        $erreur = "Contenu vide !" ;
        $_SESSION['succes_actualites'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/information.html.php');
    }
    
    if($erreur != 1){
 
        $req1 = $bdd->prepare('INSERT INTO actualites_en(contenu_actualites) VALUES( :contenu)');
        $req1->execute(array(
            "contenu" => $_POST['contenu_actualites']
        ));

        $succes = "Message Envoyé !" ;
        $_SESSION['succes_actualites'] = $succes;
        header('Location: ../../vue/information.html.php');
    }
}else{
    header('Location: ../vue/information.html.php');
}




?>