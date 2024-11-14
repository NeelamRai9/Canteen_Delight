<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


require 'config.php';

require '../phpMailer/src/Exception.php';
require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';

// Establish the database connection
$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



function generateResetToken($email) {
    $token = bin2hex(random_bytes(32)); // Generate a random token
    $expirationTime = time() + 3600; // Token is valid for 1 hour
    // Store the token, email, and expiration time in your database for verification

    return $token;
}

function sendPasswordResetEmail($email, $resetToken, $smtpHost = null, $smtpUsername = null, $smtpPassword = null, $smtpPort = null, $fromEmail = null, $fromName = null) {
    // Create a PHPMailer instance
    $mail = new PHPMailer(true); // Enable exceptions

    // Enable SMTP debugging
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = function ($str, $level) {
        echo $str;
    };

    // SMTP configuration
    $mail->isSMTP();
    if ($smtpHost !== null) {
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = $smtpPort;
    }

    // Email settings
    if ($fromEmail !== null && $fromName !== null) {
        $mail->setFrom($fromEmail, $fromName);
    }
    $mail->addAddress($email);
    $mail->Subject = "Password Reset Request";
    $mail->Body = "You have requested a password reset. Click the link below to reset your password:\n\n" . getResetLink($resetToken);

    return $mail->send();
}


function getResetLink($token) {
    return "https://example.com/reset_password.php?token=" . $token;
}

function resetPasswordWithToken($token, $newPassword) {
    // Verify the token and reset the password
    // You should implement the logic to validate the token and update the password in your database
    // Return true on success and an error message on failure
    return true; // Replace with your actual implementation
}

function checkEmailExists($email) {
    // Implement your database query to check if the email exists
    global $conn; // Assuming you have a database connection in your code

    $checkEmailQuery = "SELECT email FROM users WHERE email = ?";
    $checkStmt = $conn->prepare($checkEmailQuery);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    return $checkResult->num_rows === 1;
}
?>
