<?php include '../Controllers/adminLoginCheckController.php'; ?>
<?php
    include ('../Models/database.php');
    include ('../Models/alloperations.php');
    $all_info = data();
    //$conn = con(); 
    //$sql = "SELECT * FROM customer";
    //$all_info = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/viewCustomer.css">
</head>
<body>
<?php include 'html/viewCustomer_navigation.html'?>
<main>
    <div class="container">
        <div>
            <h1>Customer List</h1>
            <p>Manage your Customer</p>
        </div>
        <button onclick="window.location.href='addCustomer_view.php'">
            <span style="font-size: 18px; margin-right: 5px;">+</span> Add Customer
        </button>
    </div>

    <form id="uploadForm" action="../Controllers/customerController.php" method="POST">
        <div class="select-container">
            <div class="select-wrapper">
                <div class="search-box">
                    <input type="text" placeholder="Search..." class="search-input">
                    <button class="search-btn">&#128269;</button>
                </div>
            </div>
            <div class="select-wrapper">
                <img src="img/excel.png">
                <img src="img/pdf.png">
                <img src="img/print.png">
            </div>
        </div>
        <table class="purchase-table">
            <thead>
                <tr>
                    <!--<th><input type="checkbox"></th>-->
                    <th>Cus ID</th>
                    <th>F. Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>C. Number</th>
                    <th>Image</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="purchase-tbody">
                <?php //while($row = mysqli_fetch_assoc($all_info)){ ?>
                <?php while ($row = $all_info->fetch_assoc()) { ?>
                <tr data-id="<?php echo $row['CustomerID']; ?>">
                    <td><?php echo $row["CustomerID"];?></td>
                    <td class="editable"><?php echo $row["FirstName"];?></td>
                    <td class="editable"><?php echo $row["LastName"];?></td>
                    <td class="editable"><?php echo $row["Email"];?></td>
                    <td class="editable"><?php echo $row["phone_number"];?></td>
                    <td><?php echo $row["Image"];?></td>
                    <td style="display: flex; align-items: center;">
                        <form action="../Controllers/customerController.php" method="GET">
                            <button class="edit-btn" name="edit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="img/edit.png" alt="Edit"> 
                            </button>
                        </form>
                        <form action="../Controllers/customerController.php" method="GET">
                            <input type="hidden" name="delete" value="<?php echo $row['CustomerID']; ?>">
                            <button class="delete-btn" style="background: none; border: none; padding: 0; cursor: pointer; margin-right: 0;">
                                <img src="img/delete.png" alt="Delete" style="margin-right: -35px;">
                            </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <!--<div class="pagination">
            <label for="perPage">Show per page:</label>
            <select id="perPage">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            <div class="page-numbers" id="page-numbers"></div>
        </div>-->
    </form>
</main>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>