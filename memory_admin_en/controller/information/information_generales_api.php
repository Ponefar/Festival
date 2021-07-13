<?php
require('../../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM informations_generales_en');
$req1->execute();
$compteur_req1 = $req1->rowCount();
if($compteur_req1 > 0){
    while($a = $req1->fetch()){
        $data [] = array('contenu_information_generales' => $a['contenu_informations_generales']);
    }
    echo $encode_donnees = json_encode($data);    
}
?>

