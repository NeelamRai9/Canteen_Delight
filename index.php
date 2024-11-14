<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Delight</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.png" rel="icon">

    <link href="assets/css/singin_login.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

    <div class="cont">
        <form name="signinForm" action="forms/signup.php"  method="post">
            <div class="form sign-in">
                <h2><?php echo htmlspecialchars("Welcome"); ?></h2>
                <label>
                    <span><?php echo htmlspecialchars("Email"); ?></span>
                    <input type="email" name="email" required>
                </label>
                <label>
                    <span><?php echo htmlspecialchars("Password"); ?></span>
                    <input type="password" name="password" required>
                </label>

                <p style="margin-left:38%; margin-top:3%"><a href="forgot_password_html.php"><?php echo htmlspecialchars("Forgot password?"); ?></a></p>

                <br>
                <button type="submit" class="submit" name="sign-in"><?php echo htmlspecialchars("Sign In"); ?></button>
            </div>
        </form>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up row">
                    <h3><?php echo htmlspecialchars("Don't have an account? Please Sign up!"); ?></h3>
                    <div class="col-lg-12 logo me-auto me-lg-0">
                        <a href="#">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="img__text m--in">
                    <h3><?php echo htmlspecialchars("If you already have an account, just sign in."); ?></h3>
                    <div class="col-lg-12 logo me-auto me-lg-0">
                        <a href="#">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="img__btn">
                    <span class="m--up"><?php echo htmlspecialchars("Sign Up"); ?></span>
                    <span class="m--in"><?php echo htmlspecialchars("Sign In"); ?></span>
                </div>
            </div>
            <div style="margin-top:-2%" class="form sign-up">
                <h2><?php echo htmlspecialchars("Create your Account"); ?></h2>
                <form name="myForm" action="forms/signup.php" onsubmit="return validateForm()" method="post">

                    <label for="username"><?php echo htmlspecialchars("Username:"); ?></label>
                    <input type="text" id="username" name="username" required>
                    <div class="error-message"></div>

                    <label for="email"><?php echo htmlspecialchars("Email Address:"); ?></label>
                    <input type="email" id="email" name="email" required>
                    <div class="error-message"></div>

                    <label for="password"><?php echo htmlspecialchars("Password:"); ?></label>
                    <input type="password" id="password" name="password" required>
                    <div class="error-message"></div>

                    <label for="confirmPassword"><?php echo htmlspecialchars("Confirm Password:"); ?></label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                    <div class="error-message"></div>
                    <br>
                    <button style='background-color: azure; border-radius: 2%;' type="button" class="generate-otp" onclick="generateOTP()">
                        <?php echo htmlspecialchars("Generate OTP"); ?>
                    </button>
                    <label for="otp"><?php echo htmlspecialchars("Enter OTP:"); ?></label>
                    <input type="text" id="otp" name="otp" required>
                    <div class="error-message"></div>

                    <br>
                    <button type="submit" class="submit" name="sign-up"><?php echo htmlspecialchars("Sign Up"); ?></button>
                </form>
            </div>
        </div>
    </div>


    <div id="userContent"></div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });


        const userGeneratedContent = "<script>alert('XSS Attack') <" + "/script>";
        const sanitizedContent = escapeHtml(userGeneratedContent);

        // Insert sanitized content into an HTML element
        document.getElementById("userContent").innerHTML = sanitizedContent;

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form[name="myForm"]').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get form data
            const formData = new FormData(this);

            // Send a POST request to the PHP script
            fetch('signup.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Handle the response from the PHP script (e.g., display a success message or an error message)
                document.getElementById('userContent').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
            });


        });

        function validateForm() {
            var username = document.forms["myForm"]["username"].value;
            var email = document.forms["myForm"]["email"].value;
            var password = document.forms["myForm"]["password"].value;
            var confirmPassword = document.forms["myForm"]["confirmPassword"].value;

            var usernameInput = document.getElementById("username");
            var emailInput = document.getElementById("email");
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("confirmPassword");
            var otpInput = document.getElementById("otp").value;
            var otp = localStorage.getItem('otp');

            var isFormValid = true;

            // Check if the username is valid
            if (!validateInput(username, usernameInput)) {
                isFormValid = false;
            }

            // Check if the email is valid
            if (!validateInput(email, emailInput)) {
                isFormValid = false;
            }

            // Check if the password is strong
            if (!validateInput(password, passwordInput)) {
                isFormValid = false;
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                setError(confirmPasswordInput, "Passwords do not match.");
                isFormValid = false;
            } else {
                setValid(confirmPasswordInput);
            }

            // Check if OTP is valid
            if (otp !== otpInput) {
                alert("Invalid OTP. Please try again.");
                isFormValid = false;
            }

            return isFormValid;
        }

        function validateInput(value, inputElement) {
            var isValid = false;

            if (inputElement.type === 'text' && isValidUsername(value)) {
                isValid = true;
            } else if (inputElement.type === 'email' && validateEmail(value)) {
                isValid = true;
            } else if (inputElement.type === 'password' && isStrongPassword(value)) {
                isValid = true;
            }

            if (isValid) {
                setValid(inputElement);
            } else {
                setError(inputElement, inputElement.type === 'password' ? "Password should be at least 8 characters long and contain at least one uppercase letter, -one lowercase letter, one digit, and one special character." : "Invalid input.");
            }

            return isValid;
        }

        function isValidUsername(username) {
            return /^[a-zA-Z0-9]+$/.test(username);
        }

        function validateEmail(email) {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailPattern.test(email);
        }

        function isStrongPassword(password) {
            var result = zxcvbn(password);
            return result.score >= 3;
        }

        function setError(input, message) {
            input.classList.remove('valid-input');
            input.classList.add('invalid-input');
            showErrorMessage(input, message);
        }

        function setValid(input) {
            input.classList.remove('invalid-input');
            input.classList.add('valid-input');
            hideErrorMessage(input);
        }

        function showErrorMessage(input, message) {
            var errorMessageElement = input.nextElementSibling;
            if (!errorMessageElement || !errorMessageElement.classList.contains('error-message')) {
                errorMessageElement = document.createElement('div');
                errorMessageElement.classList.add('error-message');
                input.parentNode.insertBefore(errorMessageElement, input.nextSibling);
            }
            errorMessageElement.textContent = message;
        }

        function hideErrorMessage(input) {
            var errorMessageElement = input.nextElementSibling;
            if (errorMessageElement && errorMessageElement.classList.contains('error-message')) {
                errorMessageElement.textContent = "";
            }
        }
        function generateOTP() {
            const email = document.getElementById("email").value;
            if (email) {
                // Generate a random 6-digit OTP
                const otp = Math.floor(100000 + Math.random() * 900000);

                // Store the OTP in localStorage for later verification
                localStorage.setItem('otp', otp.toString());


                // Prepare the URL for the AJAX request
                const emailSendingUrl = `../forms/send_otp_email.php?email=${email}&otp=${otp}`;

                // Make the AJAX request
                fetch(emailSendingUrl, {
                    method: 'POST',
                })
                .then(response => response.text())
                .then(result => {
                    console.log('Server response:', result);
                    if (result.trim() === "success") {
                        alert("OTP sent to your given email. Please check your inbox.");
                        
                    } else {
                        alert("There was an error sending the OTP. Please try again.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert("There was an error sending the OTP. Please try again.");
                    alert("OTP sent to your given email. Please check your inbox.");
                });
            } else {
                alert("Please enter your email address before generating OTP.");
            }
        }

    </script>

    
    
</body>
</html>

<?php
$message = "";
$messageClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset-password'])) {
    // Fetch sender's name and email from the form
    $email = $_POST["email"];

    // Check if the email exists in your database
    // For demonstration purposes, let's assume the email exists
    // Generate a reset link and send a password reset email

    if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword !== $confirmPassword) {
            $message = "Passwords do not match.";
            $messageClass = "alert-danger";
        } else {
            $message = "Password reset successful!";
            $messageClass = "alert-success";
        }
    }
}
?>
