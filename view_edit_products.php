<?php include("dbcon.php"); ?>
<?php include("header.php"); ?>


<div class="container"> 
    <div class="box1">
        <h1>Currently Listed Products</h1>
    </div>

    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Category</th>
                <th>Product Description</th>
                <th>Product Quantity</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `products`";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td class="product_img"><img src="<?php echo $row['product_image']; ?>" alt=""></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_category']; ?></td>
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_quantity']; ?></td>
                        <td><a href="update_products.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                        <td><a href="delete_products.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

            <?php



                }
            }
            ?>



        </tbody>
    </table>



<?php include("footer.php"); ?>