<?php
require('../connexion_bdd/bdd.php');

if(isset($_SESSION)){
    if(($_SESSION['nom']) === "adminCdaWis"){
        
$req1 = $bdd->prepare('SELECT * FROM usersfestival WHERE nom != "adminCdaWis" ORDER BY id DESC');
$req1->execute();
?>
    <div class="grid"> 
<?php
while($a = $req1->fetch()){ ?>
    <div class="par_4_grid">

        <a href="../controller/users/users_supprimer.php?id=<?php echo $a['id'] ?>" onclick="if(confirm('Supprimer cet utilisateur ?')){}else{return false;}">
        <button>Supprimer</button></a><br />
    <?php
    echo $a['nom'] . '<br />';
    ?>
            </div>
<?php
}
?></div><?php
    }else{
        header('Location: ../../vue/index.html.php');
    }
}else{
    header('Location: ../../vue/index.html.php');
}



?>