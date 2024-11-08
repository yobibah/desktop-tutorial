<?php 
session_start();
require_once "verification_valable.php";

// Empêcher l'accès à la page si l'utilisateur est déjà connecté
if (isset($_SESSION["id_users"])) {
    header("Location: ../apres_con.php");
    exit();
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_auto;charset=utf8', 'root', ''); 
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Vérifier si le formulaire est soumis
if (isset($_POST["connexion"])) {
    $email = $_POST["email"];
    $mdp = $_POST["pass"]; 

    if (_verification_mails($email)) {
        $requete = $bdd->prepare("SELECT * FROM users WHERE email = :email AND mdp = :mdp");
        $requete->execute([
            ':email' => $email,
            ':mdp' => $mdp
        ]);
        
        $user = $requete->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $_SESSION["id_users"] = $user["id"];
            $_SESSION["nom"] = $user["nom"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["telephone"] = $user["telephone"];
            $_SESSION["mdp"] = $user["mdp"];
            
            header("Location: ../apres_con.php"); // Rediriger après connexion
            echo "<script type=\"text/javascript\"> alert('vous ete connecter')";
            exit();
        } else {
            echo "Erreur de connexion : email ou mot de passe incorrect.";
        }
    } else {
        echo "Erreur de vérification : email non valide.";
    }
}
?>

<!-- Formulaire de connexion -->
<form method="post" action="connexion.php">
    <input type="email" id="email" name="email" required placeholder="email">
    <input type="password" id="pass" name="pass" required placeholder="mots de passes">
    <div class="connexion">
        <p><a href="inscription.php">s'inscrire</a></p>
    </div>
    <input type="submit" name="connexion" value="connexion">
</form>
