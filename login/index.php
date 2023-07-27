<?php
// include "../logout/index.php";
include('../php_mailer_config/config.php');

$login_button = '';


if (isset($_GET["code"])) {

  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


  if (!isset($token['error'])) {

    $google_client->setAccessToken($token['access_token']);


    $_SESSION['access_token'] = $token['access_token'];


    $google_service = new Google_Service_Oauth2($google_client);


    $data = $google_service->userinfo->get();


    if (!empty($data['given_name'])) {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if (!empty($data['email'])) {
      $_SESSION['user_email_address'] = $data['email'];
      $_SESSION['user_email'] = $data['email'];
    }

    if (!empty($data['gender'])) {
      $_SESSION['user_gender'] = $data['gender'];
    }

    if (!empty($data['picture'])) {
      $_SESSION['user_image_url'] = $data['picture'];
    }
  }
}


if (!isset($_SESSION['access_token'])) {

  $login_button = '<a href="' . $google_client->createAuthUrl() . '">Login With Google</a>';
}

?>

<?php
if ($login_button == '' || isset($_SESSION['is_verified_admin'])) {
  include "../db.php";

  // echo"<pre>";
  // var_dump($_SESSION);
  // echo"<pre>";
  require "email_verification_shooting.php";
  //  echo$user.$hash.$firstname.$lastname.$email. "<br>";

  $exist_result = false;
  $user_email_address_condition = "";
  $user_email_condition = "";
  if (isset($_SESSION['user_email_address'])) {
    $user_email_address_condition = " user_email = '" . $_SESSION['user_email_address'] . "'";
  } else {
    if (isset($_SESSION['user_email'])) {
      $user_email_condition = " user_email = '" . $_SESSION['user_email'] . "'";
    }
  }

  $exist_query = "SELECT * FROM users_entries WHERE  $user_email_address_condition $user_email_condition";
  try {
    // echo $exist_query;
    $exist_result = mysqli_query($connect, $exist_query);
    $row  = mysqli_num_rows($exist_result);
    if ($row >  0) {
      // echo "hello";

      while ($row = mysqli_fetch_assoc($exist_result)) {
        $_SESSION['is_verified_admin'] = $row['is_verified_admin'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['user_request_for_seller'] = $row['user_request_for_seller'];
        $_SESSION['user_username'] = $row['user_username'];
        $_SESSION['user_email'] = $row['user_email'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_first_name'] = $row['user_first_name'];
        $_SESSION['user_last_name'] = $row['user_last_name'];
        unset($_SESSION['enquery_first_name']);
        unset($_SESSION['enquery_last_name']);
        unset($_SESSION['enquery_email']);
        unset($_SESSION['enquery_phone']);
        unset($_SESSION['enquery_id']);
      }
      if ($_SESSION['is_verified_admin']) {
        if ($_SESSION['user_type'] == "user") {
          // echo "user";
          echo "<script> window.location.replace('../user_panel/dashboard.php');</script>";
        }
        if ($_SESSION['user_type'] == "admin") {
          // echo "admin";
          echo "<script> window.location.replace('../admin_panel/index.php');</script>";
        }
        if ($_SESSION['user_type'] == "buyer") {
          // echo "buyer";
          echo "<script> window.location.replace('../buyer_panel/dashboard.php');</script>";
        }
        if ($_SESSION['user_type'] == "registration_manager") {
          // echo "admin";
          echo "<script> window.location.replace('../registration_manager_panel/index.php');</script>";
        }
        if ($_SESSION['user_type'] == "listing_manager") {
          // echo "admin";
          echo "<script> window.location.replace('../listing_manager_panel/product_details.php');</script>";
        }
        if ($_SESSION['user_type'] == "inspector") {
          // echo "admin";
          echo "<script> window.location.replace('../inspector_panel/index.php');</script>";
        }
        if ($_SESSION['user_type'] == "data_analyst") {
          // echo "admin";
          echo "<script> window.location.replace('../data_analyst_panel/index.php');</script>";
        }
        if ($_SESSION['user_type'] == "user_manager") {
          // echo "admin";
          echo "<script> window.location.replace('../user_manager_panel/user_management.php');</script>";
        }
      } else {
        // echo "Your Account is under Observation";





        // session_start();
        include "../db.php";
        include "../service/filter_input.php";

        


        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit_login'])) {

          if (isset($_POST['login_username'])) {
            $user = filter($_POST["login_username"]);
            $exist_query = "SELECT * FROM `users_entries` WHERE (user_username like '$user' or user_email like '$user') and is_verified_email = 1";
          }
          $login_password = filter($_POST["login_password"]);


          $exist_result = false;

          $exist_result = mysqli_query($connect, $exist_query);
          // var_dump($exist_result);
          // $_SESSION['user_type'] = 'none';
          try {
            if ($exist_result) {
              $num  = mysqli_num_rows($exist_result);
              if ($num > 0) {
                while ($row = mysqli_fetch_assoc($exist_result)) {
                  $is_verified_email = $row["is_verified_email"];
                  // echo $login_password;
                  // echo $is_verified_email;

                  // var_dump(password_verify($login_password, $row['user_password']));
                  if (password_verify($login_password, $row['user_password'])) {
                    // echo $login_password;
                    $_SESSION['user_username'] = $row['user_username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_type'] = $row['user_type'];
                    $_SESSION['user_request_for_seller'] = $row['user_request_for_seller'];
                    $_SESSION['user_image'] = $row['user_image'];
                    $_SESSION['user_email'] = $row['user_email'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['is_verified_admin'] = $row['is_verified_admin'];
                    unset($_SESSION['enquery_first_name']);
                    unset($_SESSION['enquery_last_name']);
                    unset($_SESSION['enquery_email']);
                    unset($_SESSION['enquery_phone']);
                    unset($_SESSION['enquery_id']);
                    // ["enquery_email"]=>
                    // string(8) "sad@fsad"
                    // ["enquery_phone"]=>
                    // string(10) "8963588888"
                    // ["enquery_id"]=>
                    // int(22)


                    if ($row['user_type'] == 'admin') {
                      echo "<script> window.location.replace('../admin_panel/index.php');</script>";
                    }

                    if ($row['user_type'] == 'user') {
                      echo "<script> window.location.replace('../user_panel/dashboard.php');</script>";
                    }
                    if ($row['user_type'] == 'buyer') {
                      echo "<script> window.location.replace('../buyer_panel/dashboard.php');</script>";
                    }
                    if ($_SESSION['user_type'] == "registration_manager") {
                      // echo "admin";
                      echo "<script> window.location.replace('../registration_manager_panel/index.php');</script>";
                    }
                    if ($_SESSION['user_type'] == "listing_manager") {
                      // echo "admin";
                      echo "<script> window.location.replace('../listing_manager_panel/product_details.php');</script>";
                    }
                    if ($_SESSION['user_type'] == "inspector") {
                      // echo "admin";
                      echo "<script> window.location.replace('../inspector_panel/index.php');</script>";
                    }
                    if ($_SESSION['user_type'] == "data_analyst") {
                      // echo "admin";
                      echo "<script> window.location.replace('../data_analyst_panel/index.php');</script>";
                    }
                    if ($_SESSION['user_type'] == "user_manager") {
                      // echo "admin";
                      echo "<script> window.location.replace('../user_manager_panel/user_management.php');</script>";
                    }
                  }
                }
              } else {
                $exist_result = false;
                // echo "invalid username";
                // header("location: /forum/index.php");
              }
            }
          } catch (Exception $e) {
            echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
          }
        }


?>



        <!DOCTYPE html>
        <html lang="en-US">

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

        <head>
          <title>Login &#8211; Ruralhaat</title>
          <?php include "../theme/head_data.php";?>
        </head>

        <body data-rsssl=1 class="page-template page-template-template-contact page-template-template-contact-php page page-id-33 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
          <?php include "../navbar/stranger_navbar.php" ?>
          <?php include "../navbar/section_navbar.php" ?>
          <?php include "./pending_status.php" ?>
          <?php include "../footer/index.php" ?>

          <?php include "../theme/body_data.php";?>



          <?php include "./login_script.php" ?>
        </body>



        </html>
  <?php
        //Reset OAuth access token
        $google_client->revokeToken();

        //Destroy entire session data.
        session_destroy();
      }
    } else {

      // echo "Your email is not registered ,Send Request for Account Activation.";



      $register_username = substr($_SESSION['user_email'], 0, -10);
      $register_f = $_SESSION['user_first_name'];

      function random_username($string)
      {
        $nrRand = rand(1000, 10001);

        $string = strtolower($string);
        return "user" . preg_replace('/^(.+)\s(.{2}).+$/', '$1$2', $string, 1) . $nrRand;
      }
      $rand_username = $register_f . $register_username;
      // var_dump($rand_username);

      $register_username = random_username($rand_username);
      $_SESSION['user_username'] = $register_username;
      $_SESSION['user_type'] = "user";


      include "./google_reg_req_form.php";
      include "./login_script.php";
      include "../footer/index.php";
    }
  } catch (Exception $e) {
    // echo "Duplicate date Checking failed " . "<br>";
    // echo 'Message: ' . $e->getMessage() . "<br>";
  }

  // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
  // echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
  // echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
  // echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
  // echo '<h3><a href="logout.php">Logout</h3></div>';
} else {
  // echo '<div align="center">' . $login_button . '</div>';


  //First Login interface 

  // session_start();
  include "../db.php";
  include "../service/filter_input.php";

  


  if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit_login'])) {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";
    // $user = filter($_POST["login_username"]);
    $login_password = $_POST["login_password"];
    if (isset($_POST['login_username'])) {
      $user = filter($_POST["login_username"]);
      $exist_query = "SELECT * FROM `users_entries` WHERE (user_username like '$user' or user_email like '$user') and `is_verified_email` = 1";
    }



    $exist_result = false;
    // $exist_query = "SELECT * FROM `users_entries` WHERE user_username = '$user'";
    $exist_result = mysqli_query($connect, $exist_query);
    // var_dump($exist_result);
    // $_SESSION['user_type'] = 'none';
    try {
      if ($exist_result) {
        $num  = mysqli_num_rows($exist_result);
        if ($num > 0) {
          while ($row = mysqli_fetch_assoc($exist_result)) {
            $is_verified_email = $row["is_verified_email"];
            // echo $login_password;
            // echo $is_verified_email;

            // var_dump(password_verify($login_password, $row['user_password']));
            if (password_verify($login_password, $row['user_password'])) {
              // echo $login_password;
              $_SESSION['user_username'] = $row['user_username'];
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['user_email'] = $row['user_email'];
              $_SESSION['user_type'] = $row['user_type'];
              $_SESSION['user_request_for_seller'] = $row['user_request_for_seller'];
              $_SESSION['user_image'] = $row['user_image'];
              $_SESSION['user_first_name'] = $row['user_first_name'];
              $_SESSION['is_verified_admin'] = $row['is_verified_admin'];
              unset($_SESSION['enquery_first_name']);
              unset($_SESSION['enquery_last_name']);
              unset($_SESSION['enquery_email']);
              unset($_SESSION['enquery_phone']);
              unset($_SESSION['enquery_id']);

              $_SESSION['user_last_name'] = $row['user_last_name'];

              if ($row['user_type'] == 'admin') {
                echo "<script> window.location.replace('../admin_panel/index.php');</script>";
              }

              if ($row['user_type'] == 'user') {
                echo "<script> window.location.replace('../user_panel/dashboard.php');</script>";
              }
              if ($row['user_type'] == 'buyer') {
                echo "<script> window.location.replace('../buyer_panel/dashboard.php');</script>";
              }
              if ($_SESSION['user_type'] == "registration_manager") {
                // echo "admin";
                echo "<script> window.location.replace('../registration_manager_panel/index.php');</script>";
              }
              if ($_SESSION['user_type'] == "listing_manager") {
                // echo "admin";
                echo "<script> window.location.replace('../listing_manager_panel/product_details.php');</script>";
              }
              if ($_SESSION['user_type'] == "inspector") {
                // echo "admin";
                echo "<script> window.location.replace('../inspector_panel/index.php');</script>";
              }
              if ($_SESSION['user_type'] == "data_analyst") {
                // echo "admin";
                echo "<script> window.location.replace('../data_analyst_panel/index.php');</script>";
              }
              if ($_SESSION['user_type'] == "user_manager") {
                // echo "admin";
                echo "<script> window.location.replace('../user_manager_panel/user_management.php');</script>";
              }
            }
          }
        } else {
          $exist_result = false;
          // echo "invalid username";
          // header("location: /forum/index.php");
        }
      }
    } catch (Exception $e) {
      echo "Data insertion failed " . "<br>";
      // echo 'Message: ' . $e->getMessage() . "<br>";
    }
  }


  ?>



  <!DOCTYPE html>
  <html lang="en-US">

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

  <head>
    <title>Login &#8211; Ruralhaat</title>
    <?php include "../theme/head_data.php";?>
  </head>

  <body data-rsssl=1 class="page-template page-template-template-contact page-template-template-contact-php page page-id-33 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
    <?php include "../navbar/index.php" ?>
    <?php include "../navbar/section_navbar.php" ?>
    <?php include "./login_form.php" ?>
    <?php include "../footer/section_footer.php" ?>
    <?php include "../footer/index.php" ?>
    <?php include "../theme/body_data.php";?>


    <?php include "./login_script.php" ?>
  </body>



  </html><?php
        }
          ?>