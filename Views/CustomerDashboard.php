<?php
    include("../Controllers/cartCount.php");

//$customer_username = $_SESSION['username']; // Assuming username is stored in session
//$admin_username = 'admin'; // Replace with the actual admin username
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/CustomerHome.css">
    <link rel="stylesheet" href="css/CustomerHeader.css">
    <link rel="stylesheet" href="css/service_pets.css">
    <link rel="stylesheet" href="css/contact.css">
    <!--<link rel="stylesheet" href="css/chatapp.css">
    <link rel="stylesheet" href="css/problems.css">-->
    <link rel="stylesheet" href="css/footer.css">
    <title>Petty Home page</title>
    <style>
        body {
    background-image: url('img/banner-bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    width: 100%;
    min-height: 100vh;
}

    </style>
</head>
<body>
    <?php include 'CustomerHeader_view.php';?>
     <div class="header-spacer"></div>
     <div class="main" style="background-color: #FFF8DC;"><!--Cornsilk-->
        <section class="home" id="home">
            <!--<img src="img/home.jpg">-->
            <img src="img/pets.webp">
        </section>
        <section class="pets" id="pets">
            <?php include 'pets_view.php'?>
        </section>
        <section class="foods" id="foods">
            <?php include 'foods_view.php'?>
        </section>
        <section class="accessories" id="accessories">
            <?php include 'accessories_view.php'?>
        </section>
        <section class="service_pets" id="service_pets">
            <?php include 'service_pets_view.php'?>
        </section>
        <?php include 'about.php';?>
        <section class="services" id="services">
            <?php include 'services.php'; ?>
        </section>
        <section class="contact" id="contact">
            <?php include 'contact_view.php';?>
        </section>
        <?php include 'footer_view.php'; ?>
    </div>
    <?php include 'chatapp.php'; ?>
</body>
</html>