<?php include '../Controllers/adminLoginCheckController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <style type="text/css">
        #uploadForm {
            max-width: 1500px;
            margin: auto;
            padding: 40px;
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
<?php include 'html/customerHome_navigation.html'?>
<main>
    <iframe src="CustomerDashboard.php" style="width:100%; height:730px; border:none;"></iframe>
</main>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>