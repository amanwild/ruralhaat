<?php
// $servername = "insl1";
// $username = "ruralhaat";
// $pass = "Ruralhaat@2023";
// $database = "ruralhaat";
// try {
//   $connect = mysqli_connect($servername, $username, $pass, $database);
//   $GLOBALS['connect']  = $connect;
// //   echo"connection was successfull";
// } catch (Exception $e) {

//   $mess = $e->getMessage();
//   // echo"connection unsuccessfull";

// }
$servername = "localhost";
$username = "root";
$pass = "root";
$database = "ruralhaat";
try {
  $connect = mysqli_connect($servername, $username, $pass, $database);
  $GLOBALS["connect"]  = $connect;
  // echo"connection was successfull";
} catch (Exception $e) {

  $mess = $e->getMessage();
  // echo"connection was unsuccessfull";
}
?>

