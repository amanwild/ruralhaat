<?php
if (isset($_SESSION['user_type'])) {
  if(($_SESSION['user_type'] == 'admin')){
    include "home_admin_navbar.php";
  }
  if(($_SESSION['user_type'] == 'user')){
    include "home_user_navbar.php";
  }
  if(($_SESSION['user_type'] == 'buyer')){
    include "home_buyer_navbar.php";
  }
}else {
  include "home_stranger_navbar.php";
  // echo"hello";
  // var_dump($_SESSION);
}
?>