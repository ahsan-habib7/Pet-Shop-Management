<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/pets_view.css">
</head>
<body>
	<section class="pets" id="pets">
		<h2 class="heading"> our <span> Collections </span><br><font color="orange">pets</font></h2>
		<div class="pets-grid">
	    	<a href="petProduct_view.php?category=cat" class="pets-item" data-category="cat">
            <img src="img/cat.jpg" alt="Cat">
            <span>Cat</span>
        </a>
        <a href="petProduct_view.php?category=dog" class="pets-item" data-category="dog">
            <img src="img/dog.jpg" alt="Dog">
            <span>Dog</span>
        </a>
        <a href="petProduct_view.php?category=fish" class="pets-item" data-category="fish">
            <img src="img/fish.jpg" alt="Fish">
            <span>Fish</span>
        </a>
        <a href="petProduct_view.php?category=bird" class="pets-item" data-category="bird">
            <img src="img/bird.jpg" alt="Bird">
            <span>Bird</span>
        </a>
        <a href="petProduct_view.php?category=rabbit" class="pets-item" data-category="rabbit">
            <img src="img/rabbit.jpg" alt="Rabbit">
            <span>Rabbit</span>
        </a>
		</div>
		<br><br>
		<?php include 'petlist_view.php';?>
	</section>
</body>
</html>