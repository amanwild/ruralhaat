<?php include "../validation_of_user.php" ?>
<?php include "../service/unlink_image.php" ?>
<?php
// foreach ($_POST as $key => $value) {
// 	echo "Field " . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "<br>";
// }
// echo "hello";
// user_first_name is Aman Sahu update_profile is true user_id is 166 user_last_name is CSE21 user_phone is 7368889436 user_email is amansahu1130@gmail.com user_state is Maharashtra user_dob is 30/10/2000 user_country is India user_age is 21 notes is Kalmana, Nagpur - 40035 user_facebook_link is facebook_link user_google_link is google_link user_instagram_link is instagram_link
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["update_profile"]) && $_POST['user_id']) {
	$user_first_name = '';
	if (isset($_POST["user_first_name"])) {
		$user_first_name = $_POST['user_first_name'];
	}
	$user_last_name = '';
	if (isset($_POST["user_last_name"])) {
		$user_last_name = $_POST['user_last_name'];
	}
	$update_profile = '';
	if (isset($_POST["update_profile"])) {
		$update_profile = $_POST['update_profile'];
	}
	$user_id = '';
	if (isset($_POST["user_id"])) {
		$user_id = $_POST['user_id'];
	}
	$user_phone = '';
	if (isset($_POST["user_phone"])) {
		$user_phone = $_POST['user_phone'];
	}
	// $user_email = '';
	// if (isset($_POST["user_email"])) {
	// 	$user_email = $_POST['user_email'];
	// }
	$user_state = '';
	if (isset($_POST["user_state"])) {
		$user_state = $_POST['user_state'];
	}
	$user_city = '';
	if (isset($_POST["user_city"])) {
		$user_city = $_POST['user_city'];
	}
	$user_dob = '';
	if (isset($_POST["user_dob"])) {
		$user_dob = $_POST['user_dob'];
	}
	$user_country = '';
	if (isset($_POST["user_country"])) {
		$user_country = $_POST['user_country'];
	}
	$user_age = '';
	if (isset($_POST["user_age"])) {
		$user_age = $_POST['user_age'];
	}
	$user_address = '';
	if (isset($_POST["user_address"])) {
		$user_address = $_POST['user_address'];
	}
	$user_facebook_link = '';
	if (isset($_POST["user_facebook_link"])) {
		$user_facebook_link = $_POST['user_facebook_link'];
	}
	$user_google_link = '';
	if (isset($_POST["user_google_link"])) {
		$user_google_link = $_POST['user_google_link'];
	}
	$user_instagram_link = '';
	if (isset($_POST["user_instagram_link"])) {
		$user_instagram_link = $_POST['user_instagram_link'];
	}
	$user_image = "";
	if (isset($_FILES['user_image'])) {
		if ("" != $_FILES["user_image"]["tmp_name"]) {
			unlink_img('user_image', 'users_entries', 'user_id', $user_id, $connect);
			$user_image = get_server_image_name('user_image');
		}
	}
	// $user_last_name = $_POST['user_last_name'];
	// $update_profile = $_POST['update_profile'];
	// $user_id = $_POST['user_id'];
	// $user_phone = $_POST['user_phone'];
	// $user_email = $_POST['user_email'];
	// $user_state = $_POST['user_state'];
	// $user_city = $_POST['user_city'];
	// $user_dob = $_POST['user_dob'];
	// $user_country = $_POST['user_country'];
	// $user_age = $_POST['user_age'];
	// $user_address = $_POST['user_address'];
	// $user_facebook_link = $_POST['user_facebook_link'];
	// $user_google_link = $_POST['user_google_link'];
	// $user_instagram_link = $_POST['user_instagram_link'];
	// $user_image = $_POST['user_image'];


	try {
		$update_query = "UPDATE `users_entries` SET `user_phone` = '$user_phone', `user_first_name` = '$user_first_name', `user_last_name` = '$user_last_name', `user_country_id` = '$user_country', `user_state_id` = '$user_state', `user_city_id` = '$user_city', `user_age` = '$user_age', `user_dob` = '$user_dob', `user_address` = '$user_address', `user_facebook_link` = '$user_facebook_link', `user_google_link` = '$user_google_link', `user_instagram_link` = '$user_instagram_link' WHERE `users_entries`.`user_id` = $user_id";
		if ("" != ($user_image)) {
			$update_query = "UPDATE `users_entries` SET `user_phone` = '$user_phone', `user_first_name` = '$user_first_name', `user_last_name` = '$user_last_name', `user_country_id` = '$user_country', `user_state_id` = '$user_state', `user_city_id` = '$user_city', `user_age` = '$user_age', `user_dob` = '$user_dob', `user_address` = '$user_address', `user_facebook_link` = '$user_facebook_link', `user_google_link` = '$user_google_link', `user_instagram_link` = '$user_instagram_link', `user_image` = '$user_image' WHERE `users_entries`.`user_id` = $user_id";
			$_SESSION['user_image'] = $user_image;
		}
		// echo $update_query;
		$update_result = mysqli_query($connect, $update_query);

		if ($update_result) {
			// echo "Data updated" . "<br>";
			$_SESSION['user_first_name'] = $user_first_name;
			$_SESSION['user_last_name'] = $user_last_name;
		}
	} catch (Exception $e) {
		// echo "Data update failed " . "<br>";
		// echo 'Message: ' . $e->getMessage() . "<br>";
	}


	// echo "hello";
}
?>
<!DOCTYPE html>
<html lang="zxx">



