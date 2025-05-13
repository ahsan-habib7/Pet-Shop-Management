<?php
session_start();
echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/CustomerHeader.css">
    <link rel="stylesheet" href="css/service_details_view.css">
    <link rel="stylesheet" href="css/healthcare.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Products for pets</title>
</head>
<body>
     <?php include 'CustomerHeader_view.php';?>
     <div class="header-spacer"></div>
     <div class="main" style="background-color: #FFF8DC;"><!--Cornsilk-->
        <img src="img/service-banner.jpg" width="100%">
 

<!--<div class="scroll-nav" id="scroll-nav">
    <a href="Cushome_view.php#service_pets">🔙 Back</a>
    <a href="#healthcare">Health Care</a>
    <a href="#grooming">Grooming</a>
    <a href="#healthymeal">Healthy Meal</a>
    <a href="#exercise-section">Exercise</a>
    <a href="#training">Training</a>
    <a href="#petboarding">Boarding</a>
</div>-->
<!--<div class="scroll-nav">
            <div class="dropdown">
                <button class="dropbtn">Services 🔽 </button>
                <div class="dropdown-content">
                    <a href="Cushome_view.php#service_pets">🔙 Back</a>
                    <a href="#healthcare">Health Care</a>
                    <a href="#grooming">Grooming</a>
                    <a href="#healthymeal">Healthy Meal</a>
                    <a href="#exercise-section">Exercise</a>
                    <a href="#training">Training</a>
                    <a href="#petboarding">Boarding</a>
                </div>
            </div>
        </div><br><br>-->
            <div class="dropdown">
                <button class="dropbtn">Services 🔽 </button>
                <div class="dropdown-content">
                    <a href="CustomerDashboard.php#service_pets">🔙 Back</a>
                    <a href="#healthcare">Health Care</a>
                    <a href="#grooming">Grooming</a>
                    <a href="#healthymeal">Healthy Meal</a>
                    <a href="#exercise-section">Exercise</a>
                    <a href="#training">Training</a>
                    <a href="#petboarding">Boarding</a>
                </div>
            </div>
        <section class="healthcare" id="healthcare" margine-bottom: 10px;>
             <div class="grooming-container">
                <h2>Healthcare Services</h2>
                <p>At our pet shop, we offer professional vetenary services to keep your best friend looking and feeling their best. Our experienced doctors provide a range of services tailored to your pet's needs.</p>
                <?php include 'healthcare.php'?>
            </div>
        </section>
        <section class="grooming" id="grooming">
            <?php include 'grooming_view.php'?>
        </section>
        <section class="healthymeal" id="healthymeal">
            <?php include 'healthymeal_view.php'?>
        </section>
        <section class="exercise-section" id="exercise-section">
            <?php include 'exercise_view.php'?>
        </section>
        <section class="training" id="training">
            <?php include 'pettraining_view.php'?>
        </section>
        <section class="petboarding" id="petboarding">
            <?php include 'petboarding_view.php'?>
        </section>
        <?php include 'footer_view.php'; ?>
    </div>
    <script src="js/service_details_view.js"></script>
</body>
</html>