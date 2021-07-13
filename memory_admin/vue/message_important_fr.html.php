<?php 
session_start();

if(isset($_SESSION['id'])){
require('../inc/header.php'); ?>

<p>Modification Message Important FR</p>
<form action="../controller/msg_important_fr/msg_important_fr.php" method="POST" enctype="multipart/form-data">
    <textarea type="text" name="titre_msg_important" placeholder="titre"></textarea>
    <!-- <textarea type="text" name="contenu_msg_important" placeholder="Contenu"></textarea>
    <input type="file" name="image_msg_important"> -->
    <input type="submit" name="submit" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_msg_important'])){
    echo $_SESSION['succes_msg_important'] . '<br /><br />' ;
}


require('../controller/msg_important_fr/msg_important_fr_affichage.php');
?>



<?php require('../inc/footer.php'); 
}else{
    header('Location: ./index.html.php');

}
?>
