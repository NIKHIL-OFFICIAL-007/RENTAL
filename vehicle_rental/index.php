<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Rental System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                <button class="btn read-more" onclick="toggleReadMore()">Read More</button>
                <a href="login.php" class="btn login">Log In</a>
            </div>
        </div>
        <div class="hero-image">
            <div class="curve-clip">
                <img src="car.png" alt="Car">
            </div>
        </div>
    </section>

 <!-- Expandable Read More Content -->
<div id="readMoreContent" class="read-more-content">
    <div class="info-scroll-wrapper">
        <div class="info-boxes scrolling">
            <!-- Box 1 -->
            <div class="info-box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Convenient Locations</h3>
                <p>Multiple rental sites for easy accessibility.</p>
            </div>

            <!-- Box 2 -->
            <div class="info-box">
                <i class="fas fa-headset"></i>
                <h3>24/7 Car Support</h3>
                <p>We provide 24 Hrs customer care and support.</p>
            </div>

            <!-- Box 3 -->
            <div class="info-box">
                <i class="fas fa-file-signature"></i>
                <h3>Flexible Rental Terms</h3>
                <p>Offers rental durations tailored to customer preferences.</p>
            </div>

            <!-- DUPLICATED for seamless scrolling -->
            <div class="info-box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Convenient Locations</h3>
                <p>Multiple rental sites for easy accessibility.</p>
            </div>

            <div class="info-box">
                <i class="fas fa-headset"></i>
                <h3>24/7 Car Support</h3>
                <p>We provide 24 Hrs customer care and support.</p>
            </div>

            <div class="info-box">
                <i class="fas fa-file-signature"></i>
                <h3>Flexible Rental Terms</h3>
                <p>Offers rental durations tailored to customer preferences.</p>
            </div>
        </div>
    </div>

    <div class="content-box">
        <h2>Why Choose Us?</h2>
        <ul>
            <li>✔ 24/7 Support for Bookings & Help</li>
            <li>✔ Affordable Rates & Discounts</li>
            <li>✔ Verified & Clean Vehicles</li>
            <li>✔ Pickup & Drop Anywhere in City</li>
        </ul>
        <p>We are committed to providing the best rental experience with full flexibility, safety, and transparency. Book your next ride in seconds and travel without limits!</p>
    </div>
</div>

    <script>
    function toggleReadMore() {
        const content = document.getElementById("readMoreContent");
        content.classList.toggle("show");
        content.scrollIntoView({ behavior: 'smooth' });
    }
    </script>
</body>
</html>