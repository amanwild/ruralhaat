<?php include "../validation_of_user.php"; ?>
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
        if ($user_type == 'admin') {
          echo "<script> window.location.replace('./admin_panel/index.php');</script>";
        }

        if ($user_type == 'user') {
          echo "<script> window.location.replace('./product_details/index.php');</script>";
        }
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
  <?php include "../theme/head_data.php" ?>

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
          <a href="../index.html">
            <img src="../wp-content/uploads/2021/12/plum-logo.png" alt=" ">
          </a>
          <button type="button" class="offcanvas-button" data-toggle="offcanvas" data-target="#myNavmenu">
            <i class="fas fa-times"></i>
          </button>
        </div><!--navmenu-brand clearfix-->
        <div class="log-reg-btn text-center">
          <a href="index.php" class="offcanvas-log-reg-btn">
            Login </a>
          <a href="../register/index.html" class="offcanvas-log-reg-btn">
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
                <li id="menu-item-198" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-198"><a title="Login V2" href="../login-v2/index.php">Login V2</a></li>
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
            <a class="navbar-brand-custom" href="../index.html">
              <img class="img-responsive" src="../wp-content/uploads/2021/12/logo-grid-3 (2).png" alt=" ">
            </a>
          </div><!--navbar-header-->
          <div class="collapse navbar-collapse visible-lg" id="navbarCollapse">
            <div class="navbar-right login-reg flip">
              <a href="index.html">Login <i class="zmdi zmdi-account"></i></a>
              <a href="../submit-ad/index.html" class="btn btn-primary outline round">Submit Ad</a>
            </div>
            <ul id="menu-main-menu-1" class="nav navbar-nav navbar-right nav-margin-top flip nav-ltr">
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
                <a title="Home" href="../index.html" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Home
                  <!-- <span
                    class="caret"></span> -->
                </a><a class="dropdown-toggle resposnive-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-plus"></i></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2016"><a title="Home with Elementor" href="../elementor/index.html">Home </a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-192">
                <a title="Categories" href="../categories/index.html">Sucess Stories</a>
              </li>
              <!-- <li
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-194 dropdown">
                <a title="Pages" href="#" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                  class="dropdown-toggle" aria-haspopup="true">Pages <span class="caret"></span></a><a
                  class="dropdown-toggle resposnive-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false" href="#"><i class="fas fa-plus"></i></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-195"><a title="All Ads"
                      href="../all-ads/index.html">All Ads</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-196"><a
                      title="Premium Ads" href="../premium-ads/index.html">Premium Ads</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-197"><a
                      title="Pricing Plans" href="../pricing-plans/index.html">Pricing Plans</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-198"><a title="Login V2"
                      href="../login-v2/index.php">Login V2</a></li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199"><a
                      title="Submit Ad V2" href="../submit-ad-v2/index.html">Submit Ad V2</a></li>
                </ul> -->
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
    <div class="bg-image"></div>
    <div class="login-register login-register-v1" style="padding-top: 0px;">
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



        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


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



</html>