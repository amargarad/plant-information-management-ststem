<?php
$servername = "localhost"; // Change if using a different server
$username = "root"; // Default MySQL username for XAMPP
$password = ""; // Default MySQL password for XAMPP (leave empty)
$dbname = "plant_shop"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
