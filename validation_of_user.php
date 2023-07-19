
<?php

session_start();
// $loggedin = $_SESSION['loggedin'];
// $user = $_SESSION['user_Username'];
// // echo $loggedin;
// // // echo "<br>";
// // echo $user;
// // // echo "<br>";
// if (isset($_SESSION['user_type']) && isset($_SESSION['is_verified_admin'])) {
//   if(($_SESSION['user_type'] == 'admin')&& ($_SESSION['is_verified_admin'] == '1')){
//     include "admin_navbar.php";
//   }
//   if(($_SESSION['user_type'] == 'user')&& ($_SESSION['is_verified_admin'] == '1')){
//     include "user_navbar.php";
//   }
// }else {
//   include "stranger_navbar.php";
// }


if (((isset($_SESSION['user_username'])||($_SESSION['user_type']=='admin')) &&(($_SESSION['user_type']=='user')&& ($_SESSION['is_verified_admin'] == '1')))) {
  // $user_first_name =$_SESSION['user_first_name'];
  // $user_last_name = $_SESSION['user_last_name'];
  // $user_email =$_SESSION['user_email'];
  // $user_username =$_SESSION['user_username'] ; 
  // $user_id =$_SESSION['user_id'];


  if(isset($_SESSION['user_image'])){
    $user_image =$_SESSION['user_image'];
  }
  if(isset($_SESSION['user_image_url'])){
    $user_image_url =$_SESSION['user_image_url'];
  }
  if(isset($_SESSION['user_phone'])){
    $user_phone =$_SESSION['user_phone'];
  }
  if(isset($_SESSION['user_email'])){
    $user_email =$_SESSION['user_email'];
  }
  // echo$user_First_name .$user_Last_name . $user_Email. $user_Username.$user_Id;  echo "Valid user";
} else {
  // echo "INVALID user";
  // echo "<br>";
  // $path  = "Signin";
  header("location: ../login/index.php");
}
include "db.php";


$select_query = "SELECT * FROM `users_entries` WHERE `user_id` = " . $_SESSION['user_id'];
$select_result  = mysqli_query($connect, $select_query);
$num = mysqli_num_rows($select_result);
if ($num > 0) {
  while ($row = mysqli_fetch_assoc($select_result)) {
    $_SESSION['user_image'] = $row['user_image'];
    $_SESSION['user_first_name'] = $row['user_first_name'];
    $_SESSION['user_last_name'] = $row['user_last_name'];
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_phone'] = $row['user_phone'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['user_request_for_seller'] = $row['user_request_for_seller'];
  }
}
?>