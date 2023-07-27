<?php include "../validation_of_admin.php";?>


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
  <title>User Interaction</title>
  <?php include "../theme/head_data.php";?>

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
  <?php include "../navbar/admin_navbar.php" ?>
  <div class="container">



    <?php


    include "../db.php";








    $select_query = "SELECT * FROM `user_interaction` order by interaction_timestamp desc"; //NOTE: here (`) is not equal to (')
    try {
      $select_interaction_result = 0;
      if ($connect) {
        $select_interaction_result = mysqli_query($connect, $select_query);
        if ($select_interaction_result) {
          $member_num = mysqli_num_rows($select_interaction_result);
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
            <h1 class=" my-auto mr-auto d-inline"> All User Interaction</h1>

          </div>
          <br>
          <?php
          if (isset($_POST["delete_member"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
            $member_id = $_POST["member_id"];
            $delete_query = "DELETE FROM `cummunity_member` WHERE `cummunity_member`.`member_id` = $member_id";
            $delete_result = mysqli_query($connect, $delete_query);
            if ($delete_result) {
              echo '<div class="row text-center" style="background-color:#55ab55;border-radius:3px;"> <div class="col-md-12"> <div class="notification success closeable margin-bottom-30"> <p style="color:white !important;"> Cummunity Member Deleted Successfully!!! </p> <a class="close" href="#"></a> </div> </div> </div>'; // echo ("<br> email shooting successfull <br>");

            }
          }
          ?>
          <div class="table-responsive" style="border:3px solid grey;padding:5px;margin:10px;">
            <table data-role="table" class="table ui-responsive" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Sr. No.</th>
                  <th scope="col">User Image</th>
                  <th scope="col">Interaction by Username</th>
                  <th scope="col">User Email</th>
                  <th scope="col">User Phone</th>
                  
                  <th scope="col">Target Image</th>
                  <th scope="col">On Target Username</th>
                  <th scope="col">Target Email</th>
                  <th scope="col">Target Phone</th>

                  <th scope="col">Listing Image</th>
                  <th scope="col">Listing Title</th>
                  <th scope="col">Listing Price</th>
                  <th scope="col">Listing City</th>
                  <th scope="col">Listing State</th>

                  <th scope="col">Timestamp</th>

                  <th scope="col">Method</th>
                  <th scope="col">Way</th>

                  <!-- <th scope="col" style="width:110px;">Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php

                if ($member_num > 0) {
                  $sno = 0;
                  //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                  // UPDATE `user_interaction` SET `interaction_by_user_id` = '1661', `interaction_on_user_id` = '1661', `interaction_way` = 'facebooka', `interaction_on_listing_id` = '11', `interaction_type` = 'sharea' WHERE `user_interaction`.`interaction_id` = 1;
                  while ($row = mysqli_fetch_assoc($select_interaction_result)) {
                    $sno+=1;
                    $interaction_by_user_id = $row['interaction_by_user_id'];
                    $interaction_on_user_id = $row['interaction_on_user_id'];
                    $interaction_way = $row['interaction_way'];
                    $interaction_on_listing_id = $row['interaction_on_listing_id'];
                    $interaction_type = $row['interaction_type'];
                    $interaction_id = $row['interaction_id'];
                    $interaction_timestamp = $row['interaction_timestamp'];
                    // echo"<pre>";
                    // var_dump($row);
                    // echo"<pre>";

                    $select_attacker_user_query = "SELECT * FROM `users_entries` WHERE user_id = $interaction_by_user_id"; //NOTE: here (`) is not equal to (')
                    try {
                      $select_attacker_user_result = 0;
                      if ($connect) {
                        $select_attacker_user_result = mysqli_query($connect, $select_attacker_user_query);
                        if ($select_attacker_user_result) {
                          $member_num = mysqli_num_rows($select_attacker_user_result);
                        }
                      }
                    } catch (Exception $e) {
                      $mess = $e->getMessage();
                    }
                    while ($row = mysqli_fetch_assoc($select_attacker_user_result)) {
                      $interaction_by_user_username = $row['user_username'];
                      $interaction_by_user_email = $row['user_email'];
                      $interaction_by_user_phone = $row['user_phone'];
                      $interaction_by_user_image = $row['user_image'];
                    }  
                    $select_target_user_query = "SELECT * FROM `users_entries` WHERE user_id = $interaction_on_user_id"; //NOTE: here (`) is not equal to (')
                    try {
                      $select_target_user_result = 0;
                      if ($connect) {
                        $select_target_user_result = mysqli_query($connect, $select_target_user_query);
                        if ($select_target_user_result) {
                          $member_num = mysqli_num_rows($select_target_user_result);
                        }
                      }
                    } catch (Exception $e) {
                      $mess = $e->getMessage();
                    }
                    while ($row = mysqli_fetch_assoc($select_target_user_result)) {
                      $interaction_on_user_username = $row['user_username'];
                      $interaction_on_user_email = $row['user_email'];
                      $interaction_on_user_phone = $row['user_phone'];
                      $interaction_on_user_image = $row['user_image'];
                    }  

                    $select_target_listing_query = "SELECT
                    *
                  FROM
                    listing
                    left join category on listing.listing_category_id = category.category_id
                    left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id
                    left join countries on listing.listing_country_id = countries.country_id
                    left join states on listing.listing_state_id = states.state_id
                    left join cities on listing.listing_city_id = cities.city_id where listing.listing_id = $interaction_on_listing_id"; //NOTE: here (`) is not equal to (')
                    try {
                      $select_target_listing_result = 0;
                      if ($connect) {
                        $select_target_listing_result = mysqli_query($connect, $select_target_listing_query);
                        if ($select_target_listing_result) {
                          $member_num = mysqli_num_rows($select_target_listing_result);
                        }
                      }
                    } catch (Exception $e) {
                      $mess = $e->getMessage();
                    }
                    while ($row = mysqli_fetch_assoc($select_target_listing_result)) {
                      $interaction_on_listing_title = $row['listing_title'];
                      $interaction_on_listing_category_name = $row['category_name'];
                      $interaction_on_listing_price = $row['listing_price'];
                      $interaction_on_listing_image = $row['listing_image'];
                      $interaction_on_listing_city_name = $row['city_name'];
                      $interaction_on_listing_state_name = $row['state_name'];
                    }  

                ?>

                    <tr>
                      <td><?= $sno ?></td>
                      <td><img src="../wp-content/uploads/data/<?= $interaction_by_user_image ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                      <td><?= $interaction_by_user_username?></td>
                      <td><?= $interaction_by_user_email?></td>
                      <td><?= $interaction_by_user_phone?></td>

                      <td><img src="../wp-content/uploads/data/<?= $interaction_on_user_image ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                      <td><?= $interaction_on_user_username?></td>
                      <td><?= $interaction_on_user_email?></td>
                      <td><?= $interaction_on_user_phone?></td>
                      
                      <td><img src="../wp-content/uploads/data/<?= $interaction_on_listing_image ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                      <td><?= $interaction_on_listing_title?></td>
                      <td><?= $interaction_on_listing_price?></td>
                      <td><?= $interaction_on_listing_city_name?></td>
                      <td><?= $interaction_on_listing_state_name?></td>

                      <td><?= $interaction_timestamp?></td>

                      <td><?= $interaction_type?></td>
                      <td><?= $interaction_way?></td>

                     
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
    </div>
  </div>
  <section class="classiera-advertisement advertisement-v5 section-pad-80 border-bottom">

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
      responsive: true

    });
  </script>
</body>


<?php include "../footer/verified_footer.php" ?>
<?php include "../theme/body_data.php";?>

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