<?php
// insert_menu.php

// Assuming you have a database connection established
// Common database connection details
$hostname = '127.0.0.1:8080';
$username = 'root';
$password = 'beamirrorbro13';
$dbname = 'mydb';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $ingredients = $_POST['ingredients'];

    // Insert data into the database (customize this according to your database structure)
    // Example using mysqli:
    $conn = new mysqli('hostname', 'username', 'password', 'mydb');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        // Process the form data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productName = $_POST['productName'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $ingredients = $_POST['ingredients'];

        // Upload the image file (you may need to implement this based on your requirements)

        // Insert data into the database
        $sql = "INSERT INTO Menu (productName, category, price, ingredients, productImage) VALUES ('$productName', '$category', $price, '$ingredients', '$productImage')";

        if (mysqli_query($conn, $sql)) {
            echo 'Menu item added successfully';
        } else {
            echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
        }
    }


    $conn->close();
}
?>
