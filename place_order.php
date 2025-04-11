<?php
session_start();
@include 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Error: Please log in to place an order. <a href='login.php'>Login here</a>");
}

// Ensure the cart is not empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Error: Your cart is empty.");
}

// Get logged-in user ID
$user_id = $_SESSION['user_id'];

// Get form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$method = mysqli_real_escape_string($conn, $_POST['method']);
$flat = mysqli_real_escape_string($conn, $_POST['flat']);
$street = mysqli_real_escape_string($conn, $_POST['street']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$pin_code = mysqli_real_escape_string($conn, $_POST['pin_code']);

// Initialize total price and product list
$total_price = 0;
$product_list = [];

// Loop through cart items
foreach ($_SESSION['cart'] as $item) {
    // Escape product names properly
    $product_name = mysqli_real_escape_string($conn, $item['name']);
    $product_list[] = "$product_name (x" . $item['quantity'] . ")";
    $total_price += $item['price'] * $item['quantity'];
}

// Convert array to string
$total_products = implode(', ', $product_list);
$total_products = mysqli_real_escape_string($conn, $total_products);

// Insert order into database with user ID
$sql = "INSERT INTO orders (user_id, name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) 
        VALUES ('$user_id', '$name', '$number', '$email', '$method', '$flat', '$street', '$city', '$state', '$country', '$pin_code', '$total_products', '$total_price')";

if (mysqli_query($conn, $sql)) {
    // Clear cart after successful order
    unset($_SESSION['cart']);
    echo "<script>alert('Order placed successfully!'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
