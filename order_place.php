<?php include("dbcon.php");?>

<?php 
session_start(); 


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "select * from `products` where `id` = '$id'";
    $result = mysqli_query($connection, $query);
    
    $_SESSION['total'];

    if ($row = mysqli_fetch_assoc($result)) {
       
        $_SESSION['cart'][] = [
            'id' => $row['id'],
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'quantity' => 1 
        ];

        
        echo "<script>alert('Added to cart: " . $row['product_name'] . "');
        window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Product not found.');
        window.location.href = 'index.php';</script>";
    }
}
