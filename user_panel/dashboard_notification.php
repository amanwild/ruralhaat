<?php include "../validation_of_user.php" ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_messages.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/mmenu.css">
  <link rel="stylesheet" href="css/perfect-scrollbar.css">
  <link rel="stylesheet" href="css/style.css" id="colors">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
</head>

<body>

  <?php include "./component/preloader.php" ?>
  <?php include "./service/pick_ago_time.php" ?>


  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/header.php" ?>

    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
      <?php include "./component/user_sidebar_navbar.php" ?>

      <script>
        var d = document.getElementById("user_dashboard_notification");
        d.className += "active";
      </script>

      <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
          <div class="row">
            <div class="col-md-12">
              <h2>Notification</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li>Notification</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="utf_dashboard_list_box margin-top-0">
              <h4 class="gray"><i class="fa fa-envelope-o"></i> Notification</h4>
              <div class="utf_user_messages_block">
                <ul class="paginationTable">
                  <?php
                  $select_all_listing_query = "SELECT listing_id FROM `listing` WHERE listing_owner_id = " . $_SESSION['user_id'];
                  try {
                    // echo $select_all_listing_query;
                    $select_all_listing_result = 0;
                    if ($connect) {
                      $select_all_listing_result = mysqli_query($connect, $select_all_listing_query);
                      if ($select_all_listing_result) {
                        $select_all_listing_num = mysqli_num_rows($select_all_listing_result);
                      }
                    }
                  } catch (Exception $e) {
                    $mess = $e->getMessage();
                  }
                  $all_listing = [];
                  if ($select_all_listing_num > 0) {
                    while ($row_for_all_listing = mysqli_fetch_assoc($select_all_listing_result)) {
                      $all_listing[] = $row_for_all_listing['listing_id'];
                    }
                  }
                  // echo "<br>here";
                  // // echo $all_listing[1];
                  // echo implode('',$all_listing);
                  // echo "<br>";
                  // echo "<br>";
                  // echo "<pre>";
                  // var_dump($all_listing);
                  // echo "<pre>";
                  // echo "<br>";
                  // echo "<br>";
                  $select_interaction_query = "
                  (
                    SELECT DISTINCT(interaction_id) as id,
                        interaction_timestamp as timestamp,
                        interaction_way as way,
                        interaction_type as type,
                        interaction_by_user_id as by_user_id,
                        interaction_on_listing_id as on_listing_id,
                        ('') as sender_user_id,
                        interaction_by_user_type as sender_enquery_id,
                        (interaction_seen) as seen
                    FROM `user_interaction`
                    where user_interaction.interaction_on_user_id = " . $_SESSION['user_id'] . "
                  )
                  UNION all
                  (
                  SELECT DISTINCT(message_id) as id,
                    message_timestamp as timestamp,
                    ('message') as way,
                    ('contact') as type,
                    ('') as by_user_id,
                    ('') as on_listing_id,
                    (message_sender_user_id) as sender_user_id,
                    (message_sender_enquery_id) as sender_enquery_id,
                    (message_seen) as seen
                  FROM `message`
                  where message.message_receiver_user_id = " . $_SESSION['user_id'] . "
                  )
                  UNION all
                  (
                  SELECT DISTINCT(report_id) as id,
                    report_timestamp as timestamp,
                    ('report') as way,
                    report_message as type,
                    (report_by_user_id) as by_user_id,
                    (report_on_listing_id) as on_listing_id,
                    ('') as sender_user_id,
                    report_other_message as sender_enquery_id,
                    (report_seen) as seen
                  FROM `report`
                  where report.report_on_listing_id in (" . implode(',', $all_listing) . ")
                  )
                  UNION all
                  (
                  SELECT DISTINCT(listing_id) as id,
                    listing_permission_timestamp as timestamp,
                    ('permission_status') as way,
                    listing_permission as type,
                    ('') as by_user_id,
                    (listing_id) as on_listing_id,
                    ('') as sender_user_id,
                    ('') as sender_enquery_id,
                    (listing_seen) as seen
                  FROM `listing`
                  where listing.listing_id in (" . implode(',', $all_listing) . ")
                  )
                  UNION all
                  (
                  SELECT DISTINCT(listing_id) as id,
                    listing_status_timestamp as timestamp,
                    ('listing_status') as way,
                    listing_status as type,
                    ('') as by_user_id,
                    (listing_id) as on_listing_id,
                    ('') as sender_user_id,
                    ('') as sender_enquery_id,
                    (listing_seen) as seen
                  FROM `listing`
                  where listing.listing_id in (" . implode(',', $all_listing) . ")
                  ) ORDER BY TIMESTAMP DESC";
                  try {
                    echo $select_interaction_query;
                    $select_interaction_result = 0;
                    if ($connect) {
                      $select_interaction_result = mysqli_query($connect, $select_interaction_query);
                      if ($select_interaction_result) {
                        $select_interaction_num = mysqli_num_rows($select_interaction_result);
                      }
                    }
                  } catch (Exception $e) {
                    $mess = $e->getMessage();
                  }
                  if ($select_interaction_num > 0) {
                    while ($row_for_interaction = mysqli_fetch_assoc($select_interaction_result)) {
                      $interaction_timestamp = $row_for_interaction['timestamp'];

                      $interaction_timestamp = time_elapsed_string($interaction_timestamp);
                      $interaction_id = $row_for_interaction['id'];
                      $interaction_way = $row_for_interaction['way'];
                      $interaction_type = $row_for_interaction['type'];

                      $by_user_id = $row_for_interaction['by_user_id'];
                      $on_listing_id = $row_for_interaction['on_listing_id'];
                      $sender_user_id = $row_for_interaction['sender_user_id'];
                      $sender_enquery_id = $row_for_interaction['sender_enquery_id'];
                      $seen = $row_for_interaction['seen'];


                      // echo $interaction_id;

                      if ($seen == '0') {
                        $update_seen_status_query = "UPDATE `user_interaction` SET `interaction_seen` = '1' WHERE `user_interaction`.`interaction_id` = " . $interaction_id;

                        if ($interaction_way == 'report') {
                          $update_seen_status_query = "UPDATE `report` SET `report_seen` = '1' WHERE `report`.`report_id` = " . $interaction_id;
                        }
                        if ($interaction_way == 'message') {
                          $update_seen_status_query = "UPDATE `message` SET `message_seen` = '1' WHERE `message`.`message_id` =" . $interaction_id;
                        }
                        if ($interaction_way == 'permission_status' || $interaction_way == 'listing_status') {
                          $update_seen_status_query = "UPDATE `listing` SET `listing_seen` = '1' WHERE `listing`.`listing_id` =" . $interaction_id;
                        }


                        if ($update_seen_status_query != '') {
                          try {
                            $update_seen_status_result = mysqli_query($connect, $update_seen_status_query);
                          } catch (Exception $e) {
                            $mess = $e->getMessage();
                          }
                        }
                      }




                      if ($sender_user_id != 'enquery') {

                        $select_interaction_by_user_id_query = '';
                        if ($by_user_id != '' && $by_user_id != '0') {
                          $select_interaction_by_user_id_query = 'SELECT * FROM `users_entries` WHERE `user_id` = ' . $by_user_id;
                        }
                        if ($sender_user_id != '' && $sender_user_id != '0') {
                          $select_interaction_by_user_id_query = 'SELECT * FROM `users_entries` WHERE `user_id` = ' . $sender_user_id;
                        }
                        
                        if ($select_interaction_by_user_id_query != '') {
                          try {
                            // echo $select_interaction_by_user_id_query;
                            $select_interaction_by_user_id_result = 0;
                            if ($connect) {
                              $select_interaction_by_user_id_result = mysqli_query($connect, $select_interaction_by_user_id_query);
                              if ($select_interaction_by_user_id_result) {
                                $select_interaction_by_user_id_num = mysqli_num_rows($select_interaction_by_user_id_result);
                              }
                            }
                          } catch (Exception $e) {
                            $mess = $e->getMessage();
                          }
                          if ($select_interaction_by_user_id_num > 0) {
                            while ($row_for_interaction_by_user_id = mysqli_fetch_assoc($select_interaction_by_user_id_result)) {
                              $interaction_user_type = $row_for_interaction_by_user_id['user_type'];
                              $interaction_user_first_name = $row_for_interaction_by_user_id['user_first_name'];
                              $interaction_user_last_name = $row_for_interaction_by_user_id['user_last_name'];
                              $interaction_user_username = $row_for_interaction_by_user_id['user_username'];
                              $interaction_user_image = $row_for_interaction_by_user_id['user_image'];
                            }
                          }
                          // echo "interaction_user_type " . $interaction_user_type . "<br>";
                          // echo "interaction_user_first_name " . $interaction_user_first_name . "<br>";
                          // echo "interaction_user_last_name " . $interaction_user_last_name . "<br>";
                          // echo "interaction_user_username " . $interaction_user_username . "<br>";
                          // echo "interaction_user_image " . $interaction_user_image . "<br>";
                        }
                      }

                      if($sender_enquery_id !='stranger'){

                      
                      $select_interaction_sender_enquery_id_query = '';
                      if (($sender_enquery_id != '' && $sender_enquery_id != '0') && ($interaction_type != 'post_other')) {
                        $select_interaction_sender_enquery_id_query = 'SELECT * FROM `enquery` WHERE `enquery_id` =' . $sender_enquery_id;
                      }

                      // if (($sender_enquery_id != 'enquery' || $sender_enquery_id != 'normal_user')) {
                       
                        if ($sender_enquery_id == 'enquery' || $sender_enquery_id == 'normal_user') {
                          $select_interaction_sender_enquery_id_query = 'SELECT * FROM `enquery` WHERE `enquery_id` =' . $by_user_id;
                        }
                      // }

                      // 
                      // echo'$select_interaction_sender_enquery_id_query';
                      // echo$select_interaction_sender_enquery_id_query;
                      // echo'$select_interaction_sender_enquery_id_query <br>';
                      if ($select_interaction_sender_enquery_id_query != '') {
                        try {
                          // echo $select_interaction_sender_enquery_id_query;
                          $select_interaction_sender_enquery_id_result = 0;
                          if ($connect) {
                            $select_interaction_sender_enquery_id_result = mysqli_query($connect, $select_interaction_sender_enquery_id_query);
                            if ($select_interaction_sender_enquery_id_result) {
                              $select_interaction_sender_enquery_id_num = mysqli_num_rows($select_interaction_sender_enquery_id_result);
                            }
                          }
                        } catch (Exception $e) {
                          $mess = $e->getMessage();
                        }
                        if ($select_interaction_sender_enquery_id_num > 0) {
                          while ($row_for_interaction_sender_enquery_id = mysqli_fetch_assoc($select_interaction_sender_enquery_id_result)) {
                            $interaction_user_type = 'enquery_user';
                            $interaction_user_first_name = $row_for_interaction_sender_enquery_id['enquery_first_name'];
                            $on_listing_id = $row_for_interaction_sender_enquery_id['enquery_listing_id'];
                            $interaction_user_last_name = $row_for_interaction_sender_enquery_id['enquery_last_name'];
                            // $interaction_seen = $row_for_interaction_sender_enquery_id['enquery_seen'];
                            $interaction_user_username = '';
                            $interaction_user_image = '';
                            $interaction_way = 'enquery';
                          }
                        }
                        // echo "interaction_user_type " . $interaction_user_type . "<br>";
                        // echo "interaction_user_first_name " . $interaction_user_first_name . "<br>";
                        // echo "interaction_user_last_name " . $interaction_user_last_name . "<br>";
                        // echo "interaction_user_username " . $interaction_user_username . "<br>";
                        // echo "interaction_user_image " . $interaction_user_image . "<br>";
                      }
                    }

                      if ($on_listing_id != '' && $on_listing_id != '0') {
                        $select_interaction_on_listing_id_query = 'SELECT * FROM `listing` WHERE `listing_id` = ' . $on_listing_id;
                        try {
                          // // echo $select_interaction_on_listing_id_query;
                          $select_interaction_on_listing_id_result = 0;
                          if ($connect) {
                            $select_interaction_on_listing_id_result = mysqli_query($connect, $select_interaction_on_listing_id_query);
                            if ($select_interaction_on_listing_id_result) {
                              $select_interaction_on_listing_id_num = mysqli_num_rows($select_interaction_on_listing_id_result);
                            }
                          }
                        } catch (Exception $e) {
                          $mess = $e->getMessage();
                        }
                        if ($select_interaction_on_listing_id_num > 0) {
                          while ($row_for_interaction_on_listing_id = mysqli_fetch_assoc($select_interaction_on_listing_id_result)) {
                            $interaction_listing_title = $row_for_interaction_on_listing_id['listing_title'];
                            $interaction_listing_image = $row_for_interaction_on_listing_id['listing_image'];
                            $interaction_listing_image = $row_for_interaction_on_listing_id['listing_image'];
                          }
                        }

                        // echo "interaction_listing_title " . $interaction_listing_title . "<br>";
                        // echo "interaction_listing_image " . $interaction_listing_image . "<br>";
                      }

                      // echo "interaction_way " . $interaction_way . "<br>";
                      // echo "interaction_type " . $interaction_type . "<br>";
                      // echo "interaction_timestamp " . $row_for_interaction['timestamp'] . "<br>";
                      // echo "<br>".$interaction_timestamp;



                      if ($interaction_way == 'listing_status' && $interaction_type == 'Active') {
                        // echo "facebook ";
                  ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-check-circle"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> is Active <?php if ($seen == '1') {
                                                                                                } else {
                                                                                                  echo '<i>New</i>';
                                                                                                } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>
                      <?php
                      }
                      if ($interaction_way == 'listing_status' && $interaction_type == 'Pending') {
                        // echo "facebook ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 ">
                            <i class="fa fa-clock-o" style="background-color:#e8e800;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> is Pending <?php if ($seen == '1') {
                                                                                                  } else {
                                                                                                    echo '<i>New</i>';
                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>
                      <?php
                      }
                      if ($interaction_way == 'listing_status' && $interaction_type == 'Expired') {
                        // echo "facebook ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 red">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> is Expired <?php if ($seen == '1') {
                                                                                                  } else {
                                                                                                    echo '<i>New</i>';
                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>
                      <?php
                      }
                      if ($interaction_way == 'permission_status' && $interaction_type == 'Approved') {
                        // echo "facebook ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-check"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> is Approved <?php if ($seen == '1') {
                                                                                                  } else {
                                                                                                    echo '<i>New</i>';
                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>
                      <?php
                      }
                      if ($interaction_way == 'permission_status' && $interaction_type == 'Pending') {
                        // echo "facebook ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 ">
                            <i class="fa fa-clock-o" style="background-color:#e8e800;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> is Pending <?php if ($seen == '1') {
                                                                                                  } else {
                                                                                                    echo '<i>New</i>';
                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>
                      <?php
                      }
                      if ($interaction_way == 'permission_status' && $interaction_type == 'Rejected') {
                        // echo "facebook ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 red">
                            <i class="fa fa-close"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> is Rejected <?php if ($seen == '1') {
                                                                                                  } else {
                                                                                                    echo '<i>New</i>';
                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>
                      <?php
                      }
                      if ($interaction_way == 'facebook' && $interaction_type == 'share') {
                        // echo "facebook ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-facebook" style="background-color:#3b5998;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> has been Shared on Facebook By <b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b><?php if ($seen == '1') {
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo '<i>New</i>';
                                                                                                                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>
                      <?php
                      }

                      if ($interaction_way == 'whatsapp'  && $interaction_type == 'share') {
                        // echo "whatsapp ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-whatsapp" style="background-color:#25d366;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> has been Shared on Whatsapp By <b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b><?php if ($seen == '1') {
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo '<i>New</i>';
                                                                                                                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>

                      <?php
                      }
                      if ($interaction_way == 'email' && $interaction_type == 'visit') {
                        // echo "email ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-envelope" style="background-color:#0071e3;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5><b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b> has been click on your Email<?php if ($seen == '1') {
                                                                                                                                          } else {
                                                                                                                                            echo '<i>New</i>';
                                                                                                                                          } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>


                      <?php
                      }
                      if ($interaction_way == 'google' && $interaction_type == 'visit') {
                        // echo "google ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-google" style="background-color:#DB4437;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5><b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b> has been click on your Google link<?php if ($seen == '1') {
                                                                                                                                                } else {
                                                                                                                                                  echo '<i>New</i>';
                                                                                                                                                } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>

                      <?php
                      }
                      if ($interaction_way == 'youtube' && $interaction_type == 'visit') {
                        // echo "youtube ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-youtube" style="background-color:#FF0000;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5><b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b> been click on your Youtube link<?php if ($seen == '1') {
                                                                                                                                              } else {
                                                                                                                                                echo '<i>New</i>';
                                                                                                                                              } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>

                      <?php
                      }
                      if ($interaction_way == 'tel' && $interaction_type == 'visit') {
                        // echo "contact ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-phone" style="background-color:#78b4d5;"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5><b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b> been click on your phone no.<?php if ($seen == '1') {
                                                                                                                                          } else {
                                                                                                                                            echo '<i>New</i>';
                                                                                                                                          } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>

                      <?php
                      }
                      if ($interaction_way == 'enquery' && $interaction_type == 'contact') {
                        // echo "contact ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-envelope"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>You Have Unread Enquery from <b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b><?php if ($seen == '1') {
                                                                                                                                          } else {
                                                                                                                                            echo '<i>New</i>';
                                                                                                                                          } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>

                      <?php
                      }
                      if ($interaction_way == 'message' && $interaction_type == 'contact') {
                        // echo "contact ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 green">
                            <i class="fa fa-envelope"></i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>You Have Unread Message from <b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b><?php if ($seen == '1') {
                                                                                                                                          } else {
                                                                                                                                            echo '<i>New</i>';
                                                                                                                                          } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>

                      <?php
                      }
                      if ($interaction_way == 'report') {
                        // echo "contact ";
                      ?>
                        <li class="tableItem dashboard_notifi_item ">
                          <div class="bg-c1 red">
                            <i class="fa fa-">!</i>
                          </div>
                          <div class="content utf_message_headline_item utf_message_headline_text" style="margin-left:0px;">
                            <h5>Your Listing <b><?= $interaction_listing_title ?></b> has been Reported for <?php if ($interaction_type != 'post_other') {
                                                                                                              echo $interaction_type;
                                                                                                            } else {
                                                                                                              echo $sender_enquery_id;
                                                                                                            } ?> By <b><?= $interaction_user_first_name ?> <?= $interaction_user_last_name ?></b><?php if ($seen == '1') {
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo '<i>New</i>';
                                                                                                                                                                                                  } ?></h5>
                            <span class="date"><i class="fa fa-clock-o"></i> <?= $interaction_timestamp ?> </span>
                          </div>
                        </li>

                      <?php
                      }
                      ?>

                  <?php
                    }
                  }
                  ?>

                </ul>
              </div>
            </div>
            <div class="clearfix"></div>
            <style>
              .customPagination,
              .paginacaoCursor {
                /* color:white; */
                border-radius: 50%;
                width: 40px;
                height: 40px;
                padding: 0;
                font-weight: 700;
                line-height: 40px;
                margin: 5px;
                background-color: #e7e7e7 !important;
                color: #333 !important;
                cursor: pointer;
              }

              .activePagination {
                background-color: #ff2222 !important;
                color: #fff !important;
              }

              #pagination-container {
                margin: auto;
                width: auto;
                text-align: center;
              }
            </style>
            <div class="utf_pagination_container_part margin-top-30 margin-bottom-30">
              <div id="pagination-container" style="display:flex;">
                <p class='paginacaoCursor' id="beforePagination">
                  <?php echo "<</p>" ?>

                <p class='paginacaoCursor' id="afterPagination">></p>
              </div>
            </div>
            <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
            <!-- <script type="text/javascript" src="HZpagination.js"></script> -->
            <script>
              $(document).ready(function() {
                var HZperPage = 100, //number of results per page
                  HZwrapper = "paginationTable", //wrapper class
                  HZlines = "tableItem", //items class
                  HZpaginationId = "pagination-container", //id of pagination container
                  HZpaginationArrowsClass = "paginacaoCursor", //set the class of pagi
                  HZpaginationColorDefault = "#fff", //default color for the pagination numbers
                  HZpaginationColorActive = "#ff2222", //color when page is clicked
                  HZpaginationCustomClass = "customPagination"; //custom class for styling the pagination (css)

                /*-------------------------F/ AHMED HIJAZI -------------------------*/
                /*------------------------- HOPE YOU LIKE -------------------------*/

                /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
                function paginationShow() {
                  if ($("#" + HZpaginationId).children().length > 8) {
                    var a = $(".activePagination").attr("data-valor");
                    if (a >= 4) {
                      var i = parseInt(a) - 3,
                        o = parseInt(a) + 2;
                      $(".paginacaoValor").hide(),
                        (exibir2 = $(".paginacaoValor").slice(i, o).show());
                    } else
                      $(".paginacaoValor").hide(),
                      (exibir2 = $(".paginacaoValor").slice(0, 5).show());
                  }
                }
                paginationShow(), $("#beforePagination").hide(), $("." + HZlines).hide();
                for (
                  var tamanhotabela = $("." + HZwrapper).children().length,
                    porPagina = HZperPage,
                    paginas = Math.ceil(tamanhotabela / porPagina),
                    i = 1; i <= paginas;

                )
                  $("#" + HZpaginationId).append(
                    "<p class='paginacaoValor " +
                    HZpaginationCustomClass +
                    "' data-valor=" +
                    i +
                    ">" +
                    i +
                    "</p>"
                  ),
                  i++,
                  $(".paginacaoValor").hide(),
                  (exibir2 = $(".paginacaoValor").slice(0, 5).show());
                $(".paginacaoValor:eq(0)")
                  .css("background", "" + HZpaginationColorActive)
                  .addClass("activePagination");
                var exibir = $("." + HZlines)
                  .slice(0, porPagina)
                  .show();
                $(".paginacaoValor").on("click", function() {
                    $(".paginacaoValor")
                      .css("background", "" + HZpaginationColorDefault)
                      .removeClass("activePagination"),
                      $(this)
                      .css("background", "" + HZpaginationColorActive)
                      .addClass("activePagination");
                    var a = $(this).attr("data-valor"),
                      i = a * porPagina,
                      o = i - porPagina;
                    $("." + HZlines).hide(),
                      (exibir = $("." + HZlines)
                        .slice(o, i)
                        .show()),
                      "1" === a ? $("#beforePagination").hide() : $("#beforePagination").show(),
                      a === "" + $(".paginacaoValor:last").attr("data-valor") ?
                      $("#afterPagination").hide() :
                      $("#afterPagination").show(),
                      paginationShow();
                  }),
                  $(".paginacaoValor").last().after($("#afterPagination")),
                  $("#beforePagination").on("click", function(e) {
                    e.stopImmediatePropagation();
                    var a = $(".activePagination").attr("data-valor"),
                      i = parseInt(a) - 1;
                    $("[data-valor=" + i + "]").click(), paginationShow();
                  }),
                  $("#afterPagination").on("click", function(e) {
                    e.stopImmediatePropagation();
                    var a = $(".activePagination").attr("data-valor"),
                      i = parseInt(a) + 1;
                    $("[data-valor=" + i + "]").click(), paginationShow();
                  }),
                  $(".paginacaoValor").css("float", "unset"),
                  $("." + HZpaginationArrowsClass).css("float", "unset");
              });
              /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
            </script>
          </div>
          <?php include "./component/footer.php" ?>

        </div>
      </div>
    </div>
  </div>
  <!-- Wrapper / End -->

  <!-- Scripts -->
  <script src="scripts/jquery-3.4.1.min.js"></script>
  <script src="scripts/chosen.min.js"></script>
  <script src="scripts/perfect-scrollbar.min.js"></script>
  <script src="scripts/slick.min.js"></script>
  <script src="scripts/rangeslider.min.js"></script>
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/color_switcher.js"></script>
  <script src="scripts/jquery_custom.js"></script>
  <script>
    (function($) {
      try {
        var jscr1 = $('.js-scrollbar');
        if (jscr1[0]) {
          const ps1 = new PerfectScrollbar('.js-scrollbar');

        }
      } catch (error) {
        console.log(error);
      }
    })(jQuery);
  </script>
  <!-- Style Switcher -->
  <div id="color_switcher_preview">
    <h2>Choose Your Color </h2>
    <div>
      <ul class="colors" id="color1">
        <li><a href="#" class="stylesheet"></a></li>
        <li><a href="#" class="stylesheet_1"></a></li>
        <li><a href="#" class="stylesheet_2"></a></li>
        <li><a href="#" class="stylesheet_3"></a></li>
        <li><a href="#" class="stylesheet_4"></a></li>
        <li><a href="#" class="stylesheet_5"></a></li>
      </ul>
    </div>
  </div>
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_messages.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:57 GMT -->

</html>