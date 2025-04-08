<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove'])) {
        $product_name = $_POST['product_name'];
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function($item) use ($product_name) {
            return $item['name'] !== $product_name;
        });
    } elseif (isset($_POST['increase'])) {
        $index = $_POST['increase'];
        if (isset($_SESSION['cart'][$index])) {
            $_SESSION['cart'][$index]['quantity'] += 1;
        }
    } elseif (isset($_POST['decrease'])) {
        $index = $_POST['decrease'];
        if (isset($_SESSION['cart'][$index]) && $_SESSION['cart'][$index]['quantity'] > 1) {
            $_SESSION['cart'][$index]['quantity'] -= 1;
        }
    } elseif (isset($_POST['checkout'])) {
        // Clear the cart upon checkout
        $_SESSION['cart'] = [];
    }

    header('Location: cart.php');
    exit();
}

$total = 0;

$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total_cart_items = 0;

if (!empty($cart_items)) {
    foreach ($cart_items as $item) {
        $total_cart_items += $item['quantity']; 
    }
}
$_SESSION['cart_count'] = $total_cart_items;
?>
<?php
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total_cart_items = 0;

if (!empty($cart_items)) {
    foreach ($cart_items as $item) {
        $total_cart_items += $item['quantity']; 
    }
}
$_SESSION['cart_count'] = $total_cart_items;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: orange;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.futuristic-cart {
    display: flex;
    width: 95%;
    max-width: 1500px;
    height: 90%;
    background: #1a1a1a;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
    align-items: flex-start;
}

.cart-items-panel {
    height: 100%;
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    background: rgba(255, 255, 255, 0.05);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    position: relative;
}

.holographic-panel {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.holographic-panel:hover {
    transform: translateY(-5px) rotateY(5deg);
    box-shadow: 0 10px 30px rgba(0, 255, 255, 0.3);
}

.item-image img {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    margin-right: 20px;
}

.item-info {
    flex: 1; 
}

.item-info h3 {
    font-size: 18px;
    color: #0ff;
}

.item-desc {
    font-size: 14px;
    color: #bbb;
}

.item-controls {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.quantity-dial {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

.quantity-dial button {
    background: transparent;
    border: 2px solid #0ff;
    color: #0ff;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    text-align: center;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.quantity-dial button:hover {
    background-color: #0ff;
    color: #121212;
}

.quantity-dial .quantity {
    margin: 0 10px;
    font-size: 18px;
    color: #0ff;
}

.item-price {
    font-size: 20px;
    color: #0ff;
    margin-right: 20px;
    margin-left: 20px;
    margin-top: 5pxpx;
}

.remove-btn {
    background: transparent;
    border: 2px solid #ff0000;
    color: #ff0000;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    text-align: center;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-left: 20px; 
}

.remove-btn:hover {
    background-color: #ff0000;
    color: #fff;
}

.checkout-panel {
    width: 25%;
    height: 100%;
    padding: 35px;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(15px);
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.summary p {
    font-size: 18px;
    color: #ccc;
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
}

.summary span {
    color: #fff;
    font-weight: bold;
}

.checkout-btn, .continue-btn {
    padding: 15px;
    background: transparent;
    border: 1px solid #0ff;
    border-radius: 10px;
    color: #0ff;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 10px;
    text-align: center;
    width: 100%;
    box-sizing: border-box; 
}

.checkout-btn:hover, .continue-btn:hover {
    background-color: #0ff;
    color: #121212;
}


    </style>
</head>
<body>
    <div class="futuristic-cart">
        <div class="cart-items-panel">
            <h2>Your Items</h2>
            <form method="POST" action="cart.php">
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <?php foreach($_SESSION['cart'] as $index => $item): ?>
            <?php if(isset($item['name'])): ?>
                <div class="cart-item holographic-panel">
                    <div class="item-image">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    </div>
                    <div class="item-info">
                        <h3><?php echo $item['name']; ?></h3>
                    </div>
                    <div class="item-controls">
                        <div class="quantity-dial">
                            <input type="hidden" name="product_name" value="<?php echo $item['name']; ?>">
                            <button type="submit" name="decrease" value="<?php echo $index; ?>" class="decrease">-</button>
                            <span class="quantity"><?php echo $item['quantity']; ?></span>
                            <button type="submit" name="increase" value="<?php echo $index; ?>" class="increase">+</button>
                        </div>
                        <div class="item-price">$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></div>
                        <button type="submit" name="remove" value="<?php echo $item['name']; ?>" class="remove-btn">X</button>
                    </div>
                </div>
                <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php else: ?>
        <p>No items in cart</p>
    <?php endif; ?>
</form>


        </div>
        <div class="checkout-panel">
            <h2>Checkout</h2>
            <div class="summary">
                <p>Subtotal: <span id="subtotal">$<?php echo number_format($total, 2); ?></span></p>
                <p>Shipping: <span>Free</span></p>
                <p>Total: <span id="total">$<?php echo number_format($total, 2); ?></span></p>
            </div>
            <form method="POST" action="cart.php">
                <button type="submit" name="checkout" class="checkout-btn">Checkout</button>

            <button type="button" class="continue-btn" onclick="window.location.href='CustomerDashboard.php'">Continue Shopping</button>
        </form>
        </div>
        
    </div>
    
</body>
</html>
