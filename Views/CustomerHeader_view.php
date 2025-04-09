<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<header class="header">
    <div class="flex">
        <a href="CustomerDashboard.php" class="logo"><img src="img/logo.png" height="125px" width="125px"></a>
        <nav class="navbar">
            <a href="CustomerDashboard.php#pets">pets</a>
            <a href="CustomerDashboard.php#foods">foods</a>
            <a href="CustomerDashboard.php#accessories">Accessories</a>
            <a href="CustomerDashboard.php#services_pets">services</a>
            <a href="CustomerDashboard.php#about-us">about us</a>
            <a href="CustomerDashboard.php#contact">contact</a>
        </nav>
        <div class="icons">
            <i class="bx bxs-user" id="user-btn" style="font-size: 1.5rem;"></i>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"style="font-size: 1.5rem;"></i><sup>0</sup></a>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"style="font-size: 1.5rem;"></i><sup><span class="cart-count"><?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0; ?></span></sup></a>
            <i class="bx bx-list-plus" id="menu-btn" style="font-size: 2rem;"></i>
        </div>
        <div class="user-box">
            <!--<p>username : <span><?php //echo isset($_SESSION['user_name']); ?></span></p>
            <p>Email : <span><?php //echo isset($_SESSION['user_email']); ?></span></p>-->
            <button id="logoutBtn" style="display: none;">Logout</button>
        </div>
        
    </div>
</header>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let userBtn = document.getElementById("user-btn");
    let userBox = document.querySelector(".user-box");

    if (userBtn && userBox) {
        userBtn.addEventListener("click", function () {
            userBox.classList.toggle("active"); // Toggle visibility
        });
    }
});

</script>
<script type="text/javascript" src="js/CustomerHeader.js"></script>
</body>
</html>