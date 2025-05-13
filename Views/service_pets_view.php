<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/services_pets.css">
</head>
<body>
	<section class="services_pets" id="services_pets">
        <h1 class="heading"> our <span> services </span></h1>
        <div class="box-container">
            <div class="boxs">
                <i class="fas fa-heartbeat"></i>
                <h3>health care</h3>
                <form action="../Controllers/serviceController.php" method="post">
                    <button class="btn" name="hcbtn">read more</button>
                </form>
                <!--<a href="service_details_view.php#healthcare" class="btn">read more</a>-->
            </div>
            <div class="boxs">
                <i class="fas fa-bath"></i>
                <h3>grooming</h3>
                <form action="../Controllers/serviceController.php" method="post">
                    <button class="btn" name="gbtn">read more</button>
                </form>
                <!--<a href="service_details_view.php#grooming" class="btn">read more</a>-->
            </div>
             <div class="boxs">
                <i class="fas fa-drumstick-bite"></i>
                <h3>healthy meal</h3>
                <form action="../Controllers/serviceController.php" method="post">
                    <button class="btn" name="hmbtn">read more</button>
                </form>
                <!--<a href="service_details_view.php#healthymeal" class="btn">read more</a>-->
            </div>
            <div class="boxs">
                <i class="fas fa-baseball-ball"></i>
                <h3>exercise</h3>
                <form action="../Controllers/serviceController.php" method="post">
                    <button class="btn" name="esbtn">read more</button>
                </form>
                <!--<a href="service_details_view.php#exercise-section" class="btn">read more</a>-->
            </div>
            <div class="boxs">
                <i class="fas fa-dog"></i>
                <h3>Training</h3>
                <form action="../Controllers/serviceController.php" method="post">
                    <button class="btn" name="tbtn">read more</button>
                </form>
                <!--<a href="service_details_view.php#training" class="btn">read more</a>-->
            </div>
            <div class="boxs">
                <i class="fas fa-cat"></i>
                <h3>boarding</h3>
                <form action="../Controllers/serviceController.php" method="post">
                    <button class="btn" name="pbbtn">read more</button>
                </form>
                <!--<a href="service_details_view.php#petboarding" class="btn">read more</a>-->
            </div>
        </div>
    </section>

</body>
</html>