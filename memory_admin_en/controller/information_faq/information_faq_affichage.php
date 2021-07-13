<?php
require('../connexion_bdd/bdd.php');

$req1 = $bdd->prepare('SELECT * FROM information_faq_en ORDER BY id_information_faq DESC');
$req1->execute();
$compteur_req1 = $req1->rowCount();

if($compteur_req1 > 0){
    ?>
    <div class="grid">
    <?php
        while($a = $req1->fetch()){
    ?>
        <div class="par_4_grid">
            <a href="../controller/information_faq/information_faq_supprimer.php?id=<?php echo $a['id_information_faq'] ?>" onclick="if(confirm('Supprimer cet Information ?')){}else{return false;}">
            <button>Supprimer</button></a><br />
            <?php
            echo '<p>Titre : ' . $a['titre_information_faq'] . '</p>' ;
            echo '<p>Sous Titre : ' . $a['sous_titre_information_faq'] . '</p>' ;
            echo '<p>Contenu : ' . $a['contenu_information_faq'] . '</p><br />' ;
            // echo '<hr>';
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php
}