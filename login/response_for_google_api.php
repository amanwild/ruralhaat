<?php
//include db configuration file
// include_once("config.php");

include "../db.php"; 
require "email_pending_status.php";

// echo json_encode($_POST);

if (isset($_POST["register_email"]) && isset($_POST["register_value"])) {
	$register_email = $_POST["register_email"];
	$register_username = $_POST["register_username"];
	// $register_phone =$_POST["register_phone"]; 
	$register_first_name = $_POST["register_first_name"];
	$register_last_name = $_POST["register_last_name"];

	if (mysqli_query($connect, "INSERT INTO `users_entries` (`user_id`,`user_first_name`,`user_last_name`, `user_username`, `user_password`, `user_email`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_otp`, `user_otp_created`, `user_otp_is_expired`) VALUES (NULL, '$register_first_name','$register_last_name','$register_username', '', '$register_email', current_timestamp(), '1', '0', 'user', '', '', '')")) {
		// echo "here";
		$store = send_mail($register_email);
		$my_id = mysqli_insert_id($connect);
		echo "success";
		//   echo $my_id;

	}
}
