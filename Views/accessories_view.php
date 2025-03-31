<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/accessories_view.css">
</head>
<body>
	<section class="accessories" id="accessories">
		<h2 class="heading"><font color="orange">accessories</font></h2>
		<div class="accessories-grid">
	    	<a href="accessoriesProduct_view.php?category=training-kits" class="accessories-item" data-category="training-kits">
	        	<img src="img/trainingkit.jpg" alt="Training kits">
	        	<span>Training Kits</span>
	    	</a>
	    	<a href="accessoriesProduct_view.php?category=wellness-products" class="accessories-item" data-category="wellness-products">
	        	<img src="img/wellnessproducts.jpg" alt="Wellness Products">
	        	<span>Wellness Products</span>
	    	</a>
	    	<a href="accessoriesProduct_view.php?category=beds" class="accessories-item" data-category="beds">
	        	<img src="img/petbeds.jpg" alt="Beds">
	        	<span>Pet Beds</span>
	    	</a>
	    	<a href="accessoriesProduct_view.php?category=toys" class="accessories-item" data-category="toys">
	        	<img src="img/pettoys.jpg" alt="Toys">
	        	<span>Toys</span>
	    	</a>
	    	<a href="accessoriesProduct_view.php?category=carriers" class="accessories-item" data-category="carriers">
	        	<img src="img/petcarrier.jpg" alt="Carrier">
	        	<span>Carriers</span>
	    	</a>
		</div>
		<br><br>
		<?php include 'accessorieslist_view.php';?>
	</section>
</body>
</html>