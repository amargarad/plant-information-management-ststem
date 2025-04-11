<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Products</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Admin Panel - Manage Products</h2>
    
    <form id="productForm" action="admin_process.php" method="POST" enctype="multipart/form-data">
    <div class="input-group">
        <label>Plant Name:</label>
        <input type="text" name="plant_name" required>
    </div>
    
    <div class="input-group">
        <label>Stars (Rating):</label>
        <input type="number" name="stars" min="1" max="5" required>
    </div>
    
    <div class="input-group">
        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>
    </div>
    
    <div class="input-group">
        <label>Discount (%):</label>
        <input type="number" name="discount" min="0" max="100" required>
    </div>

    <div class="input-group">
        <label>Upload Image:</label>
        <input type="file" name="image" accept="image/*" required>
    </div>
    <div class="form-footer">
    <button type="submit" name="add">Add Product</button>
    </div>
   

</form>


    <h3>Product List</h3>
    <table border="1">
        <tr>
            <th>Plant Name</th>
            <th>Stars</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php include 'display_products.php'; ?>
    </table>
</body>
</html>
