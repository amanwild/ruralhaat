<?php
require "../validation_of_login.php";
// echo" 3Session is Destroyed ";    echo"<br>";
// if (($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST["Logout"])) {

// echo" Session is Destroyed ";    echo"<br>";

try {
    
if (isset($_SESSION['slave_id']) && '' != $_SESSION['slave_id']) {
    $_SESSION['slave_is_verified_admin'] = "";
    $_SESSION['slave_type'] = "";
    $_SESSION['slave_username'] = "";
    $_SESSION['slave_email'] = "";
    $_SESSION['slave_id'] = "";
    $_SESSION['slave_first_name'] = "";
    $_SESSION['slave_last_name'] = "";
    $_SESSION['slave_image'] = "";
    $_SESSION['slave_image_url'] = "";
    $_SESSION['slave_phone'] = "";
  }
    echo "Slave Session is Destroyed ";

    // echo"Please set Session variables from "set or start session"to log in";    echo"<br>";
    header("location: /author/login/index.php");
} catch (\Throwable $th) {
    $Logout_result = 0;
}
// }
