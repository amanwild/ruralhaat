<?php

session_start();
include "../db.php";

function filter($string)
{
  $string = str_replace("<", "&lt;", $string);
  $string = str_replace(">", "&gt;", $string);
  return $string;
}


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
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit_login'])) {

  $user = filter($_POST["login_username"]);
  $login_password = $_POST["login_password"];


  $exist_result = false;
  $exist_query = "SELECT * FROM `users_entries` WHERE user_username = '$user'";
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

            if ($row['user_type'] == 'admin') {
              echo "<script> window.location.replace('../admin_panel/index.php');</script>";
            }

            if ($row['user_type'] == 'user') {
              echo "<script> window.location.replace('../product_details/index.php');</script>";
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
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="../xmlrpc.php">

  <title>Login &#8211; </title>
  <meta name='robots' content='max-image-preview:large' />
  <link rel='dns-prefetch' href='http://maps.googleapis.com/' />
  <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
  <link rel='preconnect' href='https://fonts.gstatic.com/' crossorigin />
  <link rel="alternate" type="application/rss+xml" title="Classiera Classifieds Ads WordPress Theme &raquo; Feed" href="../feed/index.html" />
  <link rel="alternate" type="application/rss+xml" title="Classiera Classifieds Ads WordPress Theme &raquo; Comments Feed" href="../comments/feed/index.html" />
  <link rel='stylesheet' id='wp-block-library-css' href='../wp-includes/css/dist/block-library/style.min6a4d.css?ver=6.1.1' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-vendors-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-vendors-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='classic-theme-styles-css' href='../wp-includes/css/classic-themes.min68b3.css?ver=1' type='text/css' media='all' />
  <?php include "style.php"?>
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
  <link rel="alternate" type="application/json" href="../wp-json/wp/v2/pages/49.json" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../wp-includes/wlwmanifest.xml" />
  <meta name="generator" content="WordPress 6.1.1" />
  <meta name="generator" content="WooCommerce 7.4.1" />
  <link rel="canonical" href="index.html" />
  <link rel='shortlink' href='../index0012.html?p=49' />
  <link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embeddd3b.json?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Flogin%2F" />
  <link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embeda597?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Flogin%2F&amp;format=xml" />
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
</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-dark-grayscale">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">
          <feFuncR type="table" tableValues="0 0.49803921568627" />
          <feFuncG type="table" tableValues="0 0.49803921568627" />
          <feFuncB type="table" tableValues="0 0.49803921568627" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-grayscale">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">
          <feFuncR type="table" tableValues="0 1" />
          <feFuncG type="table" tableValues="0 1" />
          <feFuncB type="table" tableValues="0 1" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-purple-yellow">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">


          <feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" />
          <feFuncG type="table" tableValues="0 1" />
          <feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-blue-red">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">
          <feFuncR type="table" tableValues="0 1" />
          <feFuncG type="table" tableValues="0 0.27843137254902" />
          <feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-midnight">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">
          <feFuncR type="table" tableValues="0 0" />
          <feFuncG type="table" tableValues="0 0.64705882352941" />
          <feFuncB type="table" tableValues="0 1" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-magenta-yellow">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">
          <feFuncR type="table" tableValues="0.78039215686275 1" />
          <feFuncG type="table" tableValues="0 0.94901960784314" />
          <feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-purple-green">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">
          <feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" />
          <feFuncG type="table" tableValues="0 1" />
          <feFuncB type="table" tableValues="0.44705882352941 0.4" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
    <defs>
      <filter id="wp-duotone-blue-orange">
        <feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
        <feComponentTransfer color-interpolation-filters="sRGB">
          <feFuncR type="table" tableValues="0.098039215686275 1" />
          <feFuncG type="table" tableValues="0 0.66274509803922" />
          <feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" />
          <feFuncA type="table" tableValues="1 1" />
        </feComponentTransfer>
        <feComposite in2="SourceGraphic" operator="in" />
      </filter>
    </defs>
  </svg>
  <header>
    <!-- NavBar -->
    <section class="classiera-navbar   classiera-navbar-v6 ">
      <!--Only Shown For Nav Style 4-->
      <nav id="myNavmenu" class="navmenu navmenu-default offcanvas offcanvas-light navmenu-fixed-left" role="navigation">
        <div class="navmenu-brand clearfix">
          <a href="https://demo.joinwebs.com/classiera/plum">
            <img src="../wp-content/uploads/2021/12/logo-grid-3 (2).png" alt="Classiera Classifieds Ads WordPress Theme">
          </a>
          <button type="button" class="offcanvas-button" data-toggle="offcanvas" data-target="#myNavmenu">
            <i class="fas fa-times"></i>
          </button>
        </div><!--navmenu-brand clearfix-->
        <div class="log-reg-btn text-center">
          <a href="../login/index.php" class="offcanvas-log-reg-btn">
            Login </a>
          <a href="index.html" class="offcanvas-log-reg-btn">
            Get Registered </a>
        </div>
        <div class="menu-main-menu-container">
          <ul id="menu-main-menu" class="nav navmenu-nav">
            <li id="menu-item-190" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../index.html" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Home <span class="caret"></span></a><a class="dropdown-toggle resposnive-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-plus"></i></a>
              <ul role="menu" class="dropdown-menu">
                <li id="menu-item-2016" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2016">
                  <a title="Home with Elementor" href="../elementor/index.html">Home with Elementor</a>
                </li>
              </ul>
            </li>
            <li id="menu-item-192" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-192"><a title="Categories" href="../categories/index.html">Categories</a></li>
            <li id="menu-item-194" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-194 dropdown">
              <a title="Pages" href="#" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Pages <span class="caret"></span></a><a class="dropdown-toggle resposnive-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-plus"></i></a>
              <ul role="menu" class="dropdown-menu">
                <li id="menu-item-195" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-195"><a title="All Ads" href="../all-ads/index.html">All Ads</a></li>
                <li id="menu-item-196" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-196"><a title="Premium Ads" href="../premium-ads/index.html">Premium Ads</a></li>
                <li id="menu-item-197" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-197"><a title="Pricing Plans" href="../pricing-plans/index.html">Pricing Plans</a></li>
                <li id="menu-item-198" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-198"><a title="Login V2" href="../login-v2/index.html">Login V2</a></li>
                <li id="menu-item-199" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199"><a title="Submit Ad V2" href="../submit-ad-v2/index.html">Submit Ad V2</a></li>
              </ul>
            </li>
            <li id="menu-item-191" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-191"><a title="Blog" href="../blog/index.html">Blog</a></li>
            <li id="menu-item-193" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-193"><a title="Contact" href="../contact/index.html">Contact</a></li>
          </ul>
        </div>
        <div class="submit-post">
          <a href="../submit-ad/index.html" class="btn btn-block btn-primary btn-md active">
            Submit Ad </a>
        </div><!--submit-post-->
        <div class="social-network">
          <h5>Social network</h5>
          <!--FacebookLink-->
          <a href="http://facebook.com/joinwebs" class="social-icon social-icon-sm offcanvas-social-icon" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
          <!--twitter-->
          <a href="http://twitter.com/joinwebs" class="social-icon social-icon-sm offcanvas-social-icon" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
          <!--Dribbble-->
          <!--Flickr-->
          <!--Github-->
          <!--Pinterest-->
          <!--YouTube-->
          <!--Google-->
          <a href="http://google.com/+joinwebs" class="social-icon social-icon-sm offcanvas-social-icon" target="_blank">
            <i class="fab fa-google-plus-g"></i>
          </a>
          <!--Linkedin-->
          <!--Instagram-->
          <!--Vimeo-->
          <!--VK-->
          <!--OK-->
        </div>
      </nav>
      <!--Only Shown For Nav Style 4-->
      <div class="">
        <!-- mobile off canvas nav -->
        <!-- mobile off canvas nav -->
        <!--Primary Nav-->
        <nav class="navbar navbar-default ">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand-custom" href="https://demo.joinwebs.com/classiera/plum">
              <img class="img-responsive" src="../wp-content/uploads/2021/12/logo-grid-3 (2).png" alt="Classiera Classifieds Ads WordPress Theme">
            </a>
          </div><!--navbar-header-->
          <div class="collapse navbar-collapse visible-lg" id="navbarCollapse">
            <div class="navbar-right login-reg flip">
              <a href="../login/index.html">Login <i class="zmdi zmdi-account"></i></a>
              <a href="../submit-ad/index.html" class="btn btn-primary outline round">Submit Ad</a>
            </div>
            <ul id="menu-main-menu-1" class="nav navbar-nav navbar-right nav-margin-top flip nav-ltr">
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
                <a title="Home" href="../index.html" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Home
                  <!-- <span
                    class="caret"></span> -->
                </a><a class="dropdown-toggle resposnive-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-plus"></i></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2016"><a title="Home with Elementor" href="../elementor/index.html">Home with Elementor</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-192"><a title="Categories" href="../categories/index.html">Categories</a></li>
              <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-194 dropdown">
                <a title="Pages" href="#" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Pages <span class="caret"></span></a><a class="dropdown-toggle resposnive-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-plus"></i></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-195"><a title="All Ads" href="../all-ads/index.html">All Ads</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-196"><a title="Premium Ads" href="../premium-ads/index.html">Premium Ads</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-197"><a title="Pricing Plans" href="../pricing-plans/index.html">Pricing Plans</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-198"><a title="Login V2" href="../login-v2/index.html">Login V2</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199"><a title="Submit Ad V2" href="../submit-ad-v2/index.html">Submit Ad V2</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-191"><a title="Blog" href="../blog/index.html">Blog</a></li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-193"><a title="Contact" href="../contact/index.html">Contact</a></li>
            </ul>
          </div><!--collapse navbar-collapse visible-lg-->
        </nav>
        <!--Primary Nav-->
      </div><!--container-->
    </section>
    <!-- NavBar --> <!-- Mobile App button -->
    <div class="mobile-submit affix">
      <ul class="list-unstyled list-inline mobile-app-button">
        <li>
          <a href="../index.html">
            <i class="fas fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <i class="fas fa-sign-in-alt"></i>
            <span>Login</span>
          </a>
        </li>
        <li>
          <a href="../register/index.html">
            <i class="fas fa-user"></i>
            <span>Get Registered</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-edit"></i>
            <span>Submit Ad</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- Mobile App button -->
  </header><!-- page content -->
  <!-- <section class="members-v9 " style="background-image:url(wp-content/uploads/2018/11/Har-Ghar-Tiranga_banner.jpg)">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-sm-12">
					<div class="members-text text-left flip">
						 <h1>Are you Ready</h1>
						<h2>New version Ruralhaat</h2>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have
							suffered alteration in some form.</p>

						<a href="#" class="btn btn-primary outline btn-md">
							View Ads </a>

						<a href="#" class="btn btn-primary outline btn-md">
							Submit Ad </a>
					</div>
				</div>
				 <!-- <div class="col-lg-7 col-md-7 col-sm-12 visible-lg">
					<div class="member-img text-center">
						<img src="wp-content/uploads/2018/11/laptoplog">
					</div>
				</div>
			</div>
		</div>
	</section>   -->
  <!-- <style>
    .section {
      position: relative;
      text-align: center;
      color: white;
      font-size: 24px;
    }

    .image {
      width: 100%;
    }

    .text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.7);
      padding: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <img class="image" src="path/to/your/image.jpg" alt="Your Image">
    <div class="text">
      Text on Image
    </div>
  </div> -->
  <section class="inner-page-content border-bottom top-pad-60">

    <!-- <img src="../wp-content/uploads/2018/11/Har-Ghar-Tiranga_banner.jpg" -->
    <img style="width:100%;" id="image" src="../wp-content/uploads/2018/11/Har-Ghar-Tiranga_banner.jpg" "alt=" Classiera Classifieds Ads WordPress Theme">
    <marquee class="sampleMarquee" direction="right" scrollamount="10" behavior="scroll"><img class=image src="../wp-content/uploads/2018/11/india.jpg"></marquee>
    <!-- <style>
        .sampleMarquee {
          color: #ffffff;
          background-color: #2f90ff;
          font-size: 34px;
          line-height: 31px;
          padding: 1px;
          margin: 1px;
          font-style: italic;
          text-align: left;
          font-variant: small-caps;
          border-radius: 10px;
        }
      </style> -->
    <div class="login-register login-register-v1">
      <div class="container">
        <div class="row" id="login_form">
          <div class="col-lg-10 col-md-11 col-sm-12 center-block">
            <div class="row">
              <div class="col-lg-12">

                <div class="classiera-login-register-heading border-bottom text-center">
                  <h3 class="text-uppercase">Login</h3>


                </div>
                <!--classiera-login-register-heading-->
                <!-- <div class="social-login border-bottom"> -->
                <!-- <h5 class="text-uppercase text-center">
                   Log in or sign up with a social account </h5> -->
                <!--NextendSocialLogin-->
                <!--AccessPress Socil Login-->
                <!-- <div class='apsl-login-networks theme-1 clearfix'>
                    <div class='social-networks'>
                    </div>
                  </div> -->
                <!--AccessPress Socil Login-->
                <!--Social Plugins-->
                <!-- <div class="social-login-or">
                    <span>OR</span>
                  </div> -->
              </div>
              <!--social-login-->
            </div><!--col-lg-12-->
          </div><!--row-->
          <div class="login" style="padding-left: 10px;padding-right: 10px;width:auto;height:auto;margin:5px;">
            <!-- <img class="image" src="../wp-content/uploads/2018/11/mgiri office.jpg" alt="Your Image"> -->
            <div class="row">
              <div class="col-lg-8 center-block">
                <form data-toggle="validator" method="POST" id="classiera_login_form" name="classiera_login_form">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-3 col-lg-3 single-label left-pad-20">
                        <label style="color:#017FB1" for="login_username">Username : <span class="text-danger">*</span></label>
                      </div><!--col-lg-3-->
                      <div class="col-sm-9 col-lg-9">
                        <div class="inner-addon left-addon">
                          <i class="left-addon form-icon fas fa-user"></i>
                          <input type="text" id="login_username" name="login_username" class="form-control form-control-md sharp-edge" placeholder="Your Username" data-error="Username is required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div><!--col-lg-9-->
                    </div><!--row-->
                  </div><!--UserName-->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-3 col-lg-3 single-label">
                        <label style="color:#017FB1" for="login_password">Password : <span class="text-danger">*</span></label>

                      </div>
                      <div class="col-sm-9 col-lg-9">
                        <div class="inner-addon left-addon">
                          <i class="left-addon form-icon fas fa-lock"></i>
                          <input id="login_password" type="password" name="login_password" class="form-control form-control-md sharp-edge" placeholder="Enter Password" data-error="Password required" required>
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>
                    </div>
                  </div><!--Password-->
                  <div class="col-sm-9 col-lg-9 col-xs-12 pull-right flip">
                    <div class="form-group clearfix">
                      <p class="forget-pass pull-right flip">
                        <a onclick="Show_forget_pass()">Forgot Password?</a>
                      </p>
                    </div>
                    <!--Google-->

                    <!--Google-->
                    <div class="form-group">
                      <input type="hidden" id="submitbtn" name="submit" value="Login" />
                      <input type="hidden" id="submit_login" name="submit_login" value="Login" />
                      <button type="submit" class="btn btn-primary sharp btn-md btn-style-one" name="op" value="Login">LOGIN NOW</button>
                    </div>
                    <div class="form-group">
                      <p><b>Don&rsquo;t have an account?</b>
                        <a href="../login-v2/index.php">Create one here.</a>
                      </p>
                    </div>
                  </div>
              </div><!--Rememberme-->
            </div>
            </form>
          </div>
        </div>

        <section class="inner-page-content border-bottom top-pad-50" style="display:none;" id="forget_form">
          <div class="login-register login-register-v1">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 col-md-11 col-sm-12 center-block">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="classiera-login-register-heading border-bottom text-center">
                        <h3 class="text-uppercase">Reset Your Password</h3>
                        <?php echo "<h4 style='color:red;' id='label_for_email_validation'></h4>"; ?>
                      </div>
                    </div><!--col-lg-12-->
                  </div><!--row-->
                  <div class="row">
                    <div class="col-lg-8 col-sm-10 col-md-8 center-block">
                      <form method="POST" id="myform" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4 col-sm-4 single-label">
                              <label for="forget_email">Your Email : <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                              <div class="inner-addon left-addon">
                                <i class="left-addon form-icon fas fa-lock"></i>

                                <input type="hidden" id="forget_password" name="forget_password" value="true">

                                <input type="email" id="forget_email" onchange="validation_for_email()" onload="validation_for_email()" name="forget_email" class="form-control form-control-md sharp-edge" placeholder="Type Your Email" data-error="Email required" required>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                          </div>
                        </div><!--Email div-->
                        <a onclick="Show_login()"> Login Now</a>
                        <div class="col-lg-8 col-sm-8 pull-right flip">
                          <div class="form-group">
                            <input type="hidden" id="submit" name="submit" value="Reset" />
                            <button class="btn btn-primary sharp btn-md btn-style-one" name="op" value="Reset" id="validate_email_btn" type="submit">Reset Password</button>
                          </div>
                        </div><!--Email div-->
                      </form>
                    </div>
                  </div><!--row-->
                </div><!--col-lg-10-->
              </div><!--row-->
            </div><!--container-->
          </div><!--login-register login-register-v1-->
        </section>
      </div>
    </div>
  </section>


  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


  <script>
    function validation_for_email() {
      var email = document.getElementById("forget_email");
      email = email.value;
      $.ajax({
        url: "./validation_for_email.php",
        datatype: "json",
        type: "POST",
        data: {
          submit: "submit",
          email: email,
        },
        success: function(result) {
          $('#label_for_email_validation').html(result);
          if (0 < result.length) {
            document.getElementById("validate_email_btn").disabled = true;
          } else {
            document.getElementById("validate_email_btn").disabled = false;
          }
        }
      });
    }

    function redirect_to_addproduct() {
      window.location.replace('../product_details/index.php');
      alert("Login is Successfully Done!!!")
    }

    function redirect_to_admin_panel() {
      window.location.replace('../admin_panel/index.php');
      alert("Login is Successfully Done!!!")
    }

    function redirect_to_login() {
      window.location.replace('../login/index.php');
      alert("Login is Failed!!!")
    }

    function Show_forget_pass() {
      var loginDiv = document.getElementById("login_form");
      var forgetDiv = document.getElementById("forget_form");

      loginDiv.style.display = "none";
      forgetDiv.style.display = "block";



    }

    function Show_login() {
      var loginDiv = document.getElementById("login_form");
      var forgetDiv = document.getElementById("forget_form");


      loginDiv.style.display = "block";
      forgetDiv.style.display = "none";


    }
  </script>
