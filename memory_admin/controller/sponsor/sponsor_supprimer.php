<?php
session_start();

require('../../connexion_bdd/bdd.php');


if(isset($_SESSION)){

if(isset($_GET['id'])){
    $req1 = $bdd->prepare('DELETE FROM sponsors WHERE id_sponsors = :id ');
    $req1->execute(array(
        "id" => $_GET['id']
    ));
    header('Location: ../../vue/sponsor.html.php');
}

}else{
    header('Location: ../../vue/index.html.php');
}