<?php
session_start(); // Start the PHP session

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require '../phpMailer/src/Exception.php';
require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';
require 'config.php';

function sendOTPByEmail($email, $otp) {
    require 'config.php';
    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to SMTP::DEBUG_SERVER for debugging
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // You can also use 'tls' for TLS encryption
        $mail->Host = $smtpHost;
        $mail->Port = $smtpPort;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;

        // Sender and recipient details
        $mail->setFrom('canteendelight@gmail.com', 'Canteen Delight'); // Replace with your sender details
        $mail->addAddress($email);

        // Email subject and body
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Sign-UP';
        $mail->Body = 'Your OTP for sign-up is: ' . $otp;

        // Send the email
        $mail->send();

        return true; // Email sent successfully
    } catch (Exception $e) {
        // Log the error message for debugging
        error_log('Error sending email: ' . $e->getMessage());

        return false; // Error sending the email
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['email']) && isset($_GET['otp'])) {
    $email = $_GET['email'];
    $otp = $_GET['otp'];

        // Store the OTP in a session variable for later verification
        $_SESSION['otp'] = $otp;

    if (sendOTPByEmail($email, $otp)) {
        error_log('Email sent successfully');
        echo 'success';
    } else {
        error_log('Error sending email');
        echo 'error';
    }
}

?>
