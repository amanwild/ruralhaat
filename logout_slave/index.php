<?php
require "../validation_of_login.php";
// echo" 3Session is Destroyed ";    echo"<br>";
// if (($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST["Logout"])) {

// echo" Session is Destroyed ";    echo"<br>";

try {
    
if (isset($_SESSION['slave_id']) && '' != $_SESSION['slave_id']) {
    unset($_SESSION['slave_is_verified_admin']);
    unset($_SESSION['slave_type']);
    unset($_SESSION['slave_username']);
    unset($_SESSION['slave_email']);
    unset($_SESSION['slave_id']);
    unset($_SESSION['slave_first_name']);
    unset($_SESSION['slave_last_name']);
    unset($_SESSION['slave_image']);
    unset($_SESSION['slave_image_url']);
    unset($_SESSION['slave_phone']);

    // unset($_SESSION['slave_is_verified_admin']);

  }
    echo "Slave Session is Destroyed ";

    // echo"Please set Session variables from "set or start session"to log in";    echo"<br>";
    header("location: ../admin_panel/user_management.php");
} catch (\Throwable $th) {
    $Logout_result = 0;
}
// }
