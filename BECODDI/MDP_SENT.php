<?php
session_start(); // N'oublie pas d'initialiser la session
require_once "verification_valable.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Vérification si le formulaire a été envoyé
if (isset($_POST['envoyer'])) {
    $email = htmlspecialchars($_POST['mail']);

    // Vérification de la validité de l'email
    if (_verification_mails($email)) {
        try {
            // Connexion à la base de données
            $bdd = new PDO('mysql:host=localhost;dbname=site_auto;charset=utf8', 'root', ''); 
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête pour chercher l'utilisateur
            $requete = $bdd->prepare("SELECT * FROM users WHERE email = :email ");
            $requete->execute([':email' => $email]);

            // Récupérer l'utilisateur
            $user = $requete->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Si l'utilisateur est trouvé, on met à jour la session
                $_SESSION["id_users"] = $user["id"];
                $_SESSION["nom"] = $user["nom"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["telephone"] = $user["telephone"];
                $_SESSION["mdp"] = $user["mdp"];

                // Rediriger après la connexion
                header("Location: ../apres_con.php"); 
                exit();
            }

        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            exit();
        }
    }

    // Si l'email correspond à celui en session
    if (isset($_SESSION["email"]) && $email == $_SESSION["email"]) {
        // Créer le message HTML
        $message = "<div style='font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6; background-color: green; color:white; padding: 20px; '>
                    <p style='background-color: #f9f9f9; padding: 10px; border-radius: 5px;'>"
                    . htmlspecialchars($_SESSION["mdp"]) . "</p>
                    </div>";

        // Inclure la bibliothèque PHPMailer


        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'ckprod7295@gmail.com';                    
            $mail->Password   = 'dxclrvkugoqiqdly';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                 

            // Destinataires
            $mail->setFrom('from@example.com', 'Support'); // Remplacer 'from@example.com' par un email valide
            $mail->addAddress($_SESSION["email"]);     

            // Contenu de l'email
            $mail->isHTML(true);                                  
            $mail->Subject = 'Récupération du mot de passe';
            $mail->Body    = $message;
            $mail->AltBody = strip_tags($message); // Alternative en texte brut pour les clients mail qui ne supportent pas le HTML

            // Envoi de l'email
            $mail->send();
            header('Location: connexion.php?success=1');
            exit();

        } catch (Exception $e) {
            // En cas d'erreur d'envoi, rediriger avec un message d'erreur
            header('Location: MDP_FORG.php?error=1');
            exit();
        }
    }
}
?>
