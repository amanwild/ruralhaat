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
  <title>Product Details</title>
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

    .tbl_head {
      font-weight: 1000 !important;
      font-size: 15x;
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
  <?php include "../user_panel/component/preloader.php" ?>
  <?php include "../component/listing_count_box.php" ?>

  
  <div class="container">



    <?php

    if (isset($_GET['delete'])) {
      $snoDeletes = $_GET['delete'];
      $delete_query  = "DELETE FROM `product` WHERE `product`.`product_id` = $snoDeletes";
      $delete_result = mysqli_query($connect, $delete_query);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // echo"here";
      if (isset($_POST['snoEdit'])) {
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
    }

    $select_listing_query = "SELECT * FROM listing left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id left join category on listing.listing_category_id = category.category_id left join cities on listing.listing_city_id=cities.city_id left join states on listing.listing_state_id = states.state_id left join countries on listing.listing_country_id = countries.country_id left join users_entries on listing.listing_owner_id = users_entries.user_id GROUP BY listing_id ORDER BY `listing`.`listing_since` DESC"; //NOTE: here (`) is not equal to (')
    try {
      $select_listing_result = 0;
      if ($connect) {
        $select_listing_result = mysqli_query($connect, $select_listing_query);
        if ($select_listing_result) {
          $num = mysqli_num_rows($select_listing_result);
        }
      }
    } catch (Exception $e) {
      $mess = $e->getMessage();
    }
    ?>


    <div id="main" class="">
      <div class="allContent-section container   pt-0" style="margin-bottom: 20px;">


        <div class=" my-1">
          <div id="showLocatonContent" class="d-flex text-center mt-3 ">
            <h1 class=" my-auto mr-auto d-inline"> All Products</h1>
          </div>

          <br>
          <div class="table-responsive" style="border:3px solid grey;padding:5px;">
            <table data-role="table" class="table ui-responsive" id="myTable">

              <div id="showEditorOption" style="float:left;display:none !important;" class="d-flex text-center">
                <div class="form-group">
                  <button type="" name="submit" onclick="approve_listing_with_checkbox()" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Approve</button>
                  <button type="" style='background-color:red;color:white;padding:5px;font-weight:700;font-size:15px;' name="submit" class="btn  sharp btn-md btn-style-one" onclick="reject_listing_with_checkbox()" value="Send">Reject</button>
                </div>
              </div>
              <div id="showEditorBtn" style="float:left" class="d-flex text-center">
                <div class="form-group">
                  <button type="" onclick="show_checkbox()" name="submit" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Edit</button>
                </div>
              </div>

              <thead>
                <tr>
                  <th style="width: 77px !important;display:none;" class="checkBoxOption"><input id="check_all" type="checkbox" value="all" style="width: 205px !important;"><label for="check_all"></label></th>
                  <th class="tbl_head" scope="col">Sr. No.</th>
                  <th class="tbl_head" scope="col">Title </th>
                  <th class="tbl_head" scope="col">Description</th>
                  <th class="tbl_head" scope="col">Category</th>
                  <th class="tbl_head" scope="col">Price</th>
                  <th class="tbl_head" scope="col">Image</th>
                  <th class="tbl_head" scope="col">Status</th>

                  <th class="tbl_head" scope="col" style="width:110px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                if ($num > 0) {
                  $sno = 0;
                  //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                  while ($row = mysqli_fetch_assoc($select_listing_result)) {
                    $sno += 1;

                    $listing_title = $row['listing_title'];

                ?>
                    <tr>
                      <td style=" padding: 0px 0px;display:none;" class="checkBoxOption"><label for="reg_<?= $row["listing_id"] ?>" class="check_container checkBoxOption">
                          <input type="checkbox" name="row-check" id="reg_<?= $row["listing_id"] ?>" value="<?= $row["listing_id"] ?>">
                          <span class="checkmark_for_select text-center" style="padding-right:10px !important;width:100%;"></span>
                        </label>
                      </td>
                      <td><?= $sno ?></td>
                      <td><?= $row['listing_title'] ?></td>
                      <td><?= $row['listing_description'] ?></td>
                      <td><?= $row['category_name'] ?></td>
                      <td><?= $row['listing_price'] ?></td>
                      <td><img src="../wp-content/uploads/data/<?= $row['listing_image'] ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                      <td class="text-center" id="status_<?= $row['listing_id'] ?>">
                        <?php
                        if ($row["listing_permission"] == "Pending") {
                          echo "<span style='background-color:#d6d816;color:white;padding:5px;font-weight:700;border-radius:5px;'>Pending</span>";
                        } else if ($row["listing_permission"] == "Approved") {
                          echo "<span style='background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;'>Approved</span>";
                        } else if ($row["listing_permission"] == "Rejected") {
                          echo "<span style='background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;'>Rejected</span>";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <span type="button" style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="approve_<?= $row["loc_id"] ?>" class="d-inline" data-bs-toggle="modal" onclick="approve_listing(<?= $row['listing_id'] ?>)"> ✅</span>
                        <span style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="d<?= $row["listing_id"] ?>" type="button" id="d" class="d-inline  " onclick="reject_listing(<?= $row['listing_id'] ?>)"> ❌</span>
                      </td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</body>


<?php include "../footer/verified_footer.php" ?>
<?php include "../theme/body_data.php"; ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
  function show_table() {

    console.log("success");

  }
</script>

<?php include "./product_script.php" ?>

<!-- for jquery table plugin  -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>



</html>