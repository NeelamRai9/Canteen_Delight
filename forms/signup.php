<?php
session_start(); // Start the PHP session


// Function to handle the sign-up and sign-in process
function processForm($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // Validate form data
                if (isset($_POST['sign-up'])) {
                    // Get user input from the sign-up form
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

                    // Check if the OTP is set in both $_POST and $_SESSION
                    if (isset($_POST['otp']) && isset($_SESSION['otp'])) {
                        $otp = $_POST['otp'];

                        // Verify the OTP
                        if ($otp !== $_SESSION['otp']) {
                            echo '<script>alert("Invalid OTP. Please try again.!");window.location.href = "index.php";</script>';
                            exit();
                        }
                    } else {
                        // $response = array("success" => false, "message" => "OTP not provided. Please generate an OTP.");
                        // echo json_encode($response);
                        echo '<script>alert("OTP not provided. Please generate an OTP.!");window.location.href = "index.php";</script>';
                        exit();
                    }

                    // Check if the username is already taken
                    $checkUsernameQuery = "SELECT username FROM users WHERE username = ?";
                    $checkStmt = $conn->prepare($checkUsernameQuery);
                    $checkStmt->bind_param("s", $username);
                    $checkStmt->execute();
                    $checkResult = $checkStmt->get_result();

                    // Check if the email is already taken
                    $checkEmailQuery = "SELECT email FROM users WHERE email = ?";
                    $checkEmailStmt = $conn->prepare($checkEmailQuery);
                    $checkEmailStmt->bind_param("s", $email);
                    $checkEmailStmt->execute();
                    $checkEmailResult = $checkEmailStmt->get_result();

                    if ($checkResult->num_rows > 0) {
                        
                        echo '<script>alert("Username is already taken. Please try again.!");window.location.href = "index.php";</script>';
                    } elseif ($checkEmailResult->num_rows > 0) {
                        
                        echo '<script>alert("Email is already registered. Please enter different email.!");window.location.href = "index.php";</script>';
                    } else {
                        // Insert user data into the database
                        $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($insertQuery);
                        $stmt->bind_param("sss", $username, $email, $password);

                        if ($stmt->execute()) {
                            // After successful login for a regular user
                            $_SESSION['user'] = $stmt->insert_id;
                            header("Location: /home.php"); // Redirect to home.php
                            exit();
                        } else {
                            throw new Exception("Error: " . $stmt->error);
                        }
                    }

                } elseif (isset($_POST['sign-in'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // Check if the user is an admin
                    $adminSql = "SELECT id,username, email, password FROM admin WHERE email = ?";
                    $adminStmt = $conn->prepare($adminSql);
                    $adminStmt->bind_param("s", $email);

                    if ($adminStmt->execute()) {
                        $adminResult = $adminStmt->get_result();
                        if ($adminResult->num_rows === 1) {
                            $adminRow = $adminResult->fetch_assoc();
                            // Check if the plain text password matches
                            if ($password === $adminRow['password']) {
                                // After successful login for an admin
                                $_SESSION['admin'] = $adminRow['id']; // Use the appropriate identifier for admin
                                header("Location: /admin/index.php"); // Redirect to admin/index.php
                                exit();
                            } else {
                                
                                echo '<script>alert("Invalid password. Please try again.!");window.location.href = "index.php";</script>';
                            }
                        } else {
                            // If not an admin, check if it's a regular user
                            $userSql = "SELECT id, email, password FROM users WHERE email = ?";
                            $userStmt = $conn->prepare($userSql);
                            $userStmt->bind_param("s", $email);

                            if ($userStmt->execute()) {
                                $userResult = $userStmt->get_result();
                                if ($userResult->num_rows === 1) {
                                    $userRow = $userResult->fetch_assoc();
                                    if (password_verify($password, $userRow['password'])) {
                                        // After successful login for a regular user
                                        $_SESSION['user'] = $userRow['id']; // Use the appropriate identifier for user
                                        header("Location: /home.php"); // Redirect to home.php
                                        exit();
                                    } else {
                                        echo '<script>alert("Invalid password. Please try again.!");window.location.href = "../index.php";</script>';
                                    }
                                } else {
                                    
                                    echo '<script>alert("User not found. Please sign up.!");window.location.href = "../index.php";</script>';
                                }
                            } else {
                                throw new Exception("Error: " . $userStmt->error);
                            }
                        }
                    } else {
                        throw new Exception("Error: " . $adminStmt->error);
                    }

                }
        } catch (Exception $e) {
            // Handle exceptions here
            $escapedMessage = array("success" => false, "message" => "Error: " . htmlspecialchars($e->getMessage()));
            echo json_encode($escapedMessage);
        }
    }
}

require 'config.php';

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    $response = array("success" => false, "message" => "Connection failed: " . $conn->connect_error);
    echo json_encode($response);
    exit();
}

// Call the processForm function to handle sign-up and sign-in
processForm($conn);

// Close the database connection
if (isset($stmt)) {
    $stmt->close();
}

if (isset($checkStmt)) {
    $checkStmt->close();
}

$conn->close();
?>
