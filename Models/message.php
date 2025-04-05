<?php
require_once('database.php');

function messageData(){
    $conn = con();
    $sql="select * from messages";
    return mysqli_query($conn,$sql);
}
?>