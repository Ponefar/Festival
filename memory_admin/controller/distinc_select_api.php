<?php

require('../connexion_bdd/bdd.php');
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr');

// $req1 = $bdd->query('SELECT DISTINCT(datetime_local) FROM programme ORDER BY datetime_local ASC');
// while($a = $req1->fetch()){
//     $data[] = array(
//         'date_formatage' => ucfirst(strftime("%A %D " ,strtotime($a['datetime_local'])))

//     );
// }


$req1 = $bdd->query("SELECT * FROM programme group by DATE_FORMAT(`datetime_local`, '%c %d %Y')");
while($a = $req1->fetch()){
    $data[] = array(
        "date_formatage" => ucfirst(strftime("%A %d/%m/%y " ,strtotime($a['datetime_local']))),
        "date_formatage_prgm_en" => ucfirst(strftime("%A %m/%d/%Y " ,strtotime($a['datetime_local'])))
        // 'datetime' => ucfirst($a['datetime_local'])
    );
}


$req1 = $bdd->query('SELECT DISTINCT(nom_scene) FROM programme ORDER BY nom_scene ASC');
while($a = $req1->fetch()){
    $data[] = array(
        'nom_scene' => ucfirst($a['nom_scene'])
    );
}

$req1 = $bdd->query('SELECT DISTINCT(type_rap) FROM programme ORDER BY type_rap ASC');
while($a = $req1->fetch()){
    $data[] = array(
        'type_rap' => ucfirst($a['type_rap'])
    );
}


echo $encode_donnees = json_encode($data);    

?>