<?php

include "../validation_of_session.php";
// include "../db.php"; 
// echo "<pre>";
// var_dump($_POST);
// echo "<pre>";

if (isset($_POST['listing_id']) ) {
  // echo "hello";

  $user_id =  '';
  $ipaddress =  '';
  $by_user_type = 'stranger';

  // $on_user_id = $_POST['listing_owner_id'];
  $listing_id = $_POST['listing_id'];

  if (isset($_POST['ipaddress'])) {
    $ipaddress = $_POST['ipaddress'];
  }


  if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id'] != '') {
      $user_id =  $_SESSION['user_id'];
      $user_first_name =  $_SESSION['user_first_name'];
      $user_last_name =  $_SESSION['user_last_name'];
      $user_phone =  $_SESSION['user_phone'];
      $user_email =  $_SESSION['user_email'];
      $by_user_type = 'normal_user';
    }
  }else
  if (isset($_SESSION['enquery_id'])) {
    if ($_SESSION['enquery_id'] != '') {
      $user_id =  $_SESSION['enquery_id'];
      $user_first_name =  $_SESSION['enquery_first_name'];
      $user_last_name =  $_SESSION['enquery_last_name'];
      $user_email =  $_SESSION['enquery_email'];
      $user_phone =  $_SESSION['enquery_phone'];
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

  // echo "\n".$ipaddress;

  $insert_query = "INSERT INTO `enquery` (`enquery_id`, `enquery_first_name`, `enquery_last_name`, `enquery_listing_id`, `enquery_timestamp`, `enquery_email`, `enquery_phone`, `enquery_mac_address`, `enquery_seen`, `enquery_user_type`) VALUES (NULL, '$user_first_name', '$user_last_name', '$listing_id', current_timestamp(), '$user_email', '$user_phone', '$ipaddress', '0', '$by_user_type')";
  // echo $insert_query;        
  try {
    $select_listing_result = 0;
    if ($connect) {
      $insert_query_result = mysqli_query($connect, $insert_query);
      if ($insert_query_result) {
        echo "Success";
        // echo $user_id;
      }
    }
  } catch (Exception $e) {
    echo "failed";
    $mess = $e->getMessage();
  }
}
