<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:43:50 GMT -->
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>:: U-Listing Directory - Listing HTML Template ::</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Style CSS -->
<link rel="stylesheet" href="css/stylesheet.css">
<link rel="stylesheet" href="css/mmenu.css">
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
  
  <div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Add Listing</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index_1.php">Home</a></li>
              <li>Add Listing</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container margin-bottom-75">
     <div class="row">
        <div class="col-lg-12">
          <div id="utf_add_listing_part">             
			<div class="add_utf_listing_section"> 
			  <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-user"></i> Have an Account?</h3>
              </div>			  
			  <div class="row with-forms">				
				<div class="col-md-12">
					<div class="form-group lis-relative">
						Sign in If you don’t have an account you can create one below by entering your email address/username. Your account details will be confirmed via email. <a href="#dialog_signin_part" class="login_form sign-in popup-with-zoom-anim">Sign in</a>
					</div>
				</div>
			  </div>
			</div>
			
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-tag"></i> Categories & Tags</h3>
              </div>              
              <div class="row with-forms">
                <div class="col-md-6">
                  <h5>Listing Title</h5>
                  <input type="text" class="search-field" name="listing_title" id="listing_title" placeholder="Listing Title" value="">
                </div>
				<div class="col-md-6">
                  <h5>Keywords</h5>                  
				  <input type="text" name="keywords" id="keywords" placeholder="Keywords..." value="">
                </div>
              </div>              
              <div class="row with-forms">                 
                <div class="col-md-6">
                  <h5>Category</h5>
                  <div class="intro-search-field utf-chosen-cat-single">
					  <select class="selectpicker default" data-selected-text-format="count" data-size="7" title="Select Category">
						<option>Eat & Drink</option>
						<option>Shops</option>
						<option>Hotels</option>
						<option>Restaurants</option>
						<option>Fitness</option>
						<option>Events</option>						
					  </select>
				  </div>
                </div>
                <div class="col-md-6">
                  <h5>Tags(optional)</h5>
                  <div class="intro-search-field utf-chosen-cat-single">
					  <select class="selectpicker default" data-selected-text-format="count" data-size="7" title="Select Tags">
						<option>One</option>
						<option>Two</option>
						<option>Three</option>
						<option>Four</option>
						<option>Five</option> 						
					  </select>
				  </div>
                </div>
              </div>
			  <div class="row with-forms">
                <div class="col-md-12">
                  <h5>Listing Tags</h5>
                  <input type="text" class="search-field" name="listing_title" id="listing_title" placeholder="Listing Tags" value="">
                </div>				
              </div> 
            </div>
            
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-map"></i> Location</h3>
              </div>
              <div class="utf_submit_section"> 
                <div class="row with-forms"> 				
                  <div class="col-md-6">
                    <h5>City</h5>
                    <div class="intro-search-field utf-chosen-cat-single">
					  <select class="selectpicker default" data-selected-text-format="count" data-size="7" title="Select City">
						  <option>New York</option>
						  <option>Argentina</option>
						  <option>Chicago</option>
						  <option>Azerbaijan</option>
						  <option>Indonesia</option>
						  <option>India</option>
						  <option>Thailand</option>
						  <option>Gambia</option>
						  <option>Spain</option>
						  <option>Iraq</option> 						
					  </select>
				    </div>
                  </div>                  
                  <div class="col-md-6">
                    <h5>Address</h5>                    
					<input type="text" class="input-text" name="address" id="address" placeholder="Address" value="">
                  </div>                  
                  <div class="col-md-12">
                  <h5>Decimal Degrees</h5>                    
				  <div class="row with-forms">
					<div class="col-md-6">
						<input type="text" class="input-text" name="latitude" id="latitude" placeholder="40.7324319" value="">
					</div>
					<div class="col-md-6">                    
						<input type="text" class="input-text" name="longitude" id="longitude" placeholder="-73.824807777775" value="">
					</div> 
				  </div> 	
                  </div>				  				  
				  <div id="utf_listing_location" class="col-md-12 utf_listing_section">
					  <div id="utf_single_listing_map_block">
						<div id="utf_single_listingmap" data-latitude="40.7324319" data-longitude="-73.824807777775" data-map-icon="im im-icon-Hamburger"></div>
						<a href="#" id="utf_street_view_btn">Street View</a> 
					  </div>
				  </div>
                </div>
              </div>
            </div>
            
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-picture"></i> Images</h3>
              </div>			  
              <div class="row with-forms">              
				  <div class="utf_submit_section col-md-4">
				    <h4>Logo</h4>
					<form action="http://ulisting.utouchdesign.com/ulisting_ltr/file-upload" class="dropzone"></form>
				  </div>
				  <div class="utf_submit_section col-md-4">
					<h4>Cover Image</h4>
					<form action="http://ulisting.utouchdesign.com/ulisting_ltr/file-upload" class="dropzone"></form>
				  </div>
				  <div class="utf_submit_section col-md-4">
					<h4>Gallery Images</h4>
					<form action="http://ulisting.utouchdesign.com/ulisting_ltr/file-upload" class="dropzone"></form>
				  </div>
			  </div>	  
            </div> 
			
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-list"></i> Name & Description</h3>
              </div>              
			  <div class="row with-forms">
				  <div class="col-md-6">
					<h5>Name</h5>
					<input type="text" placeholder="Name">
				  </div>	
				  <div class="col-md-6">
					<h5>Email</h5>
					<input type="text" placeholder="Email">
				  </div>
				  <div class="col-md-6">
					<h5>Title</h5>
					<input type="text" placeholder="Title">
				  </div>
				  <div class="col-md-6">
					<h5>Tagline</h5>
					<input type="text" placeholder="Tagline">
				  </div>				  				 
				  <div class="col-md-12">
					<h5>Description</h5>
					<textarea name="summary" cols="40" rows="3" id="description" placeholder="Description..." spellcheck="true"></textarea>
				  </div>
			  </div>                
            </div>

			<div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-home"></i> Amenities</h3>
              </div>              
              <div class="checkboxes in-row amenities_checkbox">
                <ul>
					<li>
						<input id="check-a" type="checkbox" name="check">
						<label for="check-a">Car Parking</label>
					</li>
					<li>
						<input id="check-b" type="checkbox" name="check">
						<label for="check-b">Takes Reservations</label>
					</li>
					<li>
						<input id="check-c" type="checkbox" name="check">
						<label for="check-c">Street Parking</label>
					</li>
					<li>
						<input id="check-d" type="checkbox" name="check">
						<label for="check-d">Elevator in Building</label>
					</li>
					<li>
						<input id="check-e" type="checkbox" name="check">
						<label for="check-e">Outdoor Seating</label>
					</li>
					<li>
						<input id="check-f" type="checkbox" name="check">
						<label for="check-f">Friendly Workspace</label>	
					</li>
					<li>
						<input id="check-g" type="checkbox" name="check">
						<label for="check-g">Wireless Internet</label>
					</li>
					<li>
						<input id="check-h" type="checkbox" name="check" >
						<label for="check-h">Good for Kids</label>
					</li>
					<li>
						<input id="check-i" type="checkbox" name="check" >
						<label for="check-i">Events</label>
					</li>
					<li>
						<input id="check-j" type="checkbox" name="check">
						<label for="check-j">Smoking Allowed</label>
					</li>
					<li>
						<input id="check-k" type="checkbox" name="check">
						<label for="check-k">Wheelchair Accessible</label>
					</li>
					<li>
						<input id="check-l" type="checkbox" name="check">
						<label for="check-l">Accepted Bank Cards</label>
					</li>
				</ul>				
              </div>              
            </div>
            
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>                
              </div>              
              <div class="switcher-content"> 
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-2">
                    <h5>Monday :-</h5>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-2">
                    <h5>Tuesday :-</h5>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-2">
                    <h5>Wednesday :-</h5>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-2">
                    <h5>Thursday :-</h5>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-2">
                    <h5>Friday :-</h5>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-2">
                    <h5>Saturday :-</h5>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-2">
                    <h5>Sunday :-</h5>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
                </div>
              </div>                            
            </div>
			
			<div class="add_utf_listing_section margin-top-45"> 
				<div class="utf_add_listing_part_headline_part">
					<h3><i class="sl sl-icon-tag"></i> Add Pricing</h3>
                </div>              
				<div class="row">
				  <div class="col-md-12">
					<table id="utf_pricing_list_section">
					  <tbody class="ui-sortable">
						<tr class="pricing-list-item pattern ui-sortable-handle">
						  <td><div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
							<div class="fm-input pricing-name">
							  <input type="text" placeholder="Title">
							</div>
							<div class="fm-input pricing-ingredients">
							  <input type="text" placeholder="Description">
							</div>
							<div class="fm-input pricing-price"><i class="data-unit">$</i>
							  <input type="text" placeholder="Price" data-unit="$">
							</div>
							<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div></td>
						</tr>
					  </tbody>
					</table>
					<a href="#" class="button add-pricing-list-item">Add Item</a> <a href="#" class="button add-pricing-submenu">Add Category</a> </div>
				</div>                          
            </div>
			
			<div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-docs"></i> Your Listing Feature</h3>
              </div>              
              <div class="checkboxes in-row amenities_checkbox">
                <ul>
					<li>
						<input id="check-a1" type="checkbox" name="check">
						<label for="check-a1">Accepts Credit Cards</label>
					</li>
					<li>
						<input id="check-b1" type="checkbox" name="check">
						<label for="check-b1">Smoking Allowed</label>
					</li>
					<li>
						<input id="check-c1" type="checkbox" name="check">
						<label for="check-c1">Bike Parking</label>
					</li>
					<li>
						<input id="check-d1" type="checkbox" name="check">
						<label for="check-d1">Hostels</label>
					</li>
					<li>
						<input id="check-e1" type="checkbox" name="check">
						<label for="check-e1">Wheelchair Accessible</label>
					</li>
					<li>
						<input id="check-f1" type="checkbox" name="check">
						<label for="check-f1">Wheelchair Internet</label>	
					</li>
					<li>
						<input id="check-g1" type="checkbox" name="check">
						<label for="check-g1">Wheelchair Accessible</label>
					</li>
					<li>
						<input id="check-h1" type="checkbox" name="check" >
						<label for="check-h1">Parking Street</label>
					</li>
					<li>
						<input id="check-i1" type="checkbox" name="check" >
						<label for="check-i1">Wireless Internet</label>
					</li>					
				</ul>				
              </div>              
            </div>                        
            <a href="#" class="button preview"><i class="fa fa-arrow-circle-right"></i> Save & Preview</a> </div>
        </div>        
      </div>
  </div>
  
  <section class="utf_cta_area_item utf_cta_area2_block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf_subscribe_block clearfix">
                    <div class="col-md-8 col-sm-7">
                        <div class="section-heading">
                            <h2 class="utf_sec_title_item utf_sec_title_item2">Subscribe to Newsletter!</h2>
                            <p class="utf_sec_meta">
                                Subscribe to get latest updates and information.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="contact-form-action">
                            <form method="post">
                                <span class="la la-envelope-o"></span>
                                <input class="form-control" type="email" placeholder="Enter your email" required="">
                                <button class="utf_theme_btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
	</section>
  
  <!-- Footer -->
  <div id="footer" class="footer_sticky_part"> 
    <div class="container">
      <div class="row">
		<div class="col-md-4 col-sm-12 col-xs-12"> 
          <h4>About Us</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>          
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Useful Links</h4>
          <ul class="social_footer_link">
            <li><a href="#">Home</a></li>
            <li><a href="#">Listing</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>My Account</h4>
          <ul class="social_footer_link">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">My Listing</a></li>
            <li><a href="#">Favorites</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Pages</h4>
          <ul class="social_footer_link">
            <li><a href="#">Blog</a></li>
            <li><a href="#">Our Partners</a></li>
            <li><a href="#">How It Work</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Help</h4>
          <ul class="social_footer_link">
            <li><a href="#">Sign In</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">Add Listing</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>        
      </div>
      
      <div class="row">
        <?php include "./component/header.php" ?>

      </div>
    </div>
  </div>
  <div id="bottom_backto_top"><a href="#"></a></div>
</div>

<!-- Scripts --> 
<script src="scripts/jquery-3.4.1.min.js"></script> 
<script src="scripts/chosen.min.js"></script> 
<script src="scripts/slick.min.js"></script> 
<script src="scripts/rangeslider.min.js"></script> 
<script src="scripts/bootstrap-select.min.js"></script>
<script src="scripts/magnific-popup.min.js"></script> 
<script src="scripts/jquery-ui.min.js"></script> 
<script src="scripts/mmenu.js"></script>
<script src="scripts/tooltips.min.js"></script> 
<script src="scripts/color_switcher.js"></script>
<script src="scripts/jquery_custom.js"></script>

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
 
<!-- Maps --> 
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> 
<script src="scripts/infobox.min.js"></script> 
<script src="scripts/markerclusterer.js"></script> 
<script src="scripts/maps.js"></script>
<script>
$(".utf_opening_day.utf_js_demo_hours .utf_chosen_select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});
</script> 
<script src="scripts/dropzone.js"></script>
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:43:50 GMT -->
</html>