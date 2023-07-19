<?php
include "../validation_of_session.php";
//include db configuration file
// include_once("config.php");

include "../db.php"; 
// echo json_encode($_POST);

if (isset($_POST["message"]) && (isset($_POST["subject"]) && isset($_POST["target_user_id"]))) {
	
	if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] != "")) {
		// 		message: as
		// subject: as
		// target_user_id: 166
		// target_listing_id: 4
		$user_id = $_SESSION['user_id'];

		$message = $_POST["message"];
		$subject = $_POST["subject"];
		$target_user_id = $_POST["target_user_id"];

		$valid_user_query = "INSERT INTO `message` (`message_id`, `message_subject`, `message_massage`, `message_receiver_user_id`, `message_timestamp`, `message_sender_user_id`) VALUES (NULL, '$subject', '$message', '$target_user_id', current_timestamp(), '$user_id')";
		echo $valid_user_query;
		
		if (mysqli_query($connect,$valid_user_query)) {

			echo "success";
		}
	} else {
		if (isset($_SESSION['enquery_id']) && ($_SESSION['enquery_id'] != "")) {
			$user_id = $_SESSION['enquery_id'];
			$message = $_POST["message"];
			$subject = $_POST["subject"];
			$target_user_id = $_POST["target_user_id"];
			
			$invalid_user_query = "INSERT INTO `message` (`message_id`, `message_subject`, `message_massage`, `message_receiver_user_id`, `message_timestamp`, `message_sender_enquery_id`) VALUES (NULL, '$subject', '$message', '$target_user_id', current_timestamp(), '$user_id')";
			
			echo $invalid_user_query;
			if (mysqli_query($connect,$invalid_user_query)) {
				echo "success";
			}
		}else{
	
			echo "failed";
		}
		
	}
}
