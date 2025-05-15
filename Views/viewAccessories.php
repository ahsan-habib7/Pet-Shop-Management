<?php include '../Controllers/adminLoginCheckController.php'; ?>
<?php
include ('../Models/database.php');
include ('../Models/accessoriessModel.php');
$all_product = Accessoriesdata();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/viewAccessories.css">
</head>
<body>
<?php include 'html/viewAccessories_navigation.html'?>
<main>
    <div class="container">
        <div>
            <h1>Accessories List</h1>
            <p>Manage your Accessories List</p>
        </div>
        <button onclick="window.location.href='addAccessories_view.php'">
            <span style="font-size: 18px; margin-right: 5px;">+</span> Add Accessories
        </button>
    </div>

    <form id="uploadForm">
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
        <!--<table class="purchase-table">
            <thead>
                <tr>
                    <th>Acc ID</th>
                    <th>Accessories Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Specific name with type</th>
                    <th>Acc type</th>
                    <th>Image</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="purchase-tbody">
               
                <?php //while ($row = $all_product->fetch_assoc()) { ?>
                <tr>
                    <td><?php //echo $row["product_id"];?></td>
                    <td><?php //echo $row["product_name"];?></td>
                    <td><?php //echo $row["price"]; ?></td>
                    <td><?php //echo $row["accessoriescategory"];?></td>
                    <td><?php //echo $row["Name_specific"];?></td>
                    <td><?php //echo $row["accessoriespettype"];?></td>
                    <td><?php //echo $row["product_image"]; ?></td>
                    <td style="display: flex; align-items: center;">
                        <form action="../Controllers/accessoriesController.php" method="GET">
                            <input type="hidden" name="edit" value="<?php //echo $row['product_id']; ?>">
                            <button class="edit-btn" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="img/edit.png" alt="Edit"> 
                            </button>
                        </form>
                        <form action="../Controllers/accessoriesController.php" method="GET">
                            <input type="hidden" name="delete" value="<?php //echo $row['product_id']; ?>">
                            <button class="delete-btn" style="background: none; border: none; padding: 0; cursor: pointer; margin-right: 0;">
                                <img src="img/delete.png" alt="Delete" style="margin-right: -35px;">
                            </button>
                        </form>
                    </td>
                </tr>
                <?php //} ?>
            </tbody>
        </table>-->
<table class="purchase-table">
    <thead>
        <tr>
            <th>Acc ID</th>
            <th>Accessories Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Specific name with type</th>
            <th>Acc type</th>
            <th>Image</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody id="purchase-tbody">
        <?php while ($row = $all_product->fetch_assoc()) { ?>
        <tr data-id="<?php echo $row['product_id']; ?>">
            <td><?php echo $row["product_id"];?></td>
            <td>
                <span class="display-text"><?php echo $row["product_name"]; ?></span>
                <input type="text" class="edit-input" name="product_name" value="<?php echo $row["product_name"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["price"]; ?></span>
                <input type="number" class="edit-input" name="price" value="<?php echo $row["price"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["accessoriescategory"]; ?></span>
                <input type="text" class="edit-input" name="accessoriescategory" value="<?php echo $row["accessoriescategory"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["Name_specific"]; ?></span>
                <input type="text" class="edit-input" name="Name_specific" value="<?php echo $row["Name_specific"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["accessoriespettype"]; ?></span>
                <input type="text" class="edit-input" name="accessoriespettype" value="<?php echo $row["accessoriespettype"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["product_image"]; ?></span>
                <input type="file" class="edit-input" name="product_image" style="display: none; width: 100%;">
            </td>
            <td style="display: flex; align-items: center;">
                <button class="edit-btn" onclick="editRow(this)" style="background: none; border: none; padding: 0; cursor: pointer;">
                    <img src="img/edit.png" alt="Edit">
                </button>
                <form action="../Controllers/accessoriesController.php" method="POST">
                <button class="save-btn" name="save" onclick="saveRow(this)" style="background: none; border: none; padding: 0; cursor: pointer; display: none;">
                    <img src="img/save.png" alt="Save">
                </button></form>
                <button class="cancel-btn" onclick="cancelEdit(this)" style="background: none; border: none; padding: 0; cursor: pointer; display: none;">
                    <img src="img/cancel.png" alt="Cancel">
                </button>
                <form action="../Controllers/accessoriesController.php" method="GET">
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
    </form>
</main>
<script type="text/javascript" src="js/viewAccessories.js"></script>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>