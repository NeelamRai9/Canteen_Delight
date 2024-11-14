<?php
// Include your database configuration file
require_once('config.php');

// Check if the ID parameter is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Establish a connection to the database
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to delete the menu item
    $sql = "DELETE FROM Menu WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // If deletion is successful, send a success response
        echo json_encode(['success' => true]);
    } else {
        // If an error occurs, send an error response
        echo json_encode(['error' => 'Failed to delete menu item']);
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // If ID parameter is not provided, send an error response
    echo json_encode(['error' => 'ID not provided']);
}
?>
