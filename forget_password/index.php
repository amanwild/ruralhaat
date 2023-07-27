<?php

session_start();
include "../db.php";
include "../service/filter_input.php";



// sending OTP for forget Password
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['forget_password'])) {

  $email = filter($_POST["forget_email"]);

  $exist_result = false;
  $exist_query = "SELECT * FROM `users_entries` WHERE user_email = '$email'";



  require "email_verification_shooting.php";


  $exist_result = mysqli_query($connect, $exist_query);
  // echo "here";
  // var_dump($exist_result);
  // $_SESSION['user_type'] = 'none';
  try {
    if ($exist_result) {
      $num  = mysqli_num_rows($exist_result);
      if ($num > 0) {
        while ($row = mysqli_fetch_assoc($exist_result)) {

          // generate OTP
          $user_otp = rand(100000, 999999);
          $_SESSION['user_username'] = $row['user_username'];
          $user_id = $row['user_id'];
          $_SESSION['user_id'] = $row['user_id'];


          $insert_query = "UPDATE `users_entries` SET `user_otp` = '$user_otp',`user_otp_is_expired` = '0', `user_otp_created` = '" . date("Y-m-d H:i:s") . "' WHERE `users_entries`.`user_id` = $user_id";

          try {
            $insert_result = mysqli_query($connect, $insert_query);

            if ($insert_result) {

              // echo "Data insertion" . "<br>";
              $store = send_mail($email, $user_otp);
              if ($store) {
                echo ("<script> alert('Your OTP has been sent successfully to your $email') </script>");
                // echo ("<br> email shooting successfull <br>");
                echo "<script> window.location.replace('../login/verify_email.php?user_email=$email');</script>";
              } else {
                // echo ("<br> email shooting failed <br>");
              }
            }
          } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
          }
          // echo "<script> window.location.replace('../product_details/index.php');</script>";
        }
      } else {
        $exist_result = false;
        // echo "invalid username";
        // header("location: /forum/index.php");
      }
    }
  } catch (Exception $e) {
    // echo "Data insertion failed " . "<br>";
    // echo 'Message: ' . $e->getMessage() . "<br>";
  }
}


?>


<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>Forget Password : Ruralhaat &#8211; </title>

  <?php include "../theme/head_data.php" ?>
</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
 
  <?php include "../navbar/index.php" ?>
  <?php include "../navbar/section_navbar.php" ?>
  <?php include "./reset_form.php" ?>
  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/index.php" ?>
  <?php include "../theme/body_data.php" ?>
</body>



<?php include "./reset_script.php" ?>

</html>