<?php
session_start();
include "../db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    try {
        $update_result = false;
        $update_query = "UPDATE `listing` SET `listing_permission` = 'Rejected' , `listing_status` = 'Expired', `listing_status_timestamp` = current_timestamp() WHERE `listing`.`listing_id` = $id";
        $update_result = mysqli_query($connect, $update_query);
    } catch (Exception $e) {
        // echo "<script> window.location.replace('http://127.0.0.1:8080/author/login/index.php');</script>";
        // echo "Data insertion failed " . "<br>";
        // echo 'Message: ' . $e->getMessage() . "<br>";
    }
    if ($update_result) {
        echo "Success listing reject";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['array_of_checked_id'])) {
    $array_of_checked_id = $_POST["array_of_checked_id"];


    $update_query = '';
    foreach ($array_of_checked_id as $id) {
        $update_query = "UPDATE `listing` SET `listing_permission` = 'Rejected' , `listing_status` = 'Expired', `listing_status_timestamp` = current_timestamp() WHERE `listing`.`listing_id` = $id;";
        try {
            echo $update_query;
            $update_result = mysqli_query($connect, $update_query);
        } catch (Exception $e) {
            $mess = $e->getMessage();
        }
    }
    if (true) {
        foreach ($array_of_checked_id as $id) {
            echo "\n";
            echo $id . "\n";
        }
    }
    if ($update_result) {
        echo "Success listing reject";
    }
}
