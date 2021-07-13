<?php 
session_start();
require('../inc/header.php'); 
?>

<?php
if(isset($_SESSION['id'])){
    echo 'Vous êtes connecté';
    echo ' : ' . $_SESSION['nom'];
    ?>
    <p>Modification Mot de passe</p>
    <form action="../controller/users/modifier_mdp.php" method="POST">
        <input type="password" name="password" placeholder="Nouveau Mot de passe">
        <input type="password" name="password_verif" placeholder="Confirmation Nouveau Mot de passe">
        <input type="submit" name="submit_modif" value="Envoyer">
    </form>
        
    <?php 
if(isset($_SESSION['succes_inscription_verif'])){
    echo $_SESSION['succes_inscription_verif'] . '<br /><br />' ;
}
?>


    <?php
}else{
?>

    <p>Connexion</p>
    <form action="../controller/users/connexion.php" method="POST">
        <input type="text" name="nom" placeholder="Nom">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="submit" value="Envoyer">
    </form>
<?php } ?>

<?php 
if(isset($_SESSION['succes_connexion'])){
    echo $_SESSION['succes_connexion'] . '<br /><br />' ;
}
?>

<?php require('../inc/footer.php'); ?>

