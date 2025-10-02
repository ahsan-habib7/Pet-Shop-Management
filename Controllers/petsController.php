<?php
require_once('../Models/petsModel.php');
session_start();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $status = deletepet($id);
    if ($status) {
        $_SESSION['mess'] = "Deleted";
        header("Location: ../Views/viewPet_view.php");
    } else {
        echo "Error: Could not delete.";
    }
}

if (isset($_POST['add'])) {
    $pname = $_POST['product_name'];
    $price = $_POST['price'];
    //$pimage = $_POST['productImage'];
    $category = $_POST['category'];
    $NameSpec = $_POST['name_specific'];
    $code = $_POST['name_code'];

    $pimage = $_POST['productImage'];
    $imagePath = 'img/pet/' . $pimage;

    if (insertpet($pname, $price, $imagePath, $category, $NameSpec, $code)) {
        header("Location:../Views/addPet_view.php");
    } else {
        $_SESSION['mess'] = "Error: Could not insert the record.";
    }
    header("Location: ../Views/addPet_view.php");
    exit();
}
?>