<?php
require_once('database.php');
require_once('alloperations.php');

function Accessoriesdata()
{
	$conn=con();
	$sql1="select * from accessories";
	$res1=mysqli_query($conn,$sql1);
	return $res1;
}

function insertAccessories($pname, $price, $imagePath, $category, $NameSpec, $type)
{
	$conn=con();
	$sql="INSERT INTO accessories (product_name, price, product_image, accessoriescategory, Name_specific, accessoriespettype) 
			VALUES ('$pname', '$price', '$imagePath', '$category', '$NameSpec', '$type')";
	$res=mysqli_query($conn,$sql);
	return $res;
}

function deleteAccessories($id)
{
    $conn = con();
    $sql2 = "DELETE FROM accessories WHERE product_id='$id'";
    if (mysqli_query($conn, $sql2)) {
        return true; 
    }
}

function updateAccessories($pname, $price, $imagePath, $category, $NameSpec, $type, $id) {
    $conn = con();
    //$id = $_POST['product_id'];
    $sql4 = "UPDATE accessories SET product_name='$pname', price='$price', product_image='$imagePath', accessoriescategory='$category', Name_specific='$NameSpec', accessoriespettype='$type' WHERE product_id='$id'";
    $res4 = mysqli_query($conn, $sql4);
    return $res4;
}
?>