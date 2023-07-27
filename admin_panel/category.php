<?php include "../validation_of_admin.php";
    include "../service/unlink_image.php"; ?>


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
  <title>All Category</title>
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
  <?php include "../navbar/admin_navbar.php" ?>
  <div class="container">



    <?php

    include "../db.php";



    
    if (isset($_POST["delete_category"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
      
      $category_id = $_POST["category_id"];
      unlink_img('category_image' ,'category','category_id', $category_id, $connect);

      $delete_query = "DELETE FROM `category` WHERE `category`.`category_id` = $category_id";
      $delete_result = mysqli_query($connect, $delete_query);
    
    }




    $select_query = "SELECT * FROM `category` ORDER BY `category`.`category_since` DESC"; //NOTE: here (`) is not equal to (')
    try {
      $select_result = 0;
      if ($connect) {
        $select_result = mysqli_query($connect, $select_query);
        if ($select_result) {
          $num = mysqli_num_rows($select_result);
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
                <h1 class=" my-auto mr-auto d-inline"> All Categories</h1>
              </div>
              <div class="col-md-4 ml-auto">
                <div class="my-auto mr-auto " style="margin: auto; padding-top: 20px;">
                  <button type="button" style="padding:10px !important;" class="table_btn btn btn-success " onclick="window.location.href='./addcategory.php'">Add Category
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
                  <th scope="col">Category Name</th>
                  <th scope="col">Color</th>
                  <th scope="col">Sub-Category</th>
                  <th scope="col">Image</th>
                  <th scope="col">Products</th>

                  <th scope="col" style="width:110px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                if ($num > 0) {
                  $sno = 0;
                  //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                  while ($row = mysqli_fetch_assoc($select_result)) {
                    $sno += 1;

                ?>

                    <tr>
                      <td><?= $sno ?></td>
                      <td><?= $row['category_name'] ?></td>
                      <td><?= $row['category_color'] ?></td>

                      <td> <select name="category_subcategory" id="category_subcategory" style="padding:5px !important;width:auto;padding:5px;margin-bottom:0px; height:32px;" class="p-1">

                          <?php

                          $select_sub_category_query = "SELECT * FROM category left join sub_category on category.category_id = sub_category.sub_category_category_id where category.category_id = " . $row['category_id']; //NOTE: here (`) is not equal to (')
                          try {
                            $select_sub_category_result = 0;
                            if ($connect) {
                              $select_sub_category_result = mysqli_query($connect, $select_sub_category_query);
                              if ($select_sub_category_result) {
                                $num_for_sub_category = mysqli_num_rows($select_sub_category_result);
                              }
                            }
                          } catch (Exception $e) {
                            $mess = $e->getMessage();
                          }

                          if ($num_for_sub_category > 0) {
                            while ($row_for_sub_category = mysqli_fetch_assoc($select_sub_category_result)) {
                              echo '<option style="font-size:17px !important;margin-bottom:0px;padding:15px;height:32px;" value="' . $row_for_sub_category['sub_category_id'] . '">' . $row_for_sub_category['sub_category_name'] . ' </option>';
                              // echo($string);
                            }
                          }
                          ?>
                        </select></td>
                      <td><img src="../wp-content/uploads/data/<?= $row['category_image'] ?>" class="rounded-circle img-fluid" style="object-fit:cover;max-width: 32px;height: auto;" class="mr-3 p-1" alt="." /></td>
                      <td>100</td>
                      <td class="text-center">

                        <button type="submit" onclick="window.location.href='./editcategory.php?cat_id=<?= $row['category_id'] ?>'" class="d-inlineedit table_edit_btn " style="border:none;background-color:transparent;font-size:inherit;">📝</button>

                        <form enctype="multipart/form-data" onsubmit="return confirm('Are you sure? you want to Delete Category!');" method="POST" style="display:inline-block" action="<?= $_SERVER["REQUEST_URI"]; ?>">
                          <input type="hidden" id="category_id" name="category_id" value="<?= $row['category_id'] ?>" />
                          <input type="hidden" id="delete_category" name="delete_category" value="true" />

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
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
      responsive: true

    });
  </script>
  <script>
    function show_table() {

      console.log("success");

    }
  </script>
  <script src="multi-input.js"></script>

  <script>
    function showimg() {
      var x = (document.getElementById("category_image").value).slice(12, 100);
      console.log(x);
      document.getElementById("profile_dp").src = "../wp-content/uploads/data/" + x;
    }
    const getButton = document.getElementById('get_multi_tags');
    const multiInput = document.querySelector('multi-input');
    const values = document.querySelector('#show_tags_values');

    getButton.onclick = () => {
      if (multiInput.getValues().length > 0) {
        values.textContent = `Got ${multiInput.getValues().join(' and ')}!`;
      } else {
        values.textContent = 'Got none  :(';
      }
    }

    document.querySelector('input').focus();
  </script>


  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

  <script>
    // function validation_for_category() {
    //     var category_name = document.getElementById("category_name");
    //     category_name = category_name.value;
    //     if (category_name.length > 0) {


    //         $.ajax({
    //             url: "./validation_for_category.php",
    //             datatype: "text",
    //             type: "POST",
    //             data: {
    //                 submit: "submit",
    //                 category_name: category_name,
    //                 category_id: ,
    //             },
    //             success: function(result) {
    //                 console.log("hello");
    //                 result = JSON.parse(result);
    //                 json_data = result;
    //                 console.log(json_data);
    //                 // console.log(json_data[0][0]);

    //                 if (0 < (json_data[0][0]).length) {
    //                     $('#label_for_category_name_validation').html(json_data[0][1]);
    //                 }
    //                 if (0 < (json_data[0][1]).length) {
    //                     document.getElementById("add_category_submit").disabled = true;
    //                 } else {
    //                     document.getElementById("add_category_submit").disabled = false;
    //                 }
    //             }
    //         });
    //     }
    // }
  </script>
  <?php
  if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['updateCategory']) && isset($_POST['category_name']))) {
    if ($update_category_result) {

      echo "<script>alert('Category Successfully Updated !! ') </script>" . "<br>";
    } else {
      echo "<script>alert('Category is not  Updated !! ') </script>" . "<br>";
    }
  } ?>

</body>


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