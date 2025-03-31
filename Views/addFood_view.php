<?php include '../Controllers/adminLoginCheckController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/addFood_view.css">
</head>
<body>
<?php include 'html/addFood_navigation.html'?>
<main>
    <div class="container" align="center" style="margin-bottom: 20px;"><font color="black" size="400">Add New Foods</font></div>
    <div class="product-grid">
        <a href="#" class="product-item" data-category="catfood">
            <img src="img/foodproduct/catfood.jpg" alt="Catfood">
            <span><font color="black">Catfood</font></span>
        </a>
        <a href="#" class="product-item" data-category="dogfood">
            <img src="img/foodproduct/dogfood.jpg" alt="Dogfood">
            <span><font color="black">Dogfood</font></span>
        </a>
        <a href="#" class="product-item" data-category="fishfood">
            <img src="img/foodproduct/fishfood.jpg" alt="Fishfood">
            <span><font color="black">Fishfood</font></span>
        </a>
        <a href="#" class="product-item" data-category="birdfood">
            <img src="img/foodproduct/birdfood.jpg" alt="Birdfood">
            <span><font color="black">Birdfood</font></span>
        </a>
        <a href="#" class="product-item" data-category="rabbitfood">
            <img src="img/foodproduct/rabbitfood.jpg" alt="Rabbitfood">
            <span><font color="black">Rabbitfood</font></span>
        </a>
    </div>
    <?php include 'html/addCatFoodForm(addFood).html'?>
    <?php include 'html/addDogFoodForm(addFood).html'?>
    <?php include 'html/addFishFoodForm(addFood).html'?>
    <?php include 'html/addBirdFoodForm(addFood).html'?>
    <?php include 'html/addRabbitFoodForm(addFood).html'?>
</main>
<script src="js/addFood_view.js"></script>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>