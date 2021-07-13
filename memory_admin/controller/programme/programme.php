<?php
session_start();
require('../../connexion_bdd/bdd.php');
if(isset($_POST['submit'])){
    $erreur = 0;
    $extensions_autorisees_image = array('gif' ,'png' ,'jpg' ,'jpeg' ,'pdf');
    $nom_ficher = $_FILES['image_programme']['name'];
    $extensions_image = pathinfo($nom_ficher, PATHINFO_EXTENSION);

    if(empty($_POST['nom_artiste']) && $erreur == 0){
        $erreur = "Nom artiste vide" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/programme.html.php');
    }
    if(empty($_POST['nom_scene']) && $erreur == 0){
        $erreur = "Nom scène vide" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/programme.html.php');
    }
    if(empty($_POST['datetime_local']) && $erreur == 0){
        $erreur = "Date time vide" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/programme.html.php');
    }
    if(empty($_POST['heure_fin']) && $erreur == 0){
        $erreur = "Heure de fin vide" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/programme.html.php');
    }
    if(empty($_POST['type_rap']) && $erreur == 0){
        $erreur = "Type de rap vide" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/programme.html.php');
    }
    if($_FILES['image_programme']['tmp_name'] == "" && $erreur == 0){
        $erreur = "Image vide !" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/programme.html.php');
    }
    if($_FILES['image_programme']['size'] > 65535  && $erreur == 0){
        $erreur = "Image trop grande !" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/programme.html.php');
    }

    if(!in_array($extensions_image, $extensions_autorisees_image) && $erreur == 0){
        $erreur = "Seul les format : gif ,png ,jpg ,jpeg et pdf sont acceptés !" ;
        $_SESSION['succes_programme'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/programme.html.php');
    }
    if($erreur != 1){
           
        $image = file_get_contents($_FILES["image_programme"]["tmp_name"]);
        $req1 = $bdd->prepare('INSERT INTO programme(nom_artiste, nom_scene, heure_fin, datetime_local, type_rap, image_programme) VALUES(:nom_artiste, :nom_scene , :heure_fin, :datetime_local, :type_rap, :image_programme)');
        $req1->execute(array(
            "nom_artiste" => $_POST['nom_artiste'],
            "nom_scene" => $_POST['nom_scene'],
            "heure_fin" => $_POST['heure_fin'],
            "datetime_local" => $_POST['datetime_local'],
            "type_rap" => $_POST['type_rap'],
            "image_programme" => $image
        ));
        // require('../vue/programme.html.php');
        $succes = "Image Envoyé !" ;
        $_SESSION['succes_programme'] = $succes;
        
        header('Location: ../../vue/programme.html.php');
    }

}else{
    header('Location: ../vue/programme.html.php');
}




?>