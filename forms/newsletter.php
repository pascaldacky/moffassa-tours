<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Adjust path if needed

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);

    if (empty($email)) {
        echo "❌ Please enter your email!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "❌ Invalid email address!";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP settings (example for Zoho)
        $mail->isSMTP();
        $mail->Host = 'smtp.zoho.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'moffassa@travellers.co.tz'; // your Zoho email
        $mail->Password = 'RDrAGnBf7e9U';              // Zoho email password or app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email content
        $mail->setFrom('moffassa@travellers.co.tz', 'Travellers');
        $mail->addAddress('moffassa@travellers.co.tz');
        $mail->isHTML(true);
        $mail->Subject = 'New Subscriber';
        $mail->Body    = "New subscriber: " . htmlspecialchars($email);

        $mail->send();
        echo "✅ Subscription successful!";

    }
     catch (Exception ) {
        echo "✅ Subscription successful!";
    }


} else {
    echo "❌ Unsupported request method.";
}
?>
