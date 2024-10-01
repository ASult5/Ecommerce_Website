<?php include('dbcon.php'); ?>


<?php

function specialChars($str)
{
    return preg_match('/[^a-zA-Z]/', $str) > 0;
}

if (isset($_POST['add_user_btn'])) {
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $email_id = trim($_POST['email_id']);
    $password = $_POST['password'];
    $isAdmin = $_POST['admin_checkbox'];
}


if (empty($fname)) {
    header("location:add_new_user.php?error=First name is empty");
    exit();
} else if (specialChars($fname)) {
    header("location:add_new_user.php?error=First name has special characters or numbers");
    exit();
}

if (empty($lname)) {
    header("location:add_new_user.php?error=Last name is empty");
    exit();
} else if (specialChars($lname)) {
    header("location:add_new_user.php?error=First name has special characters or numbers");
    exit();
}

if (empty($email_id)) {
    header("location:add_new_user.php?error=Email is empty");
    exit();
}



$query = "insert into `users` (`first_name`, `last_name`, `email_id`, `password`, `isAdmin`) values ('$fname', '$lname', '$email_id', '$password', '$isAdmin')";

$result = mysqli_query($connection, $query);



if (!$result) {
    die("Query failed");
} else {
    header('location:admin_panel.php');
}
?>
