<?php
session_start();
require('../../connexion_bdd/bdd.php');

if(isset($_SESSION)){

    if(($_SESSION['nom']) === "adminCdaWis"){

if(isset($_GET['id'])){
    $req1 = $bdd->prepare('DELETE FROM usersfestival WHERE id = :id ');
    $req1->execute(array(
        "id" => $_GET['id']
    ));
    header('Location: ../../vue/inscription.html.php');
}
    }else{
        header('Location: ../../vue/index.html.php');
    }
}else{
    header('Location: ../../vue/index.html.php');
}
?>
