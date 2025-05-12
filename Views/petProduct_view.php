<?php
require_once ('../Models/database.php');
require_once ('../Models/petsModel.php');
$all_product = Petsdata();
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
    <link rel="stylesheet" href="css/petProduct.css">
    <link rel="stylesheet" href="css/footer.css">
    <title></title>
    <script src="js/petOptionSelect_view.js"></script>
</head>
<body>
    <?php include 'CustomerHeader_view.php';?>
    <div class="header-spacer"></div>
    <div class="main" style="background-color: #FFF8DC;"><!--Cornsilk-->
        <div class="petbanner">
            <img src="img/pet/petbanner.jpg" alt="petBanner">
            <div class="petbanner-text">
                <h1>Can we be your bestfriend!!</h1>
            </div>
        </div>
        <div class="container">
            <aside class="petfilter-section"><br>
                <script type="text/javascript" src="js/PetFilterProducts.js"></script>
                <h2>Pet Categories</h2>
                <label><input type="checkbox" class="petcategory" value="cat"> Cat </label>
                <label><input type="checkbox" class="petcategory" value="dog"> Dog </label>
                <label><input type="checkbox" class="petcategory" value="fish"> Fish </label>
                <label><input type="checkbox" class="petcategory" value="bird"> Bird </label>
                <label><input type="checkbox" class="petcategory" value="rabbit"> Rabbit </label><br>

                <h2>Cat Types</h2>
                <label><input type="checkbox" class="catcategory" value="persian"> Persian </label>
                <label><input type="checkbox" class="catcategory" value="british-shorthair"> British Shorthair </label>
                <label><input type="checkbox" class="catcategory" value="bengal"> Bengal </label>
                <label><input type="checkbox" class="catcategory" value="scottish-fold"> Scottish Fold </label>
                <label><input type="checkbox" class="catcategory" value="munchkin"> Munchkin </label><br>

                <h2>Dog Types</h2>
                <label><input type="checkbox" class="dogcategory" value="labrador-retriever"> Labrador Retriever </label>
                <label><input type="checkbox" class="dogcategory" value="golden-retriever"> Golden Retriever </label>
                <label><input type="checkbox" class="dogcategory" value="bulldog"> Bulldog </label>
                <label><input type="checkbox" class="dogcategory" value="poodle"> Poodle </label>
                <label><input type="checkbox" class="dogcategory" value="yorkshire-terrier"> Yorkshire Terrier </label><br>

                <h2>Fish Types</h2>
                <label><input type="checkbox" class="fishcategory" value="goldfish"> Goldfish </label>
                <label><input type="checkbox" class="fishcategory" value="discus"> Discus </label>
                <label><input type="checkbox" class="fishcategory" value="betta"> Betta </label><br>

                <h2>Bird Types</h2>
                <label><input type="checkbox" class="birdcategory" value="finch"> Finch </label>
                <label><input type="checkbox" class="birdcategory" value="canary"> Canary </label>
                <label><input type="checkbox" class="birdcategory" value="cockatoo"> Cockatoo </label>
                <label><input type="checkbox" class="birdcategory" value="budgerigar"> Budgerigar (Budgie) </label><br>

                <h2>Rabbit Types</h2>
                <label><input type="checkbox" class="rabbitcategory" value="flemish-giant"> Flemish Giant </label>
                <label><input type="checkbox" class="rabbitcategory" value="mini-rex"> Mini Rex </label><br>

                <div class="price-range">
                    <h3>Price</h3>
                    <input type="range" id="priceRange" name="priceRange" min="50" max="500" step="10" value="500">
                    <div class="price-labels">
                        <span>$50</span>
                        <span>$500</span>
                    </div>
                </div>
            </aside>

            <section class="petcatalog-section">
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search products...">
                </div>
                <div class="pet-list" id="petlist">
                    <?php while($row = mysqli_fetch_assoc($all_product)){ ?>
                    <div class="pet <?php echo $row["category"];?> <?php echo $row["name_code"];?>" 
                          data-price="$<?php echo $row["price"]; ?>">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["Name_specific"];?>">
                        <h3><?php echo $row["product_name"];?></h3>
                        <p>$<?php echo $row["price"]; ?></p>
                        <!--<button class="add" data-id="<?php //echo $row["product_id"];  ?>">Add to Cart</button>-->
                        <form action="petProduct_view.php" method="POST">
                            <input type="hidden" name="product_name" value="<?php echo $row["product_name"];?>">
                            <input type="hidden" name="product_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $row["product_image"]; ?>">
                            <button type="submit" class="add-to-cart-btn" data-product="<?php echo $row["product_id"];?>">Add to Cart</button>
                        </form>
                    </div>
                    <?php } ?>
                    <!--<div class="pet cat persian" data-price="189.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Persian(cat).jpg" alt="Persian Cat">
                        <h3>Persian</h3>
                        <p>$189.99</p>
                        <form action="petProduct_view.php" method="POST">
                            <input type="hidden" name="product_name" value="Persian">
                            <input type="hidden" name="product_price" value="189.99">
                            <input type="hidden" name="product_image" value="img/pet/Persian(cat).jpg">
                            <button type="submit" class="add-to-cart-btn" data-product="Persian">Add to Cart</button>
                        </form>
                        
                    </div>
                    <div class="pet dog labrador-retriever" data-price="229.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Labrador Retriever(dog).jpg" alt="Labrador Retriever Dog">
                        <h3>Labrador Retriever</h3>
                        <p>$229.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet fish goldfish" data-price="59.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Goldfish.jpg" alt="Goldfish Fish">
                        <h3>Goldfish</h3>
                        <p>$59.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet bird finch" data-price="59.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Finch(bird).jpg" alt="Finch Bird">
                        <h3>Finch</h3>
                        <p>$59.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet bird canary" data-price="59.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Canary(bird).jpg" alt="Canary Bird">
                        <h3>Canary</h3>
                        <p>$59.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet bird cockatoo" data-price="59.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Cockatoo(bird).jpg" alt="Cockatoo Bird">
                        <h3>Cockatoo</h3>
                        <p>$59.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet bird budgerigar" data-price="59.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Budgerigar(bird).jpg" alt="Budgerigar Bird">
                        <h3>Budgerigar (Budgie)</h3>
                        <p>$59.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet cat british-shorthair" data-price="179.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/British Shorthair(cat).jpg" alt="British Shorthair Cat">
                        <h3>British Shorthair</h3>
                        <p>$179.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet rabbit flemish-giant" data-price="179.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Flemish-Giant(rabbit).jpg" alt="Flemish Giant Rabbit">
                        <h3>Flemish-Giant</h3>
                        <p>$179.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet rabbit mini-rex" data-price="179.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Mini-Rex(rabbit).jpg" alt="Mini-Rex Rabbit">
                        <h3>Mini-Rex</h3>
                        <p>$179.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet dog golden-retriever" data-price="259.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Golden Retriever(dog).jpg" alt="Golden Retriever Dog">
                        <h3>Golden Retriever</h3>
                        <p>$259.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet fish discus" data-price="69.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Discus(fish).jpg" alt="Discus Fish">
                        <h3>Discus Fish</h3>
                        <p>$69.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet cat bengal" data-price="149.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Bengal(cat).jpg" alt="Bengal Cat">
                        <h3>Bengal</h3>
                        <p>$149.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet dog bulldog" data-price="199.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Bulldog.jpg" alt="Bulldog Dog">
                        <h3>Bulldog</h3>
                        <p>$199.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet cat scottish-fold" data-price="159.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Scottish Fold(cat).jpg" alt="Scottish Fold Cat">
                        <h3>Scottish Fold</h3>
                        <p>$159.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet dog poodle" data-price="169.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Poodle(dog).jpg" alt="Poodle Dog">
                        <h3>Poodle</h3>
                        <p>$169.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet cat munchkin" data-price="159.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Munchkin(cat).jpg" alt="Munchkin Cat">
                        <h3>Munchkin</h3>
                        <p>$159.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet fish betta" data-price="69.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Betta(fish).jpg" alt="Betta Fish">
                        <h3>Betta Fish</h3>
                        <p>$69.99</p>
                        <button>Add to Cart</button>
                    </div>
                    <div class="pet dog yorkshire-terrier" data-price="144.99">
                        <div class="wishlist-icon-container">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="img/pet/Yorkshire Terrier(dog).jpg" alt="Yorkshire Terrier Dog">
                        <h3>Yorkshire Terrier</h3>
                        <p>$144.99</p>
                        <button>Add to Cart</button>
                    </div>-->
                </div>
            </section>
        </div>
        <?php include 'footer_view.php'; ?>
    </div>
</body>
</html>