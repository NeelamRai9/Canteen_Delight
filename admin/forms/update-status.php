<?php
require_once('config.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve reservation ID and status from the POST data
    $reservationId = $_POST['reservationId'];
    $status = $_POST['status'];

    // Create a connection to the database
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL update statement
    $stmt = $conn->prepare("UPDATE Reservation SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $reservationId);
    $stmt->execute();

    // Check for success
    if ($stmt->affected_rows > 0) {
        // Success
        echo json_encode(['success' => true]);
    } else {
        // Error
        echo json_encode(['success' => false, 'error' => 'Failed to update status']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid request method']);
}
?>
