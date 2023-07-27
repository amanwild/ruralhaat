<?php include "../validation_of_admin.php"; ?>


<!DOCTYPE html>

<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>User Management</title>
  <?php include "../theme/head_data.php"; ?>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

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
      /* padding: 5px !important; */
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

    .table_head {
      table-layout: fixed;
      width: 50px;
      padding: 50px !important;
      /* background-color: #007bff !important; */
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

</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <?php include "../navbar/index.php" ?>
  <?php include "../component/user_count_box.php" ?>

  <div id="showLocatonContent" class="d-flex text-center mt-3 ">
    <div class="row ">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <h1 class=" my-auto mr-auto d-inline"> User Management</h1>
      </div>
      <div class="col-md-4 ml-auto">
        <div class="my-auto mr-auto " style="margin: auto; padding-top: 20px;">
          <button type="button" style="padding:10px !important;" class="table_btn btn btn-success " onclick="window.location.href='./adduser.php'">Add User
          </button>
        </div>
      </div>
    </div>

  </div>
  <div id="admin_table" class="container " style="padding-top:15px;padding-bottom:10px;">
    <?php
    // echo"<pre>"  ;
    // var_dump($_SESSION);
    // echo"<pre>";
    ?>
    <div class="table-responsive" style="border:3px solid grey;padding:5px;">
      <table data-role="table" class="table ui-responsive datatable  " id="myTable">
        <thead>
          <tr>
            <th class="checkBoxOption" style="display:none;width: 77px !important;"><input id="check_all" type="checkbox" value="all" style="width: 205px !important;"><label for="check_all"></label></th>
            <th class="tbl_head" scope="col">Sr. No.</th>
            <th class="tbl_head" scope="col">Username </th>
            <th class="tbl_head" scope="col">First Name </th>
            <th class="tbl_head" scope="col">Last Name </th>
            <th class="tbl_head" scope="col">Phone</th>
            <th class="tbl_head" scope="col">Email</th>
            <th class="tbl_head" scope="col">Since</th>
            <th class="tbl_head" scope="col">User Type</th>
            <th class="tbl_head" scope="col">Status</th>

            <th class="tbl_head" scope="col" style="width:110px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $select_user_query = "SELECT * FROM `users_entries` WHERE is_verified_email = 1 ORDER BY `users_entries`.`user_timestamp` DESC";
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
              <tr id="row_<?= $row['user_id'] ?>" class="row_by_id" style="">

                <td style="display:none;padding: 0px 0px;" class="checkBoxOption"><label for="reg_<?= $row["user_id"] ?>" class="check_container">
                    <input type="checkbox" name="row-check" id="reg_<?= $row["user_id"] ?>" value="<?= $row["user_id"] ?>">
                    <span class="checkmark_for_select text-center" style="padding-right:10px !important;width:100%;"></span>
                  </label>
                </td>

                <td><?= $sno ?></td>
                <td><?= $row["user_username"] ?></td>
                <td><?= $row["user_first_name"] ?></td>
                <td><?= $row["user_last_name"] ?></td>
                <td><?= $row["user_phone"] ?></td>
                <td><?= $row["user_email"] ?></td>
                <td><?= $row["user_timestamp"] ?></td>
                <td><?= $row["user_type"] ?></td>
                <td id="status_<?= $row["user_id"] ?>">
                  <?php
                  if ($row["is_verified_admin"]) {
                    echo "<span style='background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;'>Approved</span>";
                  } else {
                    echo "<span style='background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;'>Rejected</span>";
                  }
                  ?></td>
                <td class="text-center">
                  <a href="../user_management_panel/dashboard.php?slave_id=<?= $row['user_id'] ?>" type="button" style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="approve_<?= $row["loc_id"] ?>" class="d-inline edit table_edit_btn"> 📝</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>



  <?php include "../footer/verified_footer.php" ?>
  <?php include "../theme/body_data.php"; ?>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script>
    function show_table() {

      console.log("success");
    }
  </script>
  <?php include "./category_script.php" ?>

  <!-- for jquery table plugin  -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>



</html>