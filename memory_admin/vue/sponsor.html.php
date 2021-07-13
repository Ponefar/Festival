<?php 
session_start();

if(isset($_SESSION['id'])){
require('../inc/header.php'); ?>

<form method="POST" action="../controller/sponsor/sponsor.php" enctype="multipart/form-data">
    <input type="file" name="image_sponsor" >
    <select name="type_sponsor">
        <option value="partenaires">Partenaires</option>
        <option value="partenaires_officiels">Partenaires Officiels</option>
        <option value="partenaires_medias">Partenaires Médias</option>
    </select>

    <input type="submit" name="submit" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_sponsor'])){
    echo $_SESSION['succes_sponsor'] . '<br /><br />' ;
}


require('../controller/sponsor/sponsor_affichage.php');
?>



<?php require('../inc/footer.php'); 
}else{
    header('Location: ./index.html.php');

}
?>