<head>
	<meta name="author" content="">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Profile</title>

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

	<?php include "./component/preloader.php" ?>


	<!-- Wrapper -->
	<div id="main_wrapper">
		<?php include "./component/header.php" ?>

		<div class="clearfix"></div>

		<!-- Dashboard -->
		<div id="dashboard">
			<?php include "./component/user_sidebar_navbar.php" ?>

			<script>
				var d = document.getElementById("user_dashboard_my_profile");
				d.className += "active";
			</script>
			<div class="utf_dashboard_content">
				<div id="titlebar" class="dashboard_gradient">
					<div class="row">
						<div class="col-md-12">
							<h2>My Profile</h2>
							<nav id="breadcrumbs">
								<ul>
									<li><a href="index_1.php">Home</a></li>
									<li><a href="dashboard.php">Dashboard</a></li>
									<li>My Profile</li>
									<!-- <li>  -->

									<!-- </li> -->
								</ul>
							</nav>
						</div>
					</div>
				</div>


				<?php

				include "../db.php";
				$user_id = $_SESSION['user_id'];

				$select_query = "SELECT * FROM `users_entries` WHERE `user_id` = $user_id";
				$select_result = mysqli_query($connect, $select_query);
				// INSERT INTO `users_entries` (`user_id`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_otp`, `user_otp_created`, `user_otp_is_expired`, `user_first_name`, `user_last_name`) VALUES (NULL, 'dds', '', '', '', current_timestamp(), '0', '0', '', '', '', '', '', '', '');
				// UPDATE `users_entries` SET `user_country` = 'India', `user_state` = 'Maharashtra', `user_city` = 'Nagpur', `user_age` = '21', `user_dob` = '30/10/2000', `user_address` = 'Kalmana, Nagpur - 40035', `user_facebook_link` = 'facebook_link', `user_google_link` = 'google_link', `user_instagram_link` = 'instagram_link' WHERE `users_entries`.`user_id` = 166;
				while ($row = mysqli_fetch_assoc($select_result)) {
					$user_id = $row['user_id'];
				?>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="utf_dashboard_list_box margin-top-0">
								<form enctype="multipart/form-data" method="POST" action="<?= $_SERVER["REQUEST_URI"]; ?>">
									<h4 class="gray"><i class="sl sl-icon-user"></i> Profile Details</h4>
									<div class="utf_dashboard_list_box-static">
										<div class="edit-profile-photo"> <img id="profile_dp" src="
									<?php
									if (false) {
										if ($_SESSION['user_image_url'] != "") {
											echo $_SESSION['user_image_url'];
										}
									} else {
										if (isset($_SESSION['user_image'])) {
											echo "../wp-content/uploads/data/" . $_SESSION['user_image'];
										} else {
											echo "../wp-content/uploads/data/dashboard-avatar.jpg";
										}
									} ?>" alt="">

										</div>
										<?php if (false) {
											if ($_SESSION['user_image_url'] != "") {
										?>
												<div class="row">
													<div class="col-md-12">
														<div class="notification success closeable margin-bottom-30">
															<p>
																Your Profile Photo is Updated from Your
																<strong> Gmail Acoount Profile</strong>

															</p>
															<a class="close" href="#"></a>
														</div>
													</div>
												</div>

										<?php
											}
										} else {
											// if (isset($_SESSION['user_image'])) {
											// 	echo "../wp-content/uploads/data/" . $_SESSION['user_image'];
											// }
										} ?>


										<div class="my-profile">
											<div class="row with-forms">
												<div class="col-md-4">
													<label>First Name</label>
													<input type="text" class="input-text" id="user_first_name" name="user_first_name" value="<?= $row['user_first_name'] ?>">
													<input type="hidden" class="input-text" id="update_profile" name="update_profile" value="true">
													<input type="hidden" class="input-text" id="user_id" name="user_id" value="<?= $row['user_id'] ?>">
												</div>
												<div class="col-md-4">
													<label>Last Name</label>
													<input type="text" id="user_last_name" name="user_last_name" value="<?= $row['user_last_name'] ?>">
												</div>
												<div class="col-md-4">
													<label>Update Image</label>
													<input type="file" id="user_image" name="user_image" value="<?= $row['user_image'] ?>">
												</div>
												<div class="col-md-4">
													<label>Phone <?php if ($row['is_verified_phone']) {

																		echo "<strong style='color:green;font-size:.7em;' id='label_for_phone_validation'> Verified</strong>";
																	} else {
																		echo "<strong style='color:red;font-size:.7em;' id='label_for_phone_validation'>Not Verified</strong>";
																	}

																	?></label>


													<!-- <input type="tel" class="form-control form-control-md sharp-edge" data-error="Phone required" required> -->

													<input type="tel" pattern="[0-9]{10}" id="user_phone" name="user_phone" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="user_phone" name="user_phone" value="<?= $row['user_phone'] ?>">
												</div>
												<div class="col-md-4">
													<label>Email <?php if ($row['is_verified_email']) {

																		echo "<strong style='color:green;font-size:.7em;' id='label_for_phone_validation'> Verified</strong>";
																	} else {
																		echo "<strong style='color:red;font-size:.7em;' id='label_for_phone_validation'>Not Verified</strong>";
																	}

																	?></label>
													<input type="text" id="user_email" name="user_email" value="<?= $row['user_email'] ?>">
												</div>

												<!-- <div class="col-md-4">
													<label>Birth</label>
													<input type="text" id="user_dob" name="user_dob" value="">
												</div> -->
												<!-- <div class="col-md-4">
													<label>Age</label>
													<input type="number" id="user_age" name="user_age" value="<?= $row['user_age'] ?>">
												</div> -->
												<!-- <div class="col-md-4">
													<label>Country</label>
													<input type="text" id="user_country" name="user_country" value="">
												</div>
												<div class="col-md-4">
													<label>State</label>
													<input type="text" id="user_state" name="user_state" value="">
												</div>
												<div class="col-md-4">
													<label>City</label>
													<input type="text" id="user_city" name="user_city" value="" placeholder="">
												</div> -->
												<div class="col-md-12">
													<label>Address</label>
													<textarea cols="30" id="user_address" name="user_address" rows="10"><?= $row['user_address'] ?></textarea>
												</div>
												<div class="col-md-4">
													<label>Facebook</label>
													<input type="url" id="user_facebook_link" name="user_facebook_link" value="<?= $row['user_facebook_link'] ?>">
												</div>
												<div class="col-md-4">
													<label>Google+</label>
													<input type="url" id="user_google_link" name="user_google_link" value="<?= $row['user_google_link'] ?>">
												</div>
												<div class="col-md-4">
													<label>Instagram</label>
													<input type="url" id="user_instagram_link" name="user_instagram_link" value="<?= $row['user_instagram_link'] ?>">
												</div>

											</div>
											<script>
												function showimg() {
													var x = (document.getElementById("user_image").value).slice(12, 100);
													console.log(x);
													document.getElementById("profile_dp").src = "../wp-content/uploads/data/" + x;
												}
											</script>
										</div>
										<button type="submit" class="button preview btn_center_item margin-top-15">Save Changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php
				}
				?>
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

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_my_profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:58 GMT -->

</html>