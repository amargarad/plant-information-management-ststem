<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart_style.css">
</head>
<body>

<h1>Your Shopping Cart</h1>

<?php if (!empty($_SESSION['cart'])) { ?>
    <table>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
            ?>
            <tr>
                <td><img src="<?php echo $item['image']; ?>" width="50"></td>
                <td><?php echo $item['name']; ?></td>
                <td>$<?php echo number_format($item['price'], 2); ?></td>
                <td>
                    <form action="update_cart.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>$<?php echo number_format($subtotal, 2); ?></td>
                <td><a href="remove_from_cart.php?id=<?php echo $item['id']; ?>">Remove</a></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4" align="right"><strong>Total:</strong></td>
            <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
            <td></td>
        </tr>
    </table>
    <a href="checkout.php" class="btn">Proceed to Checkout</a>
<?php } else { ?>
    <p>Your cart is empty.</p>
<?php } ?>

<a href="index.php" class="btn">Continue Shopping</a>

</body>
</html>
