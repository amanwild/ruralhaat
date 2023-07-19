<?php
include "../db.php";

function filter($string)
{
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    return $string;
}

// if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['username'])) {
    
    // echo "new user";
    $email = filter($_POST["email"]);
  
    $exist_result = false;
    $exist_query = "SELECT * FROM `users_entries` WHERE  user_email = '$email' AND is_verified_email = 1";
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $row  = mysqli_num_rows($exist_result);
        if ($row >  0) {
            $exist_result = 1;
        }else{
            echo "Email is not registered OR verified";

        }
       
    } catch (Exception $e) {
        // echo "Duplicate date Checking failed ";
        echo 'Message: ' . $e->getMessage() . "<br>";
    }
    