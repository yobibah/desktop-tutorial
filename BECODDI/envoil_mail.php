<?php
$nom = $_POST['nom'];
$email = $_POST['email'];
$message = $_POST['message'];
$telephone = $_POST['telephone'];
$fichier = $_POST['fichier'];
$choix = isset($_POST['choix']) ? implode(", ", $_POST['choix']) : 'Aucun choix';

$message = 
           "Message : " . htmlspecialchars($message) . "\n<br>" . 
           

$message = "<div style='font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6; background-color: green; color:white; padding: 20px; '>
<p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>
<p><strongstyle='color: #ffff; >Email :</strong> " . htmlspecialchars($email) . "</p>
<p><strong>Choix :</strong> " . htmlspecialchars($choix) . "</p>
<p><strong>Message :</strong></p>
<p style='background-color: #f9f9f9; padding: 10px; border-radius: 5px;'>" . htmlspecialchars($message) . "</p>
</div>";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Paramètres du serveur                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'ckprod7295@gmail.com';                    
    $mail->Password   = 'dxclrvkugoqiqdly';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                 

    // Destinataires
    $mail->setFrom('from@example.com', $email);
    $mail->addAddress('beccodi30@gmail.com');     

    // Ajout de pièce jointe
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == UPLOAD_ERR_OK) {
        $mail->addAttachment($_FILES['fichier']['tmp_name'], $_FILES['fichier']['name']);
    }

    // Contenu de l'email
    $mail->isHTML(true);                                  
    $mail->Subject = 'Nouvelle consultation';
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message); // Alternative plain text for non-HTML mail clients

    $mail->send();
    header('Location: consultation.php?success=1');
    exit();
} catch (Exception $e) {
    // En cas d'erreur, rediriger avec un message d'erreur
    header('Location: consultation.php?error=1');
    exit();
}
   
