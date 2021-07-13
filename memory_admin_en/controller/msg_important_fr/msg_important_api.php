<?php
require('../../connexion_bdd/bdd.php');

$req1 = $bdd->query('SELECT * FROM msg_important_en ');
$compteur_req1 = $req1->rowCount();
if($compteur_req1 > 0){
    while($a = $req1->fetch()){
        $data [] = array('titre_msg_impotant' => $a['titre_msg_important'],
        // 'contenu_msg_impotant' => $a['contenu_msg_important'],
        // 'image_msg_important' => base64_encode($a['image_msg_important'])
        ) ;
    }
    echo $encode_donnees = json_encode($data);    
}
