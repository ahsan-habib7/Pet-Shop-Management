<?php
require_once('database.php');
$conn = con();
function checkAdmin($username, $pass)
{
    $conn = con();
	$sql="select * from admins where username='$username' and password='$pass'";
	return mysqli_query($conn,$sql);
}

function dataAdmin()
{
    $conn = con();
	$sql1="select * from admins";
	$res1=mysqli_query($conn,$sql1);
	return $res1;
}