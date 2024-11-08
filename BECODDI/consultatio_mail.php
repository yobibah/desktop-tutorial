<?php
$nom = $_POST['name'];
$email = $_POST['mail'];
$message = $_POST['message'];
$prenom = $_POST['prenom'];

$message = 
           "Message : " . htmlspecialchars($message) . "\n<br>" . 
           

$message = "<div style='font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6; background-color: green; color:white; padding: 20px; '>
<p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>
<p><strong>prenom :</strong> " . htmlspecialchars($prenom) . "</p>
<p><strong>email :</strong> " . htmlspecialchars($email) . "</p>
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

    // Contenu de l'email
    $mail->isHTML(true);                                  
    $mail->Subject = 'Nouvelle consultation';
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message); // Alternative plain text for non-HTML mail clients

    $mail->send();
    header('Location: ../index.php?success=1');
    exit();
} catch (Exception $e) {
    // En cas d'erreur, rediriger avec un message d'erreur
    header('Location: ../index.php?error=1');
    exit();
}
