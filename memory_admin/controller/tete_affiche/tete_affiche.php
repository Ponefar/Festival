<?php
session_start();
require('../../connexion_bdd/bdd.php');


if(isset($_POST['submit'])){

    $erreur = 0;
    $extensions_autorisees_image = array('gif' ,'png' ,'jpg' ,'jpeg' ,'pdf');
    $nom_ficher = $_FILES['image_tete_affiche']['name'];
    $extensions_image = pathinfo($nom_ficher, PATHINFO_EXTENSION);

    if(empty($_POST['nom_artiste_tete_affiche'])){
        $erreur = "Nom de l'artiste vide" ;
        $_SESSION['succes_tete_affiche'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/tete_affiche.html.php');
    }
    if(empty($_POST['date_concert_tete_affiche']) && $erreur == 0){
        $erreur = "Date du concert vide" ;
        $_SESSION['succes_tete_affiche'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/tete_affiche.html.php');

    }
    if($_FILES['image_tete_affiche']['tmp_name'] == "" && $erreur == 0){
        $erreur = "Image vide !" ;
        $_SESSION['succes_tete_affiche'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/tete_affiche.html.php');
    }
    if($_FILES['image_tete_affiche']['size'] > 65535  && $erreur == 0){
        $erreur = "Image trop grande !" ;
        $_SESSION['succes_tete_affiche'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/tete_affiche.html.php');
    }
    if(!in_array($extensions_image, $extensions_autorisees_image) && $erreur == 0){
        $erreur = "Seul les format : gif ,png ,jpg ,jpeg et pdf sont acceptés !" ;
        $_SESSION['succes_tete_affiche'] = $erreur; 
        $erreur = 1;
        header('Location: ../../vue/tete_affiche.html.php');
    }

    if($erreur != 1){
        $req2 = $bdd->query('SELECT * FROM tete_affiche');
        $compteur_req2 = $req2->rowCount();
        $image = file_get_contents($_FILES["image_tete_affiche"]["tmp_name"]);

        if($compteur_req2 > 0){
            $req1 = $bdd->prepare('UPDATE tete_affiche SET nom_artiste_tete_affiche = :nom_artiste_tete_affiche, date_concert = :date_concert , image_tete_affiche = :image_tete_affiche');
            $req1->execute(array(
                "nom_artiste_tete_affiche" => $_POST['nom_artiste_tete_affiche'],
                "date_concert" => $_POST['date_concert_tete_affiche'],
                "image_tete_affiche" => $image
            ));
            // require('../vue/tete_affiche.html.php');
            $succes = "Tete affiche Modifié avec succès !" ;
            $_SESSION['succes_tete_affiche'] = $succes;
            header('Location: ../../vue/tete_affiche.html.php');
        }else{
        $req1 = $bdd->prepare('INSERT INTO tete_affiche(nom_artiste_tete_affiche, date_concert, image_tete_affiche ) VALUES(:nom_artiste_tete_affiche, :date_concert, :image_tete_affiche)');
        $req1->execute(array(
            "nom_artiste_tete_affiche" => $_POST['nom_artiste_tete_affiche'],
            "date_concert" => $_POST['date_concert_tete_affiche'],
            "image_tete_affiche" => $image
        ));
        // require('../vue/tete_affiche.html.php');
        $succes = "Tete affiche envoyé !" ;
        $_SESSION['succes_tete_affiche'] = $succes;
        header('Location: ../../vue/tete_affiche.html.php');
        }
    }

}else{
    header('Location: ../vue/tete_affiche.html.php');
}




?>