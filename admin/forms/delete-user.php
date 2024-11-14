<?php
require 'config.php';

// Ensure that the request is a DELETE request
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Get the user ID from the request parameters
    $userId = isset($_GET['id']) ? $_GET['id'] : null;

    if ($userId) {
        // Create a connection to the MySQL database
        $conn = new mysqli($hostname, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            $response = array("success" => false, "message" => "Connection failed: " . $conn->connect_error);
            echo json_encode($response);
            exit();
        }

        // Delete the user from the database
        $deleteQuery = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            $response = array("success" => true, "message" => "User deleted successfully.");
        } else {
            $response = array("success" => false, "message" => "Error deleting user: " . $stmt->error);
        }

        // Close the database connection
        $stmt->close();
        $conn->close();

        // Return the JSON response
        echo json_encode($response);
    }
}
?>
