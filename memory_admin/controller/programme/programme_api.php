<?php
require('../../connexion_bdd/bdd.php');

$req1 = $bdd->query('SELECT * FROM programme');

date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr');

$compteur_req1 = $req1->rowCount();
if($compteur_req1 > 0){
    $req2 = $bdd->query('SELECT * FROM programme ORDER BY datetime_local ASC ');
    while($a = $req2->fetch()){

        $data [] = array("nom_artiste" => ucfirst($a['nom_artiste']),
        "nom_scene" => ucfirst($a['nom_scene']),
        "heures_prog_debut" =>  strftime("%H:%M " ,strtotime($a['datetime_local'])),
        "date_formatage" => ucfirst(strftime("%d/%m/%y " ,strtotime($a['datetime_local']))),
        "heures_prog_fin" => strftime("%H:%M " ,strtotime($a['heure_fin'])),
        "type_rap" => ucfirst($a['type_rap']),
        // 'datetime' => ucfirst($a['datetime_local']),
        "date_formatage_prgm" => ucfirst(strftime("%A %d/%m/%y " ,strtotime($a['datetime_local']))),
        // "date_time_fr" =>  strftime("%d/%m/%Y %H:%M:%S " ,strtotime($a['datetime_local'])),
        "date_time_fr" =>  strftime("%d/%m/%Y" ,strtotime($a['datetime_local'])),
        "date_formatage_prgm_en" => ucfirst(strftime("%A %m/%d/%Y " ,strtotime($a['datetime_local']))),
        "image_programme" => base64_encode($a['image_programme']));
        
        
    }

    echo $encode_donnees = json_encode($data);    
}

