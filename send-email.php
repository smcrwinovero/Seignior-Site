<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'vendor/phpmailer/phpmailer');

use phpmailer\phpmailer\PHPMailer;
use phpmailer\phpmailer\Exception;

// Load PHPMailer classes into the global namespace
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['your-first-name'];
    $email = $_POST['your-email_1'];
    $message = $_POST['your-message'];

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                 // Enable SMTP authentication
        $mail->Username   = 'inoveroweng@gmail.com';   // SMTP username
        $mail->Password   = 'gyoj rehd zisg zhfi';        // SMTP password
        $mail->SMTPSecure = 'tls';                // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                  // TCP port to connect to

        //Recipients
        $mail->setFrom('inoveroweng@gmail.com', 'Mailer');
        $mail->addAddress('inoveroweng@gmail.com', 'Joe User');     // Add a recipient

        // Content
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->Subject = "Message from $name";
        $mail->Body    = "Name: $name\nEmail: $email\nMessage: $message";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>