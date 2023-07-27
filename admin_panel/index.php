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
  <title>Admin Panel</title>
  
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
      /* background-color: white !important; */
      /* border-color: #007bff !important; */
      margin: 0px !important;
    }

    .table_delete_btn {
      padding-top: 6px !important;
      padding-bottom: 6px !important;
      font-size: 15px !important;
      color: white !important;
      /* background-color: white !important; */
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
  <!-- preloader -->
  <style>
        #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
            z-index: 9999;
        }
 
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
 
        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>
</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <div id="loader" class="center"></div>
  <?php include "../navbar/index.php" ?>
  <?php include "../component/registration_count_box.php" ?>
 
  <div id="showLocatonContent" class="d-flex text-center mt-3 ">
    <h1 class=" my-auto mr-auto d-inline"> All Registrations</h1>
  </div>
  <div id="admin_table" class="container " style="padding-top:15px;padding-bottom:10px;">
    <?php
    // echo"<pre>";
    // var_dump($_SESSION);
    // echo"<pre>";
    ?>
    <div class="table-responsive" style="border:3px solid grey;padding:px;">
      <table data-role="table" class="table ui-responsive datatable  " id="myTable">
        <div id="showEditorOption" style="float:left;display:none !important;" class="d-flex text-center">
          <div class="form-group">
            <button type="" name="submit" onclick="approve_ac_with_checkbox()" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Approve</button>
            <button type="" style='background-color:red;color:white;padding:5px;font-weight:700;font-size:15px;' name="submit" class="btn  sharp btn-md btn-style-one" onclick="reject_ac_with_checkbox()" value="Send">Reject</button>
          </div>
        </div>
        <div id="showEditorBtn" style="float:left" class="d-flex text-center">
          <div class="form-group">
            <button type="" onclick="show_checkbox()" name="submit" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Edit</button>
          </div>
        </div>

        <thead>
          <tr>
            <th class="checkBoxOption" style="display:none;width: 77px !important;"><input id="check_all" type="checkbox" value="all" style="width: 205px !important;"><label for="check_all"></label></th>
            <th class="tbl_head" scope="col">Sr. No.</th>
            <th class="tbl_head" scope="col">Username </th>
            <th class="tbl_head" scope="col">User Type </th>
            <th class="tbl_head" scope="col">First Name </th>
            <th class="tbl_head" scope="col">Last Name </th>
            <th class="tbl_head" scope="col">Phone</th>
            <th class="tbl_head" scope="col">Email</th>
            <th class="tbl_head" scope="col">Since</th>
            <th class="tbl_head" scope="col">Status</th>

            <th class="tbl_head" scope="col" style="width:110px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $select_user_query = "SELECT * FROM `users_entries` WHERE is_verified_email = 1 ORDER BY `users_entries`.`user_last_timestamp` DESC";
          // echo$fname,$lname;
          try {
            $select_user_result = mysqli_query($connect, $select_user_query);
            $num  = mysqli_num_rows($select_user_result);
          } catch (Exception $e) {
            $mess = $e->getMessage();
          }
          if ($num > 0) {
            $sno = 0;
            while ($row = mysqli_fetch_assoc($select_user_result)) {
              $sno += 1;
          ?>
              <tr id="row_<?= $row['user_id'] ?>"  class="row_by_id" style="">

                <td style="display:none;padding: 0px 0px;" class="checkBoxOption"><label for="reg_<?= $row["user_id"] ?>" class="check_container">
                    <input type="checkbox" name="row-check" id="reg_<?= $row["user_id"] ?>" value="<?= $row["user_id"] ?>">
                    <span class="checkmark_for_select text-center" style="padding-right:10px !important;width:100%;"></span>
                  </label>
                </td>

                <td><?= $sno ?></td>
                <td><?= $row["user_username"] ?></td>
                <td><?php if('user'==$row["user_type"]){echo'seller';}else{echo$row['user_type'];} ?></td>
                <td><?= $row["user_first_name"] ?></td>
                <td><?= $row["user_last_name"] ?></td>
                <td><?= $row["user_phone"] ?></td>
                <td><?= $row["user_email"] ?></td>
                <td><?= $row["user_timestamp"] ?></td>
                <td id="status_<?= $row["user_id"] ?>">
                  <?php if($row["user_type"] !="buyer"){

                 
                  if ($row["is_verified_admin"] =="1") {
                    echo "<span style='background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;'>Approved</span>";
                  } else if ($row["is_verified_admin"] =="2") {
                    echo "<span style='background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;'>Rejected</span>";
                  } else {
                    echo "<span style='background-color:#f1c40f;color:white;padding:5px;font-weight:700;border-radius:5px;'>Pending</span>";
                  } }else{
                    echo "<span style='padding:5px;font-weight:700;border-radius:5px;'>Auto Approved</span>";
// $update_auto_approve_query = "";
                  }
                  ?></td>
                <td class="text-center">
                  <?php if($row["user_type"] !="buyer"){?>
                  <span type="button" style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="approve_<?= $row["loc_id"] ?>" class="d-inline edit table_edit_btn" data-bs-toggle="modal" data-bs-target="#editModal" onclick="approve_ac(<?= $row['user_id'] ?>)"> ✅</span>
                  <span style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="d<?= $row["user_id"] ?>" type="button" id="d" class="d-inline delete table_delete_btn " onclick="reject_ac(<?= $row['user_id'] ?>)"> ❌</span>
                  <?php }else{
                    echo "<span style='padding:5px;font-weight:700;border-radius:5px;'>No Action Needed</span>";

                  }?>

                </td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td class='text-center' colspan='6'>No New Registration Found</td></tr>";
          }
          ?>
        </tbody>
      </table>

    </div>




  </div>



  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/verified_footer.php" ?>

</body>


<?php include "../theme/body_data.php"; ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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