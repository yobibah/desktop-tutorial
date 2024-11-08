<?php
$title = 'profile'; 
$nav="profil";
session_start();
require "en_teteco.php";

echo '<link rel="stylesheet" href="../css/profil.css">';
try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_auto;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    exit();
}

$requete = $bdd ->prepare('SELECT * FROM users WHERE nom = :nom AND email = :email');
$requete -> bindParam(':nom',$_SESSION['nom']);
$requete -> bindParam(':email',$_SESSION['email']);
$requete -> execute();
$resultat = $requete -> fetch();   

if ($resultat) {
    echo '<div class="profil">';
    echo '<img src="../images/user-3297.svg" alt="">';
    echo "<p> Nom : " . $resultat['nom'] . "</p>";
    echo "<p> Email : " . $resultat['email'] . "</p>";
    echo "<p> Telephone : " . $resultat['telephone'] . "</p>";
    echo '<div class="btn1">';
    echo '<p><a href="deconnexion.php">deconnexion</a> </p>';
    echo '</div>';

    echo '<div class="btn2">';
    echo '<p><a href="edi.php">Editer</a> </p>';
    echo '</div>';
    echo '</div>';
}
require "pied.php";
?>