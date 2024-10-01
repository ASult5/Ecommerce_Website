<?php include('dbcon.php'); ?>


<?php


if ($_POST['add_products_btn'] === 'button_clicked') {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category = $_POST['product_category'];
    $description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "Images/".$filename;
    move_uploaded_file($tempname, $folder);             

}



$query = "insert into `products` (`product_name`, `product_price`, `product_category`, `product_image`,`product_description`, `product_quantity`) values ('$name', '$price', '$category', '$folder', '$description', '$product_quantity')";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed");
} else {
    header('location:view_edit_products.php');
}



?>
