<?php
session_start();
$nav = "consultation";
$title = "consultation";
require "en_teteco.php";


echo '<link rel="stylesheet" href="../css/inscription.css">';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_auto;charset=utf8', 'root', ''); 
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}
$requete = $bdd->prepare('SELECT * FROM users WHERE nom = :nom AND email = :email');
$requete->bindParam(':nom', $_SESSION['nom']);
$requete->bindParam(':email', $_SESSION['email']);
$requete->execute();
$resulta = $requete->fetch(PDO::FETCH_ASSOC);

if ($resulta) {
    echo '<form method="post" action="envoil_mail.php">';
    echo '<input type="text" name="nom" placeholder="Nom" value="' . htmlspecialchars($resulta['nom']) . '">';
    echo '<input type="email" name="email" placeholder="Email" value="' . htmlspecialchars($resulta['email']) . '">';
    echo '<input type="tel" name="telephone" placeholder="Téléphone" value="' . htmlspecialchars($resulta['telephone']) . '">';
    echo '<textarea name="message" id="message" placeholder="Message" required></textarea>';

    
    echo '<fieldset><legend>Choix de(s) service(s) :</legend>';
    $services = [
        "Montage gestion et suivi évaluation de projets",
        "Appui-conseils/assistance technique",
        "Etudes",
        "Formation",
        "Production",
        "Agriculture",
        "Sécurité alimentaire et nutritionnelle",
        "Agroalimentaire et génie industrielle",
        "Environnement et développement durable",
        "Eau, hygiène et assainissement",
        "Aménagements hydro-agricoles et CES/DRS",
        "Gestion des risques de catastrophe",
        "Télédétection",
        "Géophysique",
        "Système d'information géographique (SIG)"

    ];
    foreach ($services as $service) {
        echo '<label><input type="checkbox" name="choix[]" value="' . $service . '">' . $service . '</label><br>';
    }
    echo '</fieldset>';
   echo'  <input type="file" name="fichier" id="fichier" placeholder="Insérez un fichier (optionnel)">';
    echo '<input type="submit" name="connexion" value="Envoyer">';
echo '</form>';
  
} else {
    echo 'Utilisateur non trouvé.';
}
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "
    <div class='popup' id='popupSuccess'>
        <div class='popup-content'>
            <h2>Message envoyé avec succès !</h2>
            <p>Votre message a été envoyé. Nous vous répondrons dans les plus brefs délais.</p>
            <button onclick='closePopup()'>Fermer</button>
        </div>
    </div>
    <script>
        document.getElementById('popupSuccess').style.display = 'block';
        function closePopup() {
            document.getElementById('popupSuccess').style.display = 'none';
        }
    </script>";
} elseif (isset($_GET['error']) && $_GET['error'] == 1) {
    echo "
    <div class='popup' id='popupError'>
        <div class='popup-content'>
            <h2>Une erreur s'est produite</h2>
            <p>Il y a eu un problème lors de l'envoi de votre message. Veuillez réessayer.</p>
            <button onclick='closePopup()'>Fermer</button>
        </div>
    </div>
    <script>
        document.getElementById('popupError').style.display = 'block';
        function closePopup() {
            document.getElementById('popupError').style.display = 'none';
        }
    </script>";
}

// Styles globaux du popup
echo "
<style>

    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    /* Contenu de la popup avec animation */
    .popup-content {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        text-align: center;
        max-width: 400px;
        margin: 0 auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        opacity: 0;  /* Départ invisible */
        transform: scale(0.8); /* Départ avec une échelle réduite */
        animation: popupAnimation 0.5s forwards; /* Animation lors de l'apparition */
    }

    /* Définition de l'animation pour le popup */
    @keyframes popupAnimation {
        0% {
            opacity: 0;
            transform: scale(0.8);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Style du titre dans la popup */
    .popup-content h2 {
        font-size: 24px;
        color: #333;
    }

    /* Style du texte de la popup */
    .popup-content p {
        font-size: 16px;
        color: #555;
    }

    /* Style du bouton de la popup */
    .popup-content button {
        background-color: #87B1DB;
        color: rgb(0, 0, 0);
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease; /* Animation lors du hover */
    }

    /* Effet de hover sur le bouton */
    .popup-content button:hover {
        background-color: #218838;
    }

    /* Animation de fermeture du popup */
    .popup.fadeOut {
        animation: fadeOut 0.3s forwards;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
</style>

";

require "pied.php";
?>
