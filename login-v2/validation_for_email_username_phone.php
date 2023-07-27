<?php
include "../db.php";
include "../service/filter_input.php";



if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['username']) || isset($_POST['phone']) || isset($_POST['email']))) {

    $json_username_data[0] = "username";
    $json_username_data[1] = "";
    $json_email_data[0] = "email";
    $json_email_data[1] = "";
    $json_phone_data[0] = "phone";
    $json_phone_data[1] = "";
    if (isset($_POST['username'])) {
        $user = filter($_POST["username"]);
        // echo "new user";

        $username_exist_result = false;
        $username_exist_query = "SELECT * FROM `users_entries` WHERE  user_username = '$user' AND is_verified_email = 1";
        try {
            $username_exist_result = mysqli_query($connect, $username_exist_query);
            $row  = mysqli_num_rows($username_exist_result);
            if ($row >  0) {
                $username_exist_result = 1;
                $json_username_data[1] = $user . " Username is already taken. Please enter another username";
            }
        } catch (Exception $e) {
            // echo "Duplicate date Checking failed ";
            echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }

    if (isset($_POST['email']) && $_POST['email']!="") {
        $email = filter($_POST["email"]);

        $email_exist_result = false;
        $email_exist_query = "SELECT * FROM `users_entries` WHERE  user_email = '$email' AND is_verified_email = 1 ";
        try {
            $email_exist_result = mysqli_query($connect, $email_exist_query);
            $row  = mysqli_num_rows($email_exist_result);
            if ($row >  0) {
                $email_exist_result = 1;
                $json_email_data[1] = $email . " Email is already registered. Please enter another Email";
            }
        } catch (Exception $e) {
            // echo "Duplicate date Checking failed ";
            echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }
    if (isset($_POST['phone']) && $_POST['phone']!="") {
        // echo"helo";
        $phone = filter($_POST["phone"]);

        $phone_exist_result = false;
        $phone_exist_query = "SELECT * FROM `users_entries` WHERE  user_phone = '$phone'";
        try {
            $phone_exist_result = mysqli_query($connect, $phone_exist_query);
            $row  = mysqli_num_rows($phone_exist_result);
            if ($row >  0) {
                $phone_exist_result = 1;
                $json_phone_data[1] = $phone . " Phone number is already registered. Please enter another Phone number";
            }
        } catch (Exception $e) {
            // echo "Duplicate date Checking failed ";
            echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }
    $json_data[0] = $json_username_data;
    $json_data[1] = $json_email_data;
    $json_data[2] = $json_phone_data;
    // echo $json_data;
    echo json_encode($json_data);
}
