<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Food Selection</title>
    <link rel="stylesheet" href="css/foods_view.css">
</head>
<body>
    <section class="foods" id="foods">
        <h2 class="heading"><font color="orange">foods</font></h2>
        <div class="product-grid">
            <a href="foodProduct_view.php?category=canned" class="product-item" data-category="canned">
                <img src="img/cannedfood.jpg" alt="CannedFood">
                <span>Canned food</span>
            </a>
            <a href="foodProduct_view.php?category=dry-kibble" class="product-item" data-category="dry-kibble">
                <img src="img/drykibble.jpg" alt="DryKibble">
                <span>Dry Kibble</span>
            </a>
            <a href="foodProduct_view.php?category=freeze-dried" class="product-item" data-category="freeze-dried">
                <img src="img/freezedriedfood.jpg" alt="FreezeDriedFood">
                <span>Freeze-Dried Food</span>
            </a>
            <a href="foodProduct_view.php?category=high-protein" class="product-item" data-category="high-protein">
                <img src="img/highproteinfood.jpg" alt="ProteinFood">
                <span>High-Protein Food</span>
            </a>
            <a href="foodProduct_view.php?category=vegan" class="product-item" data-category="vegan">
                <img src="img/veganfood.jpg" alt="VeganFood">
                <span>Vegan pet food</span>
            </a>
        </div>
        <br><br>
        <?php include 'foodlist_view.php';?>
    </section>
    <script src="js/foods_view.js"></script>
</body>
</html>
