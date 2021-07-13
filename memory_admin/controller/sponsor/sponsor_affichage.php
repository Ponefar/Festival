<?php
require('../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM sponsors ORDER BY id_sponsors DESC');
$req1->execute();
$compteur_req1 = $req1->rowCount();

if($compteur_req1 > 0){
    ?>
    <div class="grid">
        <?php
        while($a = $req1->fetch()){
            ?>
            <div class="par_4_grid">
            <a href="../controller/sponsor/sponsor_supprimer.php?id=<?php echo $a['id_sponsors'] ?>" onclick="if(confirm('Supprimer ce sponsor ?')){}else{return false;}">
            <button>Supprimer</button></a><br /><br />
            <?php
            echo $a['type_sponsors'] . '<br /> <br />';
            echo '<img src = "data:image/png;base64,' . base64_encode($a['image_sponsors']) . '" width = "150px" height = "150px"/><br /> ';
            // echo '<hr>';
            ?>
                </div>
            <?php
        }
        ?>
    </div>
    <?php
}