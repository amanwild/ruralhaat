<?php
require "../validation_of_login.php";
// echo" 3Session is Destroyed ";    echo"<br>";
// if (($_SERVER["REQUEST_METHOD"] == "POST") &&  isset($_POST["Logout"])) {

// echo" Session is Destroyed ";    echo"<br>";

try {

    // start_session();
    //logout.php
    if (isset($_SESSION["access_token"])) {
        include('../login/config.php');
        $google_client->revokeToken();

    }

    //Reset OAuth access token

    $_SESSION["loggedout"] = true;
    //Destroy entire session data.

    session_unset();
    session_destroy();
    $Logout_result = 1;
    $login_button = "";
    echo "Session is Destroyed ";
    echo "<br>";

    // echo"Please set Session variables from "set or start session"to log in";    echo"<br>";
    header("location: ../login/index.php");
} catch (\Throwable $th) {
    $Logout_result = 0;
}
// }
