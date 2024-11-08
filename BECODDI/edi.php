<?php
session_start();
$nav = "consultation";
$title = "consultation";
require "en_teteco.php";



echo '<link rel="stylesheet" href="../css/inscription.css">';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_auto;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}


$requete = $bdd->prepare('SELECT * FROM users WHERE nom = :nom AND email = :email');
$requete->bindParam(':nom', $_SESSION['nom']);
$requete->bindParam(':email', $_SESSION['email']);
$requete->execute();
$resulta = $requete->fetch(PDO::FETCH_ASSOC);

if ($resulta) {

echo '<form method="post" action="retraitement.php">';
echo '<input type="text" name="nom" placeholder="Nom" value="' . htmlspecialchars($resulta['nom']) . '">';
echo '<input type="email" name="email" placeholder="Email" value="' . htmlspecialchars($resulta['email']) . '">';
echo '<input type="tel" name="telephone" placeholder="Téléphone" value="' . htmlspecialchars($resulta['telephone']) . '">';
echo '<input type="password" name="mdp" placeholder="Mot de passe" value="' . htmlspecialchars($resulta['mdp']) . '">'; // Changement type="password"
echo '<input type="hidden" name="id" value="' . htmlspecialchars($resulta['id_users']) . '">';
echo '<input type="submit" name="connexion" value="Modifier">';
echo '</form>';
} else {
    echo 'utilisateur non trouver.';
}


require "pied.php";
?>

