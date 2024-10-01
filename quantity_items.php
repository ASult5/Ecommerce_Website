<?php
session_start();

if ($_POST['key'] &&  isset($_POST['quantity'])) {
    $key = $_POST['key'];
    $quantity = intval($_POST['quantity']);

    if ($quantity > 0) {
        $_SESSION['cart'][$key]['quantity'] = $quantity;
    }
}
  

header('Location: test.php'); 
exit();
?>