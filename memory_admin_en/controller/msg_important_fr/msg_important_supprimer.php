<?php
require('../../connexion_bdd/bdd.php');

if(isset($_GET['id'])){
    $req1 = $bdd->prepare('DELETE FROM msg_important_en  WHERE id_msg_important = :id ');
    $req1->execute(array(
        "id" => $_GET['id']
    ));
    
    header('Location: ../../vue/message_important_fr.html.php');
}