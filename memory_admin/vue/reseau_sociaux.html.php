<?php 
session_start();

if(isset($_SESSION['id'])){
require('../inc/header.php'); ?>

<form method="POST" action="../controller/reseau_sociaux/reseau_sociaux.php" enctype="multipart/form-data">
    <input type="text" name="url_reseau_sociaux" placeholder="Url réseau Social">
    <input type="file" name="image_reseau_sociaux" >
    <input type="submit" name="submit" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_reseau_sociaux'])){
    echo $_SESSION['succes_reseau_sociaux'] . '<br /><br />' ;
}


require('../controller/reseau_sociaux/reseau_sociaux_affichage.php');
?>



<?php require('../inc/footer.php'); 
}else{
    header('Location: ./index.html.php');

}
?>
