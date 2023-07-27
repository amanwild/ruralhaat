<?php include "../validation_of_session.php";
include "../service/filter_input.php";
?>
<?php 
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit_login'])) {

  // echo "<pre>";
  // var_dump($_POST);
  // echo "<pre>";
  // $user = filter($_POST["login_username"]);
  $login_password = $_POST["login_password"];
  if (isset($_POST['login_username'])) {
    $user = filter($_POST["login_username"]);
    $exist_query = "SELECT * FROM `users_entries` WHERE (user_username like '$user' or user_email like '$user') and `is_verified_email` = 1";

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
              $_SESSION['user_image'] = $row['user_image'];
              $_SESSION['user_first_name'] = $row['user_first_name'];
              $_SESSION['is_verified_admin'] = $row['is_verified_admin'];
              if(isset($_SESSION['enquery_email'])){
                unset($_SESSION['enquery_email']);
              }
              if(isset($_SESSION['enquery_phone'])){
                unset($_SESSION['enquery_phone']);
              }
              if(isset($_SESSION['enquery_id'])){
                unset($_SESSION['enquery_id']);
              }

              $_SESSION['user_last_name'] = $row['user_last_name'];

              if ($row['user_type'] == 'admin') {
                echo "<script> window.location.replace('../admin_panel/index.php');</script>";
              }

              if ($row['user_type'] == 'user') {
                echo "<script> window.location.replace('../user_panel/dashboard.php');</script>";
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
  } else {
    echo "username not set" . "<br>";
  }
}

?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)]><!-->
<html lang="en-US">
<!--<![endif]-->

