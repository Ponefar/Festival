<?php
session_start();
require('../../connexion_bdd/bdd.php');


if(isset($_POST['submit'])){


    if(empty($_POST['titre_information_faq']) && $erreur == 0){
        $erreur = "Titre vide !" ;
        $_SESSION['succes_information_faq'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/information_faq.html.php');
    }
    
    if(empty($_POST['sous_titre_information_faq']) && $erreur == 0){
        $erreur = "Sous Titre vide !" ;
        $_SESSION['succes_information_faq'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/information_faq.html.php');
    }
    
    if(empty($_POST['contenu_information_faq']) && $erreur == 0){
        $erreur = "Contenu vide !" ;
        $_SESSION['succes_information_faq'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/information_faq.html.php');
    }
    
    if($erreur != 1){
 
        $req1 = $bdd->prepare('INSERT INTO information_faq_en (titre_information_faq, sous_titre_information_faq, contenu_information_faq) VALUES(:titre, :sous_titre, :contenu)');
        $req1->execute(array(
            "titre" => $_POST['titre_information_faq'],
            "sous_titre" => $_POST['sous_titre_information_faq'],
            "contenu" => $_POST['contenu_information_faq']
        ));

        $succes = "Message Envoyé !" ;
        $_SESSION['succes_information_faq'] = $succes;
        header('Location: ../../vue/information_faq.html.php');
    }

}else{
    header('Location: ../vue/information_faq.html.php');
}




?>