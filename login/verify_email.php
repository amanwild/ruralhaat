<?php

session_start();
include "../db.php";
include "../service/filter_input.php";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['verify_email'])) {

  $email_otp = filter($_POST["email_otp"]);
  $user_email = filter($_POST["user_email"]);

  $exist_result = false;

  // echo $user_email;
  // echo $email_otp;
  $exist_query = "SELECT * FROM `users_entries` WHERE `user_otp` LIKE '$email_otp' AND `user_email` LIKE '$user_email' AND user_otp_created >= now() - INTERVAL 1 DAY AND user_otp_is_expired = 0 AND is_verified_email LIKE 1";


  // echo $email_otp;
  $exist_result = mysqli_query($connect, $exist_query);
  // echo "here";
  // var_dump($exist_result);  
  try {
    if ($exist_result) {
      // echo "here";
      $num  = mysqli_num_rows($exist_result);
      if ($num > 0) {
        // echo "here";
        while ($row = mysqli_fetch_assoc($exist_result)) {

          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['user_username'] = $row['user_username'];
          $_SESSION['user_email'] = $row['user_email'];
          $_SESSION['user_type'] = $row['user_type'];
          $user_id = $row['user_id'];

          $update_query = "UPDATE `users_entries` SET `user_otp` = '', `user_otp_created` = '', `user_otp_is_expired` = '1' WHERE `users_entries`.`user_id` = $user_id";

          try {
            // echo "success";
            $update_result = mysqli_query($connect, $update_query);

            if ($update_result) {

              echo ("<script> alert('Valid OTP') </script>");
              echo "<script> window.location.replace('./reset_password.php');</script>";
            } else {
              echo ("<script> alert('Invalid OTP') </script>");
            }
          } catch (Exception $e) {
            // echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
          }
          // echo "<script> window.location.replace('http://127.0.0.1:8080/author/product_details/index.php');</script>";
        }
      } else {
        $exist_result = false;
        echo ("<script> alert('Invalid OTP') </script>");
        // echo "invalid username";
        // header("location: /forum/index.php");
      }
    }
  } catch (Exception $e) {
    // echo "try insertion failed " . "<br>";
    // echo 'Message: ' . $e->getMessage() . "<br>";
  }
}


?>









<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>Enter OTP </title>
  <?php include "../theme/head_data.php"; ?>
</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <?php include "../navbar/index.php" ?>
  <section class="inner-page-content border-bottom top-pad-60">

   
    <div class="bg-image"></div>
    <div class="login-register login-register-v1" style="padding-top: 10px;">
      <div class="container">
        <div class="row" id="login_form">
          <div class="col-lg-10 col-md-11 col-sm-12 center-block">
            <div class="row">
              <div class="col-lg-12">

                <div class="classiera-login-register-heading border-bottom text-center">
                  <h3 class="text-uppercase">Reset Your Password</h3>
                </div>
              </div>
              <!--social-login-->
            </div><!--col-lg-12-->
          </div><!--row-->
          <div class="login" style="padding-left: 10px;padding-right: 10px;width:auto;height:auto;margin:5px;">
            <!-- <img class="image" src="../wp-content/uploads/2018/11/mgiri office.jpg" alt="Your Image"> -->
            <div class="row">
              <div class="col-lg-8 center-block">
                <form enctype="multipart/form-data"  action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-3 col-lg-3 single-label left-pad-20">
                        <label style="color:#017FB1" for="email_otp">Enter OTP : </label>
                      </div><!--col-lg-3-->
                      <div class="col-sm-9 col-lg-9">
                        <div class="inner-addon left-addon">
                          <!-- <i class="left-addon form-icon fas fa-user"></i> -->
                          <input type="text" id="email_otp" name="email_otp" class="form-control form-control-md sharp-edge" placeholder="OTP" data-error="OTP is required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--col-lg-9-->
                    </div><!--row-->
                  </div><!--UserName-->
                  <div class="col-sm-9 col-lg-9 col-xs-12 pull-right flip">

                    <!--Google-->
                    <div class="form-group">
                      <input type="hidden" id="verify_email" name="verify_email" value="verify_email" />
                      <input type="hidden" id="user_email" name="user_email" value=<?= $_GET['user_email'] ?> />
                      <button type="submit" class="btn btn-primary sharp btn-md btn-style-one" name="op" value="verify_email">Verify Email</button>
                    </div>
                  </div>
              </div><!--Rememberme-->
            </div>
            </form>
          </div>
        </div>
      </div><!--col-lg-8-->
    </div><!--row-->
  </section>
  <!-- page content -->
  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/index.php" ?>  <?php include "../theme/body_data.php";?>

</body>



</html>