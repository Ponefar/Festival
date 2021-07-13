<?php 
session_start();
require('../inc/header.php'); 
?>

<?php
if(isset($_SESSION)){
    if(($_SESSION['nom']) === "adminCdaWis"){
    ?>
    <p>Inscription d'un personne : </p>
    <form action="../controller/users/inscription.php" method="POST">
        <input type="text" name="nom" placeholder="nom">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_verif" placeholder="Confirmation du Mot de passe">
        <input type="submit" name="submit" value="Valider l'inscription">
    </form>
    
    <?php
    if(isset($_SESSION['succes_inscription'])){
        echo $_SESSION['succes_inscription'] . '<br /><br />' ;
    }

    require('../controller/users/users_affichage.php');

    }else{
        header('Location: ./index.html.php');
    }
}else{
    header('Location: ./index.html.php');
}


?>