<?php
session_start();
require('../../connexion_bdd/bdd.php');


if(isset($_POST['submit'])){

    // $erreur = 0;
    // $extensions_autorisees_image = array('gif' ,'png' ,'jpg' ,'jpeg' ,'pdf');
    // $nom_ficher = $_FILES['image_msg_important']['name'];
    // $extensions_image = pathinfo($nom_ficher, PATHINFO_EXTENSION);

    if(empty($_POST['titre_msg_important']) && $erreur == 0){
        $erreur = "Titre vide !" ;
        $_SESSION['succes_msg_important'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/message_important_fr.html.php');
    }
    
    // if(empty($_POST['contenu_msg_important']) && $erreur == 0){
    //     $erreur = "Contenu vide !" ;
    //     $_SESSION['succes_msg_important'] = $erreur; 
    //     $erreur = 1; 
    //     header('Location: ../../vue/message_important_fr.html.php');
    // }
    
    // if($_FILES['image_msg_important']['tmp_name'] == "" && $erreur == 0){
    //     $erreur = "Image vide !" ;
    //     $_SESSION['succes_msg_important'] = $erreur; 
    //     $erreur = 1; 
    //     header('Location: ../../vue/message_important_fr.html.php');
    // }
    // if($_FILES['image_msg_important']['size'] > 65535){
    //     $erreur = "Image trop grande !" ;
    //     $_SESSION['succes_msg_important'] = $erreur; 
    //     $erreur = 1; 
    //     header('Location: ../../vue/message_important_fr.html.php');
    // }

    // if(!in_array($extensions_image, $extensions_autorisees_image) && $erreur == 0){
    //     $erreur = "Seul les format : gif ,png ,jpg ,jpeg et pdf sont acceptés !" ;
    //     $_SESSION['succes_msg_important'] = $erreur; 
    //     $erreur = 1;
    //     header('Location: ../../vue/message_important_fr.html.php');
    // }

    if($erreur != 1){
        // $image = file_get_contents($_FILES["image_msg_important"]["tmp_name"]);

        // $image = file_get_contents($_FILES["image_msg_important"]["tmp_name"]);
        $req1 = $bdd->prepare('INSERT INTO msg_important_en(titre_msg_important/*, contenu_msg_important , image_msg_important*/) VALUES(:titre/*, :contenu, :image_msg*/)');
        $req1->execute(array(
            "titre" => $_POST['titre_msg_important'] //,
            // "contenu" => $_POST['contenu_msg_important'] ,
            // "image_msg" => $image
        ));
        $succes = "Message Envoyé !" ;
        $_SESSION['succes_msg_important'] = $succes;
        header('Location: ../../vue/message_important_fr.html.php');
    }

}else{
    header('Location: ../vue/message_important_fr.html.php');
}




?>