Projet Festival dans le cadre du CDA : https://www.montpellier-meilleur-ville.site

BDD format sql à mettre dans votre BDD en local ou en ligne

Pour la connexion à la BDD, rajoutez un fichier bdd.php dans le dossier connexionBdd et remplacer les X par vos informations :

$utilisateur = "X";
$mdp = "X";
$bdd = new PDO('mysql:host=X.mysql.db;dbname=X', $utilisateur, $mdp);
$bdd->exec('SET NAMES utf8');
