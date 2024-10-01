<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from `products` where `id` = '$id' ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("query failed");
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>



<?php

if (isset($_POST['update_product'])) {

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];

    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "Images/".$filename;
    move_uploaded_file($tempname, $folder);   

    if($folder == "Images/"){
        $query = "update `products` set `product_name` = '$product_name', `product_price` = '$product_price', `product_category` = '$product_category', `product_description` = '$product_description', `product_quantity` = '$product_quantity' where `id`= '$idnew'";
    }
    else{
        $query = "update `products` set `product_image` = '$folder', `product_name` = '$product_name', `product_price` = '$product_price', `product_category` = '$product_category', `product_description` = '$product_description', `product_quantity` = '$product_quantity' where `id`= '$idnew'";
    }

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed");
    } else {
        header('location:view_edit_products.php');
    }
}

?>

<div class="container">
    <h2 class="edit-existing">Edit Existing Products</h2>
    <form action="update_products.php?id_new=<?php echo $id; ?>" method="post" enctype="multipart/form-data">


    <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label> <br>
            <div class="product_img_update">
                <img src="<?php echo $row['product_image'] ?>" alt=""> <br>
            </div>
            <input type="file" name="uploadfile" class="form-control form-control-lg"/>    
        </div>


        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="product_name" value="<?php echo $row['product_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="number" class="form-control" id="productPrice" name="product_price" value="<?php echo $row['product_price'] ?>">
        </div>
        <div class="mb-3">
            <label for="productCategory" class="form-label">Product Category</label>
            <input type="text" class="form-control" id="product_category" name="product_category" value="<?php echo $row['product_category'] ?>">
        </div>

        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <input type="text" class="form-control" id="product_description" name="product_description" value="<?php echo $row['product_description'] ?>">
        </div>

        <div class="mb-3">
            <label for="productQuantity" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="<?php echo $row['product_quantity'] ?>">
        </div>

        
        <button type=" submit" class="btn btn-primary" name="update_product">Update Products</button>
    </form>
</div>
<?php include('footer.php'); ?>