<?php
require('../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM programme ORDER BY id_programme DESC');
$req1->execute();
$compteur_req1 = $req1->rowCount();

date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr');
if($compteur_req1 > 0){
    ?>
    <div class="grid">
        <?php
        while($a = $req1->fetch()){
            ?>
            <div class="par_4_grid">
            <a href="../controller/programme/programme_supprimer.php?id=<?php echo $a['id_programme'] ?>" onclick="if(confirm('Supprimer cet ariste ?')){}else{return false;}">
            <button>Supprimer</button></a><br /><br />
            <?php
            echo "Nom  : " . $a['nom_artiste'] . '<br /><br />';
            echo "Scene : " . $a['nom_scene'] . '<br /><br />';
            echo "Date : " . ucfirst(strftime("%A %D " ,strtotime($a['datetime_local']))) . '<br /><br />';
            echo "Début / Fin : " . strftime("%Hh%M " ,strtotime($a['datetime_local'])) .  " - " . strftime("%Hh%M " ,strtotime($a['heure_fin'])) .  '<br /><br />';
            echo "Type : " . $a['type_rap'] . '<br /><br />';
            echo '<img src = "data:image/png;base64,' . base64_encode($a['image_programme']) . '" width = "80px" height = "80px"/><br /> ';
            // echo '<hr>';
            ?>
                </div>
            <?php
        }
        ?>
    </div>
    <?php
}