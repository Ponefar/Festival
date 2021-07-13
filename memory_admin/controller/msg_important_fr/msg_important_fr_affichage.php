<?php
require('../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM msg_important ORDER BY id_msg_important DESC');
$req1->execute();
$compteur_req1 = $req1->rowCount();

if($compteur_req1 > 0){
    ?>
    <div class="grid">
    <?php
        while($a = $req1->fetch()){
    ?>
        <div class="par_4_grid">
            <a href="../controller/msg_important_fr/msg_important_supprimer.php?id=<?php echo $a['id_msg_important'] ?>" onclick="if(confirm('Supprimer ce sponsor ?')){}else{return false;}">
            <button>Supprimer</button></a><br />
            <?php
            echo '<p>Titre : ' . $a['titre_msg_important'] . '</p>' ;
            // echo '<p>Contenu : ' . $a['contenu_msg_important'] . '</p><br />' ;
            // echo '<img src = "data:image/png;base64,' . base64_encode($a['image_msg_important']) . '" width = "150px" height = "150px"/><br><br><br> ';
            // echo '<hr>';
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php
}