<?php
require('../../connexion_bdd/bdd.php');

$req1 = $bdd->query('SELECT * FROM tete_affiche');
$compteur_req1 = $req1->rowCount();
if($compteur_req1 > 0){
    while($a = $req1->fetch()){
        $data [] = array("nom_artiste_tete_affiche" => $a['nom_artiste_tete_affiche'] ,      
        "date_concert" => $a['date_concert'] ,      
        'image_tete_affiche' => base64_encode($a['image_tete_affiche'])
        ) ;
    }
    echo $encode_donnees = json_encode($data);    
}
