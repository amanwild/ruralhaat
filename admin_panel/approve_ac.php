<?php
session_start();
include "../db.php";
require "email_approved_password.php";



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST["id"];


    // $password = "user@123";
    $password = "user@" . rand(1000, 9999);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $select_query = "SELECT * FROM `users_entries` WHERE `users_entries`.`user_id`  = $id";
    // echo$fname,$lname;
    try {
        $select_result = mysqli_query($connect, $select_query);
        $num  = mysqli_num_rows($select_result);
    } catch (Exception $e) {
        $mess = $e->getMessage();
    }
    if ($num > 0) {
        $sno = 0;
        while ($row = mysqli_fetch_assoc($select_result)) {
            $user_username = $row['user_username'];
            $user_email = $row['user_email'];
            $is_verified_admin = $row['is_verified_admin'];
        }
        if ('1'!=$is_verified_admin) {
            echo"send password";
            $insert_query = "UPDATE `users_entries` SET `user_password` = '$hash', `is_verified_admin` = '1', `user_admin_verified_timestamp`=current_timestamp() WHERE `users_entries`.`user_id` = $id";
            try {
                $insert_result = mysqli_query($connect, $insert_query);

                if ($insert_result) {
                    echo "enter";

                    // echo "Data insertion" . "<br>";
                    $store = send_mail($user_email, $user_username, $password);
                    if ($store) {
                        echo ("<br> email shooting successfull <br>");
                    } else {
                        echo ("<br> email shooting failed <br>");
                    }
                }
            } catch (Exception $e) {
                // echo "Data insertion failed " . "<br>";
                // echo 'Message: ' . $e->getMessage() . "<br>";
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['array_of_checked_id'])) {
    // echo "hello";
    // echo "enter";
    $array_of_checked_id = $_POST["array_of_checked_id"];


    $update_query = '';
    foreach ($array_of_checked_id as $id) {


        $password = "user@" . rand(1000, 9999);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        


        $select_query = "SELECT * FROM `users_entries` WHERE `users_entries`.`user_id`  = $id";
        // echo$fname,$lname;
        try {
            $select_result = mysqli_query($connect, $select_query);
            $num  = mysqli_num_rows($select_result);
        } catch (Exception $e) {
            $mess = $e->getMessage();
        }
        if ($num > 0) {
            $sno = 0;
            while ($row = mysqli_fetch_assoc($select_result)) {
                $user_username = $row['user_username'];
                $user_email = $row['user_email'];
                $is_verified_admin = $row['is_verified_admin'];
            }
            if ('1'!=$is_verified_admin) {
                echo $id . " -> " . $password . "\n";

                // $update_query .= "UPDATE `users_entries` SET `user_password` = '$hash', `is_verified_admin` = '1', `user_admin_verified_timestamp`=current_timestamp() WHERE `users_entries`.`user_id` = $id; ";
                $update_query = "UPDATE `users_entries` SET `user_password` = '$hash', `is_verified_admin` = '1', `user_admin_verified_timestamp`=current_timestamp() WHERE `users_entries`.`user_id` = $id ";
                $key_value_array_for_hash[$id] = $password;
                try {
                    echo $update_query;
                    $update_result = mysqli_query($connect, $update_query);

                    if ($update_result) {
                        try {
                            $store = send_mail($user_email, $user_username, $password);
                            if ($store) {
                            echo ("<br> email shooting successfull <br>");
                            } else {
                            echo ("<br> email shooting failed <br>");
                            }
                        } catch (Exception $e) {
                            // echo "Data insertion failed " . "<br>";
                            // echo 'Message: ' . $e->getMessage() . "<br>";
                        }
                    }





                } catch (Exception $e) {
                    $mess = $e->getMessage();
                }
            }
        }
    }
    // echo $update_query;
}
