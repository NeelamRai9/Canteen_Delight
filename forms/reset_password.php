<?php
require 'config.php';
    // Connect to the database
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_new_password = mysqli_real_escape_string($conn, $_POST['confirm_new_password']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Check if passwords match
    if ($new_password !== $confirm_new_password) {
        echo "Passwords do not match";
        exit;
    }

    // // Connect to the database
    // $conn = new mysqli($hostname, $username, $password, $dbname);

    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // Check if email and token exist and token hasn't expired
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND token=? AND tokenExpire > NOW()");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Hash the password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $stmt = $conn->prepare("UPDATE users SET password=?, token='', tokenExpire=NOW() WHERE email=?");
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo "Password has been reset. You can now log in with your new password.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        echo "Invalid link or the link has expired.";
    }

    $stmt->close();
    $conn->close();
}
?>
