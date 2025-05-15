<?php include '../Controllers/adminLoginCheckController.php'; ?>
<?php
require_once ('../Models/database.php');
include ('../Models/foodsModel.php');
$all_product = Foodsdata();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/viewFood.css">
</head>
<body>
<?php include 'html/viewFood_navigation.html'?>
<main>
    <div class="container">
        <div>
            <h1>Foods List</h1>
            <p>Manage your Foods List</p>
        </div>
        <button onclick="window.location.href='addFood_view.php'">
            <span style="font-size: 18px; margin-right: 5px;">+</span> Add Foods
        </button>
    </div>

    <form id="uploadForm" action="../Controllers/foodsController.php" method="POST">
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
                    <th>Foods ID</th>
                    <th>Foods Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Specific name with type</th>
                    <th>Food type</th>
                    <th>Quality</th>
                    <th>Image</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="purchase-tbody">
                <?php //while($row = mysqli_fetch_assoc($all_product)){  ?>
                <?php while ($row = $all_product->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["product_id"];?></td>
                    <td><?php echo $row["product_name"];?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["category"];?></td>
                    <td><?php echo $row["Name_specific"];?></td>
                    <td><?php echo $row["type"];?></td>
                    <td><?php echo $row["Quality"];?></td>
                    <td><?php echo $row["product_image"]; ?></td>
                    <td style="display: flex; align-items: center;">
                        <button class="edit-btn" onclick="editRow(this)" style="background: none; border: none; padding: 0; cursor: pointer;">
                            <img src="img/edit.png" alt="Edit">
                        </button>
                        <form action="../Controllers/foodsController.php" method="POST">
                            <button class="save-btn" name="save" onclick="saveRow(this)" style="background: none; border: none; padding: 0; cursor: pointer; display: none;">
                                <img src="img/save.png" alt="Save">
                            </button>
                        </form>
                        <button class="cancel-btn" onclick="cancelEdit(this)" style="background: none; border: none; padding: 0; cursor: pointer; display: none;">
                            <img src="img/cancel.png" alt="Cancel">
                        </button>
                        <form action="../Controllers/foodsController.php" method="GET">
                            <input type="hidden" name="delete" value="<?php echo $row['product_id']; ?>">
                            <button class="delete-btn" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="img/delete.png" alt="Delete">
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
<script type="text/javascript" src="js/viewAccessories.js"></script>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>