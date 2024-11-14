<?php
require_once('config.php');

// Establish a database connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch menu data from the database
$sql = "SELECT * FROM Menu";
$result = $conn->query($sql);

$menuItems = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the menu data as JSON
header('Content-Type: application/json');
echo json_encode($menuItems);
?>
