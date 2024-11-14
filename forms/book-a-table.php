<?php
require_once('config.php');

// Function to sanitize and validate form data
function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Function to extract order details from the message
function extractOrderDetails($message) {
    $message = str_replace('--- Order Details ---', '', $message);

    $pattern = '/([a-zA-Z\s]+) x(\d+) - Nu (\d+(\.\d{2})?)/';
    preg_match_all($pattern, $message, $matches, PREG_SET_ORDER);

    $orderDetails = "";
    foreach ($matches as $match) {
        $itemName = $match[1];
        $quantity = $match[2];

        $orderDetails .= $itemName . " x" . $quantity . " ( ) " . "\n";
    }

    return $orderDetails;
}

// Function to extract total price from the message
function extractTotalPrice($message) {
    $pattern = '/Total: Nu (\d+(\.\d{2})?)/';
    preg_match($pattern, $message, $matches);

    return isset($matches[1]) ? floatval($matches[1]) : null;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a connection
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and validate form data
    $name = sanitizeInput($_POST["name"]);
    $phone = sanitizeInput($_POST["phone"]);
    $date = sanitizeInput($_POST["date"]);
    $time = sanitizeInput($_POST["time"]);
    $people = isset($_POST["people"]) ? intval($_POST["people"]) : null;
    $reservationType = sanitizeInput($_POST["reservation-type"]);
    $message = sanitizeInput($_POST["message"]);

    // Extract Order Details and Total Price
    $orderDetails = extractOrderDetails($message);
    $totalPrice = extractTotalPrice($message);
  // Prepare and execute SQL query
  $stmt = $conn->prepare("INSERT INTO Reservation (name, phone, reservation_date, reservation_time, num_people, reservation_type, total_price) VALUES (?, ?, ?, ?, ?, ?, ?)");

  // Check if the statement is prepared successfully
  if ($stmt) {
      // Use bind_param for all types except order_message
      $stmt->bind_param("ssssisd", $name, $phone, $date, $time, $people, $reservationType, $totalPrice);

      // Execute the statement
      $stmt->execute();

      // Get the last inserted ID
      $reservationId = $stmt->insert_id;

      // Update the order_message column
      $updateStmt = $conn->prepare("UPDATE Reservation SET order_message = ? WHERE id = ?");
      if ($updateStmt) {
          $updateStmt->bind_param("si", $orderDetails, $reservationId);
          $updateStmt->execute();
          $updateStmt->close();
      } else {
          echo "Error preparing update statement";
      }

      // Check for errors during execution
      if ($stmt->errno) {
          echo "Error during execution: " . $stmt->error;
      } else {
          // Return success message to AJAX call
          echo "success";
      }

      // Close the statement
      $stmt->close();
  } else {
      // Handle the case where the statement preparation fails
      echo "Error preparing statement";
  }

  // Close the database connection
  $conn->close();

  exit();
}
?>
