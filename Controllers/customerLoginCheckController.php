<?php
session_start();
if (!isset($_SESSION['customer_logged_in']) || $_SESSION['customer_logged_in'] !== true) {
    header("Location: login&registration.php"); // Redirect to login page if not logged in
    exit();
}
?>