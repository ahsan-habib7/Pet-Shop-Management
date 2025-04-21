<?php
if(isset($_POST['hcbtn'])){
	header("location:../Views/service_details_view.php#healthcare");
}

if(isset($_POST['gbtn'])){
	header("location:../Views/service_details_view.php#grooming");
}

if(isset($_POST['hmbtn'])){
	header("location:../Views/service_details_view.php#healthymeal");
}

if(isset($_POST['esbtn'])){
	header("location:../Views/service_details_view.php#exercise-section");
}

if(isset($_POST['tbtn'])){
	header("location:../Views/service_details_view.php#training");
}

if(isset($_POST['pbbtn'])){
	header("location:../Views/service_details_view.php#petboarding");
}
?>