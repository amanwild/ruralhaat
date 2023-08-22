<?php
include "../validation_of_session.php";
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
<html lang="en-US">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

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


  <title>listing Details</title>


  <?php include "../theme/head_data.php"; ?>

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
                  <form enctype="multipart/form-data"  action="https://demo.joinwebs.com/classiera/plum/wp-comments-post.php" method="post" id="commentform" class="addComment">


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
                                        // echo "<pre>";
                                        ?></h5>
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
                                  } else if (!$show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                                  ?>
                                    <a href="#" class="" onclick="update_enquery(<?= $listing_id ?>)" style="">
                                      <?php echo substr($row['user_phone'], 0, -4) . 'XXXX'; ?>
                                    </a>
                                  <?php
                                  } else if ($show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                                  ?>
                                    <a href="tel:<?php echo$row['user_phone']; ?>" class="" style="">

                                      <?php echo $row['user_phone']; ?>
                                    </a>
                                  <?php

                                  } ?>




                                </li>

                            <?php
                              }
                            } ?>



                            <li><i class="fas fa-li fa-envelope"></i>

                              <?php
                              if (!$show_listing_details && !(isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                              ?>
                                <a style="cursor:pointer" href="mailto:<?= $row['user_email'] ?>" onclick="show_enquery_popup();">
                                  <?php echo substr($row['user_email'], 0, -14) . 'XXXX@gmail.com'; ?>
                                </a>
                              <?php
                              } else if (!$show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                              ?>
                                <a style="cursor:pointer" href="mailto:<?= $row['user_email'] ?>" onclick="update_enquery(<?= $listing_id ?>)">
                                  <?php echo substr($row['user_email'], 0, -14) . 'XXXX@gmail.com'; ?>
                                </a>
                              <?php
                              } else if ($show_listing_details && (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id']))) {
                              ?>
                                <a style="cursor:pointer" href="mailto:<?= $row['user_email'] ?>">

                                  <?php echo $row['user_email']; ?>
                                </a>
                              <?php

                              } ?>
                            </li>

                            <li>

                              <?php


                              if (!$show_listing_details) {
                              ?>
                                <button type="button" id="showNum" class="bm_single_post_ai__list_btn" <?php
                                                                                                        if (isset($_SESSION['user_id']) || isset($_SESSION['enquery_id'])) {
                                                                                                        } else { ?> onclick="show_enquery_popup();" <?php }
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


                              <form enctype="multipart/form-data"  method="post" class="form-horizontal" data-toggle="" id="contactForm" name="contactForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
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
                                  <label class="col-sm-3 control-label" style="padding-left:0px;" for="msg">Enquery :</label>
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
                                  <form enctype="multipart/form-data"  method="post" id="report_form" class="form-horizontal" data-toggle="validator">
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
                        <form enctype="multipart/form-data"  id="registration_form" class="text-center" method="POST">
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
                        <form enctype="multipart/form-data"  id="login_form" class="text-center" method="POST">
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
                        <form enctype="multipart/form-data"  id="enquery_form" method="POST" class="text-center">

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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

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