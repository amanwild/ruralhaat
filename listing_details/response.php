<?php
//include db configuration file
// include_once("config.php");
include '../validation_of_session.php';
include "../db.php";
// foreach ($_POST as $key => $value) {
//   echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
// }
require "email_verification_shooting.php";

echo json_encode($_POST);

if (isset($_POST["register_email"]) && isset($_POST["register_value"])) {
	$register_email = $_POST["register_email"];
	$register_username = $_POST["register_username"];
	$register_phone = $_POST["register_phone"];
	$register_first_name = $_POST["register_first_name"];
	$register_last_name = $_POST["register_last_name"];
	$user_type = $_POST["user_type"];


	$select_email_query = "SELECT * FROM `users_entries` WHERE `user_email` LIKE '$register_email'";
	$select_email_result = mysqli_query($connect, $select_email_query);
	$num_for_email = mysqli_num_rows($select_email_result);

	$select_phone_query = "SELECT * FROM `users_entries` WHERE `user_phone` LIKE '$register_phone'";
	$select_phone_result = mysqli_query($connect, $select_phone_query);
	$num_for_phone = mysqli_num_rows($select_phone_result);

	if ($num_for_email > 0) {
		echo "duplicate email";
	}
	if ($num_for_phone > 0) {
		echo "duplicate phone";
	}

	// echo"hello";
	if ($num_for_email == 0 && $num_for_phone == 0) {
		$v_code = bin2hex(random_bytes(16));

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

		if (mysqli_query($connect, "INSERT INTO `users_entries` (`user_id`,`user_first_name`,`user_last_name`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_otp`, `user_otp_created`, `user_otp_is_expired`,, `user_ip_address`) VALUES (NULL, '$register_first_name','$register_last_name','$register_username', '', '$register_email', '$register_phone', current_timestamp(), '0', '0', '$user_type', '$v_code', '', '', '','$ipaddress')")) {
			$store = send_mail($register_email, $v_code);
			$my_id = mysqli_insert_id($connect);
			echo "success register";
			echo $my_id;
		}
	} else {

		echo "duplicate username or email";
	}
}

// enquery_first_name: asd
// enquery_last_name: asd
// enquery_phone: 8963588888
// enquery_email: asd@dsfd
// enquery_listing_id: 4
// enquery_form_value: true

else if (isset($_POST["enquery_form_value"])) {

	$ipaddress =  '';
	$by_user_type =  '';
	if (isset($_POST['ipaddress'])) {
		$ipaddress = $_POST['ipaddress'];
	}


	if (isset($_SESSION['user_id'])) {
		if ($_SESSION['user_id'] != '') {
			$enquery_id =  $_SESSION['user_id'];
			$enquery_first_name =  $_SESSION['user_first_name'];
			$enquery_last_name =  $_SESSION['user_last_name'];
			$enquery_phone =  $_SESSION['user_phone'];
			$enquery_email =  $_SESSION['user_email'];
			$by_user_type = 'normal_user';
		}
	}
	if (isset($_SESSION['enquery_id'])) {
		if ($_SESSION['enquery_id'] != '') {
			$enquery_id =  $_SESSION['enquery_id'];
			$enquery_first_name =  $_SESSION['enquery_first_name'];
			$enquery_last_name =  $_SESSION['enquery_last_name'];
			$enquery_email =  $_SESSION['enquery_email'];
			$enquery_phone =  $_SESSION['enquery_phone'];
			$by_user_type = 'enquery';
		}
	}


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


	if (isset($_POST['enquery_email'])) {
		$enquery_email = $_POST["enquery_email"];
	}
	if (isset($_POST['enquery_phone'])) {
		$enquery_phone = $_POST["enquery_phone"];
	}
	if (isset($_POST['enquery_first_name'])) {
		$enquery_first_name = $_POST["enquery_first_name"];
	}
	if (isset($_POST['enquery_last_name'])) {
		$enquery_last_name = $_POST["enquery_last_name"];
	}
	if (isset($_POST['enquery_listing_id'])) {
		$enquery_listing_id = $_POST["enquery_listing_id"];
	}

	// $enquery_mac_address = $_SERVER['REMOTE_ADDR'];
	// $MAC = exec('getmac');

	// // Storing 'getmac' value in $MAC
	// $enquery_mac_address = strtok($MAC, ' ');
	// // $IP stores the ip address of client
	// // echo "Client's IP address is: $enquery_mac_address";


	if (mysqli_query($connect, "INSERT INTO `enquery` (`enquery_id`, `enquery_first_name`, `enquery_last_name`, `enquery_listing_id`, `enquery_timestamp`, `enquery_email`, `enquery_phone`, `enquery_mac_address`, `enquery_seen`, `enquery_user_type`) VALUES (NULL, '$enquery_first_name', '$enquery_last_name', '$enquery_listing_id', current_timestamp(), '$enquery_email', '$enquery_phone', '$ipaddress', '0', '$by_user_type')")) {
		echo "success enquery";

		$_SESSION['enquery_email'] = $enquery_email;
		$_SESSION['enquery_first_name'] = $enquery_first_name;
		$_SESSION['enquery_phone'] = $enquery_phone;
		$_SESSION['enquery_last_name'] = $enquery_last_name;
		$_SESSION['enquery_id'] = mysqli_insert_id($connect);
	}
} else {
	echo "failed";
}
