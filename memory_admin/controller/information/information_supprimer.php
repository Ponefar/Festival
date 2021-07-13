<?php
session_start();

require('../../connexion_bdd/bdd.php');

if(isset($_GET['id_info'])){
    $req1 = $bdd->prepare('DELETE FROM informations_generales WHERE id_informations_generales = :id ');
    $req1->execute(array(
        "id" => $_GET['id_info']
    ));
    
    header('Location: ../../vue/information.html.php');

}else if(isset($_GET['id_actu'])){
    $req1 = $bdd->prepare('DELETE FROM actualites WHERE id_actualite = :id ');
    $req1->execute(array(
        "id" => $_GET['id_actu']
    ));
    
    header('Location: ../../vue/information.html.php');

}else{
    header('Location: ../../index.php');
}