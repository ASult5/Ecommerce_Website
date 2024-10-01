<?php include('dbcon.php'); ?>


<?php

function specialChars($str)
{
    return preg_match('/[^a-zA-Z]/', $str) > 0;
}

if (isset($_POST['sign_up_btn'])) {
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $email_id = trim($_POST['email']);
    $password = $_POST['password'];
}


if (empty($fname)) {
    header("location:user_registration.php?error=First name is empty");
    exit();
} else if (specialChars($fname)) {
    header("location:user_registration.php?error=First name has special characters or numbers");
    exit();
}

if (empty($lname)) {
    header("location:user_registration.php?error=Last name is empty");
    exit();
} else if (specialChars($lname)) {
    header("location:user_registration.php?error=Last name has special characters or numbers");
    exit();
}

if (empty($email_id)) {
    header("location:user_registration.php?error=Email is empty");
    exit();
}



$query = "insert into `users` (`first_name`, `last_name`, `email_id`, `password`, `isGuest`) values ('$fname', '$lname', '$email_id', '$password', 0)";

$result = mysqli_query($connection, $query);



if (!$result) {
    die("Query failed");
} else {
    header('location:user_registration_complete.php');
}
?>
