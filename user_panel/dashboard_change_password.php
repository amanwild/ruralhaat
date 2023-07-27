<?php include "../validation_of_user.php"?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_change_password.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:58 GMT -->
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>

<!-- Favicon -->
<link rel="shortcut icon" href="../wp-content/uploads/data/favicon.png" />
<!-- Style CSS -->
<link rel="stylesheet" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/mmenu.css">
<link rel="stylesheet" href="../css/perfect-scrollbar.css">
<link rel="stylesheet" href="../css/style.css" id="colors">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
</head>
<body>

<?php include "./component/preloader.php"?>


<!-- Wrapper -->
<div id="main_wrapper"> 
<?php include "./component/header.php" ?>

  <div class="clearfix"></div>
  
  <!-- Dashboard -->
  <div id="dashboard"> 
  <?php include "./component/user_sidebar_navbar.php" ?>
    
    <script>
      var d = document.getElementById("user_dashboard_change_password");
      d.className += "active";
    </script>
    <div class="utf_dashboard_content"> 
      <div id="titlebar" class="dashboard_gradient">
        <div class="row">
          <div class="col-md-12">
            <h2>Change Password</h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index_1.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li>Change Password</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box margin-top-0">
            <h4 class="gray"><i class="sl sl-icon-key"></i> Change Password</h4>
            <div class="utf_dashboard_list_box-static"> 
              <div class="my-profile">
			    <div class="row with-forms">
					<div class="col-md-4">
						<label>Current Password</label>						
						<input type="text" class="input-text" name="password" placeholder="*********" value="">
					</div>
					<div class="col-md-4">
						<label>New Password</label>						
						<input type="text" class="input-text" name="password" placeholder="*********" value="">
					</div>
					<div class="col-md-4">
						<label>Confirm New Password</label>
						<input type="text" class="input-text" name="password" placeholder="*********" value="">
					</div>
					<div class="col-md-12">
						<button class="button btn_center_item margin-top-15">Change Password</button>
					</div>
				</div>
              </div>
            </div>
          </div>
        </div>
        <?php include "./component/footer.php" ?>

      </div>
    </div>
  </div>
</div>

<!-- Scripts --> 
<script src="../scripts/jquery-3.4.1.min.js"></script> 
<script src="../scripts/chosen.min.js"></script> 
<script src="../scripts/perfect-scrollbar.min.js"></script>
<script src="../scripts/slick.min.js"></script> 
<script src="../scripts/rangeslider.min.js"></script> 
<script src="../scripts/magnific-popup.min.js"></script> 
<script src="../scripts/jquery-ui.min.js"></script> 
<script src="../scripts/mmenu.js"></script>
<script src="../scripts/tooltips.min.js"></script> 
<script src="../scripts/color_switcher.js"></script>
<script src="../scripts/jquery_custom.js"></script>
<script>
(function($) {
try {
	var jscr1 = $('.js-scrollbar');
	if (jscr1[0]) {
		const ps1 = new PerfectScrollbar('.js-scrollbar');

	}
    } catch (error) {
        console.log(error);
    }
})(jQuery);
</script>
<!-- Style Switcher -->
<div id="color_switcher_preview">
  <h2>Choose Your Color  </h2>	
	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="stylesheet"></a></li>
			<li><a href="#" class="stylesheet_1"></a></li>
			<li><a href="#" class="stylesheet_2"></a></li>			
			<li><a href="#" class="stylesheet_3"></a></li>						
			<li><a href="#" class="stylesheet_4"></a></li>
			<li><a href="#" class="stylesheet_5"></a></li>			
		</ul>
	</div>		
</div>
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_change_password.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:58 GMT -->
</html>