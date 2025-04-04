<?php
require_once('../Models/foodsModel.php');
session_start();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $status = delete($id);
    if ($status) {
        $_SESSION['mess'] = "Deleted";
        header("Location: ../Views/viewFood_view.php");
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
    $type = $_POST['type'];
    $quality = $_POST['quality'];

    $pimage = $_POST['productImage'];
    $imagePath = 'img/foodproduct/' . $pimage;

    if (insert($pname, $price, $imagePath, $category, $NameSpec, $type, $quality)) {
        header("Location:../Views/addFood_view.php");
    } else {
        $_SESSION['mess'] = "Error: Could not insert the record.";
    }
    header("Location: ../Views/addFood_view.php");
    exit();
}

if(isset($_POST['save'])){
    $pname = $_POST['product_name'];
    $price = $_POST['price'];
    //$pimage = $_POST['productImage'];
    $category = $_POST['category'];
    $NameSpec = $_POST['Name_specific'];
    $type = $_POST['type'];

    $pimage = $_POST['productImage'];
    $imagePath = 'img/foodproduct/' . $pimage;
    
    if (updateFood($pname, $price, $imagePath, $category, $NameSpec, $type, $quality, $id)) {
        $_SESSION['mess'] = "Data updated successfully!";
    } 
    header("Location: ../Views/viewAccessories.php");
    exit();
}
?>