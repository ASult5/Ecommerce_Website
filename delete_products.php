<?php include('dbcon.php'); ?>


<?php


if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "delete from `products` where `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed");
    } else {
        header('location:view_edit_products.php');
    }
}

?>