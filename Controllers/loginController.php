<?php
require_once('../Models/database.php');
include('../Models/alloperations.php');
include('../Models/adminModel.php');
session_start();

if(isset($_POST['signin'])){
    $username = $_POST['username']; 
    $pass = $_POST['pass'];

    if(empty($username) || empty($pass)){ 
        header("location:../Views/login&registration.php");
        exit();
    }
    $adminCheck = checkAdmin($username,$pass);
    if(mysqli_num_rows($adminCheck) == 1){
    //if($username == 'admin' && $pass == 'pass'){
        $_SESSION['admin_id'] = $admin_data['id']; 
        $_SESSION['username'] = $username;
        $_SESSION['admin_logged_in'] = true;
        header('location:../Views/admin_view.php');
        exit();
    }
    $status = check($username, $pass);
    if(mysqli_num_rows($status) == 1){
        $user_data = mysqli_fetch_assoc($status);
        $_SESSION['user_id'] = $user_data['id'];  // Store user ID in session
        $_SESSION['username'] = $username;
        $_SESSION['customer_logged_in'] = true;
        header("location:../Views/CustomerDashboard.php");
        exit();
    } else {
        header("location:../Views/login&registration.php");
        exit();
    }
}