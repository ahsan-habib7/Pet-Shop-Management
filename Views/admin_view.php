<?php 
    //include '../Controllers/adminLoginCheckController.php'; 
    include '../Controllers/adminDashboardController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
</head>
<body>
<?php include 'html/admin_navigation.html'?>
<main>
    <div class="container">
        <h2 style="text-align: center; color: black;">Welcome Admin</h2>
    </div>
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers"><?php echo $totalCustomers; ?></div>
                <div class="cardName">Total Customers</div>
            </div>
            <div class="iconBx">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers"><?php echo $totalEmployees; ?></div>
                <div class="cardName">Total Employees</div>
            </div>
            <div class="iconBx">
                <i class="fa-solid fa-user-tie"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers"><?php echo $totalPets; ?></div>
                <div class="cardName">Total Pets</div>
            </div>
            <div class="iconBx">
                <i class="fa-solid fa-cat"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers"><?php echo $totalProducts; ?></div>
                <div class="cardName">Total Products</div>
            </div>
            <div class="iconBx">
                <i class="fa-solid fa-box"></i>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers"><?php echo $totalAccessories; ?></div>
                <div class="cardName">Total Accessories</div>
            </div>
            <div class="iconBx">
                <i class="fa-solid fa-bowl-food"></i>
            </div>
        </div>
    </div>
    
</main>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>