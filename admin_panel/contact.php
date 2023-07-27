<?php include "../validation_of_admin.php";?>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<!-- 

<script type="text/javascript">
  $(document).ready(function() {

    //##### Add record when Add Record Button is click #########
    $("#registration_form").submit(function(e) {
      e.preventDefault();

      var register_username = $("#register_username").val(); //build a post data structure
      var register_email = $("#register_email").val(); //build a post data structure
      var register_phone = $("#register_phone").val(); //build a post data structure
      var register_value = $("#register_value").val(); //build a post data structure

      jQuery.ajax({
        type: "POST", // Post / Get method
        url: "response.php", //Where form data is sent on submission
        dataType: "text", // Data type, HTML, json etc.
        data: {
          register_email: register_email,
          register_username: register_username,
          register_phone: register_phone,
          register_value: register_value
        }, //Form variables
        success: function(response) {
          // $("#regiter_success").display("block");
          $('#regiter_success').show();
          $('#register_tip').hide();
          // // $("#responds").append(response);
          console.log(response);
          alert("hello");
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError);
        }
      });
    });

  });
</script> -->


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
  <title>Contact</title>
  <?php include "../theme/head_data.php";?>


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
    font-weight:1000 !important;
    font-size:15x;
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
.check_container:hover input ~ .checkmark_for_select {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.check_container input:checked ~ .checkmark_for_select {
  background-color: #2196F3;
}

/* Create the checkmark_for_select/indicator (hidden when not checked) */
.checkmark_for_select:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark_for_select when checked */
.check_container input:checked ~ .checkmark_for_select:after {
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
  <?php include "../navbar/index.php"?>

  <div id="showLocatonContent" class="d-flex text-center mt-3 ">
    <h1 class=" my-auto mr-auto d-inline"> All Contacts</h1>
  </div>
  <div id="admin_table" class="container " style="padding-top:15px;padding-bottom:10px;">
    <div class="table-responsive" style="border:3px solid grey;padding:5px;">
      <table data-role="table" class="table ui-responsive datatable  " id="myTable">
        <thead>
          <tr >
          <!-- <th style="width: 77px !important;"><input id="check_all" type="checkbox" value="all" style="width: 205px !important;" ><label for="check_all"></label></th> -->
            <th class="tbl_head" scope="col"  >Sr. No.</th>

            <th class="tbl_head" scope="col">Subject</th>
            <th class="tbl_head" scope="col">Message</th>

            <th class="tbl_head" scope="col">Sender Name </th>
            <th class="tbl_head" scope="col">Email</th>
            <th class="tbl_head" scope="col">Phone no.</th>

            <th class="tbl_head" scope="col">Since</th>

            <th  class="tbl_head" scope="col" style="width:110px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
         include "../db.php";

          $select_query = "SELECT * FROM `contact` order by contact_timestamp desc";
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
          ?>
              <tr >

              <!-- <td style="padding: 0px 0px;"><label for="reg_id" class="check_container">   
  <input type="checkbox" name="row-check" id="reg_id"  value="id"> 
  <span class="checkmark_for_select" style="padding-right:10px !important;width:100%;height:45px;" ></span>
</label></td>
               -->
                <td><?= $sno ?></td>

                <td><?= $row["contact_title"] ?></td>
                <td><?= $row["contact_message"] ?></td>

                <td><?= $row["contact_name"] ?></td>
                <td><?= $row["contact_email"] ?></td>
                <td><?= $row["contact_phone"] ?></td>
                
                <td><?= $row["contact_timestamp"] ?></td>

                <td class="text-center">
                  <!-- <span type="button" style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="approve_<?= $row["loc_id"] ?>" class="d-inline edit table_edit_btn" data-bs-toggle="modal" data-bs-target="#editModal" onclick="approve_ac(<?= $row['user_id'] ?>)"> ✅</span> -->
                  <span style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="d<?= $row["user_id"] ?>" type="button" id="d" class="d-inline delete table_delete_btn " onclick="reject_ac(<?= $row['user_id'] ?>)"> ❌</span>
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
 

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
      $(function() {
	//If check_all checked then check all table rows
	$("#check_all").on("click", function () {
		if ($("input:checkbox").prop("checked")) {
			$("input:checkbox[name='row-check']").prop("checked", true);
		} else {
			$("input:checkbox[name='row-check']").prop("checked", false);
		}
	});

	// Check each table row checkbox
	$("input:checkbox[name='row-check']").on("change", function () {
		var total_check_boxes = $("input:checkbox[name='row-check']").length;
		var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

		// If all checked manually then check check_all checkbox
		if (total_check_boxes === total_checked_boxes) {
			$("#check_all").prop("checked", true);
		}
		else {
			$("#check_all").prop("checked", false);
		}
	});
});
      function approve_ac(id) {
        // alert("approved " + id)
        $.ajax({
          url: "./approve_ac.php",
          type: "POST",
          data: {
            type: "approve",
            id: id,
          },
          success: function(result) {

            console.log(result);
            console.log("approve " + id);
            document.getElementById("status_" + id).innerHTML = `<span style="background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;">Approved</span>`;

          }
        });
      }

      function reject_ac(id) {
        // alert("reject " + id)
        $.ajax({
          url: "./reject_ac.php",
          type: "POST",
          data: {
            type: "reject",
            id: id,
          },
          success: function(result) {
            console.log(result);
            console.log("reject " + id);
            document.getElementById("status_" + id).innerHTML = `<span style="background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;">Rejected</span>`;
          }
        });

      }

      $(document).ready(function() {
        $('#myTable').DataTable();
        responsive: true
      });
    </script>




  </div>


</body>



<!-- page content -->

<section class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <p class="text-center">
          All copyrights reserved © 2023- Design & Development by <a href="#">Royals WebTech Pvt. Ltd.</a>
        </p>
      </div>

    </div><!--row-->
  </div><!--container-->
</section>
<?php include "../theme/body_data.php";?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
  function show_table() {

    console.log("success");

  }
</script>



<!-- for jquery table plugin  -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>



</html>