<?php 
require_once "verification_valable.php";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_auto;charset=utf8', 'root', ''); 
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    exit();
}

if (isset($_POST["connexion"])) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $mdp =$_POST["pass"]; 

    if (_verification_mails($email)) {
        $requete= $bdd ->prepare("SELECT * FROM users");
        $resulta = $requete -> execute();
        $resultat = $requete -> fetchAll();
        if (count($resultat) > 0) {
            foreach ($resultat as $key => $value) {
                if ($value["email"] == $email) {
                    header("Location: inscription.php");
                    echo  '<p style="color:red; background-color:yellow; margin-top:17%; z-index: 99;">email existant </p>';
                    exit();
                }
            }
        }
        $requete = $bdd->prepare("INSERT INTO users (nom, email, telephone, mdp) VALUES (:nom, :email, :telephone, :mdp)");
        $resulta = $requete->execute([
            "nom" => $nom,
            "email" => $email,
            "telephone" => $telephone,
            "mdp" => $mdp
        ]);

        if ($resulta) {
            header("Location: connexion.php");
            echo "inscription reussi vous pouvez vous connecter.";
        } else {
            echo "Error in registration.";
        }
    } else {
        echo "Invalid email.";
    }
}
?>