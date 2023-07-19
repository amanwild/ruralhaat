<?php
//include db configuration file
// include_once("config.php");

include "../db.php";
// foreach ($_POST as $key => $value) {
//   echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
// }
require "email_verification_shooting.php";

echo json_encode($_POST);
 
if(isset($_POST["register_email"]) && isset($_POST["register_value"]) ) 
{	
    $register_email =$_POST["register_email"]; 
	$register_username =$_POST["register_username"]; 
	$register_phone =$_POST["register_phone"]; 
	$register_first_name =$_POST["register_first_name"]; 
	$register_last_name =$_POST["register_last_name"]; 
	$user_type =$_POST["user_type"]; 



	$select_email_query = "SELECT * FROM `users_entries` WHERE `user_email` LIKE '$register_email'";
	$select_email_result = mysqli_query($connect,$select_email_query);
	$num_for_email = mysqli_num_rows($select_email_result);

	$select_phone_query = "SELECT * FROM `users_entries` WHERE `user_phone` LIKE '$register_phone'";
	$select_phone_result = mysqli_query($connect,$select_phone_query);
	$num_for_phone = mysqli_num_rows($select_phone_result);

	if($num_for_email>0){
		echo "duplicate email"; 
	}
	if($num_for_phone>0){
		echo "duplicate phone";
	}
	if($num_for_email==0 && $num_for_phone==0){ 
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
	$insert_query = "INSERT INTO `users_entries` (`user_id`,`user_first_name`,`user_last_name`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_otp`, `user_otp_created`, `user_otp_is_expired`, `user_ip_address`) VALUES (NULL, '$register_first_name','$register_last_name','$register_username', '', '$register_email', '$register_phone', current_timestamp(), '0', '0', '$user_type', '$v_code', '', '', '','$ipaddress')";
	echo $insert_query;
 	if(mysqli_query($connect,$insert_query))
	{
		echo "query success"; 
    $store = send_mail($register_email, $v_code);
	if($store){
		echo "email success"; 

	}else{

		echo "email failed"; 
	}
		  $my_id = mysqli_insert_id($connect);
		
		}else{
			
			echo "query failed"; 
	}
	}
 
}else{
			
	echo "enter failed"; 
}
