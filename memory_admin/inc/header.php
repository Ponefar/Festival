<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Festival - Admin </title>
  <link rel="stylesheet" href="../inc/style.css">
  <script src="script.js"></script>
</head>
<body>
<div class="langue"><div>Français</div><div>Français</div><div>Français</div><div>Français</div></div> 

    <ul>
        <li><a href="../vue/index.html.php">Accueil</a></li>
        <?php 
        if(isset($_SESSION['id'])){
        ?>
          <li><a href="../vue/sponsor.html.php">Sponsor</a></li>
          <li><a href="../vue/message_important_fr.html.php">Message important</a></li>
          <li><a href="../vue/information_faq.html.php">Information Pratiques et FAQ</a></li>
          <li><a href="../vue/information.html.php">Informations</a></li>
          <li><a href="../vue/reseau_sociaux.html.php">Réseau Sociaux</a></li>
          <li><a href="../vue/tete_affiche.html.php">Tete Affiche</a></li>
          <li><a href="../vue/programme.html.php">Programme</a></li>

          
        <?php if($_SESSION['nom'] == "adminCdaWis"){
        ?>
          <li><a href="../vue/inscription.html.php">inscrire une personne</a></li>
        <?php } ?>
          <li><a href="../connexion_bdd/deconnexion.php">Déconnexion</a></li>
          <li><a href="../../memory_admin_en/vue/index.html.php">Anglais</a></li>
        <?php } ?>



        <!-- <li><a href="../index.html"></a></li>
        <li><a href="../index.html"></a></li> -->
    </ul>