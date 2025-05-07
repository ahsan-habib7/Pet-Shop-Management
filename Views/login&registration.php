<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login & Registration</title>
    <link rel="stylesheet" href="css/login&registration.css"> 
</head>
<body>
<div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p><img src="img/logo.png" height="100px" width="100px"></p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="homePage_view.php" class="link active">Home</a></li>
                <li><a href="#" class="link">Blog</a></li>
                <li><a href="#" class="link">Services</a></li>
                <li><a href="#" class="link">About</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    <div class="form-box">
        <?php include 'html/login.html'?>
        <?php include 'html/registration.html'?>
    </div>
</div>
<script src="js/login&registration.js"></script>
</body>
</html>