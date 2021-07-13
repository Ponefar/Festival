<?php
require('../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM informations_generales_en ORDER BY id_informations_generales DESC');
$req1->execute();
$compteur_req1 = $req1->rowCount();

$req2 = $bdd->prepare('SELECT * FROM actualites_en ORDER BY id_actualite DESC');
$req2->execute();
$compteur_req2 = $req2->rowCount();


if($compteur_req1 > 0){
    ?>
    Informations générales :
    <div class="grid"> 
    <?php
        while($a = $req1->fetch()){
    ?>
        <div class="par_4_grid">
            <a href="../controller/information/information_supprimer.php?id_info=<?php echo $a['id_informations_generales'] ?>" onclick="if(confirm('Supprimer cet Information ?')){}else{return false;}">
            <button>Supprimer</button></a><br />
            <?php
            echo '<p>Contenu : ' . $a['contenu_informations_generales'] . '</p><br />' ;
            // echo '<hr>';
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php
}


if($compteur_req2 > 0){
    ?>
    Actualitées : 
    <div class="grid">
    <?php
        while($ab = $req2->fetch()){
    ?>
        <div class="par_4_grid">
            <a href="../controller/information/information_supprimer.php?id_actu=<?php echo $ab['id_actualite'] ?>" onclick="if(confirm('Supprimer cet Information ?')){}else{return false;}">
            <button>Supprimer</button></a><br />
            <?php
            echo '<p>Contenu : ' . $ab['contenu_actualites'] . '</p><br />' ;
            // echo '<hr>';
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php
}