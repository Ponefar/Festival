<?php 
session_start();

if(isset($_SESSION['id'])){
require('../inc/header.php'); ?>

<p>Information pratiques et FAQ</p>
<form action="../controller/information_faq/information_faq.php" method="POST" enctype="multipart/form-data">
    <textarea type="text" name="titre_information_faq" placeholder="titre"></textarea>
    <textarea type="text" name="sous_titre_information_faq" placeholder="Sous titre"></textarea>
    <textarea type="text" name="contenu_information_faq" placeholder="Contenu"></textarea>

    <input type="submit" name="submit" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_information_faq'])){
    echo $_SESSION['succes_information_faq'] . '<br /><br />' ;
}


require('../controller/information_faq/information_faq_affichage.php');
?>



<?php require('../inc/footer.php'); 
}else{
    header('Location: ./index.html.php');

}
?>
