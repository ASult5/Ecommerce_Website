<?php include("dbcon.php"); ?>
<?php include("header.php"); ?>


<div class="container"> 
    <div class="box1">
        <h1>Currently Listed Orders</h1>
    </div>

    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Ordered By</th>
                <th>Order Details</th>
                <th>Mark Order as Completed</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `orders`";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['order_status']; ?></td>
                        <td>
                            <?php 
                            $user_id = $row['user_id']; // Get user_id from the current order
                            
                            $user_query = "SELECT * FROM `users` WHERE `id` = '$user_id'";
                            $user_result = mysqli_query($connection, $user_query);
                
                            if ($user_result) {
                                $user_row = mysqli_fetch_assoc($user_result);
                                $fname = $user_row["first_name"];
                                $lname = $user_row["last_name"];
                                echo $fname . " " . $lname; // Display full name
                            } else {
                                echo "User not found.";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="order_details.php?id=<?php echo $row['order_id']; ?>" class="btn btn-primary">Order Details</a>
                        </td>
                        <td>
                            <a href="order_mark_complete.php?id=<?php echo $row['order_id']; ?>" class="btn btn-success">Mark Completed</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>



        </tbody>
    </table>


<?php include("footer.php"); ?>
