<?php
require_once('database.php');
$conn = con();
function check($username,$pass)
{
    $conn = con();
	$sql="select * from customer where CustomerID='$username' and Password='$pass'";
	return mysqli_query($conn,$sql);
}

function data()
{
    $conn = con();
	$sql1="select * from customer";
	return mysqli_query($conn,$sql1);;
}

function insert($username, $firstname, $lastname, $email, $pass, $image)
{
	$conn=con();
	$sql="INSERT INTO customer (CustomerID, FirstName, LastName, Email, Password, Image) 
			VALUES ('$username', '$firstname', '$lastname', '$email', '$pass', '$image')";
	$res=mysqli_query($conn,$sql);
	return $res;
}

function checkUser($conn, $username,$firstname, $lastname, $email) {
	$conn=con();
    $query = "SELECT * FROM customer WHERE CustomerID='$username' AND Email='$email' AND FirstName='$firstname' AND LastName='$lastname'";
    return mysqli_query($conn, $query);
}

function updatePassword($conn, $username, $newpassword) {
	$conn=con();
    $query = "UPDATE customer SET Password='$newpassword' WHERE CustomerID='$username'";
    return mysqli_query($conn, $query);
}

function delete($id)
{
    $conn = con();
    $sql2 = "DELETE FROM customer WHERE CustomerID='$id'";
    if (mysqli_query($conn, $sql2)) {
        return true; 
    }
}

function update($username, $firstname, $lastname, $email, $pass)
{
    $conn = con();
    $sql = "UPDATE customer SET FirstName='$firstname', LastName='$lastname', Email='$email', Password='$pass' WHERE CustomerID='$username'";
    return mysqli_query($conn, $sql);
}

function sendMessage($sender, $receiver, $message) {
    global $conn;
    $query = "INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $sender, $receiver, $message);
    return $stmt->execute();
}

?>