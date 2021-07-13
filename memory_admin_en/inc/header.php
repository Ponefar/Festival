<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Festival - Admin </title>
  <link rel="stylesheet" href="../inc/style.css">
  <script src="script.js"></script>
</head>
<body>
   <div class="langue"><div>Anglais</div><div>Anglais</div><div>Anglais</div><div>Anglais</div></div> 
    <ul>
        <li><a href="../vue/index.html.php">Accueil</a></li>
        <?php 
        if(isset($_SESSION['id'])){
        ?>
          <li><a href="../vue/message_important_fr.html.php">Message important</a></li>
          <li><a href="../vue/information_faq.html.php">Information Pratiques et FAQ</a></li>
          <li><a href="../vue/information.html.php">Informations</a></li>

          
        <?php if($_SESSION['nom'] == "adrien"){
        ?>
        <?php } ?>
          <li><a href="../connexion_bdd/deconnexion.php">Déconnexion</a></li>
          <li><a href="../../memory_admin/vue/index.html.php">Français</a></li>
        <?php } ?>



        <!-- <li><a href="../index.html"></a></li>
        <li><a href="../index.html"></a></li> -->
    </ul>