<?php include "../validation_of_admin.php"; ?>



<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

  <title>Success Stories</title>
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



    if (isset($_POST["delete_success_story"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
      $success_story_id = $_POST["success_story_id"];
      $delete_query = "DELETE FROM `success_story` WHERE `success_story`.`success_story_id` = $success_story_id";
      $delete_result = mysqli_query($connect, $delete_query);
      if ($delete_result) {
        echo '<div class="row text-center" style="background-color:#55ab55;border-radius:3px;"> <div class="col-md-12"> <div class="notification success closeable margin-bottom-30"> <p style="color:white !important;"> Success Story Deleted Successfully!!! </p> <a class="close" href="#"></a> </div> </div> </div>'; // echo ("<br> email shooting successfull <br>");

      }
    }




    $select_query = "SELECT * FROM `success_story` ORDER BY `success_story`.`success_story_id` DESC"; //NOTE: here (`) is not equal to (')
    try {
      $select_result = 0;
      if ($connect) {
        $select_result = mysqli_query($connect, $select_query);
        if ($select_result) {
          $success_story_num = mysqli_num_rows($select_result);
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
            <div class="row ">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <h1 class=" my-auto mr-auto d-inline"> Success Stories</h1>
              </div>
              <div class="col-md-4 ml-auto">
                <div class="my-auto mr-auto " style="margin: auto; padding-top: 20px;">
                <button type="button" style="padding:10px !important;" class="table_btn btn btn-success " onclick="window.location.href='./addsuccess_story.php'">Add Success Stories
                  </button>
                </div>
              </div>
            </div>
          </div>
          <br>

          <div class="table-responsive" style="border:3px solid grey;padding:5px;margin:10px;">
            <table data-role="table" class="table ui-responsive" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Sr. No.</th>
                  <th scope="col">Title</th>
                  <th scope="col">Image</th>

                  <th scope="col" style="width:110px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                if ($success_story_num > 0) {
                  $sno = 0;
                  //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                  while ($row = mysqli_fetch_assoc($select_result)) {
                    $sno += 1;

                ?>

                    <tr>
                      <td><?= $sno ?></td>
                      <td><?= $row['success_story_title'] ?></td>

                      <td><img src="../wp-content/uploads/data/<?= $row['success_story_image'] ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                      <td class="text-center">

                        <button type="submit" onclick="window.location.href='./editsuccess_story.php?success_story_id=<?= $row['success_story_id'] ?>'" class="d-inlineedit table_edit_btn " style="border:none;background-color:transparent;font-size:inherit;">📝</button>

                        <form enctype="multipart/form-data"  onsubmit="return confirm('Are you sure? you want to Delete Category!');" method="POST" style="display:inline-block" action="<?= $_SERVER["REQUEST_URI"]; ?>">
                          <input type="hidden" id="success_story_id" name="success_story_id" value="<?= $row['success_story_id'] ?>" />
                          <input type="hidden" id="delete_success_story" name="delete_success_story" value="true" />

                          <button type="submit" class="d-inline delete table_delete_btn " style="border:none;background-color:transparent;font-size:inherit;">❌</button>
                        </form>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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