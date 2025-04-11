<?php
include 'db_connect.php';

if (isset($_POST['add'])) {
    $plant_name = mysqli_real_escape_string($conn, $_POST['plant_name']);
    $stars = mysqli_real_escape_string($conn, $_POST['stars']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $discount = mysqli_real_escape_string($conn, $_POST['discount']);

    // Image Upload Handling
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Insert Data into Database
        $sql = "INSERT INTO products (plant_name, stars, price, discount, image) 
                VALUES ('$plant_name', '$stars', '$price', '$discount', '$target')";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin_panel.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}

// Delete Product
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    $conn->query("DELETE FROM products WHERE id=$id");

    header("Location: admin_panel.php");
    exit();
}

$conn->close();
?>
