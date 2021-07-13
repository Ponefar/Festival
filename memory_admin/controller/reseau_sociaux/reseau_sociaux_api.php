<?php
require('../../connexion_bdd/bdd.php');

$req1 = $bdd->query('SELECT * FROM reseau_sociaux');
$compteur_req1 = $req1->rowCount();
if($compteur_req1 > 0){
    while($a = $req1->fetch()){
        $data [] = array('image_reseau_sociaux' => base64_encode($a['image_reseau_sociaux']),
        "url_reseau_sociaux" => $a['url_reseau_sociaux']        
        ) ;
    }
    echo $encode_donnees = json_encode($data);    
}
