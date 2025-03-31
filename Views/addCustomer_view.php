<?php include '../Controllers/adminLoginCheckController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/addCustomer_view.css">
</head>
<body>
<?php include 'html/addCustomer_navigation.html'?>
<main>
    <div class="container" align="center" style="margin-bottom: 20px;"><font color="black" size="400">Add New Customer</font></div>
        <form id="uploadForm" action="../Controllers/customerController.php" method="POST">
            <label for="CustomerID">Customer ID</label>
            <input type="text" name="username" required>

            <!--<label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstname" required>

            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastname" required>-->
            <div style="display: flex; gap: 30px;width: 98.5%;">
                <div style="flex: 1;">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstname" required>
                </div>
                <div style="flex: 1;">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastname" required>
                </div>
            </div>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="pass" required>

            <label for="productImage">Profile Image</label>
            <input type="file" class="input-field" id="productImage" name="productImage" accept="image/*">

            <button type="submit" name="add">Submit</button>
        </form>
</main>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>