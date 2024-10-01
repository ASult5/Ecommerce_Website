<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from `users` where `id` = '$id' ";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("query failed");
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>



<?php

if (isset($_POST['update_user'])) {

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email_id'];
    $password = $_POST['password'];

    

    $query = "update `users` set `first_name` = '$first_name', `last_name` = '$last_name', `email_id` = '$email', `password` = '$password' where `id`= '$idnew'";
    

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed");
    } else {
        header('location:view_edit_users.php');
    }
}

?>

<div class="container">
    <h2 class="edit-existing">Edit Existing User</h2>
    <form action="update_users.php?id_new=<?php echo $id; ?>" method="post">


    


        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo $row['first_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $row['last_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email ID</label>
            <input type="text" class="form-control" id="email" name="email_id" value="<?php echo $row['email_id'] ?>">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>">
        </div>

        
        <button type=" submit" class="btn btn-primary" name="update_user">Update User</button>
    </form>
</div>
<?php include('footer.php'); ?>