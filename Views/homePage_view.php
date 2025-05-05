<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petty - Pet Shop Management System</title>
    <link rel="stylesheet" href="css/homePage_view.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Petty</h1>
            <p>Pet Shop Management System</p>
        </div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to Petty</h2>
            <p>Your one-stop solution for managing your pet shop with ease and efficiency.</p>
            <button onclick="redirectToLogin()">Learn More</button>
        </div>
        <div class="hero-image">
            <img src="img/pets.png" alt="Pet Shop Image">
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Petty. All rights reserved.</p>
    </footer>

    <script>
        function redirectToLogin() {
            window.location.href = "login&registration.php";
        }
</script>
</body>
</html>