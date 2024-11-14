<?php
require_once('config.php');

// Check if reservationId is provided in the POST request
if(isset($_POST['reservationId'])) {
    // Sanitize the input
    $reservationId = intval($_POST['reservationId']);

    // Create a connection
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the reservation
    $deleteSql = "DELETE FROM Reservation WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("i", $reservationId);

        // Execute the statement
        $stmt->execute();

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing delete statement";
    }

    // Close the database connection
    $conn->close();

    // Return success message to AJAX call
    echo "success";
} else {
    // If reservationId is not provided
    echo "Reservation ID not provided";
}
?>
