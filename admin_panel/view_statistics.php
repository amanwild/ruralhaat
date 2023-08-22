<?php include "../validation_of_admin.php"; ?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>Statistics</title>
<?php include "../theme/head_data.php"; ?>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"> -->

  <!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

  <style>
    .table_edit_btn {
      font-weight: lighter !important;
      padding: 0px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
      font-size: 25px !important;
      color: white !important;
      background-color: white !important;
      /* border-color: #007bff !important; */
      margin: 0px !important;
    }

    .table_delete_btn {
      padding-top: 6px !important;
      padding-bottom: 6px !important;
      font-size: 15px !important;
      color: white !important;
      background-color: white !important;
      /* border-color: red !important; */
      margin: 0px !important;
      margin-bottom: 1px !important;
    }



    .table_botton {
      /* margin: 10px !important; */
      /* width: 150px !important; */
      padding: 5px !important;
      /* color:white !important; */
      /* background-color:green !important; */
    }

    .table_botton button {
      font-size: 14px !important;
      margin: 0px !important;
      width: 100% !important;
      padding: 5px !important;
      color: white !important;
      background-color: green !important;
      border-color: green !important;

    }

    .table_label {
      margin: 10px !important;
      width: 150px !important;
      padding: 5px !important;
      border-bottom: 1px solid black;
    }

    .table_botton button:hover {
      /* margin: 10px !important;
            width: 150px !important; */
      /* padding: 5px !important; */
      color: green !important;
      background-color: white !important;
    }

    th {
      font-weight: lighter !important;
      /* color:white !important; */
      background-color: #dce7fc !important;
      margin-right: 1px !important;
    }

    /* table.addlocation {
            table-layout: auto;
            width: 100%;
        } */
    table.d {
      table-layout: fixed;
      width: 100%;
    }

    .tbl_head {
      font-weight: 1000 !important;
      font-size: 15x;
    }

    .table_input {
      margin: 10px !important;
      /* width: 150px !important; */
      padding: 5px !important;
    }

    .table_input input {
      font-size: 14px !important;
      margin: 0px !important;
      width: 100% !important;
      padding: 5px !important;
    }
  </style>

  <style>
    /* The check_container */
    .check_container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .check_container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark_for_select {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .check_container:hover input~.checkmark_for_select {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .check_container input:checked~.checkmark_for_select {
      background-color: #2196F3;
    }

    /* Create the checkmark_for_select/indicator (hidden when not checked) */
    .checkmark_for_select:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark_for_select when checked */
    .check_container input:checked~.checkmark_for_select:after {
      display: block;
    }

    /* Style the checkmark_for_select/indicator */
    .check_container .checkmark_for_select:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
  </style>
</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <?php include "../navbar/admin_navbar.php" ?>

  <!-- <div id="main_wrapper " style="padding:10px">
    <div class="clearfix"></div>
    <div id="dashboard">

      <div class="row text-center">
        <div style="padding:px;" class="col-lg-2 col-md-6">
          <div style="padding:5px;box-shadow: 0 7px 15px 0 rgba(0,0,0,0.15);background-color:#4f17ed ;color:white;"><a href="#">
              <div class="utf_dashboard_stat color-1">
                <div class="utf_dashboard_stat_content">
                  <h4 style="color:white;"></h4>
                  <span style="font-size: 14px; margin-top: 5px; line-height: 22px; font-weight: 400; color:white; opacity: 0.95; display: inline-block;">Total Admin</span>
                </div>
                <div class="utf_dashboard_stat_icon">
                  <i class="im im-icon-Map2"></i>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div style="padding:px;" class="col-lg-2 col-md-6">
          <div style="padding:5px;box-shadow: 0 7px 15px 0 rgba(0,0,0,0.15);background-color:green ;color:white;"><a href="#">
              <div class="utf_dashboard_stat color-1">
                <div class="utf_dashboard_stat_content">
                  <h4 style="color:white;"></h4>
                  <span style="font-size: 14px; margin-top: 5px; line-height: 22px; font-weight: 400; color:white; opacity: 0.95; display: inline-block;">Total Registration Manager</span>
                </div>
                <div class="utf_dashboard_stat_icon">
                  <i class="im im-icon-Map2"></i>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div style="padding:px;" class="col-lg-2 col-md-6">
          <div style="padding:5px;box-shadow: 0 7px 15px 0 rgba(0,0,0,0.15);background-color: #f1c40f ;color:white;">
            <a href="#">
              <div class="utf_dashboard_stat color-2">
                <div class="utf_dashboard_stat_content">
                  <h4 style="color:white;"></h4>
                  <span style="font-size: 14px; margin-top: 5px; line-height: 22px; font-weight: 400; color:white; opacity: 0.95; display: inline-block;">Total Inspection Manager</span>
                </div>
                <div class="utf_dashboard_stat_icon">
                  <i class="im im-icon-Add-UserStar"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div style="padding:px;" class="col-lg-2 col-md-6">
          <div style="padding:5px;box-shadow: 0 7px 15px 0 rgba(0,0,0,0.15);background-color:#ff2222;color:white;">
            <a href="#">
              <div class="utf_dashboard_stat color-3">
                <div class="utf_dashboard_stat_content">
                  <h4 style="color:white;"></h4>
                  <span style="font-size: 14px; margin-top: 5px; line-height: 22px; font-weight: 400; color:white; opacity: 0.95; display: inline-block;">Total Data Analyst</span>
                </div>
                <div class="utf_dashboard_stat_icon">
                  <i class="im im-icon-Align-JustifyRight"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div style="padding:px;" class="col-lg-2 col-md-6">
          <div style="padding:5px;box-shadow: 0 7px 15px 0 rgba(0,0,0,0.15);background-color:#f98925;color:white;">
            <a href="#">
              <div class="utf_dashboard_stat color-3">
                <div class="utf_dashboard_stat_content">
                  <h4 style="color:white;"></h4>
                  <span style="font-size: 14px; margin-top: 5px; line-height: 22px; font-weight: 400; color:white; opacity: 0.95; display: inline-block;">Total User Manager</span>
                </div>
                <div class="utf_dashboard_stat_icon">
                  <i class="im im-icon-Align-JustifyRight"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div style="padding:px;" class="col-lg-2 col-md-6">
          <div style="padding:5px;box-shadow: 0 7px 15px 0 rgba(0,0,0,0.15);background-color:#ea3986;color:white;">
            <a href="#">
              <div class="utf_dashboard_stat color-3">
                <div class="utf_dashboard_stat_content">
                  <h4 style="color:white;"></h4>
                  <span style="font-size: 14px; margin-top: 5px; line-height: 22px; font-weight: 400; color:white; opacity: 0.95; display: inline-block;">Total Listing Manager</span>
                </div>
                <div class="utf_dashboard_stat_icon">
                  <i class="im im-icon-Align-JustifyRight"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div id="showLocatonContent" class="d-flex text-center mt-3 ">
    <h1 class=" my-auto mr-auto d-inline"> Category Wise View Count</h1>
  </div>



  <div id="admin_table" class="container " style="padding-top:15px;padding-bottom:80px;">




    <div class="table-responsive" style="border:3px solid grey;padding:5px;">
      <table data-role="table" class="table ui-responsive datatable  " id="myTable">
        <thead>
          <tr>
            <th class="tbl_head" scope="col">Sr. No.</th>
            <th class="tbl_head" scope="col">All Category </th>
            <?php 
            $select_category_query = "SELECT * FROM `category` ORDER BY `category`.`category_name` ASC";
            // echo$fname,$lname;
            try {
              $select_category_result = mysqli_query($connect, $select_category_query);
              $num  = mysqli_num_rows($select_category_result);
            } catch (Exception $e) {
              $mess = $e->getMessage();
            }
            if ($num > 0) {
              $sno = 0;
              while ($row = mysqli_fetch_assoc($select_category_result)) {
                $category_id = $row["category_id"] ?>

                <th class="tbl_head" scope="col"><?= $row["category_name"] ?> </th>

            <?php
              }
            }
            ?>
            <th class="tbl_head" scope="col">Profile</th>
            <th class="tbl_head" scope="col">Username</th>
            <th class="tbl_head" scope="col">Email</th>
            <th class="tbl_head" scope="col">Phone</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $select_query = "SELECT * FROM `users_entries` WHERE is_verified_email = 1 order by user_username asc";
          // echo$fname,$lname;
          try {
            $select_result = mysqli_query($connect, $select_query);
            $num  = mysqli_num_rows($select_result);
          } catch (Exception $e) {
            $mess = $e->getMessage();
          }
          if ($num > 0) {
            $sno = 0;
            while ($row = mysqli_fetch_assoc($select_result)) {
              $sno += 1;
              $user_id = $row["user_id"];
              $user_username = $row["user_username"];
              $user_first_name = $row["user_first_name"];
              $user_last_name = $row["user_last_name"];
              $user_phone = $row["user_phone"];
              $user_email = $row["user_email"];
              $user_image = $row["user_image"];


              $select_listing_query = "SELECT sum(listing_view_count) as Total_view_count FROM `listing` WHERE listing_owner_id  =$user_id";
              // echo$fname,$lname;
              try {
                $select_listing_result = mysqli_query($connect, $select_listing_query);
                $num  = mysqli_num_rows($select_listing_result);
              } catch (Exception $e) {
                $mess = $e->getMessage();
              }
              if ($num > 0) {
                while ($row = mysqli_fetch_assoc($select_listing_result)) {
                  $Total_view_count = $row["Total_view_count"];
                }
              }



          ?>
              <tr>
                <td><?= $sno ?></td>
                <td><?php if($Total_view_count == ''){echo'0';}else{echo $Total_view_count;} ?></td>
                <?php
                $select_category_query = "SELECT * FROM `category` ORDER BY `category`.`category_name` ASC";
                // echo$fname,$lname;
                try {
                  $select_category_result = mysqli_query($connect, $select_category_query);
                  $num_for_category  = mysqli_num_rows($select_category_result);
                } catch (Exception $e) {
                  $mess = $e->getMessage();
                }
                if ($num_for_category > 0) {

                  while ($row = mysqli_fetch_assoc($select_category_result)) {
                    $select_count_by_category_query = "SELECT sum(listing_view_count) as listing_view_count FROM `listing` WHERE listing_category_id = " . $row["category_id"] . " and listing_owner_id  = $user_id ";
                    // echo$fname,$lname;
                    try {
                      $select_count_by_category_result = mysqli_query($connect, $select_count_by_category_query);
                      $num_for_count_by_category  = mysqli_num_rows($select_count_by_category_result);
                    } catch (Exception $e) {
                      $mess = $e->getMessage();
                    }
                    if ($num_for_count_by_category > 0) {

                      while ($row_for_category_count = mysqli_fetch_assoc($select_count_by_category_result)) {
                ?>
                        <td><?php if($row_for_category_count["listing_view_count"] ==''){echo'0';}else{echo$row_for_category_count["listing_view_count"];} ?></td>

                <?php
                      }
                    }
                  }
                }
                ?>

                <td><img src="../wp-content/uploads/data/<?= $user_image ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;max-height: 32px;" class="mr-3 p-1" alt="." /></td>

                <td><?= $user_username ?></td>
                <td><?= $user_email ?></td>
                <td><?= $user_phone ?></td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td class='text-center' colspan='6'>No Data Found</td></tr>";
          }
          ?>
        </tbody>
      </table>

    </div>




  </div>

  <?php include "../footer/verified_footer.php" ?>

</body>

<?php include "../theme/body_data.php"; ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
  function show_table() {

    console.log("success");

  }
</script>



<?php include "./admin_script.php" ?>
<!-- for jquery table plugin  -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>


</html>