<?php
require('../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM reseau_sociaux ORDER BY id_reseau_sociaux DESC');
$req1->execute();
$compteur_req1 = $req1->rowCount();

if($compteur_req1 > 0){
    ?>
    <div class="grid">
        <?php
        while($a = $req1->fetch()){
            ?>
            <div class="par_4_grid">
            <a href="../controller/reseau_sociaux/reseau_sociaux_supprimer.php?id=<?php echo $a['id_reseau_sociaux'] ?>" onclick="if(confirm('Supprimer ce Réseaux Social ?')){}else{return false;}">
            <button>Supprimer</button></a><br /><br />
            <?php
            echo "Url : " . $a['url_reseau_sociaux'] . '<br /><br />';
            echo '<img src = "data:image/png;base64,' . base64_encode($a['image_reseau_sociaux']) . '" width = "150px" height = "150px"/><br /> ';
            // echo '<hr>';
            ?>
                </div>
            <?php
        }
        ?>
    </div>
    <?php
}