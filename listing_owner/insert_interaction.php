<?php

include '../validation_of_session.php';
include "../db.php"; 
if (isset($_POST["interaction_type"]) && isset($_POST["interaction_way"])) {

	$interaction_on_user_id = $_POST["interaction_on_user_id"];
	$interaction_by_user_id = $_SESSION["user_id"];
	$interaction_type = $_POST["interaction_type"];
	$interaction_way = $_POST["interaction_way"];

	if (mysqli_query($connect, "INSERT INTO `user_interaction` (`interaction_id`, `interaction_by_user_id`, `interaction_on_user_id`, `interaction_timestamp`, `interaction_way`, `interaction_on_listing_id`, `interaction_type`) VALUES (NULL, '$interaction_by_user_id', '$interaction_on_user_id', current_timestamp(), '$interaction_way', '', '$interaction_type')")) {
	
		echo "success interaction ". $interaction_type ." ".$interaction_way ;

	}
}


else if (isset($_POST["enquery_form_value"])) {

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


	if (mysqli_query($connect, "INSERT INTO `enquery` (`enquery_id`, `enquery_first_name`, `enquery_last_name`, `enquery_listing_id`, `enquery_timestamp`, `enquery_email`, `enquery_phone`) VALUES (NULL, '$enquery_first_name', '$enquery_last_name', '$enquery_listing_id', current_timestamp(), '$enquery_email', '$enquery_phone')")) {
		echo "success enquery";

		$_SESSION['enquery_email'] = $enquery_email;
		$_SESSION['enquery_phone'] = $enquery_phone;
		$_SESSION['enquery_id'] = mysqli_insert_id($connect);
	}
} else {
	echo "failed";
}
