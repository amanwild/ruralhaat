<?php
session_start();
include "../db.php"; require "email_approved_password.php";
// echo "here";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    echo "enter";
    $id = $_POST["id"];


    $password = "user@123";
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $select_query = "SELECT * FROM `users_entries` WHERE `users_entries`.`user_id`  = $id";
    echo "exist";
    // echo$fname,$lname;
    try {
        $select_result = mysqli_query($connect, $select_query);
        $num  = mysqli_num_rows($select_result);
    } catch (Exception $e) {
        $mess = $e->getMessage();
    }
    if ($num > 0) {
        echo "exist";
        
        $sno = 0;
        while ($row = mysqli_fetch_assoc($select_result)) {
            $user_username = $row['user_username'];
            $user_email = $row['user_email'];
            $is_verified_admin = $row['is_verified_admin'];
        }
        
        $insert_query = "UPDATE `users_entries` SET `user_password` = '$hash', `is_verified_admin` = '1' WHERE `users_entries`.`user_id` = $id";
        try {
            echo "before";
            $insert_result = mysqli_query($connect, $insert_query);

            if ($insert_result) {

                // echo "Data insertion" . "<br>";
                $store = send_mail($user_email, $user_username, $password);
                if ($store) {
                    echo ("<br> email shooting successfull <br>");
                    // echo "<script> window.location.replace('http://127.0.0.1:8080/author/login/index.php');</script>";
                } else {
                    echo ("<br> email shooting failed <br>");
                }
            }
        } catch (Exception $e) {
            // echo "<script> window.location.replace('http://127.0.0.1:8080/author/login/index.php');</script>";
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
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
        // $update_query .= "UPDATE `users_entries` SET `user_password` = '$hash', `is_verified_admin` = '1' WHERE `users_entries`.`user_id` = $id; ";
        $update_query = "UPDATE `users_entries` SET `user_password` = '$hash', `is_verified_admin` = '1' WHERE `users_entries`.`user_id` = $id ; ";
        $key_value_array_for_hash[$id] = $password;
        try {
            echo $update_query;
            $update_result = mysqli_query($connect,$update_query);
        } catch (Exception $e) {
            $mess = $e->getMessage();
        }
    }
    // echo $update_query;

    if (true) {
        foreach ($key_value_array_for_hash as $id => $password) {
            echo $id . " -> " . $password . "\n";
        }
    }
    echo "\n";
    echo "\n";
    echo "\n";
    echo "\n";
    echo "\n";
    // try {
    //     echo $update_query;
    //     $update_result = mysqli_query($connect,$update_query);
    // } catch (Exception $e) {
    //     $mess = $e->getMessage();
    // }
    
    if ($update_result) {
        // echo "here";
        foreach ($key_value_array_for_hash as $id => $password) {
            // echo $id . " -> " . $password . "\n";

            $select_user_query = "SELECT * FROM `users_entries` WHERE `users_entries`.`user_id`  = $id";
            // echo$fname,$lname;
            try {
                $select_user_result = mysqli_query($connect, $select_user_query);
                $num  = mysqli_num_rows($select_user_result);
            } catch (Exception $e) {
                $mess = $e->getMessage();
            }
            if ($num > 0) {
                $sno = 0;
                while ($row_for_user_ = mysqli_fetch_assoc($select_user_result)) {
                    $user_username = $row_for_user_['user_username'];
                    $user_email = $row_for_user_['user_email'];
                    $is_verified_admin = $row_for_user_['is_verified_admin'];
                }
                try {
                    $store = send_mail($user_email, $user_username, $password);
                    // if ($store) {
                        echo ("<br> email shooting successfull <br>");
                        // echo "<script> window.location.replace('http://127.0.0.1:8080/author/login/index.php');</script>";
                    // } else {
                        // echo ("<br> email shooting failed <br>");
                    // }
                } catch (Exception $e) {
                    // echo "<script> window.location.replace('http://127.0.0.1:8080/author/login/index.php');</script>";
                    // echo "Data insertion failed " . "<br>";
                    // echo 'Message: ' . $e->getMessage() . "<br>";
                }
            }


            // $sno = 0;
            // while ($row = mysqli_fetch_assoc($update_result)) {
            //     $user_username = $row['user_username'];
            //     $user_email = $row['user_email'];
            //     $is_verified_admin = $row['is_verified_admin'];
            // }

            // $insert_query = "UPDATE `users_entries` SET `user_password` = '$hash', `is_verified_admin` = '1' WHERE `users_entries`.`user_id` = $id";
            // try {
            //     $insert_result = mysqli_query($connect, $insert_query);

            //     if ($insert_result && !$is_verified_admin) {

            //         // echo "Data insertion" . "<br>";
            //         $store = send_mail($user_email, $user_username, $password);
            //         if ($store) {
            //             echo ("<br> email shooting successfull <br>");
            //             // echo "<script> window.location.replace('http://127.0.0.1:8080/author/login/index.php');</script>";
            //         } else {
            //             echo ("<br> email shooting failed <br>");
            //         }
            //     }
            // } catch (Exception $e) {
            //     // echo "<script> window.location.replace('http://127.0.0.1:8080/author/login/index.php');</script>";
            //     // echo "Data insertion failed " . "<br>";
            //     // echo 'Message: ' . $e->getMessage() . "<br>";
            // }
        }
    }
}
