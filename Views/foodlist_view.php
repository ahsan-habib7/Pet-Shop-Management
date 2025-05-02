<?php
require_once '../Models/database.php';
require_once '../Models/foodsModel.php';
$all_product = Foodsdata();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $product_name) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    // If not found, add as new item
    if (!$found) {
        $_SESSION['cart'][] = [
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => 1
        ];
    }

    // Calculate the updated cart count
    $total_cart_items = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_cart_items += $item['quantity'];
    }
    $_SESSION['cart_count'] = $total_cart_items;

    // Return a JSON response
    echo json_encode([
        'success' => true,
        'cart_count' => $total_cart_items
    ]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrollable Categories</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/foodlist_view.css">
</head>
<body>
    <div class="foodlist-section">
        <h2>Food List</h2>
        <div class="foodlist">
            <button class="round-button left-button" onclick="scrollFoodlistLeft()">&#x276E;</button>
            <div class="foodlist-container">
                <div class="foodlist-items">
                    <?php while($row = mysqli_fetch_assoc($all_product)){  ?>
                    <div class="foodlist-item" >
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["Name_specific"];?>">
                        <h3><?php echo $row["product_name"];?></h3>
                        <p>$<?php echo $row["price"]; ?></p>
                        <form action="CustomerDashboard.php#foods" method="POST">
                            <input type="hidden" name="product_name" value="<?php echo $row["product_name"];?>">
                            <input type="hidden" name="product_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row["product_image"]; ?>">
                            <button type="submit" class="add" data-product="<?php echo $row["product_id"];?>">Add to Cart</button>
                        </form>
                    </div>
                    <?php } ?>
                    <!--<div class="foodlist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/foodproduct/dogfood-1(can).webp" alt="Canned Dog Food">
                        <p>Royal Canin</p>
                        <span>$29.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="foodlist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/foodproduct/catfood-4(dk).jpg" alt="Dry Kibble Cat Food">
                        <p>Whisks</p>
                        <span>$39.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="foodlist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/foodproduct/birdfood-1.jpg" alt="Bird Food">
                        <p>ZuPreem Pure Fun</p>
                        <span>$25.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="foodlist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/foodproduct/fishfood(aq).jpg" alt="Fish Food">
                        <p>Wardley</p>
                        <span>$49.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="foodlist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/foodproduct/rabbitfood-2.jpg" alt="Rabbit Food">
                        <p>Wild Harvest</p>
                        <span>$65.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="foodlist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/foodproduct/catfood-1(can).jpg" alt="Canned Cat Food">
                        <p>Royal Canin</p>
                        <span>$75.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="foodlist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/foodproduct/dogfood-6(fd).jpg" alt="Freeze Dried Dog Food">
                        <p>Source Freeze Dried Chicken</p>
                        <span>$99.99</span>
                        <button>Add to Cart</button>
                    </div>-->
                </div>
            </div>
            <button class="round-button right-button" onclick="scrollFoodlistRight()">&#x276F;</button>
        </div>
        <div class="shop-all-link">
        <a href="foodProduct_view.php">Shop more <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    <script src="js/foodlist_view.js"></script>
</body>
</html>
