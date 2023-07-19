<?php
include "../db.php";

function filter($string)
{
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    return $string;
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit'])) {
    
    $user = filter($_POST["username"]);
    $email = filter($_POST["email"]);
    $phone = filter($_POST["phone"]);

    
    require "email_verification_shooting.php";
    //  echo$user.$hash.$firstname.$lastname.$email. "<br>";

    // echo $signin;
    $exist_result = false;
    $exist_query = "SELECT * FROM users_entries WHERE  Username = '$user'";
    try {
        $exist_result = mysqli_query($connect, $exist_query);
        $row  = mysqli_num_rows($exist_result);
        if ($row >  0) {
            // echo "exist";
            $exist_result = 1;
        }
        if($exist_result->num_rows >  0){
          $exist_result = 1;
        }
        else {
            $exist_result = 0;
            // echo "not exist" . "<br>";
        }
    } catch (Exception $e) {
        // echo "Duplicate date Checking failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }

    // echo"hello";

    if (!($exist_result)) {
        $v_code = bin2hex(random_bytes(16));
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO `users_entries` ( `user_username`,`user_email`, `user_phone`, `user_type`, `user_vcode`) VALUES ( '$user', '$email', '$phone', 'user','$v_code');";
        try {
            $insert_result = mysqli_query($connect, $insert_query);

            if ($insert_result) {

                // echo "Data insertion" . "<br>";
                $store = send_mail($email, $v_code);
                if ($store) {
                    // echo ("<br> email shooting successfull <br>");
                   echo"<script> window.location.replace('../login/index.php');</script>";
                   
                } else {
                    // echo ("<br> email shooting failed <br>");
                }
                
            }
        } catch (Exception $e) {
            echo"<script> window.location.replace('../login/index.php');</script>";
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
        }
    }
}
