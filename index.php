<?php 
$title = "Accueil";
require "BECODDI/entete.php";
?>
<link rel="stylesheet" href="index.css">
<section id="presentation">
    <div class="txt">
    <P>Fondée en 2023, BECDD-International est une entreprise pionnière dans le domaine de la gestion environnementale et du développement durable. Basée à Ouagadougou, Burkina Faso.</P>
        <button class="btn"><a href="BECODDI/inscription.php#inscription_">Découvrir</a></button>
    </div>

    <div class="present">
        <img src="images/teledetection.jpg" alt="Car Image">
    </div>
</section>

<section id="ilus_panne">
    <p class="pa">Quelques-uns de nos Services ?</p>
</section>

<section id="service">
    <div class="card">
        <div id="col"></div>
        <h2>Agroalimentaire</h2>
        <img src="images/rse agro.webp" alt="">
        <button><a href="BECODDI/inscription.php#inscription_">Voir plus</a></button>
    </div>

    <div class="card">
        <div id="col"></div>
        <h2>Télédétection</h2>
        <img src="images/teledetection4.jpg" alt="">
        <button><a href="BECODDI/inscription.php#inscription_">Voir plus</a></button>
    </div>

    <div class="card">
        <div id="col"></div>
        <h2>Géophysique</h2>
        <img src="images/geophysique.JPG" alt="">
        <button><a href="BECODDI/inscription.php#inscription_">Voir plus</a></button>
    </div>

    <div class="card">
        <div id="col"></div>
        <h2>Hydro-agricoles</h2>
        <img src="images/irrigation-19.jpg" alt="">
        <button><a href="BECODDI/inscription.php#inscription_">Voir plus</a></button>
    </div>
</section>

<section id="consultation">
    <div class="para"><p>Nous contacter ?</p></div>

    <div class="consult">
        <form method="post" action="BECODDI/consultatio_mail.php">
            <input type="text" name="name" id="name" class="nom" placeholder="Nom" required>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            <input type="email" name="mail" id="mail" placeholder="Adresse e-mail" required>
            <textarea name="message" id="message" placeholder="Message" required></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</section>

<section id="exploit">
    <div class="para"><p>Nos Exploits ?</p></div>
  
    <div class="ima">
        <div id="col"></div>
        <h2>Satisfait</h2>
        <img src="images/Agroalimentaire_preview.jpg" alt="">
    </div>

    <div class="ima">
        <div id="col"></div>
        <h2>Travailleurs</h2>
        <img src="images/environnement.jpg" alt="">
    </div>
</section>

<?php
// Gestion des popups de succès ou d'erreur
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
?>

<!-- Styles pour les popups -->
<style>
    /* Style de la fenêtre popup de fond */
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
        background-color: #28a745;
        color: white;
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

<?php 
require "BECODDI/pie.php";
?>
