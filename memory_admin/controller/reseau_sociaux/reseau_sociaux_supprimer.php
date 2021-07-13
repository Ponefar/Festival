<?php
session_start();

require('../../connexion_bdd/bdd.php');

if(isset($_SESSION['id'])){

if(isset($_GET['id'])){
    $req1 = $bdd->prepare('DELETE FROM reseau_sociaux WHERE id_reseau_sociaux = :id ');
    $req1->execute(array(
        "id" => $_GET['id']
    ));
    header('Location: ../../vue/reseau_sociaux.html.php');
}

}else{
    header('Location: ../../vue/index.html.php');
}