<!-- Mirrored from demo.joinwebs.com/classiera/plum/locations/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 08:32:59 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <title>Search - Ruralhaat</title>


  <?php include "../theme/head_data.php" ?>
  



  <style>
    /* Import Google font - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    .rating-box .stars {
      display: flex;
      align-items: center;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

  <!-- for login overlay -->
  <style>
    #overlay_for_login {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      cursor: pointer;
    }

    .overlay_for_login {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999990;
      cursor: pointer;
    }

    .overlay_box_for_login {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999990;
      cursor: pointer;
    }
  </style>
</head>

<body data-rsssl="1" class="page-template page-template-template-locations page-template-template-locations-php page page-id-45 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">

<?php
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';



  if (isset($_SESSION['enquery_id'])) {
    // echo"<h1>enquery_id set</h1>";

  } else {
    if (isset($_SESSION['user_id'])) {

      if (('' != $_SESSION['user_id']) && isset($_SESSION['user_email'])) {
        $_SESSION['enquery_first_name']  = $_SESSION['user_first_name'];
        $_SESSION['enquery_last_name']  = $_SESSION['user_last_name'];
        $_SESSION['enquery_id']  = $_SESSION['user_id'];
        $_SESSION['enquery_email']  = $_SESSION['user_email'];
        $_SESSION['enquery_phone']  = $_SESSION['user_phone'];
        // echo"<h1>enquery_id not set</h1>";
      }
    } else {
      // echo"<h1>user_id not set</h1>";

      $select_enquery_listing_query = "SELECT * FROM enquery ";
      try {
        $select_enquery_listing_result = mysqli_query($connect, $select_enquery_listing_query);
      } catch (Exception $e) {
        // echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
      }
      // echo $select_enquery_listing_query;
      if ($select_enquery_listing_result) {
        $num_for_all_enquery_listing = mysqli_num_rows($select_enquery_listing_result);
      }
      if ($num_for_all_enquery_listing > 0) {
        while ($row_for_enquery_listing = mysqli_fetch_assoc($select_enquery_listing_result)) {
          $listing_enquery_ipaddress  = $row_for_enquery_listing['enquery_mac_address'];

          $listing_enquery_email  = $row_for_enquery_listing['enquery_email'];


          if (($ipaddress == $listing_enquery_ipaddress)) {
            $_SESSION['enquery_first_name']  = $row_for_enquery_listing['enquery_first_name'];
            $_SESSION['enquery_last_name']  = $row_for_enquery_listing['enquery_last_name'];
            $_SESSION['enquery_id']  = $row_for_enquery_listing['enquery_id'];
            $_SESSION['enquery_email']  = $row_for_enquery_listing['enquery_email'];
            $_SESSION['enquery_phone']  = $row_for_enquery_listing['enquery_phone'];
          } else {
          }
        }
      }
    }
  }


  ?>
  <?php
  // echo"<pre>";
  // var_dump($_SESSION);
  // echo"<pre>";

  // $select_listing_query = "SELECT * FROM `listing`"; //NOTE: here (`) is not equal to (')

  $listing_category_id = "";
  if (isset($_GET['category_id']) && $_GET['category_id'] != "") {
    $listing_category_id = $_GET['category_id'];
    $condition_on_category_id = "(category.category_id like '$listing_category_id') AND";
  } else {
    $condition_on_category_id = "";
  }
  $listing_keyword = "";
  if (isset($_GET['listing_keyword']) && $_GET['listing_keyword'] != "") {
    $listing_keyword = $_GET['listing_keyword'];
  }
  $listing_city = "";
  if (isset($_GET['listing_city']) && $_GET['listing_city'] != "") {
    $listing_city = $_GET['listing_city'];
  }


  $select_listing_query = " SELECT
  *,COUNT(listing_rating_given),AVG(listing_rating_given)
FROM
  listing
  left join category on listing.listing_category_id = category.category_id
  left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id
  left join countries on listing.listing_country_id = countries.country_id
  left join states on listing.listing_state_id = states.state_id
  left join cities on listing.listing_city_id = cities.city_id
  left join users_entries on listing.listing_owner_id = users_entries.user_id
  left join listing_rating on listing.listing_id = listing_rating.listing_rating_on_product_id  
WHERE " . $condition_on_category_id . " (listing_keyword LIKE '%$listing_keyword%' OR listing_title LIKE '%$listing_keyword%'OR listing_description LIKE '%$listing_keyword%') AND ( cities.city_name LIKE '%$listing_city%') AND ( listing.listing_status LIKE 'Active') group by listing.listing_id";
  // echo $select_listing_query;

  try {
    // echo $select_listing_query;
    $select_listing_result = 0;
    if ($connect) {
      $select_listing_result = mysqli_query($connect, $select_listing_query);
      if ($select_listing_result) {
        $select_listing_num = mysqli_num_rows($select_listing_result);
      }
    }
  } catch (Exception $e) {
    $mess = $e->getMessage();
  }
  ?>
  <?php include "../navbar/index.php" ?>
  <?php
  // echo"<pre>"; 
  // var_dump($_SESSION);
  // echo"<pre>"; 
  ?>
  <?php include "../searchbar_section/index.php" ?>

  <?php include "../component/search_result_card.php" ?>

  <div id="overlay_for_registration" class="overlay_for_login " style="display:none;height: 100%;overflow: auto;position: fixed; padding-bottom:100px !important;">
    <div class="container my-3 py-5  " id="registration_form_box" style="margin-top:20px;">
      <div id="main" class=" justify-center">
        <div class="col-lg-12">
          <div class=" mb-4">
            <div class="card-body " style=" border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
              <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                <div class=" my-4 ">
                  <div onclick="hide_registration_popup()"><span style="    padding: 15px; padding-top: 7px; padding-bottom: 8px;font-size:20px; background-color:white; border-radius: 25px;line-height:0px;" class="circle">x</span>
                  </div>
                  <h2 class=" my-auto mr-auto d-inline">Registration Form</h2>
                  <hr class="my-3">
                  <div class="social-login-v2 login-register">
                    <form enctype="multipart/form-data" id="registration_form" class="text-center" method="POST">
                      <div class="form-group">
                        <div class="inner-addon left-addon" style="">

                          <p>Please select User Type :</p>
                          <input type="radio" id="user" name="user_type" value="user" required>
                          <label for="user">Supplier</label>
                          <input type="radio" id="buyer" name="user_type" value="buyer" required>
                          <label for="buyer">Buyer</label>

                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--register_last_name-->
                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="register_username">Username</label> <?php echo "<span style='color:red;' id='label_for_username_validation'></span>"; ?><input type="text" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="register_username" id="register_username" class="form-control form-control-md sharp-edge" placeholder="Enter username" data-error="Username required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--username-->
                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="register_first_name">First Name</label> <input type="text" name="register_first_name" id="register_first_name" class="form-control form-control-md sharp-edge" placeholder="Enter First name" data-error="First name required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--register_first_name-->

                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="register_last_name">Last Name</label> <input type="text" name="register_last_name" id="register_last_name" class="form-control form-control-md sharp-edge" placeholder="Enter Last name" data-error="Last name required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--register_last_name-->



                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="register_email">Email</label> <?php echo "<span style='color:red;' id='label_for_email_validation'></span>"; ?> <input type="email" name="register_email" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="register_email" class="form-control form-control-md sharp-edge" placeholder="Enter email address" data-error="Email required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--Email Address-->




                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="register_phone">Phone no.</label> <?php echo "<span style='color:red;' id='label_for_phone_validation'></span>"; ?><input type="tel" pattern="[0-9]{10}" name="register_phone" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="register_phone" class="form-control form-control-md sharp-edge" placeholder="Enter 10 digit Phone no." data-error="Phone required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--Phone no.-->

                      <div class="form-group">
                        <div class="checkbox">
                          <input type="checkbox" id="agree" data-error="You must agree to our Terms and Conditions" required>
                          <label for="agree">Agree to <a href="#" target="_blank">Terms &amp; Conditions</a></label>
                          <div class="left-side help-block with-errors"></div>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="checkbox">
                          <label>Already have an account? <a onclick="show_login_popup();">Login here</a></label>
                          <div class="left-side help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <input type="hidden" name="register_value" value="register_value" id="register_value" />

                        <button class="btn btn-primary sharp btn-md btn-style-one" id="register_submit_btn" name="op_classiera" type="submit">Register</button>
                      </div><!--register button-->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
  <div id="overlay_for_login" class="custom_overlay " style="display:none;height: 100%;overflow: auto;position: fixed; padding-bottom:100px !important;">
    <div class="container my-3 py-5  " id="login_form_box" style="margin-top:20px;">
      <div id="main" class=" justify-center">
        <div class="col-lg-12">
          <div class=" mb-4">
            <div class="card-body " style=" border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
              <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                <div class=" my-4 ">
                  <div onclick="hide_login_popup()"><span style="    padding: 15px; padding-top: 7px; padding-bottom: 8px;font-size:20px; background-color:white; border-radius: 25px;line-height:0px;" class="circle">x</span>
                  </div>
                  <h2 class=" my-auto mr-auto d-inline">Login Form</h2>
                  <hr class="my-3">
                  <div class="social-login-v2 login-register">
                    <form enctype="multipart/form-data" id="login_form" class="text-center" method="POST">
                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="login_username">Username or Email</label> <?php echo "<span style='color:red;' id='label_for_username_validation'></span>"; ?><input type="text" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="login_username" id="login_username" class="form-control form-control-md sharp-edge" placeholder="Enter Username or Email" data-error="Username required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--username-->
                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="login_password">Password</label> <input type="text" name="login_password" id="login_password" class="form-control form-control-md sharp-edge" placeholder="Enter Password" data-error="First name required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="form-group" style="float:left;">
                        <div class="checkbox">
                          <label>Don't have Account? <a onclick="show_registration_popup();">Create One Here</a></label>

                          <div class="left-side help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="form-group" style="float:right;">
                        <div class="checkbox">

                          <label> <a href="../login/index.php">View More Option</a></label>
                          <div class="left-side help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="form-group" style="display:block;">
                        <input type="hidden" id="submitbtn" name="submit" value="Login" />
                        <input type="hidden" id="submit_login" name="submit_login" value="Login" />
                        <button class="btn btn-primary sharp btn-md btn-style-one" id="register_submit_btn" name="op_classiera" type="submit">Login</button>
                      </div><!--register button-->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
  <div id="overlay_for_enquery" class="overlay_for_login" style="display:none;height: 100%;overflow: auto;position: fixed; padding-bottom:100px !important;">
    <div class="container my-3 py-5  " id="enquery_form_box" style="margin-top:20px;">
      <div id="main" class=" justify-center ">
        <div class="col-lg-12">
          <div class=" mb-4">
            <div class="card-body " style=" border-radius:8px ;box-shadow: 1px 1px 20px #000000;">
              <div class="jumbotron py-1" style="border-radius:8px;background-color: gold linear-gradient(to bottom, lightyellow, gold);">
                <div class=" my-4 ">
                  <div onclick="hide_enquery_popup()"><span style="    padding: 15px; padding-top: 7px; padding-bottom: 8px;font-size:20px; background-color:white; border-radius: 25px;line-height:0px;" class="circle">x</span>
                  </div>
                  <h1 class=" my-auto mr-auto d-inline">Fill Details </h1>
                  <hr class="my-3">
                  <div class="social-login-v2 login-register">
                    <form enctype="multipart/form-data" id="enquery_form" method="POST" class="text-center">

                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_first_name">First Name</label> <input type="text" name="enquery_first_name" id="enquery_first_name" class="form-control form-control-md sharp-edge" placeholder="Enter First name" data-error="First name required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--enquery_first_name-->

                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_last_name">Last Name</label> <input type="text" name="enquery_last_name" id="enquery_last_name" class="form-control form-control-md sharp-edge" placeholder="Enter Last name" data-error="Last name required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--enquery_last_name-->



                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_email">Email</label> <?php echo "<span style='color:red;' id='label_for_email_validation'></span>"; ?> <input type="email" name="enquery_email" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="enquery_email" class="form-control form-control-md sharp-edge" placeholder="Enter email address" data-error="Email required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--Email Address-->



                      <div class="form-group">
                        <div class="inner-addon left-addon">
                          <label class="" style="float:left" for="enquery_phone">Phone no.</label> <?php echo "<span style='color:red;' id='label_for_phone_validation'></span>"; ?><input type="tel" pattern="[0-9]{10}" name="enquery_phone" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="enquery_phone" class="form-control form-control-md sharp-edge" placeholder="Enter 10 digit Phone no." data-error="Phone required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--Phone no.-->
                      <!-- <div class="form-group">
                            <div class="checkbox">
                              <input type="checkbox" id="agree" data-error="You must agree to our Terms and Conditions" required>
                              <label for="agree">Agree to <a href="#" target="_blank">Terms &amp; Conditions</a></label>
                              <div class="left-side help-block with-errors"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="checkbox">
                              <label>Already have an account? <a href="../login/index.php">Login here</a></label>
                              <div class="left-side help-block with-errors"></div>
                            </div>
                          </div> -->
                      <div class="form-group" style="float:left;">
                        <div class="checkbox">
                          <label> <a onclick="show_login_popup();">Login Now</a></label>
                          <div class="left-side help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="form-group" style="float:right;">
                        <div class="checkbox">

                          <label> <a href="../login/index.php">View More Option</a></label>
                          <div class="left-side help-block with-errors"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="enquery_form_value" value="true" id="enquery_form_value" />
                        <input type="hidden" name="enquery_listing_id" value="<?= $row['listing_id'] ?>" id="enquery_listing_id" />
                        <button class="btn btn-primary sharp btn-md btn-style-one" id="enquery_submit_btn" name="op_classiera" type="submit">Submit</button>
                      </div><!--register button-->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>

  </div>


  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/index.php" ?>
  <?php include "../theme/body_data.php" ?>

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
    function update_enquery(listing_id) {
      console.log("hello Enquery");
      // show_enquery_popup();
      // console.log(listing_owner_id+" - listing_owner_id\n"+listing_id+" - listing_id\n"+user_id+" - user_id\n"+type+" - type\n"+way+" - way\n");
      <?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])) {


      ?>
        $.ajax({
          url: "../listing_details/update_enquery.php",
          type: "POST",
          // dataType: 'text',
          data: {
            listing_id: listing_id,
          },
          success: function(result) {
            // console.log("success");
            console.log(result);
            // result = JSON.parse(result);
            // if (result.type == 'like') {
            //     $('#comment_like_' + comment_id).html(result.like_count);
            //     $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
            // }
            if (result.includes("Success")) {
              // console.log("console success");
              location.reload();
            } else {

              // console.log("console failed"+listing_id);
            }
            // data = result;
            // callback(data);
          },
          error: function() {
            console.log("return error");
          }
        });
        // return data;
      <?php
      } else {
        echo 'show_enquery_popup();';
      }
      ?>


    }

    function update_share_interaction(listing_owner_id, listing_id, type, way) {
      console.log("hello");
      // show_enquery_popup();
      // console.log(listing_owner_id+" - listing_owner_id\n"+listing_id+" - listing_id\n"+user_id+" - user_id\n"+type+" - type\n"+way+" - way\n");
      <?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']) && $show_listing_details) {


      ?>
        $.ajax({
          url: "../listing_details/update_interaction.php",
          type: "POST",
          data: {
            listing_owner_id: listing_owner_id,
            listing_id: listing_id,
            type: type,
            way: way,

          },
          success: function(result) {
            // console.log("success");
            console.log(result);
            // result = JSON.parse(result);
            // if (result.type == 'like') {
            //     $('#comment_like_' + comment_id).html(result.like_count);
            //     $('#comment_btn_like_' + comment_id).attr("src", "/forum/data/thumbs-up-like.svg");
            // }

            // data = result;
            // callback(data);
          },
          error: function() {
            console.log("return error");
          }
        });
        // return data;
      <?php
      } else {
        echo 'show_enquery_popup();';
      }
      ?>


    }
  </script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script>
    function validation_for_email_username_phone() {
      var email = document.getElementById("register_email");
      email = email.value;
      var username = document.getElementById("register_username");
      username = username.value;
      var phone = document.getElementById("register_phone");
      phone = phone.value;
      $.ajax({
        url: "../service/validation_for_email_username_phone.php",
        datatype: "JSON",
        type: "POST",
        data: {
          submit: "submit",
          email: email,
          username: username,
          phone: phone,
        },
        success: function(result) {
          result = JSON.parse(result);
          json_data = result;
          console.log(json_data);
          console.log(json_data[0][0]);
          console.log(json_data[1][0]);
          console.log(json_data[2][0]);
          if (0 < (json_data[0][0]).length) {
            $('#label_for_username_validation').html(json_data[0][1]);
          }
          if (0 < (json_data[1][0]).length) {
            $('#label_for_email_validation').html(json_data[1][1]);
          }
          if (0 < (json_data[2][0]).length) {
            $('#label_for_phone_validation').html(json_data[2][1]);
          }

          if (0 < (json_data[0][1] + json_data[1][1] + json_data[2][1]).length) {
            document.getElementById("register_submit_btn").disabled = true;
          } else {
            document.getElementById("register_submit_btn").disabled = false;
          }
        }
      });
    }
  </script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      setTimeout(function() {
        <?php
        if (isset($_SESSION['user_username'])) { ?>
        <?php
        } else { ?>
          // show_registration_popup();
          // show_login_popup();
        <?php
        } ?>
      }, 3000);
      //  alert("hello");
      $("#registration_form").submit(function(e) {
        e.preventDefault();

        var register_first_name = $("#register_first_name").val(); //build a post data structure
        var register_last_name = $("#register_last_name").val(); //build a post data structure
        var register_username = $("#register_username").val(); //build a post data structure
        var register_email = $("#register_email").val(); //build a post data structure
        var register_phone = $("#register_phone").val(); //build a post data structure
        var register_value = $("#register_value").val(); //build a post data structure
        var user_type = $('input[name="user_type"]:checked').val(); //build a post data structure

        jQuery.ajax({
          type: "POST", // Post / Get method
          url: "../login-v2/response.php", //Where form data is sent on submission
          dataType: "text", // Data type, HTML, json etc.
          data: {
            register_first_name: register_first_name,
            register_last_name: register_last_name,
            register_email: register_email,
            register_username: register_username,
            register_phone: register_phone,
            register_value: register_value,
            register_value: register_value,
            user_type: user_type,
          }, //Form variables
          success: function(response) {
            // $("#regiter_success").display("block");
            $('#regiter_success').show();
            $('#register_tip').hide();
            // // $("#responds").append(response);
            console.log(response);

            console.log(typeof(response));
            console.log(response);
            // console.log(response.includes("success"))  
            if (response.includes("success")) {
              alert(
                'Registration DONE Successfully\n\n' +
                "Email has been sent successfully, check your email for further process.\n"
              );
            }
            if (response.includes("duplicate email") && response.includes("duplicate phone")) {

              alert(
                'Registration Failed (duplicate email and phone no.)\n\n'
              );
            } else
            if (response.includes("duplicate phone")) {
              alert(
                'Registration Failed (duplicate phone)\n\n'
              );
            } else if (response.includes("duplicate email")) {
              alert(
                'Registration Failed (duplicate email)\n\n'
              );
            }
            if (response.includes("failed")) {
              alert(
                'Registration Failed\n\n'
              );

            }



            // window.location.replace("../login/index.php");
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError);
          }
        });
      });
    });
  </script>
</body>

<!-- Mirrored from demo.joinwebs.com/classiera/plum/locations/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 08:32:59 GMT -->

</html>