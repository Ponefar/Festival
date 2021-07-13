<?php
require('../../connexion_bdd/bdd.php');

$req1 = $bdd->query('SELECT * FROM information_faq ORDER BY id_information_faq DESC');
$compteur_req1 = $req1->rowCount();
if($compteur_req1 > 0){
    while($a = $req1->fetch()){
        $data [] = array("titre_information_faq" => $a['titre_information_faq'],
        "sous_titre_information_faq" => $a['sous_titre_information_faq'],
        "contenu_information_faq" => $a['contenu_information_faq']);
    }   
    echo $encode_donnees = json_encode($data);    
}
