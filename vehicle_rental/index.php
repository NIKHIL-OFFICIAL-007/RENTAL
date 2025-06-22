<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Rental System</title>
    <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">RENTAL</div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <button>&#128269;</button>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1><span>Get Your</span><br><strong>Dream Car</strong></h1>
            <h2>Need to Rent a Car?</h2>
            <p>Find premium vehicles for rent near you — fast, affordable, and reliable.<br> 
                Drive your dream today.</p>
            <div class="buttons">
                <a href="#" class="btn read-more">Read More</a>
                <a href="login.php" class="btn login">Log In</a>
            </div>
        </div>
        <div class="hero-image">
            <div class="curve-clip">
                <img src="car.png" alt="Car">
            </div>
        </div>
    </section>
</body>
</html>