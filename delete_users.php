<?php include('dbcon.php'); ?>


<?php


if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "delete from `users` where `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed");
    } else {
        header('location:view_edit_users.php');
    }
}

?>