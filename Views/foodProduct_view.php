<?php
require_once '../Models/database.php';
require_once ('../Models/foodsModel.php');
$all_product = Foodsdata();
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="css/CustomerHeader.css">
	<link rel="stylesheet" href="css/foodProduct.css">
	<link rel="stylesheet" href="css/footer.css">
	<title></title>
    <script src="js/foodOptionSelect_view.js"></script>
</head>
<body>
	<?php include 'CustomerHeader_view.php';?>
     <div class="header-spacer"></div>
     <div class="main" style="background-color: #FFF8DC;"><!--Cornsilk-->
        <div class="foodbanner">
            <img src="img/banner.jpg" alt="foodBanner">
            <div class="foodbanner-text">
                <h2>Warm Treats for Your Beloved Friends!</h2>
            </div>
        </div>
     	<div class="container">
        <aside class="filter-section"><br>
        <script type="text/javascript" src="js/FoodFilter.js">
            
        </script>
            <h2>Product Categories</h2>
            <label><input type="checkbox" class="productcategory" value="cat-food"> Cat Food</label>
            <label><input type="checkbox" class="productcategory" value="dog-food"> Dog Food</label>
            <label><input type="checkbox" class="productcategory" value="fish-food"> Fish Food</label>
            <label><input type="checkbox" class="productcategory" value="bird-food"> Bird Food</label>
            <label><input type="checkbox" class="productcategory" value="rabbit-food"> Rabbit Food</label><br>

            <h2>Food Categories</h2>
            <label><input type="checkbox" class="foodcategory" value="canned">Canned</label>
            <label><input type="checkbox" class="foodcategory" value="dry-kibble"> Dry Kibble</label>
            <label><input type="checkbox" class="foodcategory" value="freeze-dried">Freeze Dried</label>
            <label><input type="checkbox" class="foodcategory" value="high-protein">High Protein</label>
            <label><input type="checkbox" class="foodcategory" value="vegan">Vegan</label><br>

            <h2>Product Types</h2>
            <label><input type="checkbox" class="quality" value="basic"> Basic </label>
            <label><input type="checkbox" class="quality" value="premium"> Premium</label>
            
            <div class="price-range">
                <h3>Price</h3>
                <input type="range" id="priceRange" name="priceRange" min="50" max="500" step="10" value="500">
                <div class="price-labels">
                    <span>$50</span>
                    <span>$500</span>
                </div>
            </div>
        </aside>
        
        <section class="catalog-section">
            <!--<h2>Products</h2>-->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search products...">
            </div>
            <div class="product-list" id="productList">
                <?php while($row = mysqli_fetch_assoc($all_product)){  ?>
                    <div class="product <?php echo $row["category"];?> <?php echo $row["type"];?> <?php echo $row["Quality"];?>" 
                          data-price="$<?php echo $row["price"]; ?>">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["Name_specific"];?>">
                        <h3><?php echo $row["product_name"];?></h3>
                        <p>$<?php echo $row["price"]; ?></p>
                        <!--<button class="add" data-id="<?php //echo $row["product_id"];  ?>">Add to Cart</button>-->
                        <form action="foodProduct_view.php" method="POST">
                            <input type="hidden" name="product_name" value="<?php echo $row["product_name"];?>">
                            <input type="hidden" name="product_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row["product_image"]; ?>">
                            <button type="submit" class="add-to-cart-btn" data-product="<?php echo $row["product_id"];?>">Add to Cart</button>
                        </form>
                    </div>
                    <?php } ?>
                <!--<div class="product dog-food canned premium" data-price="29.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-1(can).webp" alt="Canned Dog Food">
                    <h3>Royal Canin</h3>
                    <p>$29.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food dry-kibble basic" data-price="39.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-4(dk).jpg" alt="Dry Kibble Cat Food">
                    <h3>Whisks</h3>
                    <p>$39.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product bird-food basic" data-price="25.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/birdfood-1.jpg" alt="Bird Food">
                    <h3>ZuPreem Pure Fun</h3>
                    <p>$25.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product fish-food basic" data-price="49.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/fishfood(aq).jpg" alt="Fish Food">
                    <h3>Wardley</h3>
                    <p>$49.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product rabbit-food basic" data-price="65.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/rabbitfood-2.jpg" alt="Rabbit Food">
                    <h3>Wild Harvest</h3>
                    <p>$65.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food canned basic" data-price="35.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-2(can).webp" alt="Canned Dog Food">
                    <h3>Pedigree</h3>
                    <p>$35.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food canned premium" data-price="75.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-1(can).jpg" alt="Canned Cat Food">
                    <h3>Royal Canin</h3>
                    <p>$75.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product bird-food basic" data-price="28.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/birdfood-2.jpg" alt="Bird Food">
                    <h3>ZuPreem Fruitblend Flavor</h3>
                    <p>$28.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food canned basic" data-price="35.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-2(can).jpg" alt="Canned Cat Food">
                    <h3>My Little Lion</h3>
                    <p>$35.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food canned basic" data-price="29.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-3(can).webp" alt="Canned Dog Food">
                    <h3>Canidae</h3>
                    <p>$29.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food canned premium" data-price="75.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-3(can).jpg" alt="Canned Cat Food">
                    <h3>Hill's Healthy Cuisine</h3>
                    <p>$75.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product rabbit-food basic" data-price="45.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/rabbitfood-1.jpg" alt="Rabbit Food">
                    <h3>Kaytee</h3>
                    <p>$45.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food dry-kibble basic" data-price="24.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-4(dk).jpg" alt="Dry Kibble Dog Food">
                    <h3>Kibbles nBits ORIGINAL</h3>
                    <p>$24.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food freeze-dried premium" data-price="99.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-6(fd).jpg" alt="Freeze Dried Dog Food">
                    <h3>Source Freeze Dried Chicken</h3>
                    <p>$99.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food dry-kibble premium" data-price="75.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-5(dk).jpg" alt="Dry Kibble Cat Food">
                    <h3>Meow MIX</h3>
                    <p>$75.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product bird-food canned premium" data-price="95.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/birdfood-3.jpg" alt="Canned Bird Food">
                    <h3>Birdfood cake</h3>
                    <p>$95.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food dry-kibble premium" data-price="79.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-5(dk).webp" alt="Dry Kibble Dog Food">
                    <h3>Kibbles nBits</h3>
                    <p>$79.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food freeze-dried premium" data-price="135.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-6(fd).jpg" alt="Freeze Dried Cat Food">
                    <h3>Orijen ORIGINAL</h3>
                    <p>$135.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food freeze-dried premium" data-price="145.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-7(fd).jpg" alt="Freeze Dried Cat Food">
                    <h3>Source Freeze Dried Salmon</h3>
                    <p>$145.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food canned freeze-dried premium" data-price="219.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-7(fd).jpg" alt="Freeze Dried Canned Dog Food">
                    <h3>Stewart PRO-TREAT</h3>
                    <p>$219.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food high-protein basic" data-price="55.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-9(hp).jpg" alt="High Protein Dog Food">
                    <h3>Royal Canin</h3>
                    <p>$55.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food high-protein premium" data-price="165.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-8(hp).jpg" alt="High Protein Cat Food">
                    <h3>Instinct Ultimate Protein</h3>
                    <p>$165.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product fish-food canned premium" data-price="149.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/fishfood(cd).jpg" alt="Canned Fish Food">
                    <h3>Tropical Flakes</h3>
                    <p>$149.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food high-protein premium" data-price="135.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-9(hp).jpg" alt="High Protein Cat Food">
                    <h3>clean protein</h3>
                    <p>$135.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food vegan basic" data-price="69.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-10(v).jpg" alt="Vegan Dog Food">
                    <h3>Natural Balance</h3>
                    <p>$69.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product rabbit-food premium" data-price="165.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/rabbitfood-3.jpg" alt="Rabbit Food">
                    <h3>OXBOW Organic</h3>
                    <p>$165.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product cat-food vegan premium" data-price="135.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/catfood-10(v).jpg" alt="Vegan Cat Food">
                    <h3>ONEPLANET</h3>
                    <p>$135.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product dog-food high-protein basic" data-price="29.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/dogfood-8(hp).jpg" alt="High Protein Canned Dog Food">
                    <h3>Dog CHOW</h3>
                    <p>$29.99</p>
                    <button>Add to Cart</button>
                </div>
                <div class="product fish-food high-protein basic" data-price="99.99">
                    <div class="wishlist-icon-container">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="img/foodproduct/fishfood(hp).jpg" alt="High Protein Fish Food">
                    <h3>Fish Bits</h3>
                    <p>$99.99</p>
                    <button>Add to Cart</button>
                </div>-->
            </div>
        </section>
    </div>
     	<?php include 'footer_view.php'; ?>
    </div>
</body>
</html>