<?php
session_start();

require('../../connexion_bdd/bdd.php');
if(isset($_SESSION)){



if(isset($_GET['id'])){
    $req1 = $bdd->prepare('DELETE FROM programme WHERE id_programme = :id ');
    $req1->execute(array(
        "id" => $_GET['id']
    ));
    header('Location: ../../vue/programme.html.php');
}

}else{
    header('Location: ../../vue/index.html.php');
}