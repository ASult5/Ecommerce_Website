<?php include('dbcon.php'); ?>

<?php 


         if(isset($_POST['sign_in_btn'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
         }

         if (empty($email)) {
            header("location:sign_in.php?incorrect=Email is empty");
            exit();
        }
        
        if (empty($password)) {
            header("location:sign_in.php?incorrect=Password is empty");
            exit();
        }

         $query = "select * from `users` where `email_id` = '$email' and `password` = '$password'";
         $result = mysqli_query($connection, $query);


         if(!$result){
            echo "query failed";
         }

         else{
            $row = mysqli_num_rows($result);

            if((int)$row == 1){
                $rows = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['email'] = $rows['email_id'];
                $_SESSION['name'] = $rows['first_name'];
                $_SESSION['id'] = $rows['id'];
                $_SESSION['cart'] = [];
                

                header("location:index.php");
                

                exit();
            }   
            else{
                header("location:sign_in.php?incorrect=Incorrect Password or Email");
                exit();
            }
         }

     ?>