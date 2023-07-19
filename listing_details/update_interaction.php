<?php
include "../validation_of_session.php";
include "../db.php"; 

if (isset($_POST['listing_owner_id']) && (isset($_POST['listing_id']) && isset($_POST['type']))) {


  $on_user_id = $_POST['listing_owner_id'];
  $listing_id = $_POST['listing_id'];

  $user_id =  '';
  $by_user_type = 'stranger';

  if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id'] != '') {
      $user_id =  $_SESSION['user_id'];
      $by_user_type = 'normal_user';
    }
  }
  if (isset($_SESSION['enquery_id'])) {
    if ($_SESSION['enquery_id'] != '') {
      $user_id =  $_SESSION['enquery_id'];
      $by_user_type = 'enquery';
    }
  }


  $type = $_POST['type'];
  $way = $_POST['way'];

  // echo"enter";
  $insert_query = "INSERT INTO `user_interaction` (`interaction_id`, `interaction_by_user_id`, `interaction_on_user_id`, `interaction_timestamp`, `interaction_way`, `interaction_on_listing_id`, `interaction_type`, `interaction_by_user_type`) VALUES (NULL, '$user_id','$on_user_id', current_timestamp(), '$way', '$listing_id', '$type', '$by_user_type')";
  // echo $insert_query;        
  try {
    $select_listing_result = 0;
    if ($connect) {
      $insert_query_result = mysqli_query($connect, $insert_query);
      if ($insert_query_result) {
        echo "Success";
        echo $user_id;
      }
    }
  } catch (Exception $e) {
    $mess = $e->getMessage();
  }
}
