<?php
session_start();
@include 'db_connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout_style.css">
</head>
<body>

<h1>Checkout</h1>

<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    <?php
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td>$<?php echo number_format($item['price'], 2); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="3" align="right"><strong>Grand Total:</strong></td>
        <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
    </tr>
</table>

<!-- Checkout Form -->
<h2>Enter Your Details</h2>
<form action="place_order.php" method="POST">
    <input type="hidden" name="order_data" value="<?php echo htmlspecialchars(json_encode($_SESSION['cart'])); ?>">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

    <div class="form-group">
        <div class="input-box">
            <label>Your Name</label>
            <input type="text" name="name" required>
        </div>
        <div class="input-box">
            <label>Your Phone Number</label>
            <input type="text" name="number" required>
        </div>
    </div>

    <div class="form-group">
        <div class="input-box">
            <label>Your Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-box">
            <label>Payment Method</label>
            <select name="method">
                <option value="Cash on Delivery" selected>Cash on Delivery</option>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-box">
            <label>Address Line 1</label>
            <input type="text" name="flat" required>
        </div>
        <div class="input-box">
            <label>Address Line 2</label>
            <input type="text" name="street" >
        </div>
    </div>

    <div class="form-group">
        <div class="input-box">
            <label>City</label>
            <input type="text" name="city" required>
        </div>
        <div class="input-box">
            <label>State</label>
            <input type="text" name="state" required>
        </div>
    </div>

    <div class="form-group">
        <div class="input-box">
            <label>Country</label>
            <input type="text" name="country" required>
        </div>
        <div class="input-box">
            <label>Pin Code</label>
            <input type="text" name="pin_code" required>
        </div>
    </div>

    <button type="submit" class="btn">Place Order</button>
</form>



</body>
</html>
