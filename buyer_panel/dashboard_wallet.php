<?php include "../validation_of_buyer.php"?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_wallet.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:57 GMT -->
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wallet</title>

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
    <a href="#" class="utf_dashboard_nav_responsive"><i class="fa fa-reorder"></i> Dashboard Sidebar Menu</a>
    <div class="utf_dashboard_navigation js-scrollbar">
      <div class="utf_dashboard_navigation_inner_block">
        <ul>
          <li><a href="dashboard.php"><i class="sl sl-icon-layers"></i> Dashboard</a></li>       
		  <li><a href="dashboard_add_listing.php"><i class="sl sl-icon-plus"></i> Add Listing</a></li>	          
		  <li>
			<a href="javascript:void(0)"><i class="sl sl-icon-layers"></i> My Listings</a>
			<?php include "./component/my_listing_count.php" ?>			
		  </li>
		  <li><a href="dashboard_bookings.php"><i class="sl sl-icon-docs"></i> Bookings</a></li>		  
		  <li><a href="dashboard_messages.php"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>
		  <li class="active"><a href="dashboard_wallet.php"><i class="sl sl-icon-wallet"></i> Wallet</a></li>		  
          <li>
			<a href="javascript:void(0)"><i class="sl sl-icon-star"></i> Reviews</a>
			<ul>
				<li><a href="dashboard_visitor_review.php">Visitor Reviews <span class="nav-tag green">4</span></a></li>
				<li><a href="dashboard_submitted_review.php">Submitted Reviews <span class="nav-tag yellow">5</span></a></li>					
			</ul>	
		  </li>	
		  <li><a href="dashboard_bookmark.php"><i class="sl sl-icon-heart"></i> Bookmark</a></li>                                    		 
		  <li><a href="dashboard_my_profile.php"><i class="sl sl-icon-user"></i> My Profile</a></li>
		  <li><a href="dashboard_change_password.php"><i class="sl sl-icon-key"></i> Change Password</a></li>
          <li><a href="../logout/index.php"><i class="sl sl-icon-power"></i> Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="utf_dashboard_content"> 
	  <div id="titlebar" class="dashboard_gradient">
        <div class="row">
          <div class="col-md-12">
            <h2>Wallet</h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index_1.php">Home</a></li>
				<li><a href="dashboard.php">Dashboard</a></li>
                <li>Wallet</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
	  
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="margin-top-0">
            <div class="row"> 
			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-1">
				  <div class="utf_dashboard_ic_stat"><i class="fa fa-money"></i></div>	
				  <div class="utf_dashboard_content_part utf_wallet_totals_item">
					<h4>$ 1260.08</h4>
					<span>Total Withdrawal Payout</span>					
				  </div>				  
				</div>
			  </div>

			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-2">
				  <div class="utf_dashboard_ic_stat"><i class="sl sl-icon-wallet"></i></div>
				  <div class="utf_dashboard_content_part utf_wallet_totals_item">
				    <h4>$ 680.26</h4>
					<span>Total Earning Payout</span>					
				  </div>				  
				</div>
			  </div>
			  
			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-3">
				  <div class="utf_dashboard_ic_stat"><i class="sl sl-icon-list"></i></div>
				  <div class="utf_dashboard_content_part">
				    <h4>115</h4>
					<span>Listing Pending Order</span>					
				  </div>				  
				</div>
			  </div>
			  
			  <div class="col-lg-3 col-md-6">
				<div class="utf_dashboard_block_part color-4">
				  <div class="utf_dashboard_ic_stat"><i class="sl sl-icon-basket"></i></div>
				  <div class="utf_dashboard_content_part">
				    <h4>228</h4>
					<span>Listing Total Order</span>					
				  </div>				  
				</div>
			  </div>
			</div>

			<div class="row"> 
			  <div class="col-lg-6 col-md-12">
				<div class="utf_dashboard_list_box invoices with-icons margin-top-20">
				  <h4>Listings Earning</h4>
				  <ul>
					<li><i class="utf_list_box_icon sl sl-icon-basket-loaded"></i> <strong>The Hot and More Restaurant <span class="list_hotel">Restaurant</span></strong>
					  <ul>
						<li><span>Date:-</span> 12 Jan 2022</li>
						<li><span>Order No:-</span> 00403128</li>
						<li class="paid"><span>Price:-</span> $178.00</li>												
					  </ul>
					</li>
					<li><i class="utf_list_box_icon sl sl-icon-basket-loaded"></i> <strong>Burger House (MG Road) <span class="list_hotel">Burger House</span></strong>
					  <ul>
						<li><span>Date:-</span> 12 Jan 2022</li>
						<li><span>Order No:-</span> 00403128</li>
						<li class="paid"><span>Price:-</span> $178.00</li>												
					  </ul>
					</li>
					<li><i class="utf_list_box_icon sl sl-icon-basket-loaded"></i> <strong>Vintage Italian Beer Bar & Hotel <span class="list_hotel">Hotel</span></strong>
					  <ul>
						<li><span>Date:-</span> 12 Jan 2022</li>
						<li><span>Order No:-</span> 00403128</li>
						<li class="paid"><span>Price:-</span> $178.00</li>												
					  </ul>
					</li>
					<li><i class="utf_list_box_icon sl sl-icon-basket-loaded"></i> <strong>Vintage Italian Beer Bar & Restaurant <span class="list_hotel">Restaurant</span></strong>
					  <ul>
						<li><span>Date:-</span> 12 Jan 2022</li>
						<li><span>Order No:-</span> 00403128</li>
						<li class="paid"><span>Price:-</span> $178.00</li>						
						<li><span>Earning:-</span> $78.00</li>						
					  </ul>
					</li>
					<li><i class="utf_list_box_icon sl sl-icon-basket-loaded"></i> <strong>Sandfields Silver - (Apartment & Villa) <span class="list_hotel">Apartment</span></strong>
					  <ul>
						<li><span>Date:-</span> 12 Jan 2022</li>
						<li><span>Order No:-</span> 00403128</li>
						<li class="paid"><span>Price:-</span> $178.00</li>						
						<li><span>Earning:-</span> $78.00</li>						
					  </ul>
					</li>
				  </ul>
				</div>
			  </div>
			  
			  <div class="col-lg-6 col-md-12">
				<div class="utf_dashboard_list_box invoices with-icons margin-top-20">
				  <h4>Listings Payout History</h4>
				  <ul>
					  <li><i class="utf_list_box_icon fa fa-paste"></i> <strong>$122  <span class="paid">Paid</span></strong>
						<ul>
						  <li><span>Order Number:-</span> 004128641</li>
						  <li><span>Date:-</span> 12 Jan 2022</li>
						</ul>
						<div class="buttons-to-right"> <a href="dashboard_invoice.php" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
					  </li>
					  <li><i class="utf_list_box_icon fa fa-paste"></i> <strong>$189 <span class="paid">Paid</span></strong>
						<ul>
						  <li><span>Order Number:-</span> 004312641</li>
						  <li><span>Date:-</span> 12 Jan 2022</li>
						</ul>
						<div class="buttons-to-right"> <a href="dashboard_invoice.php" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
					  </li>
					  <li><i class="utf_list_box_icon fa fa-paste"></i> <strong>$85 <span class="paid">Paid</span></strong>
						<ul>
						  <li><span>Order Number:-</span> 004312641</li>
						  <li><span>Date:-</span> 12 Jan 2022</li>
						</ul>
						<div class="buttons-to-right"> <a href="dashboard_invoice.php" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
					  </li>
					  <li><i class="utf_list_box_icon fa fa-paste"></i> <strong>$244 <span class="unpaid">Unpaid</span></strong>
						<ul>
						  <li><span>Order Number:-</span> 004031281</li>
						  <li><span>Date:-</span> 12 Jan 2022</li>
						</ul>
						<div class="buttons-to-right"> <a href="dashboard_invoice.php" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
					  </li>					  
					</ul>
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

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_wallet.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:57 GMT -->
</html>