
<?php

if (isset($_SESSION['user_type']) && isset($_SESSION['is_verified_admin'])) {
  

// for listing
$default_listing_query = "SELECT  * FROM `listing` ";
$default_listing_result = mysqli_query($connect, $default_listing_query);
$default_listing_count  = mysqli_num_rows($default_listing_result);

$active_listing_query = "SELECT  * FROM `listing` WHERE `listing_permission` LIKE 'Approved'  ";
$active_listing_result = mysqli_query($connect, $active_listing_query);
$active_listing_count  = mysqli_num_rows($active_listing_result);

$pending_listing_query = "SELECT  * FROM `listing` WHERE `listing_permission` LIKE 'Pending'  ";
$pending_listing_result = mysqli_query($connect, $pending_listing_query);
$pending_listing_count  = mysqli_num_rows($pending_listing_result);

$expired_listing_query = "SELECT  * FROM `listing` WHERE `listing_permission` LIKE 'Rejected' ";
$expired_listing_result = mysqli_query($connect, $expired_listing_query);
$expired_listing_count  = mysqli_num_rows($expired_listing_result);

// for registration
$default_registration_query = "SELECT  * FROM `users_entries` Where `is_verified_email` LIKE '1'";
$default_registration_result = mysqli_query($connect, $default_registration_query);
$default_registration_count  = mysqli_num_rows($default_registration_result);

$active_registration_query = "SELECT  * FROM `users_entries` Where `is_verified_email` LIKE '1' and `is_verified_admin` LIKE '1'  ";
$active_registration_result = mysqli_query($connect, $active_registration_query);
$active_registration_count  = mysqli_num_rows($active_registration_result);

$pending_registration_query = "SELECT  * FROM `users_entries` Where `is_verified_email` LIKE '1' and `is_verified_admin` LIKE '0'  ";
$pending_registration_result = mysqli_query($connect, $pending_registration_query);
$pending_registration_count  = mysqli_num_rows($pending_registration_result);

$expired_registration_query = "SELECT  * FROM `users_entries` Where `is_verified_email` LIKE '1' and `is_verified_admin` LIKE '2' ";
$expired_registration_result = mysqli_query($connect, $expired_registration_query);
$expired_registration_count  = mysqli_num_rows($expired_registration_result);

// for user management
$user_query = "SELECT  * FROM `users_entries` where user_type like 'user' and `is_verified_email` LIKE '1'  ";
$user_result = mysqli_query($connect, $user_query);
$user_count  = mysqli_num_rows($user_result);

$registration_manager_query = "SELECT  * FROM `users_entries` WHERE user_type like 'registration_manager' and `is_verified_admin` LIKE '1' and `is_verified_email` LIKE '1'  ";
$registration_manager_result = mysqli_query($connect, $registration_manager_query);
$registration_manager_count  = mysqli_num_rows($registration_manager_result);

$inspection_manager_query = "SELECT  * FROM `users_entries` WHERE user_type like 'inspector' and `is_verified_admin` LIKE '1' and `is_verified_email` LIKE '1'  ";
$inspection_manager_result = mysqli_query($connect, $inspection_manager_query);
$inspection_manager_count  = mysqli_num_rows($inspection_manager_result);

$data_analyst_query = "SELECT  * FROM `users_entries` WHERE user_type like 'data_analyst' and `is_verified_admin` LIKE '1' and `is_verified_email` LIKE '1' ";
$data_analyst_result = mysqli_query($connect, $data_analyst_query);
$data_analyst_count  = mysqli_num_rows($data_analyst_result);

$user_manager_query = "SELECT  * FROM `users_entries` WHERE user_type like 'user_manager' and `is_verified_admin` LIKE '1' and `is_verified_email` LIKE '1' ";
$user_manager_result = mysqli_query($connect, $user_manager_query);
$user_manager_count  = mysqli_num_rows($user_manager_result);

$listing_manager_query = "SELECT  * FROM `users_entries` WHERE user_type like 'listing_manager' and `is_verified_admin` LIKE '1' and `is_verified_email` LIKE '1' ";
$listing_manager_result = mysqli_query($connect, $listing_manager_query);
$listing_manager_count  = mysqli_num_rows($listing_manager_result);


  if(($_SESSION['user_type'] == 'user')&& ($_SESSION['is_verified_admin'] != '0')){
    include "user_navbar.php";
  }
  if(($_SESSION['user_type'] == 'buyer')&& ($_SESSION['is_verified_admin'] != '0')){
    include "buyer_navbar.php";
  }

  if(($_SESSION['user_type'] == 'admin')&& ($_SESSION['is_verified_admin'] != '0')){
    include "admin_navbar.php";
  }
  if(($_SESSION['user_type'] == 'user_manager')&& ($_SESSION['is_verified_admin'] != '0')){
    include "user_manager_navbar.php";
  }
  if(($_SESSION['user_type'] == 'listing_manager')&& ($_SESSION['is_verified_admin'] != '0')){
    include "listing_manager_navbar.php";
  }
  if(($_SESSION['user_type'] == 'registration_manager')&& ($_SESSION['is_verified_admin'] != '0')){
    include "registration_manager_navbar.php";
  }
  if(($_SESSION['user_type'] == 'inspector')&& ($_SESSION['is_verified_admin'] != '0')){
    include "inspector_navbar.php";
  }
  if(($_SESSION['user_type'] == 'data_analyst')&& ($_SESSION['is_verified_admin'] != '0')){
    include "data_analyst_navbar.php";
  }
}else {
  include "stranger_navbar.php";
}

// echo"hello";
// var_dump($_SESSION);
// echo"hello";
?>