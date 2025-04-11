<?php
include 'db_connect.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM products WHERE id=$id");
    $product = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $plant_name = $_POST['plant_name'];
    $stars = $_POST['stars'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    // Handle Image Update
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $target = $product['image']; // Keep old image if not updated
    }

    // Prepare SQL Query
    $stmt = $conn->prepare("UPDATE products SET plant_name=?, stars=?, price=?, discount=?, image=? WHERE id=?");
    $stmt->bind_param("sddssi", $plant_name, $stars, $price, $discount, $target, $id);

    // Execute Query
    if ($stmt->execute()) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h2>Update Product</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label>Name:</label>
        <input type="text" name="plant_name" value="<?php echo $product['plant_name']; ?>" required>
        <label>Stars:</label>
        <input type="number" name="stars" min="1" max="5" value="<?php echo $product['stars']; ?>" required>
        <label>Price:</label>
        <input type="text" name="price" value="<?php echo $product['price']; ?>" required>
        <label>Discount:</label>
        <input type="text" name="discount" value="<?php echo $product['discount']; ?>">
        <label>Image:</label>
        <input type="file" name="image">
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
