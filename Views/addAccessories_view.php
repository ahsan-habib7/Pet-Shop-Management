<?php include '../Controllers/adminLoginCheckController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/addAccessories_view.css">
</head>
<body>
<?php include 'html/addAccessories_navigation.html'?>
<main>
    <div class="container" align="center" style="margin-bottom: 20px;"><font color="black" size="400">Add New Accessories</font></div>
    <div class="accessories-grid">
        <a href="#" class="accessories-item" data-category="cataccessories">
            <img src="img/cat.jpg" alt="Cat">
            <span><font color="black">Cat</font></span>
        </a>
        <a href="#" class="accessories-item" data-category="dogaccessories">
            <img src="img/dog.jpg" alt="Dog">
            <span> <font color="black">Dog</font></span>
        </a>
        <a href="#" class="accessories-item" data-category="fishaccessories">
            <img src="img/fish.jpg" alt="Fish">
            <span><font color="black">Fish</font></span>
        </a>
        <a href="#" class="accessories-item" data-category="birdaccessories">
            <img src="img/bird.jpg" alt="Bird">
            <span><font color="black">Bird</font></span>
        </a>
        <a href="#" class="accessories-item" data-category="rabbitaccessories">
            <img src="img/rabbit.jpg" alt="Rabbit">
            <span><font color="black">Rabbit</font></span>
        </a>
    </div>
    <?php include 'html/addCatAccessoriesForm(addAccessories).html'?>
    <?php include 'html/addDogAccessoriesForm(addAccessories).html'?>
    <?php include 'html/addFishAccessoriesForm(addAccessories).html'?>
    <?php include 'html/addBirdAccessoriesForm(addAccessories).html'?>
    <?php include 'html/addRabbitAccessoriesForm(addAccessories).html'?>
</main>
<script src="js/addAccessories_view.js"></script>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>