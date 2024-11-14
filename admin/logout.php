<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // Disable the back button to prevent going back to the previous page
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };

        // Redirect using JavaScript after a short delay
        setTimeout(function () {
            window.location.href = "/index.php";
        }, 3000); // Redirect after 3 seconds
    </script>
</head>
<body>
    <p>You have successfully logged out. Redirecting to the signIn or signUp Form page</p>
</body>
</html>
