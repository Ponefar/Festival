<?php
session_start();
require('../../connexion_bdd/bdd.php');


if(isset($_POST['submit'])){

    $erreur = 0;
    $extensions_autorisees_image = array('gif' ,'png' ,'jpg' ,'jpeg' ,'pdf');
    $nom_ficher = $_FILES['image_reseau_sociaux']['name'];
    $extensions_image = pathinfo($nom_ficher, PATHINFO_EXTENSION);

    if(empty($_POST['url_reseau_sociaux'])){
        $erreur = "Url réseau Social vide" ;
        $_SESSION['succes_reseau_sociaux'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/reseau_sociaux.html.php');

    }
    if($_FILES['image_reseau_sociaux']['tmp_name'] == "" && $erreur == 0){
        $erreur = "Image vide !" ;
        $_SESSION['succes_reseau_sociaux'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/reseau_sociaux.html.php');
    }
    if($_FILES['image_reseau_sociaux']['size'] > 65535  && $erreur == 0){
        $erreur = "Image trop grande !" ;
        $_SESSION['succes_reseau_sociaux'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/reseau_sociaux.html.php');
    }

    if(!in_array($extensions_image, $extensions_autorisees_image) && $erreur == 0){
        $erreur = "Seul les format : gif ,png ,jpg ,jpeg et pdf sont acceptés !" ;
        $_SESSION['succes_reseau_sociaux'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/reseau_sociaux.html.php');
    }


    if($erreur != 1){
        $req2 = $bdd->query('SELECT * FROM reseau_sociaux');
        $compteur_req2 = $req2->rowCount();
        if($compteur_req2 >= 4){
            $succes = "Vous ne pouvez pas ajouter plus de 4 réseaux sociaux !" ;
            $_SESSION['succes_reseau_sociaux'] = $succes;
            header('Location: ../../vue/reseau_sociaux.html.php');
        }else{    
        $image = file_get_contents($_FILES["image_reseau_sociaux"]["tmp_name"]);
        $req1 = $bdd->prepare('INSERT INTO reseau_sociaux(image_reseau_sociaux, url_reseau_sociaux) VALUES(:image_reseau_sociaux, :url_reseau_sociaux)');
        $req1->execute(array(
            "image_reseau_sociaux" => $image,
            "url_reseau_sociaux" => $_POST['url_reseau_sociaux']
        ));
        // require('../vue/reseau_sociaux.html.php');
        $succes = "Image Envoyé !" ;
        $_SESSION['succes_reseau_sociaux'] = $succes;
        }
        header('Location: ../../vue/reseau_sociaux.html.php');
    }

}else{
    header('Location: ../vue/reseau_sociaux.html.php');
}




?>