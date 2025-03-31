<?php
require_once '../Models/database.php';
require_once '../Models/accessoriessModel.php';
$all_product = Accessoriesdata();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/accessorieslist.css">
</head>
<body>
    <div class="accessorieslist-section">
        <h2>accessories List</h2>
        <div class="accessorieslist">
            <button class="round-button left-button" onclick="scrollAccessorieslistLeft()">&#x276E;</button>
            <div class="accessorieslist-container">
                <div class="accessorieslist-items">
                    <?php while($row = mysqli_fetch_assoc($all_product)){  ?>
                    <div class="accessorieslist-item" >
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["Name_specific"];?>">
                        <h3><?php echo $row["product_name"];?></h3>
                        <p>$<?php echo $row["price"]; ?></p>
                        <!--<button class="add" data-id="<?php //echo $row["product_id"];  ?>">Add to Cart</button>-->
                        <form action="CustomerDashboard.php#accessories" method="POST">
                            <input type="hidden" name="product_name" value="<?php echo $row["product_name"];?>">
                            <input type="hidden" name="product_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row["product_image"]; ?>">
                            <button type="submit" class="add" data-product="<?php echo $row["product_id"];?>">Add to Cart</button>
                        </form>
                    </div>
                    <?php } ?>
                    <!--<div class="accessorieslist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/clicker(cat).jpg" alt="Cat Training Kits">
                        <p>Clicker</p>
                        <span>$9.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessorieslist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/grooming(cat).jpg" alt="Cat Wellness Products">
                        <p>Silky Cat</p>
                        <span>$9.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessorieslist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/carrier(dog).jpg" alt="Dog Carriers">
                        <p>Dog Carriers</p>
                        <span>$9.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessorieslist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/aquarium.jpg" alt="Fish Carriers">
                        <p>Aquariam</p>
                        <span>$9.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessorieslist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/bed(rabbit).jpg" alt="Rabbit Beds">
                        <p>Rabbit Beds</p>
                        <span>$9.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessorieslist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/toys(bird).jpg" alt="Bird Toys">
                        <p>Bird Toys</p>
                        <span>$9.99</span>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessorieslist-item">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/Weave poles.jpg" alt="Bird Training Kits">
                        <p>Weave poles</p>
                        <span>$9.99</span>
                        <button>Add to Cart</button>
                    </div>-->
                </div>
            </div>
            <button class="round-button right-button" onclick="scrollAccessorieslistRight()">&#x276F;</button>
        </div>
        <div class="shop-all-link">
        <a href="accessoriesProduct_view.php">Shop more <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    <script src="js/accessorieslist_view.js"></script>
</body>
</html>
