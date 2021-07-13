<?php 
session_start();
require('../../connexion_bdd/bdd.php');

$erreur = 0;

if(isset($_POST['submit'])){
    $nom = $_POST['nom'] ;
    $password = $_POST['password'] ;
       
    if(empty($nom)){
        $erreur = "Nom vide ! Merci de remplir de champ " ;
        $_SESSION['succes_connexion'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/index.html.php');
    }
    if(empty($password) && $erreur == 0){
        $erreur = "Mot de passe vide ! Merci de remplir de champ " ;
        $_SESSION['succes_connexion'] = $erreur; 
        $erreur = 1; 
        header('Location: ../../vue/index.html.php');
    }

    if($erreur == 0){
        $req1 = $bdd->prepare('SELECT * FROM usersfestival WHERE nom = :nom');
        $req1->execute(array(
            "nom" => $nom
        ));
        $count_req1 = $req1->rowCount();
        if($count_req1 >= 1){
            while($a = $req1->fetch()){
                if(($a['passeword'] == md5($password))){
                    $erreur = "" ;
                    $_SESSION['succes_connexion'] = $erreur; 
                    $erreur = 1; 
                        $_SESSION['nom'] = $a['nom'];
                        $_SESSION['passeword'] = $a['passeword'];
                        $_SESSION['id'] = $a['id'];
                        header('Location: ../../vue/index.html.php');
                }else{
                    $erreur = "Nom ou Mot de passe incorrect ! Veuillez rééssayez " ;
                    $_SESSION['succes_connexion'] = $erreur; 
                    $erreur = 1; 
                    header('Location: ../../vue/index.html.php');
                }
            }
        }else{
                $erreur = "Nom ou Mot de passe incorrect ! Veuillez rééssayez " ;
                $_SESSION['succes_connexion'] = $erreur; 
                $erreur = 1; 
                header('Location: ../../vue/index.html.php');
            }
        
        
    }
}else{
    Header('Location: ../vue/index.html.php');
}

?>