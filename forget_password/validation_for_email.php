<?php
include "../db.php";
include "../service/filter_input.php";



// if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['username'])) {

// echo "new user";
$email = filter($_POST["email"]);

$exist_result = false;
$exist_query = "SELECT * FROM `users_entries` WHERE  user_email = '$email'";
// echo $exist_query;
try {
    $exist_result = mysqli_query($connect, $exist_query);
    $num  = mysqli_num_rows($exist_result);
    if ($num >  0) {
        if ($row = mysqli_fetch_assoc($exist_result)) {
            if (!$row['is_verified_email']) {
                echo "Email is Not Verified";
            } else {
                echo "Email is Verified";
                if (!$row['is_verified_admin']) {
                    echo "\n But Account is Not Approved By Admin";
                }
            }
        }
        $exist_result = 1;
        // echo "Email is Registered success";
    } else {
        echo "Email is Not registered ";
    }
} catch (Exception $e) {
    // echo "Duplicate date Checking failed ";
    echo 'Message: ' . $e->getMessage() . "<br>";
}
