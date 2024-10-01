<?php include('dbcon.php'); ?>


<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from `orders` where `order_id` = '$id' ";

    $result = mysqli_query($connection, $query);

 

    if (!$result) {
        die("query failed");
    } else {
        $query = "update `orders` set `order_status` = 'Delivered' where `order_id` = '$id'";   
        $result = mysqli_query($connection, $query);
        header("location:view_current_orders.php");
    }
}
?>