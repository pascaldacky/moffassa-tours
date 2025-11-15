<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mail = new PHPMailer(true);
    try {
        $mail->setFrom('moffassa@travellers.co.tz', '');
        $mail->addAddress('recipient@example.com');
        $mail->Subject = 'MOffassa Travellers';
        $mail->Body = "New subscriber: $email";
        $mail->send();
        echo "Subscription successful!";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
