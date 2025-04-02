<?php
// adminDashboardController.php

// Include your database connection file
include '../Models/database.php';
//$conn = con();
// Function to get the total number of customers
function getTotalCustomers($conn) {
    $sql = "SELECT COUNT(*) as total FROM customer";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Function to get the total number of employees
function getTotalEmployees($conn) {
    $sql = "SELECT COUNT(*) as total FROM employee";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Function to get the total number of pets
function getTotalPets($conn) {
    $sql = "SELECT COUNT(*) as total FROM pets";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Function to get the total number of products
function getTotalProducts($conn) {
    $sql = "SELECT COUNT(*) as total FROM foods";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Function to get the total number of accessories
function getTotalAccessories($conn) {
    $sql = "SELECT COUNT(*) as total FROM accessories";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Fetch all data
$totalCustomers = getTotalCustomers($conn = con());
$totalEmployees = getTotalEmployees($conn);
$totalPets = getTotalPets($conn);
$totalProducts = getTotalProducts($conn);
$totalAccessories = getTotalAccessories($conn);

// Close the connection
$conn->close();
?>