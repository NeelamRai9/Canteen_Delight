<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sign-up'])) {
                // Retrieve form data
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        $errors = [];

        // Validate fields
        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            $errors[] = "All fields are required.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        }

        if ($password !== $confirmPassword) {
            $errors[] = "Password and Confirm Password must match.";
        }

        if (empty($errors)) {
            // Validation passed, proceed with user registration logic
            // For example, you can save the user's information to a database here
            // and then redirect the user to a success page
            header("Location: registration_success.php");
            exit();
        } else {
            // Display validation errors
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }

    } elseif (isset($_POST['sign-in'])) {
                 // Retrieve form data

                 $email = $_POST["email"];
                 $password = $_POST["password"];

         
                 $errors = [];
         
                 // Validate fields
                 if ( empty($email) || empty($password)) {
                     $errors[] = "All fields are required.";
                 }
         
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     $errors[] = "Invalid email format.";
                 }
         
                 if (strlen($password) < 8) {
                     $errors[] = "Password must be at least 8 characters long.";
                 }
                 if (empty($errors)) {
                     // Validation passed, proceed with user registration logic
                     // For example, you can save the user's information to a database here
                     // and then redirect the user to a success page
                     header("Location: registration_success.php");
                     exit();
                 } else {
                     // Display validation errors
                     foreach ($errors as $error) {
                         echo $error . "<br>";
                     }
                 }

    }


}
?>

