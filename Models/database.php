<?php
function con() {
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "petty";
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>