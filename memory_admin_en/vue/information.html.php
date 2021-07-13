<?php 
session_start();

if(isset($_SESSION['id'])){
require('../inc/header.php'); ?>

<p>Information Générales</p>
<form action="../controller/information/information.php" method="POST">
    <textarea type="text" name="contenu_information_generales" placeholder="contenu informations générales"></textarea>
    <input type="submit" name="submit" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_information_generales'])){
    echo $_SESSION['succes_information_generales'] . '<br /><br />' ;
}
?>

<p>Actualités</p>
<form action="../controller/information/information.php" method="POST">
    <textarea type="text" name="contenu_actualites" placeholder="contenu actualités"></textarea>
    <input type="submit" name="submit_1" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_actualites'])){
    echo $_SESSION['succes_actualites'] . '<br /><br />' ;
}

require('../controller/information/information_affichage.php');
?>

<?php require('../inc/footer.php'); 

}else{
    header('Location: ./index.html.php');

}
?>
