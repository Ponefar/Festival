<?php
session_start();
require('../../connexion_bdd/bdd.php');


if(isset($_POST['submit'])){

    $erreur = 0;
    $extensions_autorisees_image = array('gif' ,'png' ,'jpg' ,'jpeg' ,'pdf');
    $nom_ficher = $_FILES['image_sponsor']['name'];
    $extensions_image = pathinfo($nom_ficher, PATHINFO_EXTENSION);

    
    if($_FILES['image_sponsor']['tmp_name'] == "" && $erreur == 0){
        $erreur = "Image vide !" ;
        $_SESSION['succes_sponsor'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/sponsor.html.php');
    }
    if($_FILES['image_sponsor']['size'] > 65535  && $erreur == 0){
        $erreur = "Image trop grande !" ;
        $_SESSION['succes_sponsor'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/sponsor.html.php');
    }

    if(!in_array($extensions_image, $extensions_autorisees_image) && $erreur == 0){
        $erreur = "Seul les format : gif ,png ,jpg ,jpeg et pdf sont acceptés !" ;
        $_SESSION['succes_sponsor'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/sponsor.html.php');
    }
    // if(!isset($_POST['type_sponsor'])){
    //     $erreur = "Liste déroulante vide" ;
    //     $_SESSION['succes_sponsor'] = $erreur; 
    //     $erreur = 1;
    //     header('Location: ../../vue/sponsor.html.php');
    // }

    if($erreur != 1){
        $image = file_get_contents($_FILES["image_sponsor"]["tmp_name"]);
        $req1 = $bdd->prepare('INSERT INTO sponsors(image_sponsors, type_sponsors) VALUES(:image_sponsor, :type_sponsors)');
        $req1->execute(array(
            "type_sponsors" => $_POST['type_sponsor'],
            "image_sponsor" => $image
        ));
        // require('../vue/sponsor.html.php');
        $succes = "Image Envoyé !" ;
        $_SESSION['succes_sponsor'] = $succes;
        header('Location: ../../vue/sponsor.html.php');
    }

}else{
    header('Location: ../vue/sponsor.html.php');
}




?>