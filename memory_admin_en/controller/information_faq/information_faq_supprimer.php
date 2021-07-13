<?php
require('../../connexion_bdd/bdd.php');

if(isset($_GET['id'])){
    $req1 = $bdd->prepare('DELETE FROM information_faq_en  WHERE id_information_faq = :id ');
    $req1->execute(array(
        "id" => $_GET['id']
    ));
    
    header('Location: ../../vue/information_faq.html.php');
}