<?php
require_once('database.php');

function Petsdata()
{
	$conn = con();
	$sql="select * from pets";
	$res1=mysqli_query($conn,$sql);
	return $res1;
}

function insertpet($pname, $price, $imagePath, $category, $NameSpec, $code)
{
	$conn=con();
	$sql="INSERT INTO pets (product_name, price, product_image, category, Name_specific, name_code) 
			VALUES ('$pname', '$price', '$imagePath', '$category', '$NameSpec', '$code')";
	$res=mysqli_query($conn,$sql);
	return $res;
}

function deletepet($id)
{
    $conn = con();
    $sql2 = "DELETE FROM pets WHERE product_id='$id'";
    if (mysqli_query($conn, $sql2)) {
        return true; 
    }
}
?>