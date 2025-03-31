<?php include '../Controllers/adminLoginCheckController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/addPet_view.css">
</head>
<body>
<?php include 'html/addPet_navigation.html'?>
<main>
    <div class="container" align="center" style="margin-bottom: 20px;"><font color="black" size="400">Add New Pets</font></div>
    <div class="pets-grid">
        <a href="#" class="pets-item" data-category="cat">
            <img src="img/cat.jpg" alt="Cat">
            <span><font color="black">Cat</font></span>
        </a>
        <a href="#" class="pets-item" data-category="dog">
            <img src="img/dog.jpg" alt="Dog">
            <span> <font color="black">Dog</font></span>
        </a>
        <a href="#" class="pets-item" data-category="fish">
            <img src="img/fish.jpg" alt="Fish">
            <span><font color="black">Fish</font></span>
        </a>
        <a href="#" class="pets-item" data-category="bird">
            <img src="img/bird.jpg" alt="Bird">
            <span><font color="black">Bird</font></span>
        </a>
        <a href="#" class="pets-item" data-category="rabbit">
            <img src="img/rabbit.jpg" alt="Rabbit">
            <span><font color="black">Rabbit</font></span>
        </a>
    </div>
    <?php include 'html/addCatForm(addPet).html'?>
    <?php include 'html/addDogForm(addPet).html'?>
    <?php include 'html/addFishForm(addPet).html'?>
    <?php include 'html/addBirdForm(addPet).html'?>
    <?php include 'html/addRabbitForm(addPet).html'?>
</main>
<script src="js/addPet_view.js"></script>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>