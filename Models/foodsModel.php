<?php
require_once('database.php');
$conn = con();
function Foodsdata()
{
	$conn = con();
	$sql1="select * from foods";
	$res1=mysqli_query($conn,$sql1);
	return $res1;
}

function insertFood($pname, $price, $imagePath, $category, $NameSpec, $type, $quality)
{
	$conn=con();
	$sql="INSERT INTO foods (product_name, price, product_image, category, Name_specific, type, Quality) 
			VALUES ('$pname', '$price', '$imagePath', '$category', '$NameSpec', '$type', '$quality')";
	$res=mysqli_query($conn,$sql);
	return $res;
}


function updateFood($pname, $price, $imagePath, $category, $NameSpec, $type, $quality, $id) {
    $conn = con();
    //$id = $_POST['product_id'];
    $sql4 = "UPDATE foods SET product_name='$pname', price='$price', product_image='$imagePath', category='$category', Name_specific='$NameSpec', type='$type', Quality='$quality' WHERE product_id='$id'";
    $res4 = mysqli_query($conn, $sql4);
    return $res4;
}


function deleteFood($id)
{
    $conn = con();
    $sql2 = "DELETE FROM foods WHERE product_id='$id'";
    if (mysqli_query($conn, $sql2)) {
        return true; 
    }
}
?>