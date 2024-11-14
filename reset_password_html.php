<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFE6C7;
        }
        .form-container {
            max-width: 300px;
            margin: auto;
            padding-top: 100px;
        }
        .form-container .form-group label {
            font-weight: bold;
        }
        .form-container button {
            border: 1px solid black;
            width: 100%;
        }
        .form-container button:hover {
            background-color: #27ae60;
            color:white;
        }
        .logo{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo img{
            max-height: 150px;
            margin-top:25%;
            margin-bottom:-45%;
        }
    </style>
</head>
<body>
    <div class="col-lg-12 logo me-auto me-lg-0">
                        <a href="#">
                            <img src="assets/img/logo.png" alt="">
                        </a>
    </div>
    <div class="form-container">
        <form action="forms/reset_password.php" method="post">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password" required>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" class="form-control" name="confirm_new_password" required>
            </div>
            <button type="submit" class="btn " name="reset-password">Submit</button>
        </form>
    </div>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
