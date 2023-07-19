<?php
include '../validation_of_session.php';


if (isset($_POST["update_view_count"]) && isset($_POST["register_value"])) {
	$register_email = $_POST["register_email"];
	$register_username = $_POST["register_username"];
	$register_phone = $_POST["register_phone"];
	$register_first_name = $_POST["register_first_name"];
	$register_last_name = $_POST["register_last_name"];
	// echo"hello";
	$v_code = bin2hex(random_bytes(16));
	if (mysqli_query($connect, "lUPDATE table SET Views= Views+1 WHERE ID= 'current page id'")) {
		$store = send_mail($register_email, $v_code);
		$my_id = mysqli_insert_id($connect);
		echo "success register";
		echo $my_id;
	}
}

// enquery_first_name: asd
// enquery_last_name: asd
// enquery_phone: 8963588888
// enquery_email: asd@dsfd
// enquery_listing_id: 4
// enquery_form_value: true

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
