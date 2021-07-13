<?php
session_start();

require('../../connexion_bdd/bdd.php');

if(isset($_SESSION['id'])){

    if(isset($_GET['id'])){
        $req1 = $bdd->prepare('DELETE FROM msg_important WHERE id_msg_important = :id ');
        $req1->execute(array(
            "id" => $_GET['id']
        ));
        
        header('Location: ../../vue/message_important_fr.html.php');
    }
}else{
        header('Location: ../../vue/index.html.php');
    }

