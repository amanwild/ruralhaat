<?php
include "../db.php";

function filter($string)
{
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    return $string;
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['get_data_by_filter']) && isset($_POST['listing_status_filter']))) {

    $json_username_data[0] = "username";
    $json_username_data[1] = "";
    $json_email_data[0] = "email";
    $json_email_data[1] = "";
    $json_phone_data[0] = "phone";
    $json_phone_data[1] = "";
    $listing_status_filter = filter($_POST["listing_status_filter"]);
 
        // $user = filter($_POST["username"]);
        // echo "new user";

        $username_exist_result = false;
        $username_exist_query = "SELECT * FROM `users_entries` WHERE  user_username = '$user'";
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

    $json_data[0] = $json_username_data;
    // echo $json_data;
    echo json_encode($json_data);
}
