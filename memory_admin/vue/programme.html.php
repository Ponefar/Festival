<?php 
session_start();

if(isset($_SESSION['id'])){
require('../inc/header.php'); ?>

<form method="POST" action="../controller/programme/programme.php" enctype="multipart/form-data">
    <input type="text" name="nom_artiste" placeholder="nom_artiste">

    <select name="nom_scene" id="">
        <option value="Scene 1">Scene 1</option>    
        <option value="Scene 2">Scene 2</option>    
        <option value="Scene 3">Scene 3</option>    
        <option value="Scene 4">Scene 4</option>    
        <option value="Scene 5">Scene 5</option>    
    </select>

    <input type="datetime-local" name="datetime_local" >
    <input type="time" name="heure_fin">
    <select name="type_rap" id="">
        <option value="Rap Cloud">Rap Cloud</option>    
        <option value="Rap Chanté">Rap Chanté</option>    
        <option value="Rap HardCore">Rap HardCore</option>    
        <option value="Rap Ancien">Rap Ancien</option>    
        <option value="D-J">DJ</option>    
    </select>
    <input type="file" name="image_programme" >
    <input type="submit" name="submit" value="Envoyer">
</form><br />

<?php 
if(isset($_SESSION['succes_programme'])){
    echo $_SESSION['succes_programme'] . '<br /><br />' ;
}


require('../controller/programme/programme_affichage.php');
?>



<?php require('../inc/footer.php'); 
}else{
    header('Location: ./index.html.php');

}
?>
