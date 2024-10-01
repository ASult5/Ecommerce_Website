<?php
session_start();

if (isset($_GET['key']) && isset($_GET['quantity'])) {
    $key = $_GET['key'];
    $new_quantity = (int)$_GET['quantity'];

    // Update the quantity in the session cart
    $_SESSION['cart'][$key]['quantity'] = $new_quantity;

    // Get the product price (price per unit)
    $product_price = $_SESSION['cart'][$key]['product_price'];
    // Recalculate the total price for the product based on new quantity
    $new_price = $product_price * $new_quantity;

    // Update the cart total by recalculating the entire cart
    $_SESSION['total'] = 0;
    foreach ($_SESSION['cart'] as $item) {
        $_SESSION['total'] += $item['product_price'] * $item['quantity'];
    }

    // Send the new item price and total back as a JSON response
    echo json_encode([
        'new_price' => number_format($new_price, 2),
        'total' => number_format($_SESSION['total'], 2)
    ]);
}
?>