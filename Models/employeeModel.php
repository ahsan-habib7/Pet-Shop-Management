<?php
include ('database.php');
$conn = con();
function empdata(){
    $conn= con();
    $sql="select * from employee";
	$res1=mysqli_query($conn,$sql);
	return $res1;
}
?>