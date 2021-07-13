<?php
require('../../connexion_bdd/bdd.php');

$req1 = $bdd->query('SELECT * FROM sponsors');
$compteur_req1 = $req1->rowCount();
if($compteur_req1 > 0){
    while($a = $req1->fetch()){
        $data [] = array('image_sponsor' => base64_encode($a['image_sponsors'])
        , "type_sponsors" => $a['type_sponsors']
        ) ;
    }
    echo $encode_donnees = json_encode($data);    
}
