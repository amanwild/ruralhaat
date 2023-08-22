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

<!-- Mirrored from demo.joinwebs.com/classiera/plum/login-v2/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 08:26:38 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="../xmlrpc.php">

  <title>Register</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>


  <script type="text/javascript">
    //##### Add record when Add Record Button is click #########




    $(document).ready(function() {

      //##### Add record when Add Record Button is click #########
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
          url: "response.php", //Where form data is sent on submission
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
            if (response.includes("query success")) {
              alert(
                'Registration DONE Successfully\n\n' +
                "Email has been sent successfully, check your email for further process.\n"
              );
            }

            if (response.includes("email failed")) {
              alert(
                'Email Shooting Failed\n\n'
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



  <meta name='robots' content='max-image-preview:large' />
  <link rel='dns-prefetch' href='http://maps.googleapis.com/' />
  <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
  <link rel='preconnect' href='https://fonts.gstatic.com/' crossorigin />
  <link rel="alternate" type="application/rss+xml" title="  &raquo; Feed" href="../feed/index.html" />
  <link rel="alternate" type="application/rss+xml" title="  &raquo; Comments Feed" href="../comments/feed/index.html" />
  <link rel='stylesheet' id='wp-block-library-css' href='../wp-includes/css/dist/block-library/style.min6a4d.css?ver=6.1.1' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-vendors-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-vendors-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='classic-theme-styles-css' href='../wp-includes/css/classic-themes.min68b3.css?ver=1' type='text/css' media='all' />

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


  <link rel='stylesheet' href='../stylesheet.css' type='text/css' />



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
  <link rel="alternate" type="application/json" href="../wp-json/wp/v2/pages/47.json" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../wp-includes/wlwmanifest.xml" />
  <meta name="generator" content="WordPress 6.1.1" />
  <meta name="generator" content="WooCommerce 7.4.1" />
  <link rel="canonical" href="index.html" />
  <link rel='shortlink' href='../indexcb30.html?p=47' />
  <link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embedd556.json?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Flogin-v2%2F" />
  <link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embede594?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Flogin-v2%2F&amp;format=xml" />
  <meta name="generator" content="Redux 4.3.26" />
  <script type="text/javascript">
    var ajaxurl = '../wp-admin/admin-ajax.html';
    var classieraCurrentUserID = '0';
  </script>
  <style type="text/css">

  </style>
</head>

<body data-rsssl=1 class="page-template page-template-template-login-v2 page-template-template-login-v2-php page page-id-47 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">

  <?php include "../navbar/index.php" ?>
  <?php include "./register_form.php" ?>
  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/index.php" ?>

  <!-- back to top -->
  <a href="#" id="back-to-top" title="Back to top" class="social-icon social-icon-md"><i class="fas fa-angle-double-up removeMargin"></i></a>

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

<?php include "./register_script.php" ?>

</html>