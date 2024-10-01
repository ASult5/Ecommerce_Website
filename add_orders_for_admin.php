<?php include("dbcon.php"); ?>
<?php include("header.php"); ?>


<div class="container"> 
    <div class="box1">
        <h1>Place Order For An Existing User</h1>
    </div>

    

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email ID</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `users`";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email_id']; ?></td>
                        <td><a href="admin_order_form.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Place Order</a></td>
                    </tr>

            <?php



                }
            }
            ?>



        </tbody>
    </table>



<?php include("footer.php"); ?>