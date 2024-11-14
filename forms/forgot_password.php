<?php
require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manually include the PHPMailer classes
require '../phpMailer/src/Exception.php';
require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';

// Connect to the database
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_POST['forgot-password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(openssl_random_pseudo_bytes(16)); // generates a 32 characters long token

        $stmt = $conn->prepare("UPDATE users SET token=?, tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email=?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = $smtpHost;
                $mail->SMTPAuth   = true;
                $mail->Username   = $smtpUsername;
                $mail->Password   = $smtpPassword;
                $mail->SMTPSecure = 'tls';
                $mail->Port       = $smtpPort;

                //Recipients
                $mail->setFrom('canteendelight@gmail.com', 'Canteen Delight');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Reset your password';
                $mail->Body    = "Click on the link below to reset your password<br><br><a href='localhost/reset_password_html.php?email=$email&token=$token'>Click here to reset your password</a>";

                $mail->send();
                echo 'Reset password link has been sent to your email.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        echo "No user with this email address exists.";
    }

    $stmt->close();
    $conn->close();
}
?>