</body>

</div><!--col-lg-8-->
</div><!--row-->
</div><!--col-lg-10-->
</div><!--row-->
</div><!--container-->
</div><!--login-register login-register-v1-->
</section>
<!-- page content -->

<section class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-6">
        <p>
          All copyrights reserved © 2023- Design & Development by <a href="http://joinwebs.com/">RoyalsWebTech</a>
        </p>
      </div>
      <div class="col-lg-6 col-sm-6">
        <ul class="footer-bottom-social-icon">
          <li><span>Follow Us :</span></li>

          <li>
            <a href="http://facebook.com/joinwebs" class="rounded text-center" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="http://twitter.com/joinwebs" class="rounded text-center" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li>
            <a href="http://google.com/+joinwebs" class="rounded text-center" target="_blank">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
        </ul>
      </div>
    </div><!--row-->
  </div><!--container-->
</section>

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
    "redirectURL": "https:\/\/demo.joinwebs.com\/classiera\/plum\/login\/"
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
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAG8h1gPKOGzHxjGdY34qJ1gYD7kqtMRGc&amp;language=en&amp;v=3.exp&amp;ver=2014-07-18' id='classiera-google-maps-script-js'></script>
<script type='text/javascript' src='../wp-content/themes/classiera/js/classiera-map6a4d.js?ver=6.1.1' id='classiera-map-js'></script>
</body>

<!-- Mirrored from demo.joinwebs.com/classiera/plum/login/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 08:25:40 GMT -->

</html>