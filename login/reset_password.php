<?php include "../validation_of_unverified_login.php"; ?>
<?php

// session_start();
include "../db.php";



if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['reset_password'])) {

  $new_password = filter($_POST["new_password"]);
  $user_id =  $_SESSION['user_id'];
  $user_email =  $_SESSION['user_email'];
  $user_type =  $_SESSION['user_type'];

  require "reset_notification_shooting.php";

  $hash = password_hash($new_password, PASSWORD_DEFAULT);
  $insert_query = "UPDATE `users_entries` SET `user_password` = '$hash' WHERE `users_entries`.`user_id` = $user_id";
  try {
    $insert_result = mysqli_query($connect, $insert_query);

    if ($insert_result) {
      // echo "Data insertion" . "<br>";

      $store = send_mail($user_email);
      if ($store) {
        // echo ("<br> email shooting successfull <br>");

        echo ("<script> alert('Password Reset Successfully') </script>");
        if ($user_type != '') {
          echo "<script> window.location.replace('../logout/index.php');</script>";
        }

        // if ($user_type == 'user') {
        //   echo "<script> window.location.replace('../logout/index.php');</script>";
        // }
      } else {
        // echo ("<br> email shooting failed <br>");
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
  <title>Reset Password </title>

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
          <?php echo "<h4 style='color:red;' id='label_for_password_validation'></h4>"; ?>
          <div class="login" style="padding-left: 10px;padding-right: 10px;width:auto;height:auto;margin:5px;">
            <!-- <img class="image" src="../wp-content/uploads/2018/11/mgiri office.jpg" alt="Your Image"> -->
            <div class="row">
              <div class="col-lg-8 center-block">

                <form enctype="multipart/form-data"  data-toggle="validator" method="POST" id="classiera_login_form" name="classiera_login_form">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-5 col-lg-5 single-label left-pad-20">
                        <label style="color:#017FB1;background-color: #edf9ff;padding:5px;opacity:.8" for="new_password">Enter New Password : <span class="text-danger">*</span></label>
                      </div><!--col-lg-3-->
                      <div class="col-sm-7 col-lg-7">
                        <div class="inner-addon left-addon">
                          <!-- <i class="left-addon form-icon fas fa-user"></i> -->
                          <input type="text" id="new_password" onchange="validation_for_password()" onload="validation_for_password()" name="new_password" class="form-control form-control-md sharp-edge" placeholder="New Password" data-error="Password is required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--col-lg-9-->
                    </div><!--row-->
                  </div><!--UserName-->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-5 col-lg-5 single-label left-pad-20">
                        <label style="color:#017FB1;background-color: #edf9ff;padding:5px;opacity:.8" for="c_password">Confirm Password : <span class="text-danger">*</span></label>
                      </div><!--col-lg-3-->
                      <div class="col-sm-7 col-lg-7">
                        <div class="inner-addon left-addon">
                          <!-- <i class="left-addon form-icon fas fa-user"></i> -->
                          <input type="text" id="c_password" onchange="validation_for_password()" onload="validation_for_password()" name="c_password" class="form-control form-control-md sharp-edge" placeholder="Confirm Password" data-error="Password is required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--col-lg-9-->
                    </div><!--row-->
                  </div><!--UserName-->

                  <div class="col-sm-9 col-lg-9 col-xs-12 pull-right flip">

                    <!--Google-->
                    <div class="form-group">
                      <input type="hidden" id="reset_password" name="reset_password" value="reset_password" />
                      <button type="submit" id="reset_password_btn" class="btn btn-primary sharp btn-md btn-style-one" name="op">Reset Password</button>
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
  
  <?php include "../footer/section_footer.php";?>
  <?php include "../footer/index.php";?>
  <?php include "../theme/body_data.php";?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script>
    function validation_for_password() {
      var password = document.getElementById("new_password");
      password = password.value;
      var c_password = document.getElementById("c_password");
      c_password = c_password.value;
      if (password != c_password) {
        $('#label_for_password_validation').html("Confirm Password Do not match.");
        document.getElementById("reset_password_btn").disabled = true;
      } else {
        $('#label_for_password_validation').html("");
        document.getElementById("reset_password_btn").disabled = false;
      }
      if ((password == "")) {
        $('#label_for_password_validation').html("Password cannot be Empty");
        document.getElementById("reset_password_btn").disabled = true;
      }

    }
  </script>
</body>



</html>