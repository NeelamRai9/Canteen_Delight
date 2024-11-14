<?php

// Include your database configuration file
require_once('config.php');

// Check if the necessary data is provided in the POST request
if (
    isset($_POST['id']) &&
    isset($_POST['editProductName']) &&
    isset($_POST['editCategory']) &&
    isset($_POST['editPrice']) &&
    isset($_POST['editIngredients'])
) {
    // Assign values to variables
    $id = $_POST['id'];
    $productName = $_POST['editProductName'];
    $category = $_POST['editCategory'];
    $price = $_POST['editPrice'];
    $ingredients = $_POST['editIngredients'];

    // Establish a connection to the database
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to update the menu item
    $sql = "UPDATE Menu SET productName = ?, category = ?, price = ?, ingredients = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $productName, $category, $price, $ingredients, $id);

    if ($stmt->execute()) {
        // If update is successful, send a success response
        echo json_encode(['success' => true]);
    } else {
        // If an error occurs, send an error response
        echo json_encode(['error' => 'Failed to update menu item. ' . $stmt->error]);
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // If necessary data is not provided, send an error response
    echo json_encode(['error' => 'Required data not provided']);
}
?>
