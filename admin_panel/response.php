<?php

include "../db.php";


// foreach ($_POST as $key => $value) {
//   echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
// }
require "email_verification_shooting.php";

// echo json_encode($_POST);

if(isset($_POST["register_email"]) && isset($_POST["adduser"]) ) 
{	
	// echo "success";
    $register_email =$_POST["register_email"]; 
	$register_username =$_POST["register_username"]; 
	$register_phone =$_POST["register_phone"]; 
	$register_first_name =$_POST["register_first_name"]; 
	$register_last_name =$_POST["register_last_name"]; 
	$register_image =$_POST["register_image"]; 
	$register_type =$_POST["register_type"]; 
	$creator_type =$_POST["creator_type"]; 
    // echo"hello";
    $v_code = bin2hex(random_bytes(16));
	if(mysqli_query($connect,"INSERT INTO `users_entries` (`user_id`,`user_first_name`,`user_last_name`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_created_by`,`user_otp`, `user_otp_created`, `user_otp_is_expired`) VALUES (NULL, '$register_first_name','$register_last_name','$register_username', '', '$register_email', '$register_phone', current_timestamp(), '0', '0', '$register_type', '$v_code', '$creator_type', '', '', '')"))
	{
    $store = send_mail($register_email, $v_code);
		  $my_id = mysqli_insert_id($connect);
		  echo "success";
		  echo $my_id;
 
	}
 
}
?>