<?php include '../Controllers/adminLoginCheckController.php'; ?>
<?php
require_once ('../Models/employeeModel.php');
$all_info= empdata();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title></title>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" href="css/viewEmployee.css">
</head>
<body>
<?php include 'html/viewEmployee_navigation.html'?>
<main>
    <div class="container">
        <div>
            <h1>Employee List</h1>
            <p>Manage your Employee List</p>
        </div>
        <button onclick="window.location.href='addEmployee_view.php'">
            <span style="font-size: 18px; margin-right: 5px;">+</span> Add Employee
        </button>
    </div>

    <form id="uploadForm"><!--action="../Controllers/employeeController.php" method="POST"-->
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
                    <th>Emp ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="purchase-tbody">
                <?php //while ($row = $all_info->fetch_assoc()) { ?>
                <tr>
                    <td><?php //echo $row["EmpID"];?></td>
                    <td><?php //echo $row["Name"];?></td>
                    <td><?php //echo $row["PhoneNumber"];?></td>
                    <td><?php //echo $row["Email"];?></td>
                    <td><?php //echo $row["Image"];?></td>
                    <td style="display: flex; align-items: center;">
                        <form action="../Controllers/employeeController.php" method="GET">
                            <button class="edit-btn" name="edit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="img/edit.png" alt="Edit"> 
                            </button>
                        </form>
                        <form action="../Controllers/employeeController.php" method="GET">
                            <input type="hidden" name="delete" value="<?php //echo $row['EmpID']; ?>">
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
            <th>Emp ID</th>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Image</th>
            <th>Image</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody id="purchase-tbody">
        <form action="../Controllers/employeeController.php" method="POST">
        <?php while ($row = $all_info->fetch_assoc()) { ?>
        <tr data-id="<?php echo $row['EmpID']; ?>">
            <td><?php echo $row["EmpID"];?><input type="hidden" name="EmpID" value="<?php echo $row['EmpID']; ?>">
</td>
            <td>
                <span class="display-text"><?php echo $row["Name"]; ?></span>
                <input type="text" class="edit-input" name="Name" value="<?php echo $row["Name"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["PhoneNumber"]; ?></span>
                <input type="number" class="edit-input" name="PhoneNumber" value="<?php echo $row["PhoneNumber"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["Email"]; ?></span>
                <input type="text" class="edit-input" name="Email" value="<?php echo $row["Email"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["Password"]; ?></span>
                <input type="text" class="edit-input" name="Password" value="<?php echo $row["Password"]; ?>" style="display: none; width: 100%;">
            </td>
            <td>
                <span class="display-text"><?php echo $row["Image"]; ?></span>
                <input type="file" class="edit-input" name="Image" style="display: none; width: 100%;">
            </td>
            <td style="display: flex; align-items: center;"></form>
                <button class="edit-btn" onclick="editRow(this)" style="background: none; border: none; padding: 0; cursor: pointer;">
                    <img src="img/edit.png" alt="Edit">
                </button>
                <form action="../Controllers/employeeController.php" method="GET">
                    <input type="hidden" name="save" value="<?php echo $row['EmpID']; ?>">
                <button class="save-btn" onclick="saveRow(this)" style="background: none; border: none; padding: 0; cursor: pointer; display: none;">
                    <img src="img/save.png" alt="Save">
                </button></form>
                <button class="cancel-btn" onclick="cancelEdit(this)" style="background: none; border: none; padding: 0; cursor: pointer; display: none;">
                    <img src="img/cancel.png" alt="Cancel">
                </button>
                <form action="../Controllers/employeeController.php" method="GET">
                    <input type="hidden" name="delete" value="<?php echo $row['EmpID']; ?>">
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
<script type="text/javascript" src="js/viewEmployee.js"></script>
<script type="text/javascript" src="js/admin_view.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>