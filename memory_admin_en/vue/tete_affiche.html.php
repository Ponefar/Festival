<?php 
session_start();

if(isset($_SESSION['id'])){
require('../inc/header.php'); ?>

<form method="POST" action="../controller/tete_affiche/tete_affiche.php" enctype="multipart/form-data">
    <input type="text" name="nom_artiste_tete_affiche" placeholder="Nom de l'artiste">
    <input type="text" name="date_concert_tete_affiche" placeholder="Date du concert (XX / XX / XXXXX)">
    <input type="file" name="image_tete_affiche" >
    <input type="submit" name="submit" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_tete_affiche'])){
    echo $_SESSION['succes_tete_affiche'] . '<br /><br />' ;
}


require('../controller/tete_affiche/tete_affiche_affichage.php');
?>



<?php 
}else{
    header('Location: ./index.html.php');

}
?>
