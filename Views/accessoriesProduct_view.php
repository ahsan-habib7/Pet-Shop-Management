<?php
require_once '../Models/database.php';
require_once '../Models/accessoriessModel.php';
$all_product = Accessoriesdata();
?>
<?php
session_start();

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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/CustomerHeader.css">
    <link rel="stylesheet" href="css/accessoriesProduct.css">
    <link rel="stylesheet" href="css/footer.css">
    <title></title>
    <script src="js/accessoriesOptionSelect.js"></script>
</head>
<body>
    <?php include 'CustomerHeader_view.php';?>
    <div class="header-spacer"></div>
    <div class="main" style="background-color: #FFF8DC;">
        <div class="accessoriesbanner">
            <img src="img/pet/petbanner.jpg" alt="accessoriesBanner">
            <div class="accessoriesbanner-text">
                <h2>Can we be your bestfriend!!</h2>
            </div>
        </div>
        <div class="container">
            <aside class="accessoriesfilter-section"><br>
                <script src="js/accessoriesFilterSection.js"></script>
                <h2>Accessories Categories</h2>
                <label><input type="checkbox" class="accessoriescategory" value="training-kits"> Training Kits </label>
                <label><input type="checkbox" class="accessoriescategory" value="wellness-products" > Wellness Products </label>
                <label><input type="checkbox" class="accessoriescategory" value="beds"> Beds </label>
                <label><input type="checkbox" class="accessoriescategory" value="toys"> Toys </label>
                <label><input type="checkbox" class="accessoriescategory" value="carriers"> Carriers </label><br>

                <h2>Pet Types</h2>
                <label><input type="checkbox" class="accessoriespettype" value="cat"> Cat </label>
                <label><input type="checkbox" class="accessoriespettype" value="dog" > Dog </label>
                <label><input type="checkbox" class="accessoriespettype" value="fish"> Fish </label>
                <label><input type="checkbox" class="accessoriespettype" value="bird"> Bird </label>
                <label><input type="checkbox" class="accessoriespettype" value="rabbit"> Rabbit </label><br>

                <div class="price-range">
                    <h3>Price</h3>
                    <input type="range" id="priceRange" name="priceRange" min="50" max="500" step="10" value="500">
                    <div class="price-labels">
                        <span>$50</span>
                        <span>$500</span>
                    </div>
                </div>
            </aside>

            <section class="accessoriescatalog-section">
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search products...">
                </div>
                <div class="accessories-list" id="accessorieslist">
                    <?php while($row = mysqli_fetch_assoc($all_product)){  ?>
                    <div class="accessories <?php echo $row["accessoriescategory"];?> <?php echo $row["accessoriespettype"];?>" 
                          data-price="$<?php echo $row["price"]; ?>">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["Name_specific"];?>">
                        <h3><?php echo $row["product_name"];?></h3>
                        <p>$<?php echo $row["price"]; ?></p>
                        <!--<button class="add" data-id="<?php //echo $row["product_id"];  ?>">Add to Cart</button>-->
                        <form action="accessoriesProduct_view.php" method="POST">
                            <input type="hidden" name="product_name" value="<?php echo $row["product_name"];?>">
                            <input type="hidden" name="product_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row["product_image"]; ?>">
                            <button type="submit" class="add-to-cart-btn" data-product="<?php echo $row["product_id"];?>">Add to Cart</button>
                        </form>
                    </div>
                    <?php } ?>
                    <!--<div class="accessories training-kits cat" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/clicker(cat).jpg" alt="Cat Training Kits">
                        <h3>Clicker</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories wellness-products cat" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/grooming(cat).jpg" alt="Cat Wellness Products">
                        <h3>Silky Cat</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories carriers dog" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/carrier(dog).jpg" alt="Dog Carriers">
                        <h3>Dog Carriers</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories beds cat" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/bed(cat).jpg" alt="Cat Beds">
                        <h3>Cat Bed</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories training-kits dog" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/clicker(dog).jpg" alt="Dog Training Kits">
                        <h3>Clicker</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories carriers cat" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/carrier(cat).jpg" alt="Cat Carriers">
                        <h3>Cat Carriers</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories toys cat" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/toys(cat).jpg" alt="Cat Toys">
                        <h3>Cat Toys</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories training-kits cat dog rabbit" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/Weave poles.jpg" alt="Cat Dog Rabbit training-kits">
                        <h3>Weave poles</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories carriers rabbit" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/carrier(rabbit).jpg" alt="Rabbit Carriers">
                        <h3>Rabbit Carriers</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories wellness-products dog" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/grooming(dog).jpg" alt="Dog Wellness Products">
                        <h3>Oticbliss</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories beds dog" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/bed(dog).jpg" alt="Dog Beds">
                        <h3>Dog Bed</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories training-kits rabbit" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/clicker(rabbit).jpg" alt="Rabbit Training Kits">
                        <h3>Clicker</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories carriers fish" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/aquarium.jpg" alt="Fish Carriers">
                        <h3>Aquariam</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories toys dog" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/toys(dog).jpg" alt="Dog Toys">
                        <h3>Dog Toys</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories wellness-products rabbit" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/grooming(rabbit).jpg" alt="Rabbit Wellness Products">
                        <h3>PURE and natural pet</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories training-kits bird" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/clicker(bird).jpg" alt="Bird Training Kits">
                        <h3>Clicker</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories toys bird" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/toys(bird).jpg" alt="Bird Toys">
                        <h3>Bird Toys</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories carriers bird" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/carrier(bird).jpg" alt="Bird Carriers">
                        <h3>Bird Carriers</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories beds rabbit" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/bed(rabbit).jpg" alt="Rabbit Beds">
                        <h3>Rabbit Bed</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="accessories wellness-products bird" data-price="9.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/accessories/grooming(bird).jpg" alt="Bird Wellness Products">
                        <h3>Mineral grit</h3>
                        <p>$9.99</p>
                        <button>Add to Cart</button>
                    </div>-->
                </div>
            </section>
        </div>
        <?php include 'footer_view.php'; ?>
    </div>
</body>
</html>
