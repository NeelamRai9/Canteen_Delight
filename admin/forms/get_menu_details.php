<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "127.0.0.1:8080";
$username = "root";
$password = "beamirrorbro13";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID is provided in the request
if (isset($_POST['id'])) {
    $menuId = $_POST['id'];

    // Fetch menu details from the database
    $sql = "SELECT * FROM Menu WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $menuId);
    $stmt->execute();

    // Fetch the menu details as an associative array
    $result = $stmt->get_result();
    $menuDetails = $result->fetch_assoc();

    // Return the menu details as JSON with a success flag
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'menuDetails' => $menuDetails]);
} else {
    // If no ID is provided, return an error or handle it as needed
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Menu ID not provided.']);
}

$conn->close();

?>
