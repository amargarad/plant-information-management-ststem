<?php
include 'db_connect.php';

$query = "SELECT * FROM products";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['plant_name']}</td>";
    echo "<td>{$row['stars']}</td>";
    echo "<td>\${$row['price']}</td>";
    echo "<td>{$row['discount']}%</td>";
    echo "<td><img src='{$row['image']}' width='50'></td>";
    echo "<td>
            <a href='update_product.php?edit=" . $row['id'] . "'>Edit</a> |
            <a href='admin_process.php?delete=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
          </td>";
    echo "</tr>";
}
?>
