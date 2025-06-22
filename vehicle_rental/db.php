<?php
$host = "localhost";             // Database host
$user = "root";                  // MySQL username (default for XAMPP)
$password = "";                  // MySQL password (empty by default in XAMPP)
$dbname = "vehicle_rental_db";   // Your actual database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>