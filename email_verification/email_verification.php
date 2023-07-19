<?php
include "../db.php";


if (($_SERVER["REQUEST_METHOD"] == "GET") &&  isset($_GET['v_code']) && isset($_GET['email'])) {
    $verified =false;
    // require "_dbconnect.php";
    $v_code = $_GET["v_code"];
    $email = $_GET["email"];


    require "email_pending_status.php";

    $select_user_query = "SELECT * FROM users_entries WHERE  user_email = '$email'";
    $select_user_result = mysqli_query($connect, $select_user_query);
    $num  = mysqli_num_rows($select_user_result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($select_user_result)) {


            $verification_code =  $row['user_vcode'];
            $Id =  $row['user_id'];
            $is_verified_email =  $row['is_verified_email'];
            $user_type =  $row['user_type'];

            if ($is_verified_email) {
                $verified =true;
            }


            $select_email_result = true;
            if ($v_code == $verification_code && !$is_verified_email) {
                try {
                    
                    // echo "V Code matches success " . "<br>";
                    if($user_type =='buyer'){
                        $update_status_query = "UPDATE `users_entries` SET `is_verified_email` = '1',`is_verified_admin` = '1' WHERE `users_entries`.`user_id` = $Id";
                        
                    }
                    if($user_type =='user'){
                        $update_status_query = "UPDATE `users_entries` SET `is_verified_email` = '1' WHERE `users_entries`.`user_id` = $Id";
                        
                    }
                    $update_status_result = mysqli_query($connect, $update_status_query);
                    if ($update_status_result) {
                        $verified =true;
                        $store = send_mail($email);
                        // echo "verification success " . "<br>";
                    } else {
                        // echo "verification failed " . "<br>";
                    }

                    // header("location: /forum/welcome.php");
                } catch (Exception $e) {
                    // echo "verification failed " . "<br>";
                    // echo 'Message: ' . $e->getMessage() . "<br>";
                    // header("location: /forum/index.php");
                }
            }
        }
    } else {
        $select_email_result = false;
        // echo "invalid email";
        // header("location: /forum/index.php");
    }
}


