<?php include '../Controllers/adminLoginCheckController.php'; ?>
<?php
require_once '../Models/database.php';
include ('../Models/petsModel.php');

$all_product = Petsdata();

/*if ($all_product) {
    while ($row = mysqli_fetch_assoc($all_product)) {
        //print_r($row);
    }
} else {
    echo "No data found or an error occurred.";
}*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/viewPet.css">
</head>
<body>
<?php include 'html/viewPet_navigation.html'?>
<main>
    <div class="container">
        <div>
            <h1>Pets List</h1>
            <p>Manage your Pets List</p>
        </div>
        <button onclick="window.location.href='addPet_view.php'">
            <span style="font-size: 18px; margin-right: 5px;">+</span> Add Pets
        </button>
    </div>

    <form id="uploadForm" action="../Controllers/petsController.php" method="POST">
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
                    <th>Pets ID</th>
                    <th>Pets Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Specific name with type</th>
                    <th>code to search</th>
                    <th>Image</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="purchase-tbody">
                <?php //while($row = mysqli_fetch_assoc($all_product)){ ?>
                <?php while ($row = $all_product->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["product_id"];?></td>
                    <td><?php echo $row["product_name"];?></td>
                    <td>$<?php echo $row["price"]; ?></td>
                    <td><?php echo $row["category"];?></td>
                    <td><?php echo $row["Name_specific"];?></td>
                    <td><?php echo $row["name_code"];?></td>
                    <td><?php echo $row["product_image"]; ?></td>
                    <td style="display: flex; align-items: center;">
                        <form action="../Controllers/petsController.php" method="GET">
                            <button class="edit-btn" name="edit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="img/edit.png" alt="Edit"> 
                            </button>
                        </form>
                        <form action="../Controllers/petsController.php" method="GET">
                            <input type="hidden" name="delete" value="<?php echo $row['product_id']; ?>">
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