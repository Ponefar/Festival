<?php
session_start();
require('../../connexion_bdd/bdd.php');


if(isset($_POST['submit'])){

    if(empty($_POST['titre_msg_important']) && $erreur == 0){
        $erreur = "Titre vide !" ;
        $_SESSION['succes_msg_important'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/message_important_fr.html.php');
    }

    if($erreur != 1){
      
        $req1 = $bdd->prepare('INSERT INTO msg_important(titre_msg_important/*, contenu_msg_important , image_msg_important*/) VALUES(:titre/*, :contenu, :image_msg*/)');
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