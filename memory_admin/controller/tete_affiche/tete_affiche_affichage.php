<?php
require('../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM tete_affiche ORDER BY id_tete_affiche DESC');
$req1->execute();
$compteur_req1 = $req1->rowCount();

if($compteur_req1 > 0){
    ?>
    <div class="grid">
        <?php
        while($a = $req1->fetch()){
            ?>
            <div class="par_4_grid">
            <?php
            echo "Nom : " . $a['nom_artiste_tete_affiche'] . '<br /><br />';
            echo "Date : " . $a['date_concert'] . '<br /><br />';
            echo '<img src = "data:image/png;base64,' . base64_encode($a['image_tete_affiche']) . '" width = "150px" height = "150px"/><br /> ';
            // echo '<hr>';
            ?>
                </div>
            <?php
        }
        ?>
    </div>
    <?php
}