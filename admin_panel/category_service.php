<?php

include "../db.php";

if (isset($_POST['delete'])) {
  $category_id = $_POST['category_id'];
  $delete_query  = "DELETE FROM `category` WHERE `category`.`category_id` = $category_id";
  $delete_result = mysqli_query($connect, $delete_query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['snoEdit'])) {
  
    $nameEdit = $_POST['nameEdit'];
    $brandEdit = $_POST['brandEdit'];
    $categoryEdit = $_POST['categoryEdit'];
    $priceEdit = $_POST['priceEdit'];
    $imageEdit = $_POST['imageEdit'];
    $product_id = $_POST['snoEdit'];

    $update_query = "UPDATE `product` SET `product_name` = '$nameEdit', `product_brand` = '$brandEdit', `product_category` = '$categoryEdit', `product_price` = '$priceEdit',`product_image` = '$imageEdit' WHERE `product`.`product_id` = $product_id";
    // echo$fname,$lname;

    try {
      $update_result = mysqli_query($connect, $update_query);
      // echo"here";

    } catch (Exception $e) {
      $mess = $e->getMessage();
    }
    // echo$update_result;
    // exit();
}
