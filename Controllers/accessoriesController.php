<?php
require_once('../Models/accessoriessModel.php');
session_start();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $status = deleteAccessories($id);
    if ($status) {
        $_SESSION['mess'] = "Deleted";
        header("Location: ../Views/viewAccessories.php");
    } else {
        echo "Error: Could not delete.";
    }
}

if(isset($_POST['save'])){
    $pname = $_POST['product_name'];
    $price = $_POST['price'];
    //$pimage = $_POST['productImage'];
    $category = $_POST['accessoriescategory'];
    $NameSpec = $_POST['Name_specific'];
    $type = $_POST['accessoriespettype'];

    $pimage = $_POST['productImage'];
    $imagePath = 'img/accessories/' . $pimage;
    
    if (updateAccessories($pname, $price, $imagePath, $category, $NameSpec, $type, $id)) {
        $_SESSION['mess'] = "Data updated successfully!";
    } 
    header("Location: ../Views/viewAccessories.php");
    exit();
}

if (isset($_POST['add'])) {
    $id = $_POST['product_id'];
    $pname = $_POST['product_name'];
    $price = $_POST['price'];
    //$pimage = $_POST['productImage'];
    $category = $_POST['accessoriescategory'];
    $NameSpec = $_POST['name_specific'];
    $type = $_POST['accessoriespettype'];

    $pimage = $_POST['productImage'];
    $imagePath = 'img/accessories/' . $pimage;

    if (insertAccessories($pname, $price, $imagePath, $category, $NameSpec, $type)) {
        header("Location:../Views/addAccessories_view.php");
    } else {
        $_SESSION['mess'] = "Error: Could not insert the record.";
    }
    header("Location: ../Views/addAccessories_view.php");
    exit();
}
?>