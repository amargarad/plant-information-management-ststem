<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from database
    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $result = $conn->query($query);
    $product = $result->fetch_assoc();

    if ($product) {
        $item = [
            'id' => $product['id'],
            'name' => $product['plant_name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => 1
        ];

        // Check if cart exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if item already exists in cart
        $found = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['id'] == $product_id) {
                $cartItem['quantity']++;
                $found = true;
                break;
            }
        }

        // Add new item to cart if not found
        if (!$found) {
            $_SESSION['cart'][] = $item;
        }
    }
}

// Redirect to cart page
header("Location: cart.php");
exit();
?>
