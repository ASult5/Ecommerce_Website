<?php
include('dbcon.php');  // Include your database connection

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];  // Retrieve the product ID
    echo "Product ID received: " . $product_id;  // Debugging: Echo product ID

    // Perform query to get product details
    $query = "SELECT `price`, `quantity` FROM `products` WHERE `id` = '$product_id'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        echo json_encode($product);  // Return product details as JSON
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
} else {
    echo json_encode(['error' => 'Product ID not received']);
}
?>