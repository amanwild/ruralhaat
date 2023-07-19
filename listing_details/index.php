<?php
include "../validation_of_session.php";
function filter($string)
{
  $string = str_replace("<", "&lt;", $string);
  $string = str_replace(">", "&gt;", $string);
  return $string;
}


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
              $_SESSION['enquery_email'] = '';
              $_SESSION['enquery_phone'] = '';
              $_SESSION['enquery_id'] = '';

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
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->

<!-- Mirrored from demo.joinwebs.com/classiera/plum/used-bmw-car-2018-model-for-sale/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 08:27:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

  <?php
  // include "./config/dbconnect.php";
  include "../db.php";

  // echo "success";
  if (!$connect) {
    // echo "failed";
    die("Connection Failed:" . mysqli_connect_error());
  }
  if (isset($_GET['listing_id'])) {
    $listing_id = $_GET['listing_id'];
  }
  // $select_listing_query = "SELECT * FROM `listing` WHERE `listing_id` = $listing_id"; //NOTE: here (`) is not equal to (')
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
WHERE listing_id = $listing_id group by listing.listing_id"; //NOTE: here (`) is not equal to (')
  try {
    // echo $select_listing_query;
    $select_listing_result = 0;
    if ($connect) {
      $select_listing_result = mysqli_query($connect, $select_listing_query);
      if ($select_listing_result) {
        $num_for_listing_details = mysqli_num_rows($select_listing_result);
      }
    }
  } catch (Exception $e) {
    $mess = $e->getMessage();
  }



  ?>
  <?php

  if ($num_for_listing_details > 0) {
    $sno = 0;
    $array = [];
    while ($row_for_target_user_id = mysqli_fetch_assoc($select_listing_result)) {
      $user_id_for_message = $row_for_target_user_id['user_id'];
    }
  }


  try {
    $update_listing_view_count = mysqli_query($connect, "UPDATE `listing` SET `listing_view_count` = `listing_view_count`+1 WHERE `listing`.`listing_id` = $listing_id");

    if (isset($_SESSION['user_id'])) {
      $update_view_count = mysqli_query($connect, "INSERT INTO `views_count` (`views_count_of`, `views_count_of_id`, `views_count_timestamp`,`views_count_by_id`, `views_count_by`) VALUES ('listing', '$listing_id', current_timestamp(),'" . $_SESSION['user_id'] . "', 'user')");
    } else if (isset($_SESSION['enquery_id'])) {
      $update_view_count = mysqli_query($connect, "INSERT INTO `views_count` (`views_count_of`, `views_count_of_id`, `views_count_timestamp`,`views_count_by_id`, `views_count_by`) VALUES ('listing', '$listing_id', current_timestamp(),'" . $_SESSION['enquery_id'] . "', 'enquery')");
    } else {
      $update_view_count = mysqli_query($connect, "INSERT INTO `views_count` (`views_count_of`, `views_count_of_id`, `views_count_timestamp`,`views_count_by_id`, `views_count_by`) VALUES ('listing', '$listing_id', current_timestamp(),'0', 'stranger')");
    }
  } catch (Exception $e) {
    $mess = $e->getMessage();
  }



  ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

  <script type="text/javascript">
    //##### Add record when Add Record Button is click #########
    $(document).ready(function() {


      // show_registration_popup();
      //##### Add record when Add Record Button is click #########
      $("#contactForm").submit(function(e) {
        e.preventDefault();
        // alert("hello")
        // var subject = $("#subject").val(); //build a post data structure
        var message = $("#msg").val(); //build a post data structure       
        var target_listing_id = $("#message_target_listing_id").val(); //build a post data structure       
        var target_user_id = <?= $user_id_for_message ?>;

        jQuery.ajax({
          type: "POST", // Post / Get method
          url: "send_message.php", //Where form data is sent on submission
          dataType: "text", // Data type, HTML, json etc.
          data: {
            message: message,
            subject: '',
            target_user_id: target_user_id,
            target_listing_id: target_listing_id,
          }, //Form variables
          success: function(response) {
            console.log(response);
            if (response.includes("success")) {

              alert("Message Sent Successfully!");
            }
            if (response.includes("failed")) {
              // alert("Message Sending Failed!");
              show_enquery_popup();

            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            // alert(xhr);
            // alert(ajaxOptions);
            // alert(thrownError);
          }
        });
      });

      $("#enquery_form").submit(function(e) {

        e.preventDefault();
        // alert("hello")
        var enquery_first_name = $("#enquery_first_name").val(); //build a post data structure
        var enquery_last_name = $("#enquery_last_name").val(); //build a post data structure
        var enquery_phone = $("#enquery_phone").val(); //build a post data structure
        var enquery_email = $("#enquery_email").val(); //build a post data structure
        var enquery_form_value = $("#enquery_form_value").val(); //build a post data structure
        var enquery_listing_id = $("#enquery_listing_id").val(); //build a post data structure

        jQuery.ajax({
          type: "POST", // Post / Get method
          url: "response.php", //Where form data is sent on submission
          dataType: "text", // Data type, HTML, json etc.
          data: {
            enquery_first_name: enquery_first_name,
            enquery_last_name: enquery_last_name,
            enquery_phone: enquery_phone,
            enquery_email: enquery_email,
            enquery_listing_id: enquery_listing_id,
            enquery_form_value: enquery_form_value,
          }, //Form variables
          success: function(response) {
            // // $("#responds").append(response);
            console.log(typeof(response));
            console.log(response);
            // console.log(response.includes("success"))  
            if (response.includes("success")) {
              // $("#contactForm").submit();
              alert("Message Sent Successfully!");
              location.reload();
            }
            if (response.includes("failed")) {
              // alert("Message Sending Failed!");
              // show_enquery_popup();

            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            // alert(xhr);
            // alert(ajaxOptions);
            // alert(thrownError);
          }
        });
      });




      // $("#report_form").submit(function(e) {
      //   e.preventDefault();
      //   alert("hello")
      //   var report_ad_val = $("#report_ad_val").val(); //build a post data structure
      //   var enquery_last_name = $("#enquery_last_name").val(); //build a post data structure
      //   var enquery_phone = $("#enquery_phone").val(); //build a post data structure
      //   var enquery_email = $("#enquery_email").val(); //build a post data structure
      //   var enquery_form_value = $("#enquery_form_value").val(); //build a post data structure
      //   var enquery_listing_id = $("#enquery_listing_id").val(); //build a post data structure

      //   jQuery.ajax({
      //     type: "POST", // Post / Get method
      //     url: "response.php", //Where form data is sent on submission
      //     dataType: "text", // Data type, HTML, json etc.
      //     data: {
      //       enquery_first_name: enquery_first_name,
      //       enquery_last_name: enquery_last_name,
      //       enquery_phone: enquery_phone,
      //       enquery_email: enquery_email,
      //       enquery_listing_id: enquery_listing_id,
      //       enquery_form_value: enquery_form_value,
      //     }, //Form variables
      //     success: function(response) {
      //       // // $("#responds").append(response);
      //       // console.log(typeof(response));
      //       // console.log(response.includes("success"))  
      //       if (response.includes("success")) {

      //         alert("Message Sent Successfully!");
      //       }
      //       if (response.includes("failed")) {
      //         alert("Message Sending Failed!");
      //         // show_enquery_popup();

      //       }
      //     },
      //     error: function(xhr, ajaxOptions, thrownError) {
      //       // alert(xhr);
      //       // alert(ajaxOptions);
      //       // alert(thrownError);
      //     }
      //   });
      // });

    });


    function show_registration_popup() {
      hide_login_popup();
      hide_enquery_popup();

      document.getElementById("overlay_for_registration").style.display = "block";
    }

    function hide_registration_popup() {
      document.getElementById("overlay_for_registration").style.display = "none";
    }

    function show_login_popup() {
      hide_registration_popup();
      hide_enquery_popup();
      document.getElementById("overlay_for_login").style.display = "block";
    }

    function hide_login_popup() {
      document.getElementById("overlay_for_login").style.display = "none";
    }







    // function show_registration_popup() {
    //   document.getElementById("overlay_for_login").style.display = "block";
    // }

    // function hide_registration_popup() {
    //   document.getElementById("overlay_for_login").style.display = "none";
    // }

    function show_enquery_popup() {
      hide_registration_popup();
      hide_login_popup();
      document.getElementById("overlay_for_enquery").style.display = "block";
    }

    function hide_enquery_popup() {
      document.getElementById("overlay_for_enquery").style.display = "none";
    }
  </script>

  <?php

  if (isset($_POST['report_value'])) {
    $report_value = $_POST["report_value"];
    if ($report_value) {
      if (isset($_POST['report_ad_val'])) {
        $report_message = $_POST["report_ad_val"];
      }
      if (isset($_POST['other_report'])) {
        $report_other_message = $_POST["other_report"];
      }

      if (isset($_POST['report_ad'])) {
        $report_ad = $_POST["report_ad"];
      }
      if (isset($_POST['report_by_user_id'])) {
        $report_by_user_id = $_POST["report_by_user_id"];
      }
      if (isset($_POST['report_on_listing_id'])) {
        $report_on_listing_id = $_POST["report_on_listing_id"];
      }

      $query = "INSERT INTO `report` (`report_id`, `report_on_listing_id`, `report_by_user_id`, `report_message`,`report_other_message`, `report_timestamp`) VALUES (NULL, '$report_on_listing_id', '$report_by_user_id', '$report_message','$report_other_message', current_timestamp())";

      // echo $query;
      if (mysqli_query($connect, $query)) {
        // echo "success";
      }
    }
  }
  // echo "success";

  ?>
  <script type="text/javascript">
    //##### Add record when Add Record Button is click #########
  </script>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="../xmlrpc.php">
  <meta property="og:image" content="../wp-content/uploads/2018/11/05.jpg" />

  <title>listing Details</title>
  <meta name='robots' content='max-image-preview:large' />
  <link rel='dns-prefetch' href='http://maps.googleapis.com/' />
  <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
  <link rel='preconnect' href='https://fonts.gstatic.com/' crossorigin />
  <link rel="alternate" type="application/rss+xml" title="Classiera Classifieds Ads WordPress Theme &raquo; Feed" href="../feed/index.html" />
  <link rel="alternate" type="application/rss+xml" title="Classiera Classifieds Ads WordPress Theme &raquo; Comments Feed" href="../comments/feed/index.html" />
  <link rel="alternate" type="application/rss+xml" title="Classiera Classifieds Ads WordPress Theme &raquo; Used BMW Car 2018 Model For Sale Comments Feed" href="feed/index.html" />
  <link rel='stylesheet' id='wp-block-library-css' href='../wp-includes/css/dist/block-library/style.min6a4d.css?ver=6.1.1' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-vendors-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-vendors-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='classic-theme-styles-css' href='../wp-includes/css/classic-themes.min68b3.css?ver=1' type='text/css' media='all' />
  <style id='global-styles-inline-css' type='text/css'>
    body {
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #ffffff;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
      --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
      --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
      --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
      --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
      --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
      --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
      --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
      --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
      --wp--preset--font-size--small: 13px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36px;
      --wp--preset--font-size--x-large: 42px;
      --wp--preset--spacing--20: 0.44rem;
      --wp--preset--spacing--30: 0.67rem;
      --wp--preset--spacing--40: 1rem;
      --wp--preset--spacing--50: 1.5rem;
      --wp--preset--spacing--60: 2.25rem;
      --wp--preset--spacing--70: 3.38rem;
      --wp--preset--spacing--80: 5.06rem;
    }

    :where(.is-layout-flex) {
      gap: 0.5em;
    }

    body .is-layout-flow>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-flow>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-flow>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-constrained>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-constrained>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
      max-width: var(--wp--style--global--content-size);
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignwide {
      max-width: var(--wp--style--global--wide-size);
    }

    body .is-layout-flex {
      display: flex;
    }

    body .is-layout-flex {
      flex-wrap: wrap;
      align-items: center;
    }

    body .is-layout-flex>* {
      margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    .has-black-color {
      color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
      color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
      color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
      color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
      color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
      color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
      color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
      color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
      color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
      color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
      color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
      color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
      background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
      background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
      background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
      background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
      background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
      background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
      background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
      background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
      background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
      background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
      border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
      border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
      border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
      border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
      border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
      border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
      border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
      border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
      border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
      border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
      background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
      background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
      background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
      background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
      background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
      background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
      background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
      background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
      background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
      font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
      font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
      font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
      font-size: var(--wp--preset--font-size--x-large) !important;
    }

    .wp-block-navigation a:where(:not(.wp-element-button)) {
      color: inherit;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    .wp-block-pullquote {
      font-size: 1.5em;
      line-height: 1.6;
    }
  </style>
  <style id='extendify-gutenberg-patterns-and-templates-utilities-inline-css' type='text/css'>
    .ext-absolute {
      position: absolute !important;
    }

    .ext-relative {
      position: relative !important;
    }

    .ext-top-base {
      top: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-top-lg {
      top: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--top-base {
      top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--top-lg {
      top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-right-base {
      right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-right-lg {
      right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--right-base {
      right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--right-lg {
      right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-bottom-base {
      bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-bottom-lg {
      bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--bottom-base {
      bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--bottom-lg {
      bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-left-base {
      left: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-left-lg {
      left: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--left-base {
      left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--left-lg {
      left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-order-1 {
      order: 1 !important;
    }

    .ext-order-2 {
      order: 2 !important;
    }

    .ext-col-auto {
      grid-column: auto !important;
    }

    .ext-col-span-1 {
      grid-column: span 1 / span 1 !important;
    }

    .ext-col-span-2 {
      grid-column: span 2 / span 2 !important;
    }

    .ext-col-span-3 {
      grid-column: span 3 / span 3 !important;
    }

    .ext-col-span-4 {
      grid-column: span 4 / span 4 !important;
    }

    .ext-col-span-5 {
      grid-column: span 5 / span 5 !important;
    }

    .ext-col-span-6 {
      grid-column: span 6 / span 6 !important;
    }

    .ext-col-span-7 {
      grid-column: span 7 / span 7 !important;
    }

    .ext-col-span-8 {
      grid-column: span 8 / span 8 !important;
    }

    .ext-col-span-9 {
      grid-column: span 9 / span 9 !important;
    }

    .ext-col-span-10 {
      grid-column: span 10 / span 10 !important;
    }

    .ext-col-span-11 {
      grid-column: span 11 / span 11 !important;
    }

    .ext-col-span-12 {
      grid-column: span 12 / span 12 !important;
    }

    .ext-col-span-full {
      grid-column: 1 / -1 !important;
    }

    .ext-col-start-1 {
      grid-column-start: 1 !important;
    }

    .ext-col-start-2 {
      grid-column-start: 2 !important;
    }

    .ext-col-start-3 {
      grid-column-start: 3 !important;
    }

    .ext-col-start-4 {
      grid-column-start: 4 !important;
    }

    .ext-col-start-5 {
      grid-column-start: 5 !important;
    }

    .ext-col-start-6 {
      grid-column-start: 6 !important;
    }

    .ext-col-start-7 {
      grid-column-start: 7 !important;
    }

    .ext-col-start-8 {
      grid-column-start: 8 !important;
    }

    .ext-col-start-9 {
      grid-column-start: 9 !important;
    }

    .ext-col-start-10 {
      grid-column-start: 10 !important;
    }

    .ext-col-start-11 {
      grid-column-start: 11 !important;
    }

    .ext-col-start-12 {
      grid-column-start: 12 !important;
    }

    .ext-col-start-13 {
      grid-column-start: 13 !important;
    }

    .ext-col-start-auto {
      grid-column-start: auto !important;
    }

    .ext-col-end-1 {
      grid-column-end: 1 !important;
    }

    .ext-col-end-2 {
      grid-column-end: 2 !important;
    }

    .ext-col-end-3 {
      grid-column-end: 3 !important;
    }

    .ext-col-end-4 {
      grid-column-end: 4 !important;
    }

    .ext-col-end-5 {
      grid-column-end: 5 !important;
    }

    .ext-col-end-6 {
      grid-column-end: 6 !important;
    }

    .ext-col-end-7 {
      grid-column-end: 7 !important;
    }

    .ext-col-end-8 {
      grid-column-end: 8 !important;
    }

    .ext-col-end-9 {
      grid-column-end: 9 !important;
    }

    .ext-col-end-10 {
      grid-column-end: 10 !important;
    }

    .ext-col-end-11 {
      grid-column-end: 11 !important;
    }

    .ext-col-end-12 {
      grid-column-end: 12 !important;
    }

    .ext-col-end-13 {
      grid-column-end: 13 !important;
    }

    .ext-col-end-auto {
      grid-column-end: auto !important;
    }

    .ext-row-auto {
      grid-row: auto !important;
    }

    .ext-row-span-1 {
      grid-row: span 1 / span 1 !important;
    }

    .ext-row-span-2 {
      grid-row: span 2 / span 2 !important;
    }

    .ext-row-span-3 {
      grid-row: span 3 / span 3 !important;
    }

    .ext-row-span-4 {
      grid-row: span 4 / span 4 !important;
    }

    .ext-row-span-5 {
      grid-row: span 5 / span 5 !important;
    }

    .ext-row-span-6 {
      grid-row: span 6 / span 6 !important;
    }

    .ext-row-span-full {
      grid-row: 1 / -1 !important;
    }

    .ext-row-start-1 {
      grid-row-start: 1 !important;
    }

    .ext-row-start-2 {
      grid-row-start: 2 !important;
    }

    .ext-row-start-3 {
      grid-row-start: 3 !important;
    }

    .ext-row-start-4 {
      grid-row-start: 4 !important;
    }

    .ext-row-start-5 {
      grid-row-start: 5 !important;
    }

    .ext-row-start-6 {
      grid-row-start: 6 !important;
    }

    .ext-row-start-7 {
      grid-row-start: 7 !important;
    }

    .ext-row-start-auto {
      grid-row-start: auto !important;
    }

    .ext-row-end-1 {
      grid-row-end: 1 !important;
    }

    .ext-row-end-2 {
      grid-row-end: 2 !important;
    }

    .ext-row-end-3 {
      grid-row-end: 3 !important;
    }

    .ext-row-end-4 {
      grid-row-end: 4 !important;
    }

    .ext-row-end-5 {
      grid-row-end: 5 !important;
    }

    .ext-row-end-6 {
      grid-row-end: 6 !important;
    }

    .ext-row-end-7 {
      grid-row-end: 7 !important;
    }

    .ext-row-end-auto {
      grid-row-end: auto !important;
    }

    .ext-m-0:not([style*="margin"]) {
      margin: 0 !important;
    }

    .ext-m-auto:not([style*="margin"]) {
      margin: auto !important;
    }

    .ext-m-base:not([style*="margin"]) {
      margin: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-m-lg:not([style*="margin"]) {
      margin: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--m-base:not([style*="margin"]) {
      margin: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--m-lg:not([style*="margin"]) {
      margin: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mx-0:not([style*="margin"]) {
      margin-left: 0 !important;
      margin-right: 0 !important;
    }

    .ext-mx-auto:not([style*="margin"]) {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    .ext-mx-base:not([style*="margin"]) {
      margin-left: var(--wp--style--block-gap, 1.75rem) !important;
      margin-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mx-lg:not([style*="margin"]) {
      margin-left: var(--extendify--spacing--large, 3rem) !important;
      margin-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mx-base:not([style*="margin"]) {
      margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mx-lg:not([style*="margin"]) {
      margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-my-0:not([style*="margin"]) {
      margin-top: 0 !important;
      margin-bottom: 0 !important;
    }

    .ext-my-auto:not([style*="margin"]) {
      margin-top: auto !important;
      margin-bottom: auto !important;
    }

    .ext-my-base:not([style*="margin"]) {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-my-lg:not([style*="margin"]) {
      margin-top: var(--extendify--spacing--large, 3rem) !important;
      margin-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--my-base:not([style*="margin"]) {
      margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--my-lg:not([style*="margin"]) {
      margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mt-0:not([style*="margin"]) {
      margin-top: 0 !important;
    }

    .ext-mt-auto:not([style*="margin"]) {
      margin-top: auto !important;
    }

    .ext-mt-base:not([style*="margin"]) {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mt-lg:not([style*="margin"]) {
      margin-top: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mt-base:not([style*="margin"]) {
      margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mt-lg:not([style*="margin"]) {
      margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mr-0:not([style*="margin"]) {
      margin-right: 0 !important;
    }

    .ext-mr-auto:not([style*="margin"]) {
      margin-right: auto !important;
    }

    .ext-mr-base:not([style*="margin"]) {
      margin-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mr-lg:not([style*="margin"]) {
      margin-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mr-base:not([style*="margin"]) {
      margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mr-lg:not([style*="margin"]) {
      margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mb-0:not([style*="margin"]) {
      margin-bottom: 0 !important;
    }

    .ext-mb-auto:not([style*="margin"]) {
      margin-bottom: auto !important;
    }

    .ext-mb-base:not([style*="margin"]) {
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mb-lg:not([style*="margin"]) {
      margin-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mb-base:not([style*="margin"]) {
      margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mb-lg:not([style*="margin"]) {
      margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-ml-0:not([style*="margin"]) {
      margin-left: 0 !important;
    }

    .ext-ml-auto:not([style*="margin"]) {
      margin-left: auto !important;
    }

    .ext-ml-base:not([style*="margin"]) {
      margin-left: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-ml-lg:not([style*="margin"]) {
      margin-left: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--ml-base:not([style*="margin"]) {
      margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--ml-lg:not([style*="margin"]) {
      margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-block {
      display: block !important;
    }

    .ext-inline-block {
      display: inline-block !important;
    }

    .ext-inline {
      display: inline !important;
    }

    .ext-flex {
      display: flex !important;
    }

    .ext-inline-flex {
      display: inline-flex !important;
    }

    .ext-grid {
      display: grid !important;
    }

    .ext-inline-grid {
      display: inline-grid !important;
    }

    .ext-hidden {
      display: none !important;
    }

    .ext-w-auto {
      width: auto !important;
    }

    .ext-w-full {
      width: 100% !important;
    }

    .ext-max-w-full {
      max-width: 100% !important;
    }

    .ext-flex-1 {
      flex: 1 1 0% !important;
    }

    .ext-flex-auto {
      flex: 1 1 auto !important;
    }

    .ext-flex-initial {
      flex: 0 1 auto !important;
    }

    .ext-flex-none {
      flex: none !important;
    }

    .ext-flex-shrink-0 {
      flex-shrink: 0 !important;
    }

    .ext-flex-shrink {
      flex-shrink: 1 !important;
    }

    .ext-flex-grow-0 {
      flex-grow: 0 !important;
    }

    .ext-flex-grow {
      flex-grow: 1 !important;
    }

    .ext-list-none {
      list-style-type: none !important;
    }

    .ext-grid-cols-1 {
      grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-3 {
      grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-4 {
      grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-5 {
      grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-6 {
      grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-7 {
      grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-8 {
      grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-9 {
      grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-10 {
      grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-11 {
      grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-12 {
      grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-none {
      grid-template-columns: none !important;
    }

    .ext-grid-rows-1 {
      grid-template-rows: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-2 {
      grid-template-rows: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-3 {
      grid-template-rows: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-4 {
      grid-template-rows: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-5 {
      grid-template-rows: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-6 {
      grid-template-rows: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-none {
      grid-template-rows: none !important;
    }

    .ext-flex-row {
      flex-direction: row !important;
    }

    .ext-flex-row-reverse {
      flex-direction: row-reverse !important;
    }

    .ext-flex-col {
      flex-direction: column !important;
    }

    .ext-flex-col-reverse {
      flex-direction: column-reverse !important;
    }

    .ext-flex-wrap {
      flex-wrap: wrap !important;
    }

    .ext-flex-wrap-reverse {
      flex-wrap: wrap-reverse !important;
    }

    .ext-flex-nowrap {
      flex-wrap: nowrap !important;
    }

    .ext-items-start {
      align-items: flex-start !important;
    }

    .ext-items-end {
      align-items: flex-end !important;
    }

    .ext-items-center {
      align-items: center !important;
    }

    .ext-items-baseline {
      align-items: baseline !important;
    }

    .ext-items-stretch {
      align-items: stretch !important;
    }

    .ext-justify-start {
      justify-content: flex-start !important;
    }

    .ext-justify-end {
      justify-content: flex-end !important;
    }

    .ext-justify-center {
      justify-content: center !important;
    }

    .ext-justify-between {
      justify-content: space-between !important;
    }

    .ext-justify-around {
      justify-content: space-around !important;
    }

    .ext-justify-evenly {
      justify-content: space-evenly !important;
    }

    .ext-justify-items-start {
      justify-items: start !important;
    }

    .ext-justify-items-end {
      justify-items: end !important;
    }

    .ext-justify-items-center {
      justify-items: center !important;
    }

    .ext-justify-items-stretch {
      justify-items: stretch !important;
    }

    .ext-gap-0 {
      gap: 0 !important;
    }

    .ext-gap-base {
      gap: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-gap-lg {
      gap: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-gap-x-0 {
      -moz-column-gap: 0 !important;
      column-gap: 0 !important;
    }

    .ext-gap-x-base {
      -moz-column-gap: var(--wp--style--block-gap, 1.75rem) !important;
      column-gap: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-gap-x-lg {
      -moz-column-gap: var(--extendify--spacing--large, 3rem) !important;
      column-gap: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-gap-y-0 {
      row-gap: 0 !important;
    }

    .ext-gap-y-base {
      row-gap: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-gap-y-lg {
      row-gap: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-justify-self-auto {
      justify-self: auto !important;
    }

    .ext-justify-self-start {
      justify-self: start !important;
    }

    .ext-justify-self-end {
      justify-self: end !important;
    }

    .ext-justify-self-center {
      justify-self: center !important;
    }

    .ext-justify-self-stretch {
      justify-self: stretch !important;
    }

    .ext-rounded-none {
      border-radius: 0px !important;
    }

    .ext-rounded-full {
      border-radius: 9999px !important;
    }

    .ext-rounded-t-none {
      border-top-left-radius: 0px !important;
      border-top-right-radius: 0px !important;
    }

    .ext-rounded-t-full {
      border-top-left-radius: 9999px !important;
      border-top-right-radius: 9999px !important;
    }

    .ext-rounded-r-none {
      border-top-right-radius: 0px !important;
      border-bottom-right-radius: 0px !important;
    }

    .ext-rounded-r-full {
      border-top-right-radius: 9999px !important;
      border-bottom-right-radius: 9999px !important;
    }

    .ext-rounded-b-none {
      border-bottom-right-radius: 0px !important;
      border-bottom-left-radius: 0px !important;
    }

    .ext-rounded-b-full {
      border-bottom-right-radius: 9999px !important;
      border-bottom-left-radius: 9999px !important;
    }

    .ext-rounded-l-none {
      border-top-left-radius: 0px !important;
      border-bottom-left-radius: 0px !important;
    }

    .ext-rounded-l-full {
      border-top-left-radius: 9999px !important;
      border-bottom-left-radius: 9999px !important;
    }

    .ext-rounded-tl-none {
      border-top-left-radius: 0px !important;
    }

    .ext-rounded-tl-full {
      border-top-left-radius: 9999px !important;
    }

    .ext-rounded-tr-none {
      border-top-right-radius: 0px !important;
    }

    .ext-rounded-tr-full {
      border-top-right-radius: 9999px !important;
    }

    .ext-rounded-br-none {
      border-bottom-right-radius: 0px !important;
    }

    .ext-rounded-br-full {
      border-bottom-right-radius: 9999px !important;
    }

    .ext-rounded-bl-none {
      border-bottom-left-radius: 0px !important;
    }

    .ext-rounded-bl-full {
      border-bottom-left-radius: 9999px !important;
    }

    .ext-border-0 {
      border-width: 0px !important;
    }

    .ext-border-t-0 {
      border-top-width: 0px !important;
    }

    .ext-border-r-0 {
      border-right-width: 0px !important;
    }

    .ext-border-b-0 {
      border-bottom-width: 0px !important;
    }

    .ext-border-l-0 {
      border-left-width: 0px !important;
    }

    .ext-p-0:not([style*="padding"]) {
      padding: 0 !important;
    }

    .ext-p-base:not([style*="padding"]) {
      padding: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-p-lg:not([style*="padding"]) {
      padding: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-px-0:not([style*="padding"]) {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .ext-px-base:not([style*="padding"]) {
      padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      padding-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-px-lg:not([style*="padding"]) {
      padding-left: var(--extendify--spacing--large, 3rem) !important;
      padding-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-py-0:not([style*="padding"]) {
      padding-top: 0 !important;
      padding-bottom: 0 !important;
    }

    .ext-py-base:not([style*="padding"]) {
      padding-top: var(--wp--style--block-gap, 1.75rem) !important;
      padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-py-lg:not([style*="padding"]) {
      padding-top: var(--extendify--spacing--large, 3rem) !important;
      padding-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pt-0:not([style*="padding"]) {
      padding-top: 0 !important;
    }

    .ext-pt-base:not([style*="padding"]) {
      padding-top: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pt-lg:not([style*="padding"]) {
      padding-top: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pr-0:not([style*="padding"]) {
      padding-right: 0 !important;
    }

    .ext-pr-base:not([style*="padding"]) {
      padding-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pr-lg:not([style*="padding"]) {
      padding-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pb-0:not([style*="padding"]) {
      padding-bottom: 0 !important;
    }

    .ext-pb-base:not([style*="padding"]) {
      padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pb-lg:not([style*="padding"]) {
      padding-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pl-0:not([style*="padding"]) {
      padding-left: 0 !important;
    }

    .ext-pl-base:not([style*="padding"]) {
      padding-left: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pl-lg:not([style*="padding"]) {
      padding-left: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-text-left {
      text-align: left !important;
    }

    .ext-text-center {
      text-align: center !important;
    }

    .ext-text-right {
      text-align: right !important;
    }

    .ext-leading-none {
      line-height: 1 !important;
    }

    .ext-leading-tight {
      line-height: 1.25 !important;
    }

    .ext-leading-snug {
      line-height: 1.375 !important;
    }

    .ext-leading-normal {
      line-height: 1.5 !important;
    }

    .ext-leading-relaxed {
      line-height: 1.625 !important;
    }

    .ext-leading-loose {
      line-height: 2 !important;
    }

    .ext-aspect-square img {
      aspect-ratio: 1 / 1 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-landscape img {
      aspect-ratio: 4 / 3 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-landscape-wide img {
      aspect-ratio: 16 / 9 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-portrait img {
      aspect-ratio: 3 / 4 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-square .components-resizable-box__container,
    .ext-aspect-landscape .components-resizable-box__container,
    .ext-aspect-landscape-wide .components-resizable-box__container,
    .ext-aspect-portrait .components-resizable-box__container {
      height: auto !important;
    }

    .clip-path--rhombus img {
      -webkit-clip-path: polygon(15% 6%, 80% 29%, 84% 93%, 23% 69%) !important;
      clip-path: polygon(15% 6%, 80% 29%, 84% 93%, 23% 69%) !important;
    }

    .clip-path--diamond img {
      -webkit-clip-path: polygon(5% 29%, 60% 2%, 91% 64%, 36% 89%) !important;
      clip-path: polygon(5% 29%, 60% 2%, 91% 64%, 36% 89%) !important;
    }

    .clip-path--rhombus-alt img {
      -webkit-clip-path: polygon(14% 9%, 85% 24%, 91% 89%, 19% 76%) !important;
      clip-path: polygon(14% 9%, 85% 24%, 91% 89%, 19% 76%) !important;
    }

    /*
The .ext utility is a top-level class that we use to target contents within our patterns.
We use it here to ensure columns blocks display well across themes.
*/

    .wp-block-columns[class*="fullwidth-cols"] {
      /* no suggestion */
      margin-bottom: unset !important;
    }

    .wp-block-column.editor\:pointer-events-none {
      /* no suggestion */
      margin-top: 0 !important;
      margin-bottom: 0 !important;
    }

    .is-root-container.block-editor-block-list__layout>[data-align="full"]:not(:first-of-type)>.wp-block-column.editor\:pointer-events-none,
    .is-root-container.block-editor-block-list__layout>[data-align="wide"]>.wp-block-column.editor\:pointer-events-none {
      /* no suggestion */
      margin-top: calc(-1 * var(--wp--style--block-gap, 28px)) !important;
    }

    .is-root-container.block-editor-block-list__layout>[data-align="full"]:not(:first-of-type)>.ext-my-0,
    .is-root-container.block-editor-block-list__layout>[data-align="wide"]>.ext-my-0:not([style*="margin"]) {
      /* no suggestion */
      margin-top: calc(-1 * var(--wp--style--block-gap, 28px)) !important;
    }

    /* Some popular themes use padding instead of core margin for columns; remove it */

    .ext .wp-block-columns .wp-block-column[style*="padding"] {
      /* no suggestion */
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    /* Some popular themes add double spacing between columns; remove it */

    .ext .wp-block-columns+.wp-block-columns:not([class*="mt-"]):not([class*="my-"]):not([style*="margin"]) {
      /* no suggestion */
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column:first-child,
    [class*="fullwidth-cols"] .wp-block-group:first-child {
      /* no suggestion */
    }

    [class*="fullwidth-cols"] .wp-block-column:first-child,
    [class*="fullwidth-cols"] .wp-block-group:first-child {
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column:last-child,
    [class*="fullwidth-cols"] .wp-block-group:last-child {
      /* no suggestion */
    }

    [class*="fullwidth-cols"] .wp-block-column:last-child,
    [class*="fullwidth-cols"] .wp-block-group:last-child {
      margin-bottom: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column:first-child>* {
      /* no suggestion */
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column>*:first-child {
      /* no suggestion */
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column>*:last-child {
      /* no suggestion */
      margin-bottom: 0 !important;
    }

    .ext .is-not-stacked-on-mobile .wp-block-column {
      /* no suggestion */
      margin-bottom: 0 !important;
    }

    /* Add base margin bottom to all columns */

    .wp-block-columns[class*="fullwidth-cols"]:not(.is-not-stacked-on-mobile)>.wp-block-column:not(:last-child) {
      /* no suggestion */
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    @media (min-width: 782px) {
      .wp-block-columns[class*="fullwidth-cols"]:not(.is-not-stacked-on-mobile)>.wp-block-column:not(:last-child) {
        /* no suggestion */
        margin-bottom: 0 !important;
      }
    }

    /* Remove margin bottom from "not-stacked" columns */

    .wp-block-columns[class*="fullwidth-cols"].is-not-stacked-on-mobile>.wp-block-column {
      /* no suggestion */
      margin-bottom: 0 !important;
    }

    @media (min-width: 600px) and (max-width: 781px) {
      .wp-block-columns[class*="fullwidth-cols"]:not(.is-not-stacked-on-mobile)>.wp-block-column:nth-child(even) {
        /* no suggestion */
        margin-left: var(--wp--style--block-gap, 2em) !important;
      }
    }

    /*
    The `tablet:fullwidth-cols` and `desktop:fullwidth-cols` utilities are used
    to counter the core/columns responsive for at our breakpoints.
*/

    @media (max-width: 781px) {
      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile) {
        flex-wrap: wrap !important;
      }

      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        margin-left: 0 !important;
      }

      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column:not([style*="margin"]) {
        /* no suggestion */
        margin-left: 0 !important;
      }

      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        flex-basis: 100% !important;
        /* Required to negate core/columns flex-basis */
      }
    }

    @media (max-width: 1079px) {
      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile) {
        flex-wrap: wrap !important;
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        margin-left: 0 !important;
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column:not([style*="margin"]) {
        /* no suggestion */
        margin-left: 0 !important;
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        flex-basis: 100% !important;
        /* Required to negate core/columns flex-basis */
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column:not(:last-child) {
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }
    }

    .direction-rtl {
      direction: rtl !important;
    }

    .direction-ltr {
      direction: ltr !important;
    }

    /* Use "is-style-" prefix to support adding this style to the core/list block */

    .is-style-inline-list {
      padding-left: 0 !important;
    }

    .is-style-inline-list li {
      /* no suggestion */
      list-style-type: none !important;
    }

    @media (min-width: 782px) {
      .is-style-inline-list li {
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
        display: inline !important;
      }
    }

    .is-style-inline-list li:first-child {
      /* no suggestion */
    }

    @media (min-width: 782px) {
      .is-style-inline-list li:first-child {
        margin-left: 0 !important;
      }
    }

    .is-style-inline-list li:last-child {
      /* no suggestion */
    }

    @media (min-width: 782px) {
      .is-style-inline-list li:last-child {
        margin-right: 0 !important;
      }
    }

    .bring-to-front {
      position: relative !important;
      z-index: 10 !important;
    }

    .text-stroke {
      -webkit-text-stroke-width: var(--wp--custom--typography--text-stroke-width,
          2px) !important;
      -webkit-text-stroke-color: var(--wp--preset--color--background) !important;
    }

    .text-stroke--primary {
      -webkit-text-stroke-width: var(--wp--custom--typography--text-stroke-width,
          2px) !important;
      -webkit-text-stroke-color: var(--wp--preset--color--primary) !important;
    }

    .text-stroke--secondary {
      -webkit-text-stroke-width: var(--wp--custom--typography--text-stroke-width,
          2px) !important;
      -webkit-text-stroke-color: var(--wp--preset--color--secondary) !important;
    }

    .editor\:no-caption .block-editor-rich-text__editable {
      display: none !important;
    }

    .editor\:no-inserter>.block-list-appender,
    .editor\:no-inserter .wp-block-group__inner-container>.block-list-appender {
      display: none !important;
    }

    .editor\:no-inserter .wp-block-cover__inner-container>.block-list-appender {
      display: none !important;
    }

    .editor\:no-inserter .wp-block-column:not(.is-selected)>.block-list-appender {
      display: none !important;
    }

    .editor\:no-resize .components-resizable-box__handle::after,
    .editor\:no-resize .components-resizable-box__side-handle::before,
    .editor\:no-resize .components-resizable-box__handle {
      display: none !important;
      pointer-events: none !important;
    }

    .editor\:no-resize .components-resizable-box__container {
      display: block !important;
    }

    .editor\:pointer-events-none {
      pointer-events: none !important;
    }

    .is-style-angled {
      /* no suggestion */
      align-items: center !important;
      justify-content: flex-end !important;
    }

    .ext .is-style-angled>[class*="_inner-container"] {
      align-items: center !important;
    }

    .is-style-angled .wp-block-cover__image-background,
    .is-style-angled .wp-block-cover__video-background {
      /* no suggestion */
      -webkit-clip-path: polygon(0 0, 30% 0%, 50% 100%, 0% 100%) !important;
      clip-path: polygon(0 0, 30% 0%, 50% 100%, 0% 100%) !important;
      z-index: 1 !important;
    }

    @media (min-width: 782px) {

      .is-style-angled .wp-block-cover__image-background,
      .is-style-angled .wp-block-cover__video-background {
        /* no suggestion */
        -webkit-clip-path: polygon(0 0, 55% 0%, 65% 100%, 0% 100%) !important;
        clip-path: polygon(0 0, 55% 0%, 65% 100%, 0% 100%) !important;
      }
    }

    .has-foreground-color {
      /* no suggestion */
      color: var(--wp--preset--color--foreground, #000) !important;
    }

    .has-foreground-background-color {
      /* no suggestion */
      background-color: var(--wp--preset--color--foreground, #000) !important;
    }

    .has-background-color {
      /* no suggestion */
      color: var(--wp--preset--color--background, #fff) !important;
    }

    .has-background-background-color {
      /* no suggestion */
      background-color: var(--wp--preset--color--background, #fff) !important;
    }

    .has-primary-color {
      /* no suggestion */
      color: var(--wp--preset--color--primary, #4b5563) !important;
    }

    .has-primary-background-color {
      /* no suggestion */
      background-color: var(--wp--preset--color--primary, #4b5563) !important;
    }

    .has-secondary-color {
      /* no suggestion */
      color: var(--wp--preset--color--secondary, #9ca3af) !important;
    }

    .has-secondary-background-color {
      /* no suggestion */
      background-color: var(--wp--preset--color--secondary, #9ca3af) !important;
    }

    /* Ensure themes that target specific elements use the right colors */

    .ext.has-text-color p,
    .ext.has-text-color h1,
    .ext.has-text-color h2,
    .ext.has-text-color h3,
    .ext.has-text-color h4,
    .ext.has-text-color h5,
    .ext.has-text-color h6 {
      /* no suggestion */
      color: currentColor !important;
    }

    .has-white-color {
      /* no suggestion */
      color: var(--wp--preset--color--white, #fff) !important;
    }

    .has-black-color {
      /* no suggestion */
      color: var(--wp--preset--color--black, #000) !important;
    }

    .has-ext-foreground-background-color {
      /* no suggestion */
      background-color: var(--wp--preset--color--foreground,
          var(--wp--preset--color--black, #000)) !important;
    }

    .has-ext-primary-background-color {
      /* no suggestion */
      background-color: var(--wp--preset--color--primary,
          var(--wp--preset--color--cyan-bluish-gray, #000)) !important;
    }

    /* Fix button borders with specified background colors */

    .wp-block-button__link.has-black-background-color {
      /* no suggestion */
      border-color: var(--wp--preset--color--black, #000) !important;
    }

    .wp-block-button__link.has-white-background-color {
      /* no suggestion */
      border-color: var(--wp--preset--color--white, #fff) !important;
    }

    .has-ext-small-font-size {
      /* no suggestion */
      font-size: var(--wp--preset--font-size--ext-small) !important;
    }

    .has-ext-medium-font-size {
      /* no suggestion */
      font-size: var(--wp--preset--font-size--ext-medium) !important;
    }

    .has-ext-large-font-size {
      /* no suggestion */
      font-size: var(--wp--preset--font-size--ext-large) !important;
      line-height: 1.2 !important;
    }

    .has-ext-x-large-font-size {
      /* no suggestion */
      font-size: var(--wp--preset--font-size--ext-x-large) !important;
      line-height: 1 !important;
    }

    .has-ext-xx-large-font-size {
      /* no suggestion */
      font-size: var(--wp--preset--font-size--ext-xx-large) !important;
      line-height: 1 !important;
    }

    /* Line height */

    .has-ext-x-large-font-size:not([style*="line-height"]) {
      /* no suggestion */
      line-height: 1.1 !important;
    }

    .has-ext-xx-large-font-size:not([style*="line-height"]) {
      /* no suggestion */
      line-height: 1.1 !important;
    }

    .ext .wp-block-group>* {
      /* Line height */
      margin-top: 0 !important;
      margin-bottom: 0 !important;
    }

    .ext .wp-block-group>*+* {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      margin-bottom: 0 !important;
    }

    .ext h2 {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .has-ext-x-large-font-size+p,
    .has-ext-x-large-font-size+h3 {
      margin-top: 0.5rem !important;
    }

    .ext .wp-block-buttons>.wp-block-button.wp-block-button__width-25 {
      width: calc(25% - var(--wp--style--block-gap, 0.5em) * 0.75) !important;
      min-width: 12rem !important;
    }

    /* Classic themes use an inner [class*="_inner-container"] that our utilities cannot directly target, so we need to do so with a few */

    .ext .ext-grid>[class*="_inner-container"] {
      /* no suggestion */
      display: grid !important;
    }

    /* Unhinge grid for container blocks in classic themes, and < 5.9 */

    .ext>[class*="_inner-container"]>.ext-grid:not([class*="columns"]),
    .ext>[class*="_inner-container"]>.wp-block>.ext-grid:not([class*="columns"]) {
      /* no suggestion */
      display: initial !important;
    }

    /* Grid Columns */

    .ext .ext-grid-cols-1>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-2>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-3>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-4>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-5>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-6>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-7>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-8>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-9>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-10>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-11>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-12>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-13>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: repeat(13, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-none>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-columns: none !important;
    }

    /* Grid Rows */

    .ext .ext-grid-rows-1>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-rows: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-2>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-rows: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-3>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-rows: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-4>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-rows: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-5>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-rows: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-6>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-rows: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-none>[class*="_inner-container"] {
      /* no suggestion */
      grid-template-rows: none !important;
    }

    /* Align */

    .ext .ext-items-start>[class*="_inner-container"] {
      align-items: flex-start !important;
    }

    .ext .ext-items-end>[class*="_inner-container"] {
      align-items: flex-end !important;
    }

    .ext .ext-items-center>[class*="_inner-container"] {
      align-items: center !important;
    }

    .ext .ext-items-baseline>[class*="_inner-container"] {
      align-items: baseline !important;
    }

    .ext .ext-items-stretch>[class*="_inner-container"] {
      align-items: stretch !important;
    }

    .ext.wp-block-group>*:last-child {
      /* no suggestion */
      margin-bottom: 0 !important;
    }

    /* For <5.9 */

    .ext .wp-block-group__inner-container {
      /* no suggestion */
      padding: 0 !important;
    }

    .ext.has-background {
      /* no suggestion */
      padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      padding-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    /* Fallback for classic theme group blocks */

    .ext *[class*="inner-container"]>.alignwide *[class*="inner-container"],
    .ext *[class*="inner-container"]>[data-align="wide"] *[class*="inner-container"] {
      /* no suggestion */
      max-width: var(--responsive--alignwide-width, 120rem) !important;
    }

    .ext *[class*="inner-container"]>.alignwide *[class*="inner-container"]>*,
    .ext *[class*="inner-container"]>[data-align="wide"] *[class*="inner-container"]>* {
      /* no suggestion */
    }

    .ext *[class*="inner-container"]>.alignwide *[class*="inner-container"]>*,
    .ext *[class*="inner-container"]>[data-align="wide"] *[class*="inner-container"]>* {
      max-width: 100% !important;
    }

    /* Ensure image block display is standardized */

    .ext .wp-block-image {
      /* no suggestion */
      position: relative !important;
      text-align: center !important;
    }

    .ext .wp-block-image img {
      /* no suggestion */
      display: inline-block !important;
      vertical-align: middle !important;
    }

    body {
      /* no suggestion */
      /* We need to abstract this out of tailwind.config because clamp doesnt translate with negative margins */
      --extendify--spacing--large: var(--wp--custom--spacing--large,
          clamp(2em, 8vw, 8em)) !important;
      /* Add pattern preset font sizes */
      --wp--preset--font-size--ext-small: 1rem !important;
      --wp--preset--font-size--ext-medium: 1.125rem !important;
      --wp--preset--font-size--ext-large: clamp(1.65rem, 3.5vw, 2.15rem) !important;
      --wp--preset--font-size--ext-x-large: clamp(3rem, 6vw, 4.75rem) !important;
      --wp--preset--font-size--ext-xx-large: clamp(3.25rem, 7.5vw, 5.75rem) !important;
      /* Fallbacks for pre 5.9 themes */
      --wp--preset--color--black: #000 !important;
      --wp--preset--color--white: #fff !important;
    }

    .ext * {
      box-sizing: border-box !important;
    }

    /* Astra: Remove spacer block visuals in the library */

    .block-editor-block-preview__content-iframe .ext [data-type="core/spacer"] .components-resizable-box__container {
      /* no suggestion */
      background: transparent !important;
    }

    .block-editor-block-preview__content-iframe .ext [data-type="core/spacer"] .block-library-spacer__resize-container::before {
      /* no suggestion */
      display: none !important;
    }

    /* Twenty Twenty adds a lot of margin automatically to blocks. We only want our own margin added to our patterns. */

    .ext .wp-block-group__inner-container figure.wp-block-gallery.alignfull {
      /* no suggestion */
      margin-top: unset !important;
      margin-bottom: unset !important;
    }

    /* Ensure no funky business is assigned to alignwide */

    .ext .alignwide {
      /* no suggestion */
      margin-left: auto !important;
      margin-right: auto !important;
    }

    /* Negate blockGap being inappropriately assigned in the editor */

    .is-root-container.block-editor-block-list__layout>[data-align="full"]:not(:first-of-type)>.ext-my-0,
    .is-root-container.block-editor-block-list__layout>[data-align="wide"]>.ext-my-0:not([style*="margin"]) {
      /* no suggestion */
      margin-top: calc(-1 * var(--wp--style--block-gap, 28px)) !important;
    }

    /* Ensure vh content in previews looks taller */

    .block-editor-block-preview__content-iframe .preview\:min-h-50 {
      /* no suggestion */
      min-height: 50vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-60 {
      /* no suggestion */
      min-height: 60vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-70 {
      /* no suggestion */
      min-height: 70vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-80 {
      /* no suggestion */
      min-height: 80vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-100 {
      /* no suggestion */
      min-height: 100vw !important;
    }

    /*  Removes excess margin when applied to the alignfull parent div in Block Themes */

    .ext-mr-0.alignfull:not([style*="margin"]):not([style*="margin"]) {
      /* no suggestion */
      margin-right: 0 !important;
    }

    .ext-ml-0:not([style*="margin"]):not([style*="margin"]) {
      /* no suggestion */
      margin-left: 0 !important;
    }

    /*  Ensures fullwidth blocks display properly in the editor when margin is zeroed out */

    .is-root-container .wp-block[data-align="full"]>.ext-mx-0:not([style*="margin"]):not([style*="margin"]) {
      /* no suggestion */
      margin-right: calc(1 * var(--wp--custom--spacing--outer, 0)) !important;
      margin-left: calc(1 * var(--wp--custom--spacing--outer, 0)) !important;
      overflow: hidden !important;
      width: unset !important;
    }

    @media (min-width: 782px) {
      .tablet\:ext-absolute {
        position: absolute !important;
      }

      .tablet\:ext-relative {
        position: relative !important;
      }

      .tablet\:ext-top-base {
        top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-top-lg {
        top: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--top-base {
        top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--top-lg {
        top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-right-base {
        right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-right-lg {
        right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--right-base {
        right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--right-lg {
        right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-bottom-base {
        bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-bottom-lg {
        bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--bottom-base {
        bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--bottom-lg {
        bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-left-base {
        left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-left-lg {
        left: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--left-base {
        left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--left-lg {
        left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-order-1 {
        order: 1 !important;
      }

      .tablet\:ext-order-2 {
        order: 2 !important;
      }

      .tablet\:ext-m-0:not([style*="margin"]) {
        margin: 0 !important;
      }

      .tablet\:ext-m-auto:not([style*="margin"]) {
        margin: auto !important;
      }

      .tablet\:ext-m-base:not([style*="margin"]) {
        margin: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-m-lg:not([style*="margin"]) {
        margin: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--m-base:not([style*="margin"]) {
        margin: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--m-lg:not([style*="margin"]) {
        margin: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mx-0:not([style*="margin"]) {
        margin-left: 0 !important;
        margin-right: 0 !important;
      }

      .tablet\:ext-mx-auto:not([style*="margin"]) {
        margin-left: auto !important;
        margin-right: auto !important;
      }

      .tablet\:ext-mx-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mx-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mx-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mx-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-my-0:not([style*="margin"]) {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
      }

      .tablet\:ext-my-auto:not([style*="margin"]) {
        margin-top: auto !important;
        margin-bottom: auto !important;
      }

      .tablet\:ext-my-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-my-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--my-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--my-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mt-0:not([style*="margin"]) {
        margin-top: 0 !important;
      }

      .tablet\:ext-mt-auto:not([style*="margin"]) {
        margin-top: auto !important;
      }

      .tablet\:ext-mt-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mt-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mt-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mt-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mr-0:not([style*="margin"]) {
        margin-right: 0 !important;
      }

      .tablet\:ext-mr-auto:not([style*="margin"]) {
        margin-right: auto !important;
      }

      .tablet\:ext-mr-base:not([style*="margin"]) {
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mr-lg:not([style*="margin"]) {
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mr-base:not([style*="margin"]) {
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mr-lg:not([style*="margin"]) {
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mb-0:not([style*="margin"]) {
        margin-bottom: 0 !important;
      }

      .tablet\:ext-mb-auto:not([style*="margin"]) {
        margin-bottom: auto !important;
      }

      .tablet\:ext-mb-base:not([style*="margin"]) {
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mb-lg:not([style*="margin"]) {
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mb-base:not([style*="margin"]) {
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mb-lg:not([style*="margin"]) {
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-ml-0:not([style*="margin"]) {
        margin-left: 0 !important;
      }

      .tablet\:ext-ml-auto:not([style*="margin"]) {
        margin-left: auto !important;
      }

      .tablet\:ext-ml-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-ml-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--ml-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--ml-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-block {
        display: block !important;
      }

      .tablet\:ext-inline-block {
        display: inline-block !important;
      }

      .tablet\:ext-inline {
        display: inline !important;
      }

      .tablet\:ext-flex {
        display: flex !important;
      }

      .tablet\:ext-inline-flex {
        display: inline-flex !important;
      }

      .tablet\:ext-grid {
        display: grid !important;
      }

      .tablet\:ext-inline-grid {
        display: inline-grid !important;
      }

      .tablet\:ext-hidden {
        display: none !important;
      }

      .tablet\:ext-w-auto {
        width: auto !important;
      }

      .tablet\:ext-w-full {
        width: 100% !important;
      }

      .tablet\:ext-max-w-full {
        max-width: 100% !important;
      }

      .tablet\:ext-flex-1 {
        flex: 1 1 0% !important;
      }

      .tablet\:ext-flex-auto {
        flex: 1 1 auto !important;
      }

      .tablet\:ext-flex-initial {
        flex: 0 1 auto !important;
      }

      .tablet\:ext-flex-none {
        flex: none !important;
      }

      .tablet\:ext-flex-shrink-0 {
        flex-shrink: 0 !important;
      }

      .tablet\:ext-flex-shrink {
        flex-shrink: 1 !important;
      }

      .tablet\:ext-flex-grow-0 {
        flex-grow: 0 !important;
      }

      .tablet\:ext-flex-grow {
        flex-grow: 1 !important;
      }

      .tablet\:ext-list-none {
        list-style-type: none !important;
      }

      .tablet\:ext-grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-6 {
        grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-7 {
        grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-8 {
        grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-9 {
        grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-10 {
        grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-11 {
        grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-12 {
        grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-none {
        grid-template-columns: none !important;
      }

      .tablet\:ext-flex-row {
        flex-direction: row !important;
      }

      .tablet\:ext-flex-row-reverse {
        flex-direction: row-reverse !important;
      }

      .tablet\:ext-flex-col {
        flex-direction: column !important;
      }

      .tablet\:ext-flex-col-reverse {
        flex-direction: column-reverse !important;
      }

      .tablet\:ext-flex-wrap {
        flex-wrap: wrap !important;
      }

      .tablet\:ext-flex-wrap-reverse {
        flex-wrap: wrap-reverse !important;
      }

      .tablet\:ext-flex-nowrap {
        flex-wrap: nowrap !important;
      }

      .tablet\:ext-items-start {
        align-items: flex-start !important;
      }

      .tablet\:ext-items-end {
        align-items: flex-end !important;
      }

      .tablet\:ext-items-center {
        align-items: center !important;
      }

      .tablet\:ext-items-baseline {
        align-items: baseline !important;
      }

      .tablet\:ext-items-stretch {
        align-items: stretch !important;
      }

      .tablet\:ext-justify-start {
        justify-content: flex-start !important;
      }

      .tablet\:ext-justify-end {
        justify-content: flex-end !important;
      }

      .tablet\:ext-justify-center {
        justify-content: center !important;
      }

      .tablet\:ext-justify-between {
        justify-content: space-between !important;
      }

      .tablet\:ext-justify-around {
        justify-content: space-around !important;
      }

      .tablet\:ext-justify-evenly {
        justify-content: space-evenly !important;
      }

      .tablet\:ext-justify-items-start {
        justify-items: start !important;
      }

      .tablet\:ext-justify-items-end {
        justify-items: end !important;
      }

      .tablet\:ext-justify-items-center {
        justify-items: center !important;
      }

      .tablet\:ext-justify-items-stretch {
        justify-items: stretch !important;
      }

      .tablet\:ext-justify-self-auto {
        justify-self: auto !important;
      }

      .tablet\:ext-justify-self-start {
        justify-self: start !important;
      }

      .tablet\:ext-justify-self-end {
        justify-self: end !important;
      }

      .tablet\:ext-justify-self-center {
        justify-self: center !important;
      }

      .tablet\:ext-justify-self-stretch {
        justify-self: stretch !important;
      }

      .tablet\:ext-p-0:not([style*="padding"]) {
        padding: 0 !important;
      }

      .tablet\:ext-p-base:not([style*="padding"]) {
        padding: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-p-lg:not([style*="padding"]) {
        padding: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-px-0:not([style*="padding"]) {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }

      .tablet\:ext-px-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-px-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-py-0:not([style*="padding"]) {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      }

      .tablet\:ext-py-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-py-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pt-0:not([style*="padding"]) {
        padding-top: 0 !important;
      }

      .tablet\:ext-pt-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pt-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pr-0:not([style*="padding"]) {
        padding-right: 0 !important;
      }

      .tablet\:ext-pr-base:not([style*="padding"]) {
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pr-lg:not([style*="padding"]) {
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pb-0:not([style*="padding"]) {
        padding-bottom: 0 !important;
      }

      .tablet\:ext-pb-base:not([style*="padding"]) {
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pb-lg:not([style*="padding"]) {
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pl-0:not([style*="padding"]) {
        padding-left: 0 !important;
      }

      .tablet\:ext-pl-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pl-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-text-left {
        text-align: left !important;
      }

      .tablet\:ext-text-center {
        text-align: center !important;
      }

      .tablet\:ext-text-right {
        text-align: right !important;
      }
    }

    @media (min-width: 1080px) {
      .desktop\:ext-absolute {
        position: absolute !important;
      }

      .desktop\:ext-relative {
        position: relative !important;
      }

      .desktop\:ext-top-base {
        top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-top-lg {
        top: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--top-base {
        top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--top-lg {
        top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-right-base {
        right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-right-lg {
        right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--right-base {
        right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--right-lg {
        right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-bottom-base {
        bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-bottom-lg {
        bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--bottom-base {
        bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--bottom-lg {
        bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-left-base {
        left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-left-lg {
        left: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--left-base {
        left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--left-lg {
        left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-order-1 {
        order: 1 !important;
      }

      .desktop\:ext-order-2 {
        order: 2 !important;
      }

      .desktop\:ext-m-0:not([style*="margin"]) {
        margin: 0 !important;
      }

      .desktop\:ext-m-auto:not([style*="margin"]) {
        margin: auto !important;
      }

      .desktop\:ext-m-base:not([style*="margin"]) {
        margin: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-m-lg:not([style*="margin"]) {
        margin: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--m-base:not([style*="margin"]) {
        margin: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--m-lg:not([style*="margin"]) {
        margin: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mx-0:not([style*="margin"]) {
        margin-left: 0 !important;
        margin-right: 0 !important;
      }

      .desktop\:ext-mx-auto:not([style*="margin"]) {
        margin-left: auto !important;
        margin-right: auto !important;
      }

      .desktop\:ext-mx-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mx-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mx-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mx-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-my-0:not([style*="margin"]) {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
      }

      .desktop\:ext-my-auto:not([style*="margin"]) {
        margin-top: auto !important;
        margin-bottom: auto !important;
      }

      .desktop\:ext-my-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-my-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--my-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--my-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mt-0:not([style*="margin"]) {
        margin-top: 0 !important;
      }

      .desktop\:ext-mt-auto:not([style*="margin"]) {
        margin-top: auto !important;
      }

      .desktop\:ext-mt-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mt-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mt-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mt-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mr-0:not([style*="margin"]) {
        margin-right: 0 !important;
      }

      .desktop\:ext-mr-auto:not([style*="margin"]) {
        margin-right: auto !important;
      }

      .desktop\:ext-mr-base:not([style*="margin"]) {
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mr-lg:not([style*="margin"]) {
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mr-base:not([style*="margin"]) {
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mr-lg:not([style*="margin"]) {
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mb-0:not([style*="margin"]) {
        margin-bottom: 0 !important;
      }

      .desktop\:ext-mb-auto:not([style*="margin"]) {
        margin-bottom: auto !important;
      }

      .desktop\:ext-mb-base:not([style*="margin"]) {
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mb-lg:not([style*="margin"]) {
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mb-base:not([style*="margin"]) {
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mb-lg:not([style*="margin"]) {
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-ml-0:not([style*="margin"]) {
        margin-left: 0 !important;
      }

      .desktop\:ext-ml-auto:not([style*="margin"]) {
        margin-left: auto !important;
      }

      .desktop\:ext-ml-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-ml-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--ml-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--ml-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-block {
        display: block !important;
      }

      .desktop\:ext-inline-block {
        display: inline-block !important;
      }

      .desktop\:ext-inline {
        display: inline !important;
      }

      .desktop\:ext-flex {
        display: flex !important;
      }

      .desktop\:ext-inline-flex {
        display: inline-flex !important;
      }

      .desktop\:ext-grid {
        display: grid !important;
      }

      .desktop\:ext-inline-grid {
        display: inline-grid !important;
      }

      .desktop\:ext-hidden {
        display: none !important;
      }

      .desktop\:ext-w-auto {
        width: auto !important;
      }

      .desktop\:ext-w-full {
        width: 100% !important;
      }

      .desktop\:ext-max-w-full {
        max-width: 100% !important;
      }

      .desktop\:ext-flex-1 {
        flex: 1 1 0% !important;
      }

      .desktop\:ext-flex-auto {
        flex: 1 1 auto !important;
      }

      .desktop\:ext-flex-initial {
        flex: 0 1 auto !important;
      }

      .desktop\:ext-flex-none {
        flex: none !important;
      }

      .desktop\:ext-flex-shrink-0 {
        flex-shrink: 0 !important;
      }

      .desktop\:ext-flex-shrink {
        flex-shrink: 1 !important;
      }

      .desktop\:ext-flex-grow-0 {
        flex-grow: 0 !important;
      }

      .desktop\:ext-flex-grow {
        flex-grow: 1 !important;
      }

      .desktop\:ext-list-none {
        list-style-type: none !important;
      }

      .desktop\:ext-grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-6 {
        grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-7 {
        grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-8 {
        grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-9 {
        grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-10 {
        grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-11 {
        grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-12 {
        grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-none {
        grid-template-columns: none !important;
      }

      .desktop\:ext-flex-row {
        flex-direction: row !important;
      }

      .desktop\:ext-flex-row-reverse {
        flex-direction: row-reverse !important;
      }

      .desktop\:ext-flex-col {
        flex-direction: column !important;
      }

      .desktop\:ext-flex-col-reverse {
        flex-direction: column-reverse !important;
      }

      .desktop\:ext-flex-wrap {
        flex-wrap: wrap !important;
      }

      .desktop\:ext-flex-wrap-reverse {
        flex-wrap: wrap-reverse !important;
      }

      .desktop\:ext-flex-nowrap {
        flex-wrap: nowrap !important;
      }

      .desktop\:ext-items-start {
        align-items: flex-start !important;
      }

      .desktop\:ext-items-end {
        align-items: flex-end !important;
      }

      .desktop\:ext-items-center {
        align-items: center !important;
      }

      .desktop\:ext-items-baseline {
        align-items: baseline !important;
      }

      .desktop\:ext-items-stretch {
        align-items: stretch !important;
      }

      .desktop\:ext-justify-start {
        justify-content: flex-start !important;
      }

      .desktop\:ext-justify-end {
        justify-content: flex-end !important;
      }

      .desktop\:ext-justify-center {
        justify-content: center !important;
      }

      .desktop\:ext-justify-between {
        justify-content: space-between !important;
      }

      .desktop\:ext-justify-around {
        justify-content: space-around !important;
      }

      .desktop\:ext-justify-evenly {
        justify-content: space-evenly !important;
      }

      .desktop\:ext-justify-items-start {
        justify-items: start !important;
      }

      .desktop\:ext-justify-items-end {
        justify-items: end !important;
      }

      .desktop\:ext-justify-items-center {
        justify-items: center !important;
      }

      .desktop\:ext-justify-items-stretch {
        justify-items: stretch !important;
      }

      .desktop\:ext-justify-self-auto {
        justify-self: auto !important;
      }

      .desktop\:ext-justify-self-start {
        justify-self: start !important;
      }

      .desktop\:ext-justify-self-end {
        justify-self: end !important;
      }

      .desktop\:ext-justify-self-center {
        justify-self: center !important;
      }

      .desktop\:ext-justify-self-stretch {
        justify-self: stretch !important;
      }

      .desktop\:ext-p-0:not([style*="padding"]) {
        padding: 0 !important;
      }

      .desktop\:ext-p-base:not([style*="padding"]) {
        padding: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-p-lg:not([style*="padding"]) {
        padding: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-px-0:not([style*="padding"]) {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }

      .desktop\:ext-px-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-px-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-py-0:not([style*="padding"]) {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      }

      .desktop\:ext-py-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-py-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pt-0:not([style*="padding"]) {
        padding-top: 0 !important;
      }

      .desktop\:ext-pt-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pt-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pr-0:not([style*="padding"]) {
        padding-right: 0 !important;
      }

      .desktop\:ext-pr-base:not([style*="padding"]) {
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pr-lg:not([style*="padding"]) {
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pb-0:not([style*="padding"]) {
        padding-bottom: 0 !important;
      }

      .desktop\:ext-pb-base:not([style*="padding"]) {
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pb-lg:not([style*="padding"]) {
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pl-0:not([style*="padding"]) {
        padding-left: 0 !important;
      }

      .desktop\:ext-pl-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pl-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-text-left {
        text-align: left !important;
      }

      .desktop\:ext-text-center {
        text-align: center !important;
      }

      .desktop\:ext-text-right {
        text-align: right !important;
      }
    }
  </style>
  <link rel='stylesheet' id='fontawesome-latest-css-css' href='../wp-content/plugins/accesspress-social-login-lite/css/font-awesome/all.minb045.css?ver=3.4.8' type='text/css' media='all' />
  <link rel='stylesheet' id='apsl-frontend-css-css' href='../wp-content/plugins/accesspress-social-login-lite/css/frontendb045.css?ver=3.4.8' type='text/css' media='all' />
  <link rel='stylesheet' id='apss-font-awesome-four-css' href='../wp-content/plugins/accesspress-social-share/css/font-awesome.min62df.css?ver=4.5.6' type='text/css' media='all' />
  <link rel='stylesheet' id='apss-frontend-css-css' href='../wp-content/plugins/accesspress-social-share/css/frontend62df.css?ver=4.5.6' type='text/css' media='all' />
  <link rel='stylesheet' id='apss-font-opensans-css' href='http://fonts.googleapis.com/css?family=Open+Sans&amp;ver=6.1.1' type='text/css' media='all' />
  <link rel='stylesheet' id='woocommerce-layout-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce-layout9c05.css?ver=7.4.1' type='text/css' media='all' />
  <link rel='stylesheet' id='woocommerce-smallscreen-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen9c05.css?ver=7.4.1' type='text/css' media='only screen and (max-width: 768px)' />
  <link rel='stylesheet' id='woocommerce-general-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce9c05.css?ver=7.4.1' type='text/css' media='all' />
  <style id='woocommerce-inline-inline-css' type='text/css'>
    .woocommerce form .form-row .required {
      visibility: visible;
    }
  </style>
  <link rel='stylesheet' id='select2.min-css' href='../wp-content/themes/classiera/css/select2.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='jquery-ui-css' href='../wp-content/themes/classiera/css/jquery-ui.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-css' href='../wp-content/themes/classiera/css/bootstrap68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='animate.min-css' href='../wp-content/themes/classiera/css/animate.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-dropdownhover.min-css' href='../wp-content/themes/classiera/css/bootstrap-dropdownhover.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='classiera-components-css' href='../wp-content/themes/classiera/css/classiera-components68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='classiera-css' href='../wp-content/themes/classiera/css/classiera68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='fontawesome-css' href='../wp-content/themes/classiera/css/fontawesome68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='material-design-iconic-font-css' href='../wp-content/themes/classiera/css/material-design-iconic-font68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='owl.carousel.min-css' href='../wp-content/themes/classiera/css/owl.carousel.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='owl.theme.default.min-css' href='../wp-content/themes/classiera/css/owl.theme.default.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='responsive-css' href='../wp-content/themes/classiera/css/responsive68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='classiera-map-css' href='../wp-content/themes/classiera/css/classiera-map68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-slider-css' href='../wp-content/themes/classiera/css/bootstrap-slider68b3.css?ver=1' type='text/css' media='all' />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Quicksand:700,400,500&amp;display=swap&amp;ver=1651390143" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:700,400,500&amp;display=swap&amp;ver=1651390143" media="print" onload="this.media='all'"><noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:700,400,500&amp;display=swap&amp;ver=1651390143" />
  </noscript>
  <script type='text/javascript' src='../wp-includes/js/jquery/jquery.mina7a0.js?ver=3.6.1' id='jquery-core-js'></script>
  <script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2' id='jquery-migrate-js'></script>
  <script type='text/javascript' src='../wp-content/plugins/accesspress-social-login-lite/js/frontendb045.js?ver=3.4.8' id='apsl-frontend-js-js'></script>
  <link rel="https://api.w.org/" href="../wp-json/index.html" />
  <link rel="alternate" type="application/json" href="../wp-json/wp/v2/posts/226.json" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../wp-includes/wlwmanifest.xml" />
  <meta name="generator" content="WordPress 6.1.1" />
  <meta name="generator" content="WooCommerce 7.4.1" />
  <link rel="canonical" href="index.html" />
  <link rel='shortlink' href='../index8c34.html?p=226' />
  <link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embed5143.json?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Fused-bmw-car-2018-model-for-sale%2F" />
  <link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embed99ed?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Fused-bmw-car-2018-model-for-sale%2F&amp;format=xml" />
  <meta name="generator" content="Redux 4.3.26" />
  <script type="text/javascript">
    var ajaxurl = '../wp-admin/admin-ajax.html';
    var classieraCurrentUserID = '0';
  </script>
  <style type="text/css">
    .topBar .login-info a.register,
    .search-section .search-form.search-form-v1 .form-group button:hover,
    .search-section.search-section-v3,
    section.search-section-v2,
    .search-section.search-section-v5 .form-group button:hover,
    .search-section.search-section-v6 .form-v6-bg .form-group button,
    .category-slider-small-box ul li a:hover,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption .price span:first-of-type,
    .classiera-box-div-v3 figure figcaption .price span:first-of-type,
    .classiera-box-div-v5 figure .premium-img .price,
    .classiera-box-div-v6 figure .premium-img .price.btn-primary.active,
    .classiera-box-div-v7 figure figcaption .caption-tags .price,
    .classiera-box-div-v7 figure:hover figcaption,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v4 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .price,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .price.btn-primary.active,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .price.btn-primary.active,
    .advertisement-v1 .tab-divs .view-as a:hover,
    .advertisement-v2 .view-as .btn-group a.active,
    .advertisement-v2 .nav-tabs>li:active>a,
    .advertisement-v2 .nav-tabs>li.active>a,
    .advertisement-v2 .nav-tabs>li.active>a:hover,
    .advertisement-v2 .nav-tabs>li>a:hover,
    .advertisement-v2 .nav-tabs>li>a:focus,
    .advertisement-v2 .nav-tabs>li>a:active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li:hover:before,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active:before,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active>a,
    .members .members-text h3,
    .members-v2 .members-text h4,
    .members-v4.members-v5 .member-content a.btn:hover,
    .locations .location-content .location .location-icon,
    .locations .location-content .location .location-icon .tip:after,
    .locations .location-content-v6 figure.location figcaption .location-caption span,
    .pricing-plan .pricing-plan-content .pricing-plan-box .pricing-plan-price,
    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-price,
    .pricing-plan-v3 .pricing-plan-content .pricing-plan-box .pricing-plan-heading h4 span,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:focus,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular,
    .pricing-plan-v6.pricing-plan-v7,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    footer .widget-box .widget-content .footer-pr-widget-v1:hover .media-body .price,
    footer .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    footer .widget-box .tagcloud a:hover,
    .footer-bottom ul.footer-bottom-social-icon li a:hover,
    #back-to-top:hover,
    .sidebar .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    .sidebar .widget-box .tagcloud a:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li>a:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li.active>a,
    .sidebar .widget-box .user-make-offer-message .nav>li.active>button,
    .inner-page-content .classiera-advertisement .item.item-list .classiera-box-div figure figcaption .price.visible-xs,
    .author-box .author-social .author-social-icons li>a:hover,
    .user-pages aside .user-page-list li a:hover,
    .user-pages aside .user-page-list li.active a,
    .user-pages aside .user-submit-ad .btn-user-submit-ad:hover,
    .user-pages .user-detail-section .user-social-profile-links ul li a:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:focus,
    .submit-post form .classiera-post-main-cat ul li a:hover,
    .submit-post form .classiera-post-main-cat ul li a:focus,
    .submit-post form .classiera-post-main-cat ul li.active a,
    .classiera_follow_user>input[type='submit']:hover,
    .classiera_follow_user>input[type='submit']:focus,
    .mobile-app-button li a:hover,
    .mobile-app-button li a:focus,
    .related-blog-post-section .navText a:hover,
    .pagination>li>a:hover,
    .pagination>li span:hover,
    .pagination>li:first-child>a:hover,
    .pagination>li:first-child span:hover,
    .pagination>li:last-child>a:hover,
    .pagination>li:last-child span:hover,
    .inputfile-1:focus+label,
    .inputfile-1.has-focus+label,
    .inputfile-1+label:hover,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .category-menu-btn span,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown.open .category-menu-btn,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a:hover,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .navbar-nav>li>a:hover:after,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type:hover,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu,
    .offcanvas-light .log-reg-btn .offcanvas-log-reg-btn:hover,
    .offcanvas-light.offcanvas-dark .log-reg-btn .offcanvas-log-reg-btn:hover,
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active,
    .open>.dropdown-toggle.btn-primary,
    .btn-primary.active:hover,
    .btn-primary:active:hover,
    .btn-primary:active,
    .btn-primary.active,
    .btn-primary.outline:hover,
    .btn-primary.outline:focus,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .open>.dropdown-toggle.btn-primary,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .btn-primary.raised:active,
    .btn-primary.raised.active,
    .btn-style-four.active,
    .btn-style-four:hover,
    .btn-style-four:focus,
    .btn-style-four:active,
    .social-icon:hover,
    .social-icon-v2:hover,
    .woocommerce .button:hover,
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    #ad-address span:hover i,
    .search-section.search-section-v3,
    .search-section.search-section-v4,
    #showNum:hover,
    .price.btn.btn-primary.round.btn-style-six.active,
    .woocommerce ul.products>li.product a>span,
    .woocommerce div.product .great,
    span.ad_type_display,
    .classiera-navbar.classiera-navbar-v5.classiera-navbar-minimal .custom-menu-v5 .menu-btn,
    .minimal_page_search_form button,
    .minimla_social_icon:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover,
    .bid_notification,
    .bid_notification__icon {
      background: #D32323 !important;
    }

    .topBar .contact-info span i,
    .search-section.search-section-v5 .form-group button,
    .category-slider-small-box.outline-box ul li a:hover,
    .section-heading-v1.section-heading-with-icon h3 i,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption h5 a:hover,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption p a:hover,
    .classiera-box-div-v2 figure figcaption h5 a:hover,
    .classiera-box-div-v2 figure figcaption p span,
    .classiera-box-div-v3 figure figcaption h5 a:hover,
    .classiera-box-div-v3 figure figcaption span.category a:hover,
    .classiera-box-div-v4 figure figcaption h5 a:hover,
    .classiera-box-div-v5 figure figcaption h5 a:hover,
    .classiera-box-div-v5 figure figcaption .category span a:hover,
    .classiera-box-div-v6 figure figcaption .content>a:hover,
    .classiera-box-div-v6 figure figcaption .content h5 a:hover,
    .classiera-box-div-v6 figure figcaption .content .category span,
    .classiera-box-div-v6 figure .box-div-heading .category span,
    .classiera-category-ads-v4 .category-box .category-box-over .category-box-content h3 a:hover,
    .category-v2 .category-box .category-content .view-button a:hover,
    .category-v3 .category-content h4 a:hover,
    .category-v3 .category-content .view-all:hover,
    .category-v3 .category-content .view-all:hover i,
    .category-v5 .categories li .category-content h4 a:hover,
    .category-v7 .category-box figure figcaption ul li a:hover,
    .category-v7 .category-box figure figcaption>a:hover,
    .category-v7 .category-box figure figcaption>a:hover i,
    .category-v7 .category-box figure figcaption ul li a:hover i,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v3 figure figcaption .post-tags span i,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v3 figure figcaption .post-tags a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure figcaption .content h5 a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure figcaption .content h5 a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a:hover,
    .advertisement-v1 .tab-divs .view-as a.active,
    .advertisement-v1 .tab-divs .view-as a.active i,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v3 .view-head .view-as a:hover i,
    .advertisement-v3 .view-head .view-as a.active i,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v6 .view-head .view-as a:hover,
    .advertisement-v6 .view-head .view-as a.active,
    .locations .location-content-v2 .location h5 a:hover,
    .locations .location-content-v3 .location .location-content h5 a:hover,
    .locations .location-content-v5 ul li .location-content h5 a:hover,
    .locations .location-content-v6 figure.location figcaption .location-caption>a,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box .pricing-plan-heading .price-title,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box .pricing-plan-text ul li i,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button h3,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-heading h2,
    footer .widget-box .widget-content .footer-pr-widget-v1 .media-body h4 a:hover,
    footer .widget-box .widget-content .footer-pr-widget-v1 .media-body span.category a:hover,
    footer .widget-box .widget-content .footer-pr-widget-v2 .media-body h5 a:hover,
    footer .widget-box .widget-content ul li h5 a:hover,
    footer .widget-box .widget-content ul li p span a:hover,
    footer .widget-box .widget-content .category>li>a:hover,
    footer .widget-box>ul>li a:hover,
    footer .widget-box>ul>li a:focus,
    footer .widgetContent .cats ul>li a:hover,
    footer footer .widgetContent .cats>ul>li a:focus,
    .blog-post-section .blog-post .blog-post-content h4 a:hover,
    .blog-post-section .blog-post .blog-post-content p span a:hover,
    .sidebar .widget-box .widget-title h4 i,
    .sidebar .widget-box .widget-content .footer-pr-widget-v1 .media-body h4 a:hover,
    .sidebar .widget-box .widget-content .footer-pr-widget-v1 .media-body .category a:hover,
    .sidebar .widget-box .widget-content .footer-pr-widget-v2 .media-body h5 a:hover,
    .sidebar .widget-box .widget-content ul li h5 a:hover,
    .sidebar .widget-box .widget-content ul li p span a:hover,
    .sidebar .widget-box .widget-content ul li>a:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li>a,
    .sidebar .widget-box .user-make-offer-message .nav>li .browse-favourite a,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button,
    .sidebar .widget-box .user-make-offer-message .nav>li>a i,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button i,
    .sidebar .widget-box .user-make-offer-message .nav>li .browse-favourite a i,
    .sidebar .widget-box>ul>li>a:hover,
    .sidebar .widget-box>ul>li>a:focus,
    .sidebar .widgetBox .widgetContent .cats ul>li>a:hover,
    .sidebar .widget-box .widgetContent .cats ul>li>a:focus,
    .sidebar .widget-box .menu-all-pages-container ul li a:hover,
    .sidebar .widget-box .menu-all-pages-container ul li a:focus,
    .inner-page-content .breadcrumb>li a:hover,
    .inner-page-content .breadcrumb>li a:hover i,
    .inner-page-content .breadcrumb>li.active,
    .inner-page-content article.article-content.blog h3 a:hover,
    .inner-page-content article.article-content.blog p span a:hover,
    .inner-page-content article.article-content.blog .tags a:hover,
    .inner-page-content article.article-content blockquote:before,
    .inner-page-content article.article-content ul li:before,
    .inner-page-content article.article-content ol li a,
    .inner-page-content .login-register.login-register-v1 form .form-group p a:hover,
    .author-box .author-contact-details .contact-detail-row .contact-detail-col span a:hover,
    .author-info .media-heading a:hover,
    .author-info span i,
    .user-pages .user-detail-section .user-contact-details ul li a:hover,
    .user-pages .user-detail-section .user-ads .media .media-body .media-heading a:hover,
    .user-pages .user-detail-section .user-ads .media .media-body p span a:hover,
    .user-pages .user-detail-section .user-ads .media .media-body p span.published i,
    .user-pages .user-detail-section .user-packages .table tr td.text-success,
    form .search-form .search-form-main-heading a i,
    form .search-form #innerSearch .inner-search-box .inner-search-heading i,
    .submit-post form .form-main-section .classiera-dropzone-heading i,
    .submit-post form .form-main-section .iframe .iframe-heading i,
    .single-post-page .single-post .single-post-title .post-category span a:hover,
    .single-post-page .single-post .description p a,
    .single-post-page .single-post>.author-info a:hover,
    .single-post-page .single-post>.author-info .contact-details .fa-ul li a:hover,
    .classiera_follow_user>input[type='submit'],
    .single-post .description ul li:before,
    .single-post .description ol li a,
    .mobile-app-button li a i,
    #wp-calendar td#today,
    td#prev a:hover,
    td#next a:hover,
    td#prev a:focus,
    td#next a:focus,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .category-menu-btn:hover span i,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown.open .category-menu-btn span i,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu li a:hover,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>a:hover,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>.active>a,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu>li>a:hover i,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .menu-btn i,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav li.active>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav li>a:hover,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .login-reg .lr-with-icon:hover,
    .offcanvas-light .navmenu-brand .offcanvas-button i,
    .offcanvas-light .nav>li>a:hover,
    .offcanvas-light .nav>li>a:focus,
    .offcanvas-light .navmenu-nav>.open>a,
    .offcanvas-light .navmenu-nav .open .dropdown-menu>li>a:hover,
    .offcanvas-light .navmenu-nav .open .dropdown-menu>li>a:focus,
    .offcanvas-light .navmenu-nav .open .dropdown-menu>li>a:active,
    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    input[type=radio]:checked+label:before,
    input[type='checkbox']:checked+label:before,
    .woocommerce-info::before,
    .woocommerce .woocommerce-info a:hover,
    .woocommerce .woocommerce-info a:focus,
    #ad-address span a:hover,
    #ad-address span a:focus,
    #getLocation:hover i,
    #getLocation:focus i,
    .offcanvas-light .nav>li.active>a,
    .classiera-box-div-v4 figure figcaption h5 a:hover,
    .classiera-box-div-v4 figure figcaption h5 a:focus,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular h1,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn.round:hover,
    .color,
    .classiera-box-div.classiera-box-div-v7 .buy-sale-tag,
    .offcanvas-light .nav>li.dropdown ul.dropdown-menu li.active>a,
    .classiera-navbar.classiera-navbar-v4 ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    .classiera-navbar-v6 .offcanvas-light ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    .sidebar .widget-box .author-info a:hover,
    .submit-post form .classiera-post-sub-cat ul li a:focus,
    .submit-post form .classiera_third_level_cat ul li a:focus,
    .woocommerce div.product p.price ins,
    p.classiera_map_div__price span,
    .author-info .media-heading i,
    .classiera-category-new .navText a i:hover,
    footer .widget-box .contact-info .contact-info-box i,
    .classiera-category-new-v2.classiera-category-new-v3 .classiera-category-new-v2-box:hover .classiera-category-new-v2-box-title,
    .minimal_page_search_form .input-group-addon i {
      color: #D32323 !important;
    }

    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading {
      background: rgba(211, 35, 35, .75)
    }

    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading::after {
      border-top-color: rgba(211, 35, 35, .75)
    }

    footer .widget-box .widget-content .grid-view-pr li span .hover-posts {
      background: rgba(211, 35, 35, .5)
    }

    .advertisement-v1 .tab-button .nav-tabs>li.active>a,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:hover,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:focus,
    .advertisement-v1 .tab-button .nav>li>a:hover,
    .advertisement-v1 .tab-button .nav>li>a:focus,
    form .search-form #innerSearch .inner-search-box .slider-handle,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i {
      background-color: #D32323 !important;
    }

    .search-section .search-form.search-form-v1 .form-group button:hover,
    .search-section.search-section-v5 .form-group button,
    .search-section.search-section-v5 .form-group button:hover,
    .search-section.search-section-v6 .form-v6-bg .form-group button,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:hover,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:focus,
    .advertisement-v1 .tab-button .nav>li>a:hover,
    .advertisement-v1 .tab-button .nav>li>a:focus,
    .advertisement-v1 .tab-divs .view-as a:hover,
    .advertisement-v1 .tab-divs .view-as a.active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active>a,
    .members-v3 .members-text .btn.outline:hover,
    .members-v4.members-v5 .member-content a.btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:focus,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-heading,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-text,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li>a,
    .sidebar .widget-box .user-make-offer-message .nav>li .browse-favourite a,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button,
    .user-pages aside .user-submit-ad .btn-user-submit-ad:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:focus,
    .submit-post form .form-main-section .active-post-type .post-type-box,
    .submit-post form .classiera-post-main-cat ul li a:hover,
    .submit-post form .classiera-post-main-cat ul li a:focus,
    .submit-post form .classiera-post-main-cat ul li.active a,
    .classiera-upload-box.classiera_featured_box,
    .classiera_follow_user>input[type='submit'],
    .related-blog-post-section .navText a:hover,
    .pagination>li>a:hover,
    .pagination>li span:hover,
    .pagination>li:first-child>a:hover,
    .pagination>li:first-child span:hover,
    .pagination>li:last-child>a:hover,
    .pagination>li:last-child span:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu,
    .offcanvas-light .navmenu-brand .offcanvas-button,
    .offcanvas-light .log-reg-btn .offcanvas-log-reg-btn:hover,
    .btn-primary.outline:hover,
    .btn-primary.outline:focus,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .open>.dropdown-toggle.btn-primary,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .btn-style-four.active,
    .btn-style-four.active:hover,
    .btn-style-four.active:focus,
    .btn-style-four.active:active,
    .btn-style-four:hover,
    .btn-style-four:focus,
    .btn-style-four:active,
    #showNum:hover,
    .user_inbox_content>.tab-content .tab-pane .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:hover,
    .nav-tabs>li.active>a:focus,
    .classiera-navbar.classiera-navbar-v5.classiera-navbar-minimal .custom-menu-v5 .menu-btn {
      border-color: #D32323 !important;
    }

    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a span.arrow-down,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li:hover:after,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active:after,
    .locations .location-content .location .location-icon .tip,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu,
    .woocommerce-error,
    .woocommerce-info,
    .woocommerce-message {
      border-top-color: #D32323;
    }

    .locations .location-content-v2 .location:hover,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu:before,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>a:hover,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu:before,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>.active>a {
      border-bottom-color: #D32323 !important;
    }

    .pagination>li.active a,
    .pagination>li.disabled a,
    .pagination>li.active a:focus,
    .pagination>li.active a:hover,
    .pagination>li.disabled a:focus,
    .pagination>li.disabled a:hover,
    .pagination>li:first-child>a,
    .pagination>li:first-child span,
    .pagination>li:last-child>a,
    .pagination>li:last-child span,
    .classiera-navbar.classiera-navbar-v3.affix,
    .classiera-navbar.classiera-navbar-v3 .navbar-nav>li>.dropdown-menu li a:hover,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a:focus,
    .btn-primary,
    .btn-primary.btn-style-five:hover,
    .btn-primary.btn-style-five.active,
    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    .input-group-addon,
    .woocommerce .button,
    .woocommerce a.button,
    .woocommerce .button.alt,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    #ad-address span i,
    .search-section .search-form .form-group .help-block,
    .search-section .search-form.search-form-v1 .form-group button,
    .search-section.search-section-v2 .form-group button,
    .search-section.search-section-v4 .search-form .btn:hover,
    .category-slider-small-box ul li a,
    .category-slider-small-box.outline-box ul li a:hover,
    .classiera-premium-ads-v3 .premium-carousel-v3 .owl-dots .owl-dot.active span,
    .classiera-premium-ads-v3 .premium-carousel-v3 .owl-dots .owl-dot:hover span,
    .classiera-box-div-v7 figure:hover:after,
    .category-v2 .category-box .category-content ul li a:hover i,
    .category-v6 .category-box figure .category-box-hover>span,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v3 figure figcaption .price span:last-of-type,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a:hover,
    .advertisement-v1 .tab-button .nav-tabs>li>a,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v5 .view-head .view-as a:hover,
    .advertisement-v5 .view-head .view-as a.active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v6 .view-head .view-as a:hover,
    .advertisement-v6 .view-head .view-as a.active,
    .locations .location-content .location:hover,
    .call-to-action .call-to-action-box .action-box-heading .heading-content i,
    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box .pricing-plan-price,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box .pricing-plan-heading,
    .pricing-plan-v6,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular,
    .partners-v3 .partner-carousel-v3 .owl-dots .owl-dot.active span,
    .partners-v3 .partner-carousel-v3 .owl-dots .owl-dot:hover span,
    #back-to-top,
    .custom-wp-search .btn-wp-search,
    .single-post-page .single-post #single-post-carousel .single-post-carousel-controls .carousel-control span,
    #ad-address span i,
    .classiera-navbar.classiera-navbar-v4 ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    .classiera-navbar.classiera-navbar-v6 ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    #showNum {
      background: #232323;
    }

    .classiera-navbar.classiera-navbar-v6 {
      background-color: rgba(35, 35, 35, 0.08) !important
    }

    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading::after {
      border-top-color: rgba(211, 35, 35, .75)
    }

    h1>a,
    h2>a,
    h3>a,
    h4>a,
    h5>a,
    h6>a,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>li>a,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>.active>a,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>.active>a:hover,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>.active>a:focus,
    .classiera-navbar.classiera-navbar-v1 .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .category-menu-btn,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu li a,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu>li>a,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>li>a:hover,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>li>a:focus,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>li>a:link,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>.active>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav li>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .login-reg .lr-with-icon,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a i,
    .btn-primary.outline,
    .radio label a,
    .checkbox label a,
    #getLocation,
    .search-section.search-section-v6 .form-v6-bg .form-group button,
    .category-slider-small-box ul li a:hover,
    .category-slider-small-box.outline-box ul li a,
    .classiera-static-slider-v2 .classiera-static-slider-content h1,
    .classiera-static-slider-v2 .classiera-static-slider-content h2,
    .classiera-static-slider-v2 .classiera-static-slider-content h2 span,
    .section-heading-v5 h3,
    .section-heading-v6 h3,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption .price,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption .price span:last-of-type,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption h5 a,
    .classiera-premium-ads-v3 .navText a i,
    .classiera-premium-ads-v3 .navText span,
    .classiera-box-div-v1 figure figcaption h5 a,
    .classiera-box-div-v1 figure figcaption p a:hover,
    .classiera-box-div-v2 figure figcaption h5 a,
    .classiera-box-div-v3 figure figcaption .price,
    .classiera-box-div-v3 figure figcaption .price span:last-of-type,
    .classiera-box-div-v3 figure figcaption h5 a,
    .classiera-box-div-v4 figure figcaption h5 a,
    .classiera-box-div-v5 figure figcaption h5 a,
    .classiera-box-div-v6 figure .premium-img .price.btn-primary.active,
    .classiera-box-div-v7 figure figcaption .caption-tags .price,
    .classiera-box-div-v7 figure figcaption .content h5 a,
    .classiera-box-div-v7 figure figcaption .content>a,
    .classiera-box-div-v7 figure:hover figcaption .content .category span,
    .classiera-box-div-v7 figure:hover figcaption .content .category span a,
    .category-v1 .category-box .category-content ul li a:hover,
    .category-v2 .category-box .category-content .view-button a,
    .category-v3 .category-content h4 a,
    .category-v3 .category-content .view-all,
    menu-category .navbar-header .navbar-brand,
    .menu-category .navbar-nav>li>a:hover,
    .menu-category .navbar-nav>li>a:active,
    .menu-category .navbar-nav>li>a:focus,
    .menu-category .dropdown-menu li a:hover,
    .category-v5 .categories li,
    .category-v5 .categories li .category-content h4 a,
    .category-v6 .category-box figure figcaption>span i,
    .category-v6 .category-box figure .category-box-hover h3 a,
    .category-v6 .category-box figure .category-box-hover p,
    .category-v6 .category-box figure .category-box-hover ul li a,
    .category-v6 .category-box figure .category-box-hover>a,
    .category-v7 .category-box figure .cat-img .cat-icon i,
    .category-v7 .category-box figure figcaption h4 a,
    .category-v7 .category-box figure figcaption>a,
    .classiera-advertisement .item.item-list .classiera-box-div figure figcaption .post-tags span,
    .classiera-advertisement .item.item-list .classiera-box-div figure figcaption .post-tags a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure figcaption .content h5 a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .price.btn-primary.active,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure figcaption .content h5 a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .price.btn-primary.active,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>span,


    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v5 .view-head .view-as a,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v6 .view-head .view-as a,
    .members-v2 .members-text h1,
    .members-v4 .member-content p,
    .locations .location-content .location a .loc-head,
    .locations .location-content-v2 .location h5 a,
    .locations .location-content-v3 .location .location-content h5 a,
    .locations .location-content-v5 ul li .location-content h5 a,
    .locations .location-content-v6 figure.location figcaption .location-caption span i,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular ul li,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box .pricing-plan-button h3 small,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button h4,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:focus,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .partners-v3 .navText a i,
    .partners-v3 .navText span,
    footer .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    .blog-post-section .blog-post .blog-post-content h4 a,
    .sidebar .widget-box .widget-title h4,
    .sidebar .widget-box .widget-content .footer-pr-widget-v1 .media-body h4 a,
    .sidebar .widget-box .widget-content .footer-pr-widget-v2 .media-body h5 a,
    .sidebar .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    .sidebar .widget-box .widget-content ul li h5 a,
    .sidebar .widget-box .contact-info .contact-info-box i,
    .sidebar .widget-box .contact-info .contact-info-box p,
    .sidebar .widget-box .author-info a,
    .sidebar .widget-box .user-make-offer-message .tab-content form label,
    .sidebar .widget-box .user-make-offer-message .tab-content form .form-control-static,
    .inner-page-content article.article-content.blog h3 a,
    .inner-page-content article.article-content.blog .tags>span,
    .inner-page-content .login-register .social-login.social-login-or:after,
    .inner-page-content .login-register.login-register-v1 .single-label label,
    .inner-page-content .login-register.login-register-v1 form .form-group p a,
    .border-section .user-comments .media .media-body p+h5 a:hover,
    .author-box .author-desc p strong,
    .author-info span.offline i,
    .user-pages aside .user-submit-ad .btn-user-submit-ad,
    .user-pages .user-detail-section .about-me p strong,
    .user-pages .user-detail-section .user-ads .media .media-body .media-heading a,
    form .search-form .search-form-main-heading a,
    form .search-form #innerSearch .inner-search-box input[type='checkbox']:checked+label::before,
    form .search-form #innerSearch .inner-search-box p,
    .submit-post form .form-main-section .classiera-image-upload .classiera-image-box .classiera-upload-box .classiera-image-preview span i,
    .submit-post form .terms-use a,
    .submit-post.submit-post-v2 form .form-group label.control-label,
    .single-post-page .single-post .single-post-title>.post-price>h4,
    .single-post-page .single-post .single-post-title h4 a,
    .single-post-page .single-post .details .post-details ul li p,
    .single-post-page .single-post .description .tags span,
    .single-post-page .single-post .description .tags a:hover,
    .single-post-page .single-post>.author-info a,
    .classieraAjaxInput .classieraAjaxResult ul li a,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular .price-title,
    .category-box-v8 h4,
    .classiera-category-new .navText a i,
    .locations .section-heading-v1 h3.text-uppercase {
      color: #232323;
    }

    .pagination>li.active a,
    .pagination>li.disabled a,
    .pagination>li.active a:focus,
    .pagination>li.active a:hover,
    .pagination>li.disabled a:focus,
    .pagination>li.disabled a:hover,
    .pagination>li:first-child>a,
    .pagination>li:first-child span,
    .pagination>li:last-child>a,
    .pagination>li:last-child span,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .menu-btn,
    .btn-primary.outline,
    .btn-primary.btn-style-five:hover,
    .btn-primary.btn-style-five.active,
    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    .input-group-addon,
    .search-section .search-form.search-form-v1 .form-group button,
    .category-slider-small-box.outline-box ul li a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v5 .view-head .view-as a,
    .advertisement-v5 .view-head .view-as a:hover,
    .advertisement-v5 .view-head .view-as a.active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v6 .view-head .view-as a,
    .advertisement-v6 .view-head .view-as a:hover,
    .advertisement-v6 .view-head .view-as a.active,
    .locations .location-content .location:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-text,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit'],
    #showNum {
      border-color: #232323;
    }

    .classiera-navbar.classiera-navbar-v1 .dropdown-menu {
      border-top-color: #232323;
    }

    .search-section .search-form .form-group .help-block ul::before {
      border-bottom-color: #232323;
    }

    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a:hover,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a:focus,
    .search-section.search-section-v5 .form-group .input-group-addon i,
    .classiera-box-div-v6 figure .premium-img .price.btn-primary.active,
    .classiera-box-div-v7 figure figcaption .caption-tags .price,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn.round:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular .price-title,
    .classiera-box-div .btn-primary.btn-style-six.active {
      color: #232323 !important;
    }

    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn.round:hover,
    .classiera-navbar.classiera-navbar-v3 ul.navbar-nav li.dropdown ul.dropdown-menu>li.active>a,
    .search-section.search-section-v2 .form-group button:hover {
      background: #232323 !important;
    }

    .btn-primary.btn-style-six:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn.round:hover {
      border-color: #232323 !important;
    }

    .classiera-box-div-v6 figure .box-div-heading {
      background: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
      background: -o-linear-gradient(bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
      background: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
    }

    .home .classiera-navbar.classiera-navbar-v6 {
      position: absolute
    }

    .topBar,
    .topBar.topBar-v3 {
      background: #444444;
    }

    .topBar.topBar-v4 .contact-info ul li,
    .topBar.topBar-v4 .contact-info ul li:last-of-type span,
    .topBar.topBar-v4 .follow ul span,
    .topBar.topBar-v4 .follow ul li a,
    .topBar.topBar-v3 p,
    .topBar.topBar-v3 p span,
    .topBar.topBar-v3 .login-info a {
      color: #FFFFFF;
    }

    .classiera-navbar.classiera-navbar-v2,
    .classiera-navbar.classiera-navbar-v2 .navbar-default,
    .classiera-navbar.classiera-navbar-v3,
    .classiera-navbar.classiera-navbar-v3.affix,
    .home .classiera-navbar.classiera-navbar-v6,
    .classiera-navbar-v5.classiera-navbar-minimal {
      background: transparent !important;
    }

    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>a,
    .classiera-navbar.classiera-navbar-v3 .nav>li>a,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .navbar-nav>li>a,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type i {
      color: #FFFFFF !important;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type i {
      border-color: #FFFFFF !important;
    }

    .classiera-navbar.classiera-navbar-v6 {
      background-color: rgba(68, 68, 68, 1) !important
    }

    .featured-tag .right-corner,
    .featured-tag .left-corner,
    .classiera-box-div-v7 figure .featured,
    .classiera-box-div-v6 figure .featured {
      background-color: #017FB1 !important;
    }

    .featured-tag .featured {
      border-bottom-color: #03B0F4 !important;
    }

    footer.section-bg-black,
    .minimal_footer {
      background: #FAFAFA !important;
    }

    footer .widget-box .widget-title h4 {
      color: #D32323 !important;
    }

    footer .widget-box .tagcloud a {
      background: #444444 !important;
    }

    footer .widget-box .tagcloud a,
    footer .widget-box ul.menu li a,
    footer .widget-box ul.menu li,
    footer .textwidget a {
      color: #FFFFFF !important;
    }

    footer .widget-box .tagcloud a:hover,
    footer .widget-box ul.menu li a:hover,
    footer .widget-box ul.menu li:hover,
    footer .textwidget a:hover {
      color: #FFFFFF !important;
    }

    .footer-bottom,
    .minimal_footer_bottom {
      background: #D32323 !important;
    }

    .footer-bottom p,
    .footer-bottom p a,
    .footer-bottom ul.footer-bottom-social-icon span,
    .minimal_footer_bottom p {
      color: #FFFFFF !important;
    }

    .members-v1 .members-text h2.callout_title,
    .members-v4 .member-content h3,
    .members-v4 .member-content ul li,
    .members-v4.members-v5 .member-content ul li span,
    .members-v4.members-v5 .member-content h3,
    .members-v4.members-v5 .member-content a.btn:hover,
    .members-v4.members-v5 .member-content a.btn,
    .members-v4.section-bg-light-img .member-content a.btn-style-six,
    .members-v3 .members-text h1,
    .members .members-text h2 {
      color: #D32323 !important;
    }

    .members-v4 .member-content ul li span,
    .members-v4.members-v5 .member-content ul li span,
    .members-v4.members-v5 .member-content a.btn:hover,
    .members-v4.members-v5 .member-content a.btn,
    .members-v4.section-bg-light-img .member-content a.btn-style-six,
    section.members-v3 .members-text a.btn {
      border-color: #D32323 !important;
    }

    .members-v1 .members-text h2.callout_title_second,
    .members-v4 .member-content h4,
    .members-v4.members-v5 .member-content h4,
    .members-v3 .members-text h2,
    section.members-v3 .members-text a.btn {
      color: #232323 !important;
    }

    .members-v1 .members-text p,
    .members-v4 .member-content p,
    .members-v3 .members-text p,
    .members .members-text p {
      color: #7C7C7C !important;
    }

    footer .widget-box .textwidget,
    footer .widget-box .contact-info .contact-info-box p {
      color: #7C7C7C !important;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline i,
    .topBar-v2-icons a.btn-style-two,
    .betube-search .btn-style-three,
    .betube-search .btn-style-four,
    .custom-menu-v5 a.btn-submit {
      color: #D32323;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type {
      border-color: #D32323 !important;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover i,
    .topBar-v2-icons a.btn-style-two:hover,
    .topBar-v2-icons a.btn-style-two:hover i,
    .betube-search .btn-style-three:hover,
    .betube-search .btn-style-four:hover,
    .custom-menu-v5 a.btn-submit:hover {
      color: #FFFFFF;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type:hover {
      border-color: #FFFFFF !important;
    }

    section.classiera-static-slider,
    section.classiera-static-slider-v2,
    section.classiera-simple-bg-slider {
      background-color: #fff !important;
      background-image: url("../wp-content/uploads/2021/12/Background.png");
      background-repeat: no-repeat;
      background-position: center bottom;
      background-size: cover;
    }

    section.classiera-static-slider .classiera-static-slider-content h1,
    section.classiera-static-slider-v2 .classiera-static-slider-content h1,
    section.classiera-simple-bg-slider .classiera-simple-bg-slider-content h1 {
      color: #ffffff;
      font-size: 40px;
      font-family: Quicksand !important;
      font-weight: 700;
      line-height: 40px;
    }

    section.classiera-static-slider .classiera-static-slider-content h2,
    section.classiera-static-slider-v2 .classiera-static-slider-content h2,
    section.classiera-simple-bg-slider .classiera-simple-bg-slider-content h4 {
      color: #ffffff;
      font-size: 24px;
      font-family: Quicksand !important;
      font-weight: 400;
      line-height: 24px;
    }
  </style> <noscript>
    <style>
      .woocommerce-product-gallery {
        opacity: 1 !important;
      }
    </style>
  </noscript>
  <meta name="generator" content="Elementor 3.11.2; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, a11y_improvements, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-auto">
  <style id="redux_demo-dynamic-css" title="dynamic-css" class="redux-options-output">
    h1,
    h1 a {
      font-family: Quicksand;
      line-height: 36px;
      font-weight: 700;
      font-style: normal;
      color: #232323;
      font-size: 36px;
      font-display: swap;
    }

    h2,
    h2 a,
    h2 span {
      font-family: Quicksand;
      line-height: 30px;
      font-weight: 700;
      font-style: normal;
      color: #232323;
      font-size: 30px;
      font-display: swap;
    }

    h3,
    h3 a,
    h3 span {
      font-family: Quicksand;
      line-height: 28px;
      font-weight: 700;
      font-style: normal;
      color: #d32323;
      font-size: 28px;
      font-display: swap;
    }

    h4,
    h4 a,
    h4 span {
      font-family: Quicksand;
      line-height: 18px;
      font-weight: 700;
      font-style: normal;
      color: #232323;
      font-size: 18px;
      font-display: swap;
    }

    h5,
    h5 a,
    h5 span {
      font-family: Quicksand;
      line-height: 14px;
      font-weight: 500;
      font-style: normal;
      color: #232323;
      font-size: 14px;
      font-display: swap;
    }

    h6,
    h6 a,
    h6 span {
      font-family: Quicksand;
      line-height: 24px;
      font-weight: normal;
      font-style: normal;
      color: #232323;
      font-size: 12px;
      font-display: swap;
    }

    html,
    body,
    div,
    applet,
    object,
    iframe p,
    blockquote,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video,
    .submit-post form .form-group label,
    .submit-post form .form-group .form-control,
    .help-block {
      font-family: Quicksand;
      line-height: 24px;
      font-weight: normal;
      font-style: normal;
      color: #7c7c7c;
      font-size: 14px;
      font-display: swap;
    }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .checked {
      color: orange;
    }

    /* Three column layout */
    .side {
      float: left;
      width: 15%;
      margin-top: 10px;
    }

    .middle {
      margin-top: 10px;
      float: left;
      width: 70%;
    }

    /* Place text to the right */
    .right {
      text-align: right;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* The bar container */
    .bar-container {
      width: 100%;
      background-color: #f1f1f1;
      text-align: center;
      color: white;
    }

    /* Individual bars */
    .bar-5 {
      width: 60%;
      height: 18px;
      background-color: #04AA6D;
    }

    .bar-4 {
      width: 30%;
      height: 18px;
      background-color: #2196F3;
    }

    .bar-3 {
      width: 10%;
      height: 18px;
      background-color: #00bcd4;
    }

    .bar-2 {
      width: 4%;
      height: 18px;
      background-color: #ff9800;
    }

    .bar-1 {
      width: 15%;
      height: 18px;
      background-color: #f44336;
    }

    /* Responsive layout - make the columns stack on top of each other instead of next to each other */
    @media (max-width: 400px) {

      .side,
      .middle {
        width: 100%;
      }

      .right {
        display: none;
      }
    }
  </style>
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

<body data-rsssl=1 class="post-template-default single single-post postid-226 single-format-standard theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <!-- for login overlay -->
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
  <header>
    <!-- NavBar -->
    <?php include "../navbar/index.php" ?>

  </header>
  <?php
  // echo '<pre>';
  // var_dump($_SESSION);
  // echo '</pre>';
  ?>
  <?php include "../searchbar_section/index.php" ?>
  <?php
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
WHERE listing_id = $listing_id group by listing.listing_id"; //NOTE: here (`) is not equal to (')
  try {
    // echo $select_listing_query;
    $select_listing_result = 0;
    if ($connect) {
      $select_listing_result = mysqli_query($connect, $select_listing_query);
      if ($select_listing_result) {
        $num_for_listing_details = mysqli_num_rows($select_listing_result);
      }
    }
  } catch (Exception $e) {
    $mess = $e->getMessage();
  }



  if ($num_for_listing_details > 0) {
    $sno = 0;
    $array = [];
    while ($row = mysqli_fetch_assoc($select_listing_result)) {
      $show_listing_details = false;

      $listing_id = $row['listing_id'];
      $listing_category_id = $row['listing_category_id'];
      $listing_sub_category_id = $row['listing_sub_category_id'];
      $listing_title = $row['listing_title'];

      $select_enquery_listing_query = "SELECT * FROM enquery where enquery_listing_id = $listing_id and enquery_mac_address = '$ipaddress' ";
      try {
        $select_enquery_listing_result = mysqli_query($connect, $select_enquery_listing_query);
      } catch (Exception $e) {
        // echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
      }
      // echo $select_enquery_listing_query;
      if ($select_enquery_listing_result) {
        $num_for_enquery_listing = mysqli_num_rows($select_enquery_listing_result);
      }
      if ($num_for_enquery_listing > 0) {
        while ($row_for_enquery_listing = mysqli_fetch_assoc($select_enquery_listing_result)) {
          $listing_enquery_ipaddress  = $row_for_enquery_listing['enquery_mac_address'];
          $listing_enquery_email  = $row_for_enquery_listing['enquery_email'];
          $show_listing_details = true;
        }
      }

  ?>
      <section class="inner-page-content single-post-page">
        <div class="container">
          <!-- breadcrumb -->
          <div class="row">
            <div class="col-lg-12">
              <ul class="breadcrumb">
                <li><a rel="v:url" property="v:title" href="../index.php"><i class="fas fa-home"></i></a></li>&nbsp;<li class="cAt"><a rel="v:url" href="../search_ads/index.php?category_id=<?= $row['category_id'] ?>&listing_keyword=&listing_city=&search_listing=true"><?= $row['category_name'] ?></a></li>&nbsp;<li class="active"><?= $row['listing_title'] ?></li>
              </ul>
            </div>
          </div> <!-- breadcrumb -->

          <div class="row">
            <div class="col-md-8">
              <!-- single post -->
              <div class="single-post">
                <!-- post title-->
                <div class="single-post-title">
                  <div class="post-price visible-xs visible-sm">
                    <h4>
                      <?= $row['listing_price'] ?></h4>
                  </div>
                  <h4 class="text-uppercase">
                    <a href="index.html"><?= $row['listing_title'] ?></a>

                    <!--Edit Ads Button-->
                  </h4>
                  <p class="post-category">
                    <i class="far fa-folder-open"></i>:
                    <span>
                      <a href="../search_ads/index.php?category_id=<?= $row['listing_category_id'] ?>&listing_keyword=&listing_city=&search_listing=true" title="View all posts in Automotive"><?= $row['category_name'] ?></a>
                    </span>
                    <i class="fas fa-map-marker-alt"></i>:
                    <span>
                      <span href="#"><?= $row['city_name'] ?>, <?= $row['state_name'] ?></span>
                    </span>
                  </p>
                </div>
                <!-- post title-->
                <!-- single post carousel-->
                <div id="single-post-carousel" class="carousel slide single-carousel" data-ride="carousel" data-interval="3000">

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img class="img-responsive" src="../wp-content/uploads/data/<?= $row['listing_image'] ?>" alt="Used BMW Car 2018 Model For Sale">
                    </div>
                    <div class="item ">
                      <img class="img-responsive" src="../wp-content/uploads/data/<?= $row['listing_image'] ?>" alt="Used BMW Car 2018 Model For Sale">
                    </div>
                  </div>
                  <!-- slides number -->
                  <div class="num">
                    <i class="fas fa-camera"></i>
                    <span class="init-num">1</span>
                    <span>of</span>
                    <span class="total-num"></span>
                  </div>
                  <!-- Left and right controls -->
                  <div class="single-post-carousel-controls">
                    <a class="left carousel-control" href="#single-post-carousel" role="button" data-slide="prev">
                      <span class="fas fa-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#single-post-carousel" role="button" data-slide="next">
                      <span class="fas fa-chevron-right" style="padding-right: 12px;" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <!-- Left and right controls -->
                </div>
                <!-- single post carousel--> <!-- ad deails -->
                <div class="border-section border details">
                  <h4 class="border-section-heading text-uppercase"><i class="far fa-file-alt"></i>Ad Details</h4>
                  <div class="post-details">
                    <ul class="list-unstyled clearfix">
                      <li>
                        <p class="clearfix">Ad ID:
                          <span class="pull-right flip">
                            <i class="fas fa-hashtag IDIcon"></i>
                            <?= $row['listing_id'] ?> </span>
                        </p>
                      </li><!--PostDate-->
                      <li class="classiera_pdate">
                        <p class="clearfix">Added:
                          <span class="pull-right flip"><?= $row['listing_since'] ?></span>
                        </p>
                      </li><!--PostDate-->
                      <!--Price Section -->
                      <li>
                        <p class="clearfix">Sale Price:
                          <span class="pull-right flip cl__price">

                            <?= $row['listing_price'] ?> </span>
                        </p>
                      </li><!--Sale Price-->
                      <!-- <li>
                        <p class="clearfix">Regular Price:
                          <span class="pull-right flip cl__price">
                            <?= $row['listing_regular_price'] ?></span>
                        </p>
                      </li> -->
                      <li>
                        <p class="clearfix">Location:
                          <span class="pull-right flip"><?= $row['listing_adderess'] ?></span>
                        </p>
                      </li><!--Location-->
                      <li>
                        <p class="clearfix">State:
                          <span class="pull-right flip"><?= $row['state_name'] ?></span>
                        </p>
                      </li><!--state-->
                      <li>
                        <p class="clearfix">City:
                          <span class="pull-right flip"><?= $row['city_name'] ?></span>
                        </p>
                      </li><!--City-->

                      <li class="classiera_views">
                        <p class="clearfix">Views:
                          <span class="pull-right flip">
                            <?= $row['listing_view_count'] ?> </span>
                        </p>
                      </li><!--Views-->
                    </ul>
                  </div><!--post-details-->
                </div>

                <div class="border-section border description">
                  <h4 class="border-section-heading text-uppercase">
                    Description </h4>
                  <div class="classiera_entry_content">
                    <p><?= $row['listing_description'] ?> </p>
                  </div>
                  <!-- <div class="tags">
                    <span>
                      <i class="fas fa-tags"></i>
                      Tags :
                    </span>
                    <a href="../tag/automotor/index.html" rel="tag"></a>
                  </div> -->
                  <!--Post Pagination-->
                  <!--Post Pagination-->
                </div>
                <!-- post description -->
                <!-- classiera bid system -->
                <!-- classiera bid system -->
                <!--comments-->
                <!-- <div class="border-section border comments">
                  <h4 class="border-section-heading text-uppercase">Rating</h4>
                  <form action="https://demo.joinwebs.com/classiera/plum/wp-comments-post.php" method="post" id="commentform" class="addComment">


                    <div class="form-group">
                      <div class="form-inline row">
                        <div class="form-group col-sm-12">

                          <span class="heading">User Rating</span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star"></span>
                          <p>4.1 average based on 254 reviews.</p>
                          <hr style="border:3px solid #f1f1f1">

                          <div class="row">
                            <div class="side">
                              <div>5 star</div>
                            </div>
                            <div class="middle">
                              <div class="bar-container">
                                <div class="bar-5"></div>
                              </div>
                            </div>
                            <div class="side right">
                              <div>150</div>
                            </div>
                            <div class="side">
                              <div>4 star</div>
                            </div>
                            <div class="middle">
                              <div class="bar-container">
                                <div class="bar-4"></div>
                              </div>
                            </div>
                            <div class="side right">
                              <div>63</div>
                            </div>
                            <div class="side">
                              <div>3 star</div>
                            </div>
                            <div class="middle">
                              <div class="bar-container">
                                <div class="bar-3"></div>
                              </div>
                            </div>
                            <div class="side right">
                              <div>15</div>
                            </div>
                            <div class="side">
                              <div>2 star</div>
                            </div>
                            <div class="middle">
                              <div class="bar-container">
                                <div class="bar-2"></div>
                              </div>
                            </div>
                            <div class="side right">
                              <div>6</div>
                            </div>
                            <div class="side">
                              <div>1 star</div>
                            </div>
                            <div class="middle">
                              <div class="bar-container">
                                <div class="bar-1"></div>
                              </div>
                            </div>
                            <div class="side right">
                              <div>20</div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-inline row">
                        <div class="form-group col-sm-7">
                          <label class="text-capitalize"> Star Rating: <span class="text-danger">*</span> </label>
                          <div class="inner-addon left-addon">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="classiera_nonce" class="classiera_nonce" value="2d27633b9a">
                      <button type="submit" name="submit" class="btn btn-primary sharp btn-md btn-style-one" value="Send">Post Comment</button>
                    </div>
                    <input type='hidden' name='comment_post_ID' value='226' id='comment_post_ID' />
                    <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                  </form>

                  <div class="comment-form">


                    <div class="hidden"></div>
                  </div>

                </div> -->
                <!--comments-->
              </div>
              <!-- single post -->
            </div><!--col-md-8-->

            <div class="col-md-4">
              <aside class="sidebar">
                <div class="row">
                  <!--Widget for style 1-->
                  <div class="col-lg-12 col-md-12 col-sm-6 match-height">
                    <div class="widget-box ">
                      <div class="widget-title price">
                        <h3 class="post-price">
                          <?= $row['listing_price'] ?> <span class="ad_type_display">
                            For Sale </span>
                        </h3>
                      </div><!--price-->

                      <div class="widget-content widget-content-post">
                        <div class="author-info border-bottom widget-content-post-area">

                          <div class="media">
                            <div class="media-left">
                              <img class="media-object" src="../wp-content/uploads/data/<?= $row['user_image'] ?>" alt="admin">
                            </div><!--media-left-->
                            <div class="media-body">
                              <h5 class="media-heading text-uppercase">
                                <a <?php if (isset($_SESSION['user_username'])) {
                                      echo 'href="../listing_owner/index.php?listing_owner_id=' . $row['user_id'] . '"';
                                    } else {
                                      echo 'onclick="show_login_popup()"'; ?> <?php } ?>><?= $row['user_first_name'] . " " . $row['user_last_name'] ?></a>
                                <span class="small classiera_verified">Verified</span><i class="far fa-check-circle classiera_verified" data-toggle="tooltip" data-placement="top" title="Verified"></i>
                              </h5>
                              <p class="member_since">Member Since <?= $row['user_timestamp'] ?></p>
                              <a style="cursor:pointer;" <?php if (isset($_SESSION['user_username'])) {
                                                            echo 'href="../listing_owner/index.php?listing_owner_id=' . $row['user_id'] . '"';
                                                          } else {
                                                            echo 'onclick="show_login_popup()"'; ?> <?php } ?>>see all ads</a>
                            </div><!--media-body-->
                          </div><!--media-->
                        </div><!--author-info-->
                      </div><!--widget-content-->
                      <div class="widget-content widget-content-post">
                        <div class="contact-details widget-content-post-area">
                          <h5 class="text-uppercase">Contact Details :</h5>
                          <h5 class=""><?php 
//                           echo "<pre>";
// var_dump($_SESSION);
// echo "<pre>";?></h5>
                          <ul class="list-unstyled fa-ul c-detail">
                            <!--WhatsAPP-->

                            <?php
                            if (isset($row['user_phone'])) {
                              if ($row['user_phone'] == "") {
                              } else {
                            ?>
                                <li><i class="fas fa-li fa-phone-square"></i>&nbsp;
                                  
                                  <?php 
                                  if (!$show_listing_details && !(isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                                  ?>
                                   <a href="#" class="" onclick="show_enquery_popup();" style="">
                                        <?php echo substr($row['user_phone'], 0, -4) . 'XXXX'; ?> 
                                  </a>
                                  <?php
                                  }else if(!$show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                                    ?>
                                    <a href="#" class="" onclick="update_enquery(<?= $listing_id ?>)" style="">
                                         <?php echo substr($row['user_phone'], 0, -4) . 'XXXX'; ?> 
                                   </a>
                                   <?php
                                  }else if($show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))){
                                    ?>
                                    <a href="#" class=""  style="">
                                      
                                         <?php echo $row['user_phone']; ?> 
                                   </a>
                                   <?php
                                    
                                  }?>
                                 


                                 
                                </li>

                            <?php
                              }
                            } ?>



                            <li><i class="fas fa-li fa-envelope"></i>

                            <?php 
                                  if (!$show_listing_details && !(isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                                  ?>
                                   <a style="cursor:pointer"  href="mailto:<?= $row['user_email'] ?>" onclick="show_enquery_popup();">
                                        <?php  echo substr($row['user_email'], 0, -14) . 'XXXX@gmail.com'; ?> 
                                  </a>
                                  <?php
                                  }else if(!$show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                                    ?>
                                    <a style="cursor:pointer"  href="mailto:<?= $row['user_email'] ?>" onclick="update_enquery(<?= $listing_id ?>)">
                                         <?php  echo substr($row['user_email'], 0, -14) . 'XXXX@gmail.com'; ?> 
                                   </a>
                                   <?php
                                  }else if($show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))){
                                    ?>
                                    <a style="cursor:pointer"  href="mailto:<?= $row['user_email'] ?>">
                                      
                                         <?php echo $row['user_email']; ?> 
                                   </a>
                                   <?php
                                    
                                  }?>
                            </li>

                            <li>

                            <?php 

                                  
                                  if (!$show_listing_details) {
                                  ?>
                                    <button  type="button" id="showNum" class="bm_single_post_ai__list_btn" <?php 
                                      if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])) { } else { ?> onclick="show_enquery_popup();" <?php } 
                                      if (!$show_listing_details) { ?> onclick="update_enquery(<?= $listing_id ?>)" <?php } ?> style="">
                                        <?php 
                                        if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])) { ?> View Details <?php } else { ?>Enquery Now <?php } ?>
                                    </button>
                                  <?php

                                  } ?>

                            </li>
                          </ul>
                        </div><!--contact-details-->
                      </div><!--widget-content-->
                    </div><!--widget-box-->
                  </div><!--col-lg-12 col-md-12 col-sm-6 match-height-->
                  <!--Widget for style 1-->
                  <div class="col-lg-12 col-md-12 col-sm-6 match-height">
                    <div class="widget-box ">
                      <div class="widget-content widget-content-post">
                        <div class="user-make-offer-message widget-content-post-area">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#message" aria-controls="message" role="tab" data-toggle="tab"><i class="fas fa-envelope"></i>Send Email</a>
                            </li>
                          </ul>

                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="message">


                              <form method="post" class="form-horizontal" data-toggle="" id="contactForm" name="contactForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                <!-- <div class="form-group">
                                  <label class="col-sm-3 control-label" for="name">Name :</label>
                                  <div class="col-sm-9">
                                    <input id="name" data-minlength="5" type="text" class="form-control form-control-xs" name="contactName" placeholder="Type your name" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label" for="email">Email :</label>
                                  <div class="col-sm-9">
                                    <input id="email" type="email" class="form-control form-control-xs" name="email" placeholder="Type your email" required>
                                  </div>
                                </div> -->
                                <!-- <div class="form-group">
                                  <label class="col-sm-3 control-label p-0" style="padding-left:0px;" for="subject">Subject :</label>
                                  <div class="col-sm-9">
                                    <input id="subject" type="text" class="form-control form-control-xs" name="subject" placeholder="Type your subject" required>
                                  </div>
                                </div> -->
                                <div class="form-group">
                                  <label class="col-sm-3 control-label"style="padding-left:0px;"  for="msg">Enquery :</label>
                                  <div class="col-sm-9">
                                    <textarea id="msg" name="massage" class="form-control" placeholder="Type Message" required></textarea>
                                  </div>
                                </div>

                                <!--                                 
                                <div class="form-group">
                                  <div class="checkbox col-sm-12">
                                    <input type="checkbox" name="agree" id="agree" value="agree" required>
                                    <label class="control-label" for="agree">Agreed to
                                      <a target="_blank" href="#">
                                        terms &amp; conditions. </a>
                                    </label>
                                  </div>
                                </div> -->

                                <input type="hidden" name="submit" value="send_message" />
                                <input type="hidden" name="message_target_listing_id" id="message_target_listing_id" value="<?= $listing_id ?>" />
                                <button class="btn btn-primary btn-block btn-sm sharp btn-style-one" name="send_message" value="send_message" type="submit">Contact Supplier</button>
                              </form>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  if (isset($_SESSION['user_id'])) {
                    if ($_SESSION['user_id'] != '') {
                  ?> <div class="col-lg-12 col-md-12 col-sm-6 match-height">
                        <div class="widget-box ">
                          <div class="widget-content widget-content-post">
                            <div class="user-make-offer-message border-bottom widget-content-post-area">
                              <ul class="nav nav-tabs" role="tablist">
                                <!-- <li role="presentation" class="btnWatch">
                                <a class="fav" href="../favorite/index.html"><i class="far fa-heart unfavorite-i"></i>
                                  <span>Browse Favourites</span></a>
                              </li> -->
                                <li role="presentation" class="active">
                                  <a href="#report" aria-controls="report" role="tab" data-toggle="tab"><i class="fas fa-exclamation-triangle"></i> Report</a>
                                </li>
                              </ul>

                              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="report">
                                  <form method="post" id="report_form" class="form-horizontal" data-toggle="validator">
                                    <div class="radio">
                                      <input id="illegal" value="illegal" type="radio" name="report_ad_val">
                                      <label for="illegal">This is illegal/fraudulent</label>
                                      <input id="spam" value="spam" type="radio" name="report_ad_val">
                                      <label for="spam">This ad is spam</label>
                                      <input id="duplicate" value="duplicate" type="radio" name="report_ad_val">
                                      <label for="duplicate">This ad is a duplicate</label>
                                      <input id="wrong_category" value="wrong_category" type="radio" name="report_ad_val">
                                      <label for="wrong_category">This ad is in the wrong category</label>
                                      <input id="post_rules" value="post_rules" type="radio" name="report_ad_val">
                                      <label for="post_rules">The ad goes against posting rules</label>
                                      <input id="post_other" value="post_other" type="radio" name="report_ad_val">
                                      <label for="post_other">Other</label>
                                    </div>
                                    <div class="otherMSG">
                                      <textarea id="other_report" name="other_report" class="form-control" placeholder="Type here..!"></textarea>
                                    </div>
                                    <input type="hidden" name="report_by_user_id" value="<?= $_SESSION['user_id'] ?>" />
                                    <input type="hidden" name="report_value" value="true" />
                                    <input type="hidden" name="report_on_listing_id" value="<?= $listing_id ?>" />
                                    <button class="btn btn-primary btn-block btn-sm sharp btn-style-one" name="report_ad" value="report_ad" type="submit">Report</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php
                    }
                  } ?>

                  <div class="col-lg-12 col-md-12 col-sm-6 match-height">
                    <div class="widget-box ">
                      <!--Share-->
                      <div class="widget-content widget-content-post">
                        <div class="share border-bottom widget-content-post-area" id="share">
                          <h5>Share ad:</h5>
                          <!--AccessPress Socil Login-->
                          <div class='apss-social-share apss-theme-1 clearfix '>
                            <div class='apss-facebook apss-single-icon'>
                              <a style="cursor:pointer" rel='nofollow' title="Share on Facebook" onclick="update_share_interaction(<?= $row['user_id'] ?>,<?= $row['listing_id'] ?>,'share','facebook')" <?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']) && $show_listing_details) {
                                                                                                                                                                                                            echo ' href="https://www.facebook.com/sharer/sharer.php?u=../listing_details/index.php" target="_blank"';
                                                                                                                                                                                                          } ?>>
                                <!-- https://www.facebook.com/sharer/sharer.php?u=../listing_details/index.php -->
                                <!-- target='_blank' -->
                                <div class='apss-icon-block clearfix'>
                                  <i class='fab fa-facebook-f'></i>
                                  <span class='apss-social-text'>Share on Facebook</span>
                                  <span class='apss-share'>Share</span>
                                </div>
                              </a>
                            </div>
                            <div class='apss-digg apss-single-icon'>
                              <a style="cursor:pointer" rel='nofollow' title='Share on Digg' onclick="update_share_interaction(<?= $row['user_id'] ?>,<?= $row['listing_id'] ?>,'share','whatsapp')" <?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']) && $show_listing_details) {
                                                                                                                                                                                                        echo ' href="https://wa.me/866988436/?text=../listing_details/index.php" target="_blank"';
                                                                                                                                                                                                      } ?>>
                                <!-- https://wa.me/866988436/?text=../listing_details/index.php -->
                                <!-- target='_blank' -->
                                <div class='apss-icon-block clearfix'>
                                  <i class='fab fa-whatsapp'></i>
                                  <span class='apss-social-text'>Share on Whatsapp</span>
                                  <span class='apss-share'>Share</span>
                                </div>
                              </a>
                            </div>

                          </div>
                          <!--AccessPress Socil Login-->
                        </div>
                      </div>
                      <!--Share-->
                    </div><!--widget-box-->
                  </div><!--col-lg-12 col-md-12 col-sm-6 match-height-->

                </div><!--row-->
              </aside><!--sidebar-->
            </div><!--col-md-4-->
          </div><!--row-->
        </div><!--container-->
      </section>
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
                        <form id="registration_form" class="text-center" method="POST">
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
                        <form id="login_form" class="text-center" method="POST">
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
                        <form id="enquery_form" method="POST" class="text-center">

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



  <?php $array = $row;
    }
    //   echo$array;
    // var_dump($array);  echo$array;
  } ?>

  <?php include "../slider/related_post_slider.php" ?>
  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/index.php" ?>

  <!-- back to top -->
  <a href="#" id="back-to-top" title="Back to top" class="social-icon social-icon-md"><i class="fas fa-angle-double-up removeMargin"></i></a>
  <script type="text/javascript">
    (function() {
      var c = document.body.className;
      c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
      document.body.className = c;
    })();
  </script>
  <script type='text/javascript' id='thickbox-js-extra'>
    /* <![CDATA[ */
    var thickboxL10n = {
      "next": "Next >",
      "prev": "< Prev",
      "image": "Image",
      "of": "of",
      "close": "Close",
      "noiframes": "This feature requires inline frames. You have iframes disabled or your browser does not support them.",
      "loadingAnimation": "https:\/\/demo.joinwebs.com\/classiera\/plum\/wp-includes\/js\/thickbox\/loadingAnimation.gif"
    };
    /* ]]> */
  </script>
  <script type='text/javascript' src='../wp-includes/js/thickbox/thickboxab87.js?ver=3.1-20121105' id='thickbox-js'></script>
  <script type='text/javascript' id='apss-frontend-mainjs-js-extra'>
    /* <![CDATA[ */
    var frontend_ajax_object = {
      "ajax_url": "https:\/\/demo.joinwebs.com\/classiera\/plum\/wp-admin\/admin-ajax.php",
      "ajax_nonce": "75730128f1"
    };
    /* ]]> */
  </script>
  <script type='text/javascript' src='../wp-content/plugins/accesspress-social-share/js/frontend62df.js?ver=4.5.6' id='apss-frontend-mainjs-js'></script>
  <script type='text/javascript' src='../wp-content/plugins/classiera-helper/js/dropzone6a4d.js?ver=6.1.1' id='dropzone-js'></script>
  <script type='text/javascript' id='classiera-helper-js-extra'>
    /* <![CDATA[ */
    var classiera = {
      "ajaxurl": "https:\/\/demo.joinwebs.com\/classiera\/plum\/wp-admin\/admin-ajax.php",
      "home_url": "https:\/\/demo.joinwebs.com\/classiera\/plum",
      "current_user": "0",
      "redirectURL": "https:\/\/demo.joinwebs.com\/classiera\/plum\/used-bmw-car-2018-model-for-sale\/"
    };
    /* ]]> */
  </script>
  <script type='text/javascript' src='../wp-content/plugins/classiera-helper/js/classiera-helper6a4d.js?ver=6.1.1' id='classiera-helper-js'></script>
  <script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.minc993.js?ver=2.7.0-wc.7.4.1' id='jquery-blockui-js'></script>
  <script type='text/javascript' id='wc-add-to-cart-js-extra'>
    /* <![CDATA[ */
    var wc_add_to_cart_params = {
      "ajax_url": "\/classiera\/plum\/wp-admin\/admin-ajax.php",
      "wc_ajax_url": "\/classiera\/plum\/?wc-ajax=%%endpoint%%",
      "i18n_view_cart": "View cart",
      "cart_url": "https:\/\/demo.joinwebs.com\/classiera\/plum\/cart\/",
      "is_cart": "",
      "cart_redirect_after_add": "no"
    };
    /* ]]> */
  </script>
  <script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min9c05.js?ver=7.4.1' id='wc-add-to-cart-js'></script>
  <script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.minc97d.js?ver=2.1.4-wc.7.4.1' id='js-cookie-js'></script>
  <script type='text/javascript' id='woocommerce-js-extra'>
    /* <![CDATA[ */
    var woocommerce_params = {
      "ajax_url": "\/classiera\/plum\/wp-admin\/admin-ajax.php",
      "wc_ajax_url": "\/classiera\/plum\/?wc-ajax=%%endpoint%%"
    };
    /* ]]> */
  </script>
  <script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min9c05.js?ver=7.4.1' id='woocommerce-js'></script>
  <script type='text/javascript' id='wc-cart-fragments-js-extra'>
    /* <![CDATA[ */
    var wc_cart_fragments_params = {
      "ajax_url": "\/classiera\/plum\/wp-admin\/admin-ajax.php",
      "wc_ajax_url": "\/classiera\/plum\/?wc-ajax=%%endpoint%%",
      "cart_hash_key": "wc_cart_hash_e22e2648760e48cc29f476fdd20f5a74",
      "fragment_name": "wc_fragments_e22e2648760e48cc29f476fdd20f5a74",
      "request_timeout": "5000"
    };
    /* ]]> */
  </script>
  <script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min9c05.js?ver=7.4.1' id='wc-cart-fragments-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/bootstrap.min6a4d.js?ver=6.1.1' id='bootstrap.min-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/bootstrap-dropdownhover6a4d.js?ver=6.1.1' id='bootstrap-dropdownhover-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/validator.min6a4d.js?ver=6.1.1' id='validator.min-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/owl.carousel.min6a4d.js?ver=6.1.1' id='owl.carousel.min-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/jquery.matchHeight6a4d.js?ver=6.1.1' id='jquery.matchHeight-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/infinitescroll6a4d.js?ver=6.1.1' id='infinitescroll-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/masonry.pkgd.min6a4d.js?ver=6.1.1' id='masonry.pkgd.min-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/select2.min6a4d.js?ver=6.1.1' id='select2.min-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/classiera6a4d.js?ver=6.1.1' id='classiera-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/jquery-ui.min6a4d.js?ver=6.1.1' id='jquery-ui-js'></script>
  <script type='text/javascript' src='../wp-includes/js/comment-reply.min6a4d.js?ver=6.1.1' id='comment-reply-js'></script>
  <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAG8h1gPKOGzHxjGdY34qJ1gYD7kqtMRGc&amp;language=en&amp;v=3.exp&amp;ver=2014-07-18' id='classiera-google-maps-script-js'></script>
  <script type='text/javascript' src='../wp-content/themes/classiera/js/classiera-map6a4d.js?ver=6.1.1' id='classiera-map-js'></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
    function update_enquery(listing_id) {
      console.log("hello Enquery");
      // show_enquery_popup();
      // console.log(listing_owner_id+" - listing_owner_id\n"+listing_id+" - listing_id\n"+user_id+" - user_id\n"+type+" - type\n"+way+" - way\n");
      <?php if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])) {


      ?>
        $.ajax({
          url: "update_enquery.php",
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
            }else{

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
          url: "./update_interaction.php",
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

</html>