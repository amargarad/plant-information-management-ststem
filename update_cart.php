<?php
session_start();

if (isset($_POST['id']) && isset($_POST['quantity'])) {
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $_POST['id']) {
            $item['quantity'] = $_POST['quantity'];
            break;
        }
    }
}

header("Location: cart.php");
exit();
?>
