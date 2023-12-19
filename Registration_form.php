<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login registration page</title>
    <link rel="stylesheet" href="styleR.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="wrapper">
    <form action="Register.php" method="POST" name="form" onsubmit="return validate()">
        <h1>Login Registration</h1>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Name" name="name" id="name" oninput="name_Verify()">
            </label>
        </div>
        <div style="display: none" id="name_error">please enter your name</div>
        <div class="input-box">
            <label>
                <input type="text" placeholder="Email" name="email" id="email" oninput="email_Verify()">
            </label>
        </div>
        <div style="display: none" id="Email_error">please enter a valid email</div>
        <div class="input-box">
            <label>
                <input type="password" placeholder="password" name="password" id="password" oninput="password_Verify_Reg()">
            </label>
        </div>
        <div style="display: none" id="password_error">password should be more than 6 characters</div>
        <div class="input-box">
            <label>
                <input type="password" placeholder="confirm password" name="password_c" id="password_c" oninput="passowrd_confirmation()">
            </label>
        </div>
        <div style="display: none" id="pasCon_error">password doesn't match</div>

        <?php if(isset($_SESSION['error'])): ?>
            <div>
                <?php
                echo $_SESSION["error"];
                unset($_SESSION["error"]);
                ?>
            </div>
        <?php endif; ?>

        <button name="submit" type="submit" class="btn">Register</button>
        <div class="register-link">
            <p>are you done? <a href="Login_Form.php">login</a> now </p>
        </div>
    </form>
</div>

<script src="js.js" defer></script>

</body>
</html>