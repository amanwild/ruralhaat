<?php include "../validation_of_user.php"?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_bookings.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bookings</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Style CSS -->
<link rel="stylesheet" href="css/stylesheet.css">
<link rel="stylesheet" href="css/mmenu.css">
<link rel="stylesheet" href="css/perfect-scrollbar.css">
<link rel="stylesheet" href="css/style.css" id="colors">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
</head>
<body>

<?php include "./component/preloader.php"?>

<!-- Wrapper -->
<div id="main_wrapper"> 
	
	<?php include "./component/header.php"?>
  <div class="clearfix"></div>
  
  <!-- Dashboard -->
  <div id="dashboard"> 
  <?php include "./component/user_sidebar_navbar.php" ?>
    
	<script>
		var d = document.getElementById("user_dashboard_bookings");
		d.className += "active";
	</script>

    <div class="utf_dashboard_content"> 
	  <div id="titlebar" class="dashboard_gradient">
        <div class="row">
          <div class="col-md-12">
            <h2>Bookings</h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="index_1.php">Home</a></li>
				<li><a href="dashboard.php">Dashboard</a></li>
                <li>Bookings</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
	  
      <div class="row"> 
        <div class="col-lg-6 col-md-6">
          <div class="utf_dashboard_list_box margin-top-0">
			<div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing" class="utf_chosen_select_single">
                    <option>All Listing</option>
				    <option>Burger House</option>
				    <option>Sandfields Silver</option>
                    <option>Beer Bar & Restaurant</option>
					<option>Vintage Italian</option>
					<option>Modern Apartment</option>
                  </select>
                </div>
            </div>
			<h4>Bookings Request</h4>
			<ul>			  
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Vintage Italian Beer Bar & Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 199</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>The Hot and More Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 249</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Vintage Italian Beer Bar & Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 399</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_canceled_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Canceled</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Burger House (MG Road)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  
					</div>
				  </div>
				</div>
			  </li>
			  <li class="utf_pending_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status pending">Pending</span><span class="utf_booking_listing_status unpaid">Unpaid</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Sandfields Silver - (Apartment & Villa)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Reject</a> <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Approve</a> </div>
			  </li>
			</ul>
          </div>		  
        </div>
		<div class="col-lg-6 col-md-6">
          <div class="utf_dashboard_list_box margin-top-0">
			<div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing" class="utf_chosen_select_single">
                    <option>All Listing</option>
				    <option>Burger House</option>
				    <option>Beer Bar & Restaurant</option>
					<option>Vintage Italian</option>					
                  </select>
                </div>
            </div>
			<h4>Recent Bookings</h4>
			<ul>			  
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>The Hot and More Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 249</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Vintage Italian Beer Bar & Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 399</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_canceled_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Canceled</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Burger House (MG Road)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  
					</div>
				  </div>
				</div>
			  </li>
			  <li class="utf_pending_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status pending">Pending</span><span class="utf_booking_listing_status unpaid">Unpaid</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Sandfields Silver - (Apartment & Villa)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2022 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2022 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Reject</a> <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Approve</a> </div>
			  </li>
			</ul>
          </div>		  
        </div>
        <?php include "./component/footer.php" ?>

      </div>
    </div>
  </div>
</div>

<!-- Scripts --> 
<script src="scripts/jquery-3.4.1.min.js"></script> 
<script src="scripts/chosen.min.js"></script> 
<script src="scripts/perfect-scrollbar.min.js"></script>
<script src="scripts/slick.min.js"></script> 
<script src="scripts/rangeslider.min.js"></script> 
<script src="scripts/magnific-popup.min.js"></script> 
<script src="scripts/jquery-ui.min.js"></script> 
<script src="scripts/mmenu.js"></script>
<script src="scripts/tooltips.min.js"></script> 
<script src="scripts/color_switcher.js"></script>
<script src="scripts/jquery_custom.js"></script>
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

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_bookings.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->
</html>