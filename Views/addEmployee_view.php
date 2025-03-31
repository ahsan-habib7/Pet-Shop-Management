<?php include '../Controllers/adminLoginCheckController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/addEmployee_view.css">
</head>
<body>
<?php include 'html/addEmployee_navigation.html'?>
<main>
    <div class="container" align="center" style="margin-bottom: 20px;"><font color="black" size="400">Add New Employee</font></div>
        <form id="uploadForm" action="../Controllers/employeeController.php" method="POST">
            <label for="EmpID">EmpID</label>
            <input type="text" name="empID" required>

            <label for="Name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="number">Number</label>
            <input type="text" id="number" name="number" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="pass" required>

            <label for="Image">Profile Image</label>
            <input type="file" class="input-field" id="Image" name="Image" accept="image/*">

            <button type="submit" name="add">Submit</button>
        </form>
</main>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>