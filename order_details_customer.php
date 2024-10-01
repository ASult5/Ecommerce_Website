<?php include("dbcon.php"); ?>
<?php include("header.php"); ?>


<div class="container"> 
    <div class="box1">
        <h1>Order Details Customer</h1>
    </div>

    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php



            if(isset($_GET['id'])){
                  $id = $_GET['id'];
             

            $query = "select * from `order_items` where `order_id` = '$id'";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php 
                        $product_id =  $row['product_id'];

                        $query_for_name = "select * from `products` where `id` = '$product_id'";

                        $result_for_name = mysqli_query($connection, $query_for_name);

                        $row_for_name = mysqli_fetch_assoc($result_for_name);

                        $product_name = $row_for_name['product_name'];

                        echo $product_name;


                        ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                    </tr>

            <?php



                }
            }
        }
        else{
            echo "Invalid Product";
        }
            ?>



        </tbody>
    </table>



<?php include("footer.php"); ?